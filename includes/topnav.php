<nav class="navbar container-fluid fixed-top gradientblue shadow-lg mb-5">
    <div class="container-fluid">
        <div class="d-flex flex-row align-content-center">
            <img onclick="addSteps()" src="images/walk-btn2.webp" alt="walkforgames logo" class="img-fluid z-2" style="width: 50px; height: auto;">
            <div class="position-absolute progress-bar d-flex align-self-center rounded-end-pill" id="progress-bar" onclick="showPopup()" style="width: 100px; left: 50px;">
                <div class="progress" id="progress"></div>
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="d-flex heart shadow p-0 m-0 justify-content-center align-items-center" style="width: 50px; height: 50px;">
                <div class="points-display m-0" style="right: 10px;"><span class="text-center shadow" id="points">0</span></div>
            </div>
        </div>
    </div>
</nav>
