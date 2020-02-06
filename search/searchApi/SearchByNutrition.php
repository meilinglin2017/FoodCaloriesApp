<?php

// Api keys
// $apiKey = "2cab7ec74eb3476b9c0cc682f2758bbb";
$apiKey = "c2475e578ded4175a0209b79ada25f56";

// Sample Api Link
// https://api.spoonacular.com/recipes/findByNutrients?apiKey=2cab7ec74eb3476b9c0cc682f2758bbb&minCarbs=10&maxCarbs=50&number=1

// All Nutrients
$nutrientJson = json_decode(file_get_contents("allNutrients.json"));
$nutrientList = extractNutrientsList($nutrientJson);

// Get By Nutrient and Find Recipe ID
$limit = 6; // Max number of result to display
$nutrientUrl = "https://api.spoonacular.com/recipes/findByNutrients?apiKey=$apiKey&number=$limit";
foreach ($nutrientList as $nutri) {
    if (isset($_POST[$nutri])) {
        $qty = $_POST[$nutri];
        $nutrientUrl .= "&$nutri=$qty";
    }
}

$content = json_decode(file_get_contents($nutrientUrl));
// $content = json_decode(file_get_contents("nutritionResult.json")); // For Testing
$resultId = [];
foreach ($content as $recipe) {
    $resultId[] = $recipe->id;
}

$url = "../../results/recipeList.php"; // Joon change this url
// $url = "testResult.php"; // For Testing
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

<?php
// Functions
function extractNutrientsList($infoList) {
    $result = [];
    foreach ($infoList as $info) {
        $name = str_replace(" ", "", $info->title);
        $result[] = "min$name";
        $result[] = "max$name";
    }
    return $result;
}

?>