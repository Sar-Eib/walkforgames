let points = 0;
let steps = 0;
let stepsForPoints = 1400; // Standard for point (1 km)
const progressElement = document.getElementById('progress');
const pointsElement = document.getElementById('points');
const rewardModal = document.getElementById('rewardModal');
let remainingSteps = 0; // Variabel til at gemme overskydende skridt
let isReady = false;

let currentChallenge = null; // Variabel til at gemme den aktuelle udfordring


// Opret et array til at gemme brugte skridt
let usedStepsArray = [];


// Funtion til at indlæse udfordringen fra localStorage ved sideindlæsning
function loadChallenge() {
    const savedChallenge = localStorage.getItem('selectedChallenge');
    const savedSteps = localStorage.getItem('steps');
    const earnedPoints = localStorage.getItem('earnedPoints');
    const usedSteps = localStorage.getItem('usedSteps'); // Hent arrayet fra localStorage

    if (savedSteps) {
        steps = parseInt(savedSteps, 10); // Hent gemte skridt
    }
    if (savedChallenge) {
        // Sæt udfordringen ved hjælp af den gemte værdi
        setChallenge(savedChallenge);
    }
    if (earnedPoints) {
        points = parseInt(earnedPoints, 10);
        pointsElement.textContent = points; // Opdater visningen af point
    }
    // Hent og parse brugte skridt, eller initialiser som et tomt array
    if (usedSteps) {
        usedStepsArray = JSON.parse(usedSteps); // Parse string til array
    } else {
        usedStepsArray = []; // Hvis ikke gemt, initialiser som tomt array
    }

    document.getElementById('totalSteps').textContent = usedStepsArray.reduce((a, b) => a + b, 0);

    // Opdater progress baren baseret på nuværende skridt og udfordring
    updateProgressBar();

}

// Kald funktionen til at indlæse udfordringen, når siden indlæses
window.onload = function() {
    loadChallenge();
};

// Funktion til at sætte udfordringsniveauet
function setChallenge(challenge) {

    // Definer skridtmålet for den nye udfordring
    let newStepsForPoints;
    if (challenge === 'mindre') {
        newStepsForPoints = 1400;
    } else if (challenge === 'aktiv') {
        newStepsForPoints = 9800;
    } else if (challenge === 'meget') {
        newStepsForPoints = 14000;
    }

    // Tjekker om der allerede er registreret skridt og om den nye udfordring har et lavere skridtmål
    if (steps > 0 && newStepsForPoints < stepsForPoints) {
        currentChallenge = challenge; // Gem den nye udfordring, som brugeren vil skifte til
        showChallengeChangeModal(); // Vis modal til bekræftelse
        return; // Stop funktionen for ikke at ændre udfordring endnu
    }

    // Først fjern 'selected-challenge' klassen fra alle divs
    const divs = document.querySelectorAll('.gradient-activity');
    divs.forEach(div => div.classList.remove('selected-challenge'));

    // Find den div, der blev klikket på, baseret på udfordringen
    let selectedDiv;
    if (challenge === 'mindre') {
        selectedDiv = divs[0]; // Første div
        stepsForPoints = 1400;
    } else if (challenge === 'aktiv') {
        selectedDiv = divs[1]; // Anden div
        stepsForPoints = 9800;
    } else if (challenge === 'meget') {
        selectedDiv = divs[2]; // Tredje div
        stepsForPoints = 14000;
    }

    // Tilføj 'selected-challenge' klassen til den valgte div
    selectedDiv.classList.add('selected-challenge');

    // Gem udfordringen i localStorage
    localStorage.setItem('selectedChallenge', challenge);

    // Rejustér progress bar efter det nye skridtmål
    updateProgressBar();
    console.log(`Udfordring sat til: ${challenge}, Point ved: ${stepsForPoints} skridt`);
}


