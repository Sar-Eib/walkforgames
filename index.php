<?php
require "settings/init.php";
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Walk4Games</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-dark inner-shadow">
<?php
// Inkludér navigationsmenuen
include("includes/topnav.php");
?>



<div class="container">

    <div class="mt-5 p-2">
        <h3 class="text-white shadow-lg gradient-h3">Aktivitetsniveau:</h3>
    </div>
    <div class="d-flex gap-3 ">

        <div class="rounded-3 gradient-activity p-2" onclick="setChallenge('mindre')">
            <img src="images/lessactive.webp" alt="gående mand - mindre aktiv" class="img-fluid">
        </div>
        <div class="rounded-3 gradient-activity p-2" onclick="setChallenge('aktiv')">
            <img src="images/active.webp" alt="løbende mand - aktiv" class="img-fluid">
        </div>
        <div class="rounded-3 gradient-activity p-2" onclick="setChallenge('meget')">
            <img src="images/veryactive.webp" alt="sprintende mand - meget aktiv" class="img-fluid">
        </div>
    </div>

    <div class="points-display m-4">Skridt i dag: <span class="text-secondary" id="totalSteps">0</span></div>


    <!-- Modal / Pop-up -->
    <div id="rewardModal" class="modal">
        <div class="modal-content">
            <h2>+5 point!</h2>
            <button class="p-2 rounded-2 m-2 border-0 text-white" onclick="redeemPoints()">Indløs</button>
        </div>
    </div>

    <!-- Modal / Pop-up -->
    <div id="challengeChangeModal" class="modal">
        <div class="modal-content">
            <span class="close fs-3" onclick="closeChallengeChangeModal()">&times;</span>
            <h2>Skift Udfordring</h2>
            <p>Du er allerede i gang med en challenge. Hvis du ændrer indstillingen nu, nulstilles skridtene, og din challenge starter fra 0.</p>
            <button class="p-2 rounded-2 m-2 border-0 text-white" onclick="startNewChallenge()">Ok, start ny</button>
            <button class="p-2 rounded-2 m-2 border-0 text-white" onclick="closeChallengeChangeModal()">Annullér skift</button>
        </div>
    </div>



    <!-- indsæt database over de foregående dages skridt -->
    <div class="bg-white p-1 rounded-3">
        <table class="table bg-white p-3 rounded-3">
            <thead>
            <tr>
                <th scope="col" class="p-0 m-1">
                    <?php

                    $users = $db->sql("SELECT * FROM users");

                    // Hvis knappen "uploadProgress" bliver trykket
                    if (isset($_POST['uploadProgress'])) {
                        // Hent brugerens ID og skridt fra POST-anmodningen
                        $id = $_POST['user_id'];
                        $steps = $_POST['steps'];

                        $result = $db->sql("UPDATE users SET userTodaysSteps = :userTodaysSteps WHERE id = :id", [":id" => $id, ":userTodaysSteps" => $steps]);

                    }
                    ?>

                    <!-- Formular til at uploade skridt -->
                    <form method="post" class="p-0 m-1" action="">
                        <input type="hidden" name="user_id" value="6"> <!-- Erstat med den aktuelle bruger-ID -->
                        <input type="hidden" name="steps" id="steps" value="0"> <!-- Hidden input for skridtene -->

                        <button id="uploadProgress" type="submit" name="uploadProgress" class="btn gradient-activity text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                            </svg>
                        </button>
                    </form>

                    <script>
                        // JavaScript til at opdatere skjult input med de faktiske skridt
                        document.getElementById('uploadProgress').addEventListener('click', function() {
                            const steps = parseInt(document.getElementById('totalSteps').innerText); // Hent skridtene fra UI
                            document.getElementById('steps').value = steps; // Indsæt skridtene i hidden input
                        });

                        // Automatisk opdatering hvert 10. minut (600000 ms)
                        setInterval(function() {
                            document.getElementById('uploadProgress').click(); // Simuler klik på knappen
                        }, 600000); // 600000 ms = 10 minutter
                    </script>
                </th>
                <th scope="col" class="text-start text-primary">Brugere</th>
                <th scope="col" class="text-start text-primary">Highscore</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Hent brugeren med ID 1 fra databasen
            $users = $db->sql("SELECT * FROM users ORDER BY userTodaysSteps DESC");
            // Gennemgå hver bruger
            // Initialiser en tæller
            $rownr = 1;
            foreach ($users as $user) :
                ?>
                <tr>
                    <th scope="row" class="text-primary"><?php echo $rownr++ ?></th>
                    <td class="text-start"><?php echo $user->username ?></td>
                    <td class="text-center"><?php echo $user->userTodaysSteps ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <p class="text-white fs-6 mt-5 mb-0">Til testformål</p>
    <button id="clearStorage" onclick="clearStorage()" class="mb-2 btn gradient-activity text-white">Ryd local storage</button>
    <div style="height: 300px;"></div>



    <?php
    // Inkludér navigationsmenuen
    include("includes/botnav.php");
    ?>

</div>



<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="scripts/steps.js"></script>
</body>
</html>
