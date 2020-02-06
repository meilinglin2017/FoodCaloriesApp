<?php

// Api keys
// $apiKey = "2cab7ec74eb3476b9c0cc682f2758bbb";
// $apiKey="7567da9ece9c472aaaf8aa954f57858b";
$apiKey = "c2475e578ded4175a0209b79ada25f56";

// Sample Api Link
// https://api.spoonacular.com/recipes/716429/information?apiKey=2cab7ec74eb3476b9c0cc682f2758bbb&includeNutrition=true

$id = [];
if (isset($_POST["id"])) {
    $id = $_POST["id"];
}

$results = [];

foreach ($id as $idNum) {
    $apiUrl = "https://api.spoonacular.com/recipes/$idNum/information?apiKey=$apiKey&includeNutrition=true";
    
    $result = json_decode(file_get_contents($apiUrl));
    // $result = json_decode(file_get_contents("recipeInfo.json")); // For Testing
    $results[] = $result;
}

$baseUrl = "statistics.php?recipeID=";

?>
<html>
    <head>
        <link rel="stylesheet" href="../css/mainstyle.css">
        <link rel="stylesheet" href="../css/displayRecipe.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <section class="banner">
            <div class="slider">
                <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-caption">
                        <h1>RESULTS</h1>
                        <h2>WHAT ARE YOU CRAVING TODAY?</h2>
                        <p>Choose one of the recipes that satisfy your craving</p>
                    </div>
                    <div class="figureContainer">
                        <!-- Top Row of Cards -->
                        <div class="figureContainertop">
                            <?php
                            $endIndex = min(count($results), 3);
                            for ($i = 0; $i < $endIndex; $i++) {
                                $info = $results[$i];
                                $title = $info->title;
                                $prepareTime = $info->readyInMinutes;
                                $servings = $info->servings;
                                $image = $info->image;
                                $nutrients = $info->nutrition->nutrients;
                                $nutritionalInfo = "";
                                foreach ($nutrients as $nutrient) {
                                    if (in_array($nutrient->title, ["Calories", "Carbohydrates", "Fat", "Protein"])) {
                                        $nutritionalInfo .= "<br>" . $nutrient->title . ": " . $nutrient->amount . $nutrient->unit;
                                    }
                                }
                                
                                $fullUrl = $baseUrl . $info->id;
                                echo " <a href='$fullUrl'>

                                        <figure style='background:linear-gradient( rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4) ),url($image); background-size:cover;margin-right:30px;' >
                                        <div class='date'>
                                            <span class='card-date-day'>$prepareTime</span>
                                            <span class='card-date-month'>mins</span>
                                        </div>
                                        <figcaption>
                                            <h4> <span>$title</span></h4>
                                            <p>$nutritionalInfo</p>
                                        </figcaption>
                                        </figure>
                                    </a>
                                ";
                            }    
                            ?>
                        </div>
                        <!-- Bottom Row of Cards -->
                        <!-- <div class="botarea d-flex justify-content-between mx-auto"> -->
                        <div class="figureContainerbottom">
                            <?php
                            for ($i = 3; $i < count($results); $i++) {
                                $info = $results[$i];
                                $title = $info->title;
                                $prepareTime = $info->readyInMinutes;
                                $servings = $info->servings;
                                $image = $info->image;
                                $nutrients = $info->nutrition->nutrients;
                                $nutritionalInfo = "";
                                foreach ($nutrients as $nutrient) {
                                    if (in_array($nutrient->title, ["Calories", "Carbohydrates", "Fat", "Protein"])) {
                                        $nutritionalInfo .= "<br>" . $nutrient->title . ": " . $nutrient->amount . $nutrient->unit;
                                    }
                                }
                                $fullUrl = $baseUrl . $info->id;
                                echo " <a href='$fullUrl'>
                                <figure style='background:linear-gradient( rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4) ),url($image); background-size:cover;margin-right:30px;'>
                                <div class='date'>
                                    <span class='card-date-day'>$prepareTime</span>
                                    <span class='card-date-month'>mins</span>
                                </div>
                                <figcaption>
                                    <h4> <span>$title</span></h4>
                                    <p>$nutritionalInfo</p>
                                </figcaption>
                                </figure></a>
                                ";
                            }

                            ?>
                        </div>
                        <?php
                        
                        if (empty($results)) {
                            echo "
                                <div id='noresult' class='text-center'>
                                    <img src='../images/nofoodcat.gif'/>
                                    <h2>Sorry, no results found!</h2>
                                </div>
                            ";
                        }
                        
                        ?>
                    </div>

                    <!-- Background -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 h-100" src="../images/image1.jpeg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="../images/image2.jpeg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="../images/image3.jpeg" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="../images/image4.jpeg" alt="Fourth slide">
                        </div>
                    </div>
                    <ol class="carousel-indicators">
                        <li data-target="#slider" data-slide-to="0" class="active"></li>
                        <li data-target="#slider" data-slide-to="1"></li>
                        <li data-target="#slider" data-slide-to="2"></li>
                        <li data-target="#slider" data-slide-to="3"></li>
                    </ol>
                </div>
            </div>
            <div class="side-menu">
            </div>
            <div class="top-bar">
                <ul>
                    <li><a href="../main.php"><img src="../images/logo.png"/></a></li>
                    <li><a href="../search.php">Search</a></li>
                </ul>
            </div>
        </section>
        <script>

            var hiddenFlags = {};
            
            function open_close(id){
                var open = hiddenFlags[id];
                refreshAll();
                if(!open){
                    document.getElementById(id).classList.add('bigcard_open');
                    hiddenFlags[id] = true;
                } else {
                    document.getElementById(id).classList.remove('bigcard_open');
                    hiddenFlags[id] = false;
                }
            }
            
            // Close all Cards
            function refreshAll() {
                topcards = document.getElementsByClassName('toparea')[0].children;
                for (i = 0; i < topcards.length; i++) {
                    topcards[i].classList.remove('bigcard_open');
                    hiddenFlags["bigcard_" + i] = false;
                }
                botcards = document.getElementsByClassName('botarea')[0].children;
                for (i = 0; i < botcards.length; i++) {
                    botcards[i].classList.remove('bigcard_open');
                    hiddenFlags["bigcard_bot_" + i] = false;
                }
            }

        </script>
    </body>
</html>
