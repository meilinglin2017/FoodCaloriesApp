<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/mainstyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <h1>SEARCH</h1>
                        <h2>WHAT YOU WISH TO SEARCH FOR TODAY?</h2>
                        <p>Choose one of the categories that best suit your needs</p>
                    </div>

                    <div class="container container2">
                        <div class="card border-0" id="nutrition">
                            <div class="face face1">
                                <div class="content">
                                    <img src="images/nutrition2.jpeg">
                                    <h4>Nutrition</h4>
                                </div>
                            </div>
                            <div class="face face2">
                                <div class="content">
                                    <p>Concerned about macros? Key in the nutritional requirements and let us automatically generate the food that fulfills your need!</p>
                                    <a href="./search/nutritionForm.php" onclick="showhide('nutrition');">Search by Nutrition</a>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0" id="ingredients">
                            <div class="face face1">
                                <div class="content">
                                    <img src="images/ingredients2.jpeg">
                                    <h4>Ingredients</h4>
                                </div>
                            </div>
                            <div class="face face2">
                                <div class="content">
                                    <p>Have leftover food but don't know how to handle them? No problem! Simply key in the ingredients that you have and let us do the magic.</p>
                                    <a href="./search/ingredientForm.php" onclick="showhide('ingredients');">Search by Ingredients</a>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0" id="recipe">
                            <div class="face face1">
                                <div class="content">
                                    <img src="images/recipe2.jpeg">
                                    <h4>Recipe</h4>
                                </div>
                            </div>
                            <div class="face face2">
                                <div class="content">
                                    <p>Craving for something in particular? Tell us what you want and we will tell you how to make it, only healthier!</p>
                                    <a href="./search/RecipeNameForm.php" onclick="showhide('recipe');">Search by Recipe</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 h-100" src="images/image1.jpeg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="images/image2.jpeg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="images/image3.jpeg" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="images/image4.jpeg" alt="Fourth slide">
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
                    <li><a href="main.php"><img src="images/logo.png"></a></li>
                    <li><a href="search.php">Search</a></li>
                </ul>
            </div>
        </section>
        <script>
        function showhide(id){
            if (document.getElementById) {
                var divid = document.getElementById(id);
                var divs = document.getElementsByClassName("card border-0");
                for(var i=0; i<divs.length; i+=1) {
                    divs[i].style.display = "none";
                }
                divid.style.display = "block";
            } 
            return false;
        }

        function showAll() {
            if (document.getElementById) {
                var divs = document.getElementsByClassName("card border-0");
                for(var i=0; i<divs.length; i+=1) {
                    divs[i].style.display = "flex";
                }
            }
        }

        </script>
</body>
</html>