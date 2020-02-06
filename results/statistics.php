<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../css/mainstyle.css"/>
        <link rel="stylesheet" type="text/css" href="../css/statistics.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Implementing PHP Source Code -->
        <?php
            /*API Key and whatnots*/
            $apikey = "5f505b3a6c8744b88f00f813b62f637b";
            $recipeID = "";
            if(isset($_GET['recipeID'])) {
                $recipeID = $_GET['recipeID'];
                $link = "https://api.spoonacular.com/recipes/$recipeID/information?apiKey=$apikey&includeNutrition=true";
                // $link = './recipeInfo.json'; // For testing
            }

            if (isset($link)) {
                $content = file_get_contents($link);
              
                if ($content === FALSE) {
                  $data = "No data";
                } else {
                  $dataObj = json_decode($content);
                  $data = $dataObj->extendedIngredients;

                  $title = $dataObj->title;
                  $title = str_replace(" ", "%20", $title);
                  $unsplashapi = "1d34130d5fd4d88bdd4a0042bb8fa083607e8f28c9d5307894655e9df571bc41";
                  $unsplashlink = "https://api.unsplash.com/search/photos?page=1&query=$title&client_id=$unsplashapi";
                  $unsplashcontent = json_decode(file_get_contents($unsplashlink));
                }
              } else {
                $data = "No data";
              }

            $bgimages = ["../images/image1.jpeg","../images/image2.jpeg","../images/image3.jpeg","../images/image4.jpeg"];
            if (isset($unsplashcontent->results)) {
                $bgimages = [$unsplashcontent->results[0]->urls->raw,
                        $unsplashcontent->results[1]->urls->raw,
                        $unsplashcontent->results[2]->urls->raw,
                        $unsplashcontent->results[3]->urls->raw];
            }
            

        ?>
        <section class="banner">
            <div class="slider">
                <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-caption">
                        <h1>STATISTICS</h1>
                        <h2>Here is your recipe!</h2>
                        <p>Feel free to save the PDF file to your Telegram handle!</p>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 h-100" style="object-fit:cover;" src="<?php echo "{$bgimages[0]}"; ?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" style="object-fit:cover;" src="<?php echo "{$bgimages[1]}"; ?>" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" style="object-fit:cover;" src="<?php echo "{$bgimages[2]}"; ?>" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" style="object-fit:cover;" src="<?php echo "{$bgimages[3]}"; ?>" alt="Fourth slide">
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
        <div id='showstats' class='absolute-wrapper fadeIn'>
            <div class='containerWidth boxed overflow1'>
                <?php
                    ob_start(); // Start of PDF Document Recording
                ?>
                <!-- Title -->
                <div class='row'>
                    <h1 class='aliq textcenter MethodAdjust'><?php echo "{$dataObj->title}" ?></h1>
                </div>
                <!-- Table  -->
                
                <div class='row'>
                    <div class='col-12'>
                        <table class="table table2 boboto ">
                            <tr class=''>
                                <th scope="col-3" class='textcenter'>CALORIES</th>
                                <th scope="col-3" class='textcenter'>CARBS</th>
                                <th scope="col-3" class='textcenter'>FAT</th>
                                <th scope="col-3" class='textcenter'>PROTEIN</th>
                            </tr>
                            <tr class='strong textcenter'>
                                <td><?php echo "{$dataObj->nutrition->nutrients[0]->amount}" ?></td>
                                <td><?php echo "{$dataObj->nutrition->nutrients[3]->amount}" ?></td>
                                <td><?php echo "{$dataObj->nutrition->nutrients[1]->amount}" ?></td>
                                <td><?php echo "{$dataObj->nutrition->nutrients[8]->amount}"?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <!-- Ingredients Table -->
                    <div class='col-12 textcenter ingredientAdjust'>
                    <br/>
                    <p class=''><strong>INGREDIENTS</strong></p>
                        <table class='table'>
                            <tr>
                                <?php
                                    $arr = [];
                                    foreach ($data as $item) {
                                        $name = ucfirst($item->name);
                                        $amount = decimalToFraction($item->amount);
                                        $unit = $item->unit;
                                        $arr[] = "$amount $unit $name";
                                    }
                                    $ingred = join(" , ", $arr);
                                    echo "<span class='aliq'>$ingred</span>";
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
            <!--</div>-->
                
                <!-- Methods Table -->
                <div class='col-12 MethodAdjust textcenter'>
                    <p class=''><strong>BACKGROUND/STEPS</strong></p>
                    <?php
                    $instructions = $dataObj->instructions;
                    if(empty($instructions)) {
                        echo "<p class='aliq'>Please search the owner's <a href='{$dataObj->spoonacularSourceUrl}'>website</a> for more information.</p>";
                    } else {
                        echo "<p class='aliq'>{$instructions}</p>";
                    }
                    ?>
                </div> 
                <?php
                    $value = ob_get_contents(); // End of PDF Document Recording
                ?>
                <!-- Row End -->
            
                <hr>
                <div class='teleform textcenter'>
                    <!-- Row End -->
                    <hr/>
                    <div class='formcenter telebot'>
                        <strong>To send your contents to your Telegram handle:</strong><br/>
                        <form method="Get">
                            <div class="inputBox">
                                <input class="form-control shortform" type="text" name="filename"/><span>.pdf</span>
                                <label>Name your file</label>
                            </div>
                            <div class="inputBox">
                                <input class="form-control" type="text" name="username"/>
                                <label>Telegram Username:</label>
                            </div>
                            <input type="hidden" name="recipeID" value="<?php echo $recipeID ?>">
                            <input type="submit" value="Send"/>
                            <input type="submit" name="pdfonly" value="Save">
                        </form>
                    </div>
                <!-- <div>
                    This div is for testing pdf saving
                    <form method="Get">
                        <strong>To test pdf file:</strong><br/>
                        Name your file: <input type="text" name="pdfonly"/>.pdf<br/>
                        <input type="hidden" name="recipeID" value="<?php echo $recipeID ?>">
                        <input type="submit"/>
                    </form>
                </div> -->
                </div>
            </div>
        </div>
        <script>
            window.onload = function() {
                var gotData = '<?php echo $data; ?>';
                if (gotData == "No data") {
                    document.getElementById("showstats").innerHTML = `<div id='noresult' class='mx-auto text-center'>
                                                                            <img src='../Images/invalid.gif'/>
                                                                            <h2>Invalid Recipe ID</h2>
                                                                        </div>`;
                }
            }

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
        </script>