// Funktion til at tilføje skridt baseret på input
function addSteps() {
    //const stepInput = document.getElementById('stepInput').value; // Hent værdi fra input
    //const stepNumber = parseInt(stepInput); // Konverter input til et heltal
    const stepNumber = 100; //

    // Kontroller at input er et gyldigt antal skridt
    //if (!isNaN(stepNumber) && stepNumber > 0) {
    if (stepNumber > 0) {
        steps += stepNumber; // Tilføj skridt til det samlede antal skridt
        usedStepsArray.push(stepNumber); // Gem skridtene i usedStepsArray

        localStorage.setItem('usedSteps', JSON.stringify(usedStepsArray)); // Gem arrayet

        console.log(`Tilføjet ${stepNumber} skridt, total: ${steps}, usedStepsArray: ${JSON.stringify(usedStepsArray)}`); // Log total skridt

        console.log(`Tilføjet ${stepNumber} skridt, total: ${steps}`); // Log total skridt

        localStorage.setItem('steps', steps); // Gem skridtene i localStorage

        // Opdater progress og tjek om der skal gives point
        checkProgress();
    } else {
        alert('fejl');
    }
}

function checkProgress() {

    if (steps >= stepsForPoints) {
        // Beregn overskydende skridt som skal tælle videre
        remainingSteps = steps % stepsForPoints; // Gem overskydende skridt til næste optælling
        console.log(`Overskydende skridt gemt: ${remainingSteps}`); // Log overskydende skridt

        showPopup(); // Vis pop-up med points
    }

    // Opdater progress baren
    updateProgressBar();
}

function updateProgressBar() {
    // Beregn og opdater progress baren
    let progressPercentage = (steps / stepsForPoints) * 100; // Beregn procentdel af progress
    if (progressPercentage > 100) {
        progressPercentage = 100; // Maksimer til 100%
    }
    progressElement.style.width = progressPercentage + '%';

    // Hvis progress når 100%, aktiver klikbar bar og gør den "klar"
    if (progressPercentage >= 100) {
        isReady = true;
        progressElement.classList.add('ready');
    } else {
        isReady = false;
        progressElement.classList.remove('ready');
    }

    // Gem de aktuelle skridt i localStorage, så de huskes på tværs af sider
    localStorage.setItem('steps', steps);

    // Opdater DOM med samlede skridt
    document.getElementById('totalSteps').textContent = usedStepsArray.reduce((a, b) => a + b, 0);
}

function showPopup() {
    if (isReady) {
        rewardModal.style.display = 'flex';
    }
}

function redeemPoints() {
    steps = 0;
    // Tilføj overskydende skridt til de nuværende skridt, hvis der er nogen
    if (remainingSteps > 0) {
        steps += remainingSteps; // Tilføj remainingSteps til steps
        console.log(`Overskydende skridt tilføjet: ${remainingSteps}`); // Log overskydende skridt
    }

    // Tilføj point ved indløsning
    points += 5;
    pointsElement.textContent = points;
    localStorage.setItem('earnedPoints', points);

    remainingSteps = 0;

    // Opdater progress baren
    updateProgressBar();
    rewardModal.style.display = 'none';


    localStorage.setItem('steps', steps); // Gem skridtene i localStorage

    // Log det samlede antal skridt gemt i usedStepsArray

    console.log(`Samlede skridt taget: ${usedStepsArray.reduce((a, b) => a + b, 0)} skridt`);


}

function clearStorage(){
    localStorage.clear();
}

console.log(localStorage.getItem('usedSteps'));



// Funktion til at vise popup-modal ved udfordringsskift
function showChallengeChangeModal() {
    document.getElementById('challengeChangeModal').style.display = 'flex';
}

// Funktion til at lukke modal'en
function closeChallengeChangeModal() {
    document.getElementById('challengeChangeModal').style.display = 'none';
}

// Funktion til at starte en ny udfordring
// Opdateret startNewChallenge-funktion
function startNewChallenge() {
    steps = 0;

    // Gem i localStorage
    localStorage.setItem('steps', steps);
    localStorage.setItem('usedSteps', JSON.stringify(usedStepsArray));

    // Sæt den nye udfordring, som brugeren ønsker at skifte til
    setChallenge(currentChallenge);

    // Luk modal'en
    closeChallengeChangeModal();
}

