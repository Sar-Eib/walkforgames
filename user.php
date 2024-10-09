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

<div class="container d-flex flex-column justify-content-center">

    <div class="row justify-content-center">
        <div class="col-8 p-2 mt-4 rounded-2 gradientblue inner-shadow">
            <div><img src="images/usericon.webp" alt="" style="width: 180px; height: auto;"></div>
            <h3 class="text-white">Bruger: walkerbait</h3>
            <h3 class="text-white">Highscore: 35155</h3>
        </div>
    </div>


    <div class="mt-3 p-2">
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


    <div class="points-display mt-3 text-start">Seneste uge:</div>




    <!-- indsæt database over de foregående dages skridt -->

    <div class="bg-white p-1 rounded-3"><table class="table bg-white rounded-3">
            <thead>
            <tr>
                <th scope="col" class="p-0 m-1">
                    <!-- Formular til at uploade skridt -->
                    <form method="post" class="p-0 m-1" action="">
                        <input type="hidden" name="" value=""> <!-- Erstat med den aktuelle bruger-ID -->
                        <input type="hidden" name="" id="steps" value=""> <!-- Hidden input for skridtene -->

                        <button class="btn gradient-activity text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                            </svg>
                        </button>
                    </form>
                </th>
                <th scope="col">Dag</th>
                <th scope="col">Skridt</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <th scope="row">1</th>
                <td>Onsdag</td>
                <td>3455</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Torsdag</td>
                <td>12333</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Fredag</td>
                <td>23444</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Lørdag</td>
                <td>23444</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Søndag</td>
                <td>23444</td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>Mandag</td>
                <td>23675</td>
            </tr>

            </tbody>
        </table></div>


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