</body>
</html>
<?php
// Save Locally
if (isset($_GET['pdfonly']) && isset($_GET['filename'])) {
    $filename = $_GET['filename'];
    
    // Set parameters
    $apiKey = "ee41dfa3-4cd9-4a28-93fa-fa3011f55df2";
    $result = file_get_contents("statistics.php"); // can aso be a url, starting with http..
    // $value = file_get_contents("http://localhost/wad2/project/malabaobao/statistics/statistics.php"); // can aso be a url, starting with http..

    $postdata = http_build_query(
        array(
        'apikey' => $apiKey,
        'value' => $value,
        'MarginBottom' => '30',
        'MarginTop' => '20',
        )
    );

    $opts = array('http' => array(
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata,
    ),
    );

    $context = stream_context_create($opts);

    // Convert the HTML string to a PDF using those parameters
    $result = file_get_contents('http://api.html2pdfrocket.com/pdf', false, $context);
    file_put_contents("{$filename}.pdf", $result);

    header( "Content-disposition: attachment; filename={$filename}.pdf" );
    header("Content-Type: application/octet-stream;");
    readfile("{$filename}.pdf");

} else if (isset($_GET['username']) && isset($_GET['filename'])) {
  $filename = $_GET['filename'];
  $filename = preg_replace('/\s+/', '-', $filename);
  $username = $_GET['username'];

  sendToBot($username, $filename, $value, $dataObj->spoonacularSourceUrl);
  echo "Sent to bot";
}


function sendToBot($user, $file, $value, $source) {
  toPdf($file, $value);

  $telegramBotPostData = http_build_query(
    array(
      "spoonacularSourceUrl" => $source,
    )
  );

  $telegramBotOptions = array('http' => array(
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $telegramBotPostData,
    ),
  );

  $telegramBotContext = stream_context_create($telegramBotOptions);

  $telegramBotUrl = "http://localhost:3000/sendpdf/{$file}.pdf/{$user}";
  file_get_contents($telegramBotUrl, false, $telegramBotContext);
}

function toPdf($file, $value) {
  // Set parameters
  $apiKey = "ee41dfa3-4cd9-4a28-93fa-fa3011f55df2";
  $result = file_get_contents("statistics.php"); // can aso be a url, starting with http..
  // $value = file_get_contents("http://localhost/wad2/project/malabaobao/statistics/statistics.php"); // can aso be a url, starting with http..

  $postdata = http_build_query(
    array(
      'apikey' => $apiKey,
      'value' => $value,
      'MarginBottom' => '30',
      'MarginTop' => '20',
    )
  );

  $opts = array('http' => array(
    'method' => 'POST',
    'header' => 'Content-type: application/x-www-form-urlencoded',
    'content' => $postdata,
  ),
  );

  $context = stream_context_create($opts);

  // Convert the HTML string to a PDF using those parameters
  $result = file_get_contents('http://api.html2pdfrocket.com/pdf', false, $context);

  // Save to root folder in website
  file_put_contents("pdf/{$file}.pdf", $result);
}

function decimalToFraction($decimal)
{
    if ($decimal < 0 || !is_numeric($decimal)) {
        // Negative digits need to be passed in as positive numbers
        // and prefixed as negative once the response is imploded.
        return false;
    }
    if ($decimal == 0) {
        return [0, 0];
    }

    if (floor($decimal) == $decimal){
        return $decimal;
    }
    $fractionstr = "";
    if (floor($decimal) > 0) {
        $fractionstr = floor($decimal) . " ";
        $decimal -= floor($decimal);
    }

    $tolerance = 1.e-4;

    $numerator = 1;
    $h2 = 0;
    $denominator = 0;
    $k2 = 1;
    $b = 1 / $decimal;
    do {
        $b = 1 / $b;
        $a = floor($b);
        $aux = $numerator;
        $numerator = $a * $numerator + $h2;
        $h2 = $aux;
        $aux = $denominator;
        $denominator = $a * $denominator + $k2;
        $k2 = $aux;
        $b = $b - $a;
    } while (abs($decimal - $numerator / $denominator) > $decimal * $tolerance);
    $fractionstr .= $numerator."/".$denominator;
    return $fractionstr;
}
?>