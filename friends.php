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

<div class="container d-flex flex-column justify-content-center gap-3">


        <div class="rounded-3 gradient-activity p-2" onclick="setChallenge('mindre')">
            <img src="images/lessactive.webp" alt="gående mand - mindre aktiv" class="img-fluid">
        </div>
        <div class="rounded-3 gradient-activity p-2" onclick="setChallenge('aktiv')">
            <img src="images/active.webp" alt="løbende mand - aktiv" class="img-fluid">
        </div>
        <div class="rounded-3 gradient-activity p-2" onclick="setChallenge('meget')">
            <img src="images/veryactive.webp" alt="sprintende mand - meget aktiv" class="img-fluid">
        </div>
        <div class="rounded-3 gradient-activity p-2" onclick="setChallenge('mindre')">
            <img src="images/lessactive.webp" alt="gående mand - mindre aktiv" class="img-fluid">
        </div>
        <div class="rounded-3 gradient-activity p-2" onclick="setChallenge('aktiv')">
            <img src="images/active.webp" alt="løbende mand - aktiv" class="img-fluid">
        </div>
        <div class="rounded-3 gradient-activity p-2" onclick="setChallenge('meget')">
            <img src="images/veryactive.webp" alt="sprintende mand - meget aktiv" class="img-fluid">
        </div>
        <div class="rounded-3 gradient-activity p-2" onclick="setChallenge('mindre')">
            <img src="images/lessactive.webp" alt="gående mand - mindre aktiv" class="img-fluid">
        </div>
        <div class="rounded-3 gradient-activity p-2" onclick="setChallenge('aktiv')">
            <img src="images/active.webp" alt="løbende mand - aktiv" class="img-fluid">
        </div>
        <div class="rounded-3 gradient-activity p-2" onclick="setChallenge('meget')">
            <img src="images/veryactive.webp" alt="sprintende mand - meget aktiv" class="img-fluid">
        </div>
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



    <?php
    // Inkludér navigationsmenuen
    include("includes/botnav.php");
    ?>





<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="scripts/steps.js"></script>
</body>
</html>
