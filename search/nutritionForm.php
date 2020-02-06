<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../css/mainstyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="jQRangeSlider.0/css/iThing.css" type="text/css" />

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
        <script src="jQRangeSlider.0/lib/jquery.mousewheel.min.js"></script>
        <script src="jQRangeSlider.0/jQRangeSlider-min.js"></script>

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
                        <h1>NUTRITION</h1>
                        <h2>GIVING YOU WHAT YOU NEED</h2>
                        <p>Nutrition is the most important aspect of health. Food is an important part of a balanced diet.</p>
                    </div>

                    <div class="nutrition">
                        <h2>Enter your requirements</h2>
                        <form action="searchApi/SearchByNutrition.php" method="post">

                            <div id="caloriesInput">
                                <input type="hidden" name="minCalories" value=10>
                                <input type="hidden" name="maxCalories" value=500>
                            </div>
                            <div class="range" id="caloriesRange">
                                <script>
                                //
                                $("#caloriesRange").rangeSlider();
                                $("#caloriesRange").rangeSlider("bounds", 0, 1000);
                                $("#caloriesRange").rangeSlider("values", 10,500);
                                $("#caloriesRange").bind("userValuesChanged", function(e, data){
                                    console.log("User Changed Values. min: " + data.values.min + " max: " + data.values.max);
                                    document.getElementById("caloriesInput").innerHTML = `
                                        <input type="hidden" name="minCalories" value="${data.values.min}">
                                        <input type="hidden" name="maxCalories" value="${data.values.max}">
                                    `;
                                });

                                //
                                </script>
                            </div>
                            <label>Calories (Kcal)</label>
                            
                            <div id="carbsInput">
                                <input type="hidden" name="minCarbs" value=225>
                                <input type="hidden" name="maxCarbs" value=325>
                            </div>
                            <div class="range" id="carboRange">
                                <script>
                                //
                                $("#carboRange").rangeSlider();
                                $("#carboRange").rangeSlider("bounds", 0, 500);
                                $("#carboRange").rangeSlider("values", 225,325);
                                $("#carboRange").bind("userValuesChanged", function(e, data){
                                    console.log("User Changed Values. min: " + data.values.min + " max: " + data.values.max);
                                    document.getElementById("carbsInput").innerHTML = `
                                        <input type="hidden" name="minCarbs" value="${data.values.min}">
                                        <input type="hidden" name="maxCarbs" value="${data.values.max}">
                                    `;
                                });
                                //
                                </script>
                            </div>
                            <label>Carbohydrates (g)</label>
                            
                            <div id="proteinInput">
                                <input type="hidden" name="minProtein" value=10>
                                <input type="hidden" name="maxProtein" value=56>
                            </div>
                            <div class="range" id="proteinRange">
                                <script>
                                //
                                $("#proteinRange").rangeSlider();
                                $("#proteinRange").rangeSlider("bounds", 0, 100);
                                $("#proteinRange").rangeSlider("values", 10,56);
                                $("#proteinRange").bind("userValuesChanged", function(e, data){
                                    console.log("User Changed Values. min: " + data.values.min + " max: " + data.values.max);
                                    document.getElementById("proteinInput").innerHTML = `
                                        <input type="hidden" name="minProtein" value="${data.values.min}">
                                        <input type="hidden" name="maxProtein" value="${data.values.max}">
                                    `;
                                });                                
                                //
                                </script>
                            </div>
                            <label>Protein (g)</label>
                            
                            <div id="fatInput">
                                <input type="hidden" name="minFat" value=44>
                                <input type="hidden" name="maxFat" value=77>
                            </div>
                            <div class="range" id="fatsRange">
                                <script>
                                //
                                $("#fatsRange").rangeSlider();
                                $("#fatsRange").rangeSlider("bounds", 0, 100);
                                $("#fatsRange").rangeSlider("values", 44,77);
                                $("#fatsRange").bind("userValuesChanged", function(e, data){
                                    console.log("User Changed Values. min: " + data.values.min + " max: " + data.values.max);
                                    document.getElementById("fatInput").innerHTML = `
                                        <input type="hidden" name="minFat" value="${data.values.min}">
                                        <input type="hidden" name="maxFat" value="${data.values.max}">
                                    `;
                                });
                                //
                                </script>
                            </div>
                            <label>Fat (g)</label>
                            <button type="submit" class="submitbutton">
                                <input type="submit" name="" value="Recipes!">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            
                        </form>
                    </div>
                    

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 h-100" src="../images/image5.jpeg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="../images/image6.jpeg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="../images/image7.jpeg" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="../images/image8.jpeg" alt="Fourth slide">
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
    </body>
</html>