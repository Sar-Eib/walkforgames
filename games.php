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

    <div class="mt-5 p-2 text-white shadow-lg gradient-h3 d-flex justify-content-between align-items-center">
        <h3 class="m-0">Tier 1 spil:</h3>
        <div class="d-flex heart shadow p-0 m-0 justify-content-center align-items-center" style="width: 50px; height: 50px;">
            <div class="m-0" style="right: 10px;"><span class="text-center shadow">2</span></div>
        </div>
    </div>
    <div class="d-flex gap-1 flex-wrap m-2">
        <div class="two-points p-2" style="height: 100px;">
            <img src="images/game1.webp" alt="spil - placeholder" class="rounded-5" style="height: 110px; width: 110px;">
        </div>
        <div class="two-points p-2">
            <img src="images/game2.webp" alt="spil - placeholder" class="rounded-5" style="height: 110px; width: 110px;">
        </div>
        <div class="two-points p-2">
            <img src="images/game3.webp" alt="spil - placeholder" class="rounded-5" style="height: 110px; width: 110px;">
        </div>
    </div>

    <div class="mt-5 p-2 text-white shadow-lg gradient-h3 d-flex justify-content-between align-items-center opacity-25">
        <h3 class="m-0">Tier 2 spil:</h3>
        <div class="d-flex heart shadow p-0 m-0 justify-content-center align-items-center" style="width: 50px; height: 50px;">
            <div class="m-0" style="right: 10px;"><span class="text-center shadow">5</span></div>
        </div>
    </div>
    <div class="d-flex gap-1 flex-wrap m-2">
        <div class="five-points p-2 opacity-25">
            <img src="images/game4.webp" alt="spil - placeholder" class="rounded-5" style="height: 110px; width: 110px;">
        </div>
        <div class="five-points p-2 opacity-25">
            <img src="images/game5.webp" alt="spil - placeholder" class="rounded-5" style="height: 110px; width: 110px;">
        </div>
    </div>
    <div style="height: 300px;"></div>




    <!-- Modal / Pop-up -->
    <div id="rewardModal" class="modal">
        <div class="modal-content">
            <h2>+5 point!</h2>
            <button onclick="redeemPoints()">Indløs</button>
        </div>
    </div>



    <?php
    // Inkludér navigationsmenuen
    include("includes/botnav.php");
    ?>

</div>



<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="scripts/steps.js"></script>
</body>
</html>