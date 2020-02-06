<?php

// Api keys
// $apiKey = "2cab7ec74eb3476b9c0cc682f2758bbb";
// $apiKey = "7567da9ece9c472aaaf8aa954f57858b";
$apiKey = "c2475e578ded4175a0209b79ada25f56";

// Sample Api Link
// https://api.spoonacular.com/recipes/findByIngredients?apiKey=2cab7ec74eb3476b9c0cc682f2758bbb&ingredients=arugula,egg,salad,tomato,avocado&number=2

$limit = 6;
if (isset($_GET["ingre"])) {
    $ingreList = $_GET["ingre"];
    $ingreInput = implode(",", $ingreList);
}

$nameUrl = "https://api.spoonacular.com/recipes/findByIngredients?apiKey=$apiKey&ingredients=$ingreInput&number=$limit";

$content = json_decode(file_get_contents($nameUrl));
// $content = json_decode(file_get_contents("ingredientResult.json")); // For Testing

$results = $content;
$resultId = [];

foreach($results as $recipe) {
    $resultId[] = $recipe->id;
}

$url = "../../results/recipeList.php"; 
?>
<link rel="stylesheet" href="../../css/loadingPage.css">
<h2 class="animate">Retrieving your recipe...</h2>
<form id="sendResult" action="<?php echo $url ?>" method=post>
    <?php
        foreach($resultId as $id) {
            echo "<input type='hidden' name='id[]' value=$id>";
        }
    ?>
</form>

<script>
    function submitForm() {
        document.getElementById('sendResult').submit();
    }
    window.onload = submitForm();
</script>