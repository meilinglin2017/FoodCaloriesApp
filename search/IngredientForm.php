
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- For CSS -->
        <link rel="stylesheet" href="../css/mainstyle.css">
        
        <!-- For Clarifai -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="https://sdk.clarifai.com/js/clarifai-latest.js"></script>
        <script type="text/javascript" src="predict.js"></script>

        <!-- Latest compiled and minified CSS -->
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
                        <h1>INGREDIENTS</h1>
                        <h2>What is in your fridge today?</h2>
                        <p>Have some leftovers but don't know what to do with it? Leave it to us to settle it!</p>
                    </div>
                    <div class="container container2" style="right:28%;">
                        <div id="searchoption" class="ingredient" style="background:none;box-shadow:none; border:none;">
                            <div class="conatiner">
                                <div class="wrap">
                                    <div class="box one" onclick="switchDiv('#searchoption', '#enterown');" style="background:url('../images/ingredients.jpeg');background-size:cover;">
                                        <h1>Ingredients</h1>
                                        <div class="poster p1">
                                        </div>
                                    </div>
                                    <div class="box one" onclick="switchDiv('#searchoption', '#takephoto');" style="background:url('../images/camera.jpeg');background-size:cover;">
                                        <h1>Webcam</h1>
                                        <div class="poster p1">
                                        </div>
                                    </div>
                                    <div class="box one" onclick="switchDiv('#searchoption', '#uploadphoto');" style="background:url('../images/upload.jpeg');background-size:cover;">
                                        <h1>Upload</h1>
                                        <div class="poster p1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="enterown" class="ingredient">
                            <h2>What is in your fridge today?</h2>
                            <a href="#" onclick="switchDiv('#enterown', '#searchoption')">Back</a>
                            <form action="searchApi/SearchByIngredient.php" method='get'>
                                <div class="ingredientbox">
                                    <div class="inputBox">
                                        <input type="text" name="ingre[]">
                                        <label style="color:white;">Ingredient Uno</label>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="ingre[]">
                                        <label style="color:white;">Ingredient Dos</label>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="ingre[]">
                                        <label style="color:white;">Ingredient Tres</label>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="ingre[]">
                                        <label style="color:white;">Ingredient Cuatro</label>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="ingre[]">
                                        <label style="color:white;">Ingredient Cinco</label>
                                    </div>                                
                                    <button type="submit" class="submitbutton" style="padding:10px;">
                                        <input type="submit" name="" value="Recipes!">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>

                            </form>
                        </div>

                        <!-- WebCam Option -->
                        <div id="takephoto" class="ingredient">
                            <h2>Take a Photo</h2>
                            <a href="#" onclick="switchDiv('#takephoto', '#searchoption')">Back</a>
                            <div id="webcam"></div>
                            <div>
                                <button onClick="take_snapshot()">Take Snapshot</button>
                                <button onClick="save_snapshot()">Save Snapshot</button>
                            </div>
                            <div>
                                <button id="getIngre" onclick="fromWebcam(this.value, '#takephoto'); return false;">
                                    Get My Ingredients!
                                </button>
                            </div>
                            <div id="results"></div>
                        </div>

                        <!-- Upload Photo -->
                        <div id="uploadphoto" class="ingredient">
                            <h2>Upload a Photo</h2>
                            <a href="#" onclick="switchDiv('#uploadphoto', '#searchoption')">Back</a>
                            <form action="#" name='upload_file'>
                                <input type="file" placeholder="Filename" size="100" name="myFile" id="myFile" />
                                <div id="uppreview"></div>
                                <div>
                                    <button onclick="upPreview(); return false;">
                                        Preview
                                    </button>
                                    <button id="getIngre" onclick="fromUpload($('.filename').val(), '#uploadphoto'); return false;">
                                        Get Ingredients!
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Retrieve ingredient -->
                        <div id="frompic" class="ingredient">
                            <h2>Ingredients</h2>
                            <a id="frompicback" href="#" onclick="switchDiv('#frompic', 'back')">Back</a>
                            <form action="searchApi/SearchByIngredient.php" name="frompicform">
                            <div class="ingredientbox">
                                    <div class="inputBox">
                                        <input type="text" name="ingre[]">
                                        <label style="color:white;">Ingredient Uno</label>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="ingre[]">
                                        <label style="color:white;">Ingredient Dos</label>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="ingre[]">
                                        <label style="color:white;">Ingredient Tres</label>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="ingre[]">
                                        <label style="color:white;">Ingredient Cuatro</label>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="ingre[]">
                                        <label style="color:white;">Ingredient Cinco</label>
                                    </div>
                                    <button type="submit" class="submitbutton" style="padding:10px;">
                                        <input type="submit" name="" value="Recipes!">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 h-100" src="../images/image8.jpeg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="../images/image9.jpeg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="../images/image10.jpeg" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="../images/image11.jpeg" alt="Fourth slide">
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

        <script type="text/javascript" src="webcam/webcamjs/webcam.min.js"></script>

        <script language="JavaScript">
            function take_snapshot() {
            // play sound effect
            Webcam.set({
                width: 320,
                height: 240,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            Webcam.attach('#webcam');

            }

            function save_snapshot() {
            // take snapshot and get image data
            Webcam.snap(function (data_uri) {
                // display results in page
                Webcam.reset();
                document.getElementById('webcam').innerHTML =
                '<img id="imageprev" src="' + data_uri + '"/>';
            });

            // Get base64 value from <img id='imageprev'> source
            var base64image = document.getElementById("imageprev").src;
            document.getElementById('getIngre').value = base64image;

            Webcam.upload(base64image, 'upload.php', function (code, text) {
                console.log('Save successfully');
                console.log(text);
                console.log(document.getElementById("getIngre").value)
            });

            }

            function upPreview() {
                var preview = $("#uppreview");
                var file = document.querySelector("input[type=file]").files[0];
                var reader = new FileReader();

                // loads a local file image
                reader.addEventListener("load", function () {
                    document.getElementById('uppreview').innerHTML =
                    '<img id="imageprev" src="' + reader.result + '"/>';
                }, false);

                if (file) {
                    reader.readAsDataURL(file);

                } else {
                    alert("No file was selected, please try uploading a jpeg file of your food again.");
                }
            }

            window.onload = function() {
                $("#enterown").hide();
                $("#takephoto").hide();
                $("#uploadphoto").hide();
                $("#frompic").hide();
            }

            var prevoption;
            function switchDiv(fromdiv, todiv) {
                if (todiv == "back") {
                    todiv = prevoption;
                }
                optiondiv = $(fromdiv);
                targetdiv = $(todiv);
    
                optiondiv.fadeOut();
                targetdiv.fadeIn();
            }

            function fromWebcam(value, fromdiv) {
                optiondiv = $(fromdiv);
                targetdiv = $("#frompic");
    
                optiondiv.fadeOut()
                targetdiv.fadeIn();
                prevoption = fromdiv;

                var preview = $("#photoPreview");
                preview.attr('src', value);
                doPredict({ base64: value.split("base64,")[1] });
            }

            function fromUpload(value, fromdiv) {
                var preview = $("#photoPreview");
                var file = document.querySelector("input[type=file]").files[0];
                var reader = new FileReader();

                optiondiv = $(fromdiv);
                targetdiv = $("#frompic");
                
                optiondiv.fadeOut()
                targetdiv.fadeIn();
                prevoption = fromdiv;

                // loads a local file image
                reader.addEventListener("load", function () {
                    preview.attr('src', reader.result);
                    doPredict({ base64: reader.result.split("base64,")[1] });
                }, false);

                if (file) {
                    reader.readAsDataURL(file);

                } else {
                    alert("No file was selected, please try uploading a jpeg file of your food again.");
                }
            }
        </script>
    </body>
</html>