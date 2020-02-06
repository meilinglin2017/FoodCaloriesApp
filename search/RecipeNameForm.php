<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../css/mainstyle.css">
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
                        <h1>RECIPES</h1>
                        <h2>GIVING YOU WHAT YOU WANT</h2>
                        <p>Everybody have their own cravings, only we provide you the better</p>
                    </div>
                    <div class="recipe">
                        <h2>Enter your cravings today!</h2>
                        <form action="searchApi/SearchByName.php" method="get">
                            <div class="inputBox">
                                <input class="form-control" type="text" name="recipeName" required="">
                                <label style="color:white;">Recipe Name</label>
                            </div>
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
                            <img class="d-block w-100 h-100" src="../images/image11.jpeg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="../images/image12.jpeg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="../images/image13.jpeg" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="../images/image14.jpeg" alt="Fourth slide">
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