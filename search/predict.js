// Applies apiKey
const app = new Clarifai.App({
  apiKey: '6e71d8ec52df43c2925ca1d3e551e140'
});

// Implements the Javascript model of Clarifai
src = "https://sdk.clarifai.com/js/clarifai-latest.js";

// Number of ingredient to display
var numIngre = 5;

// predicts the ingredients used to create the food using Clarifai's food model
function doPredict(value) {
  app.models.predict("bd367be194cf45149e75f01d59f77ba7", value).then(
    function (response) {
      var demoP = document.getElementById("d");
      var html = "";
      if (response.rawData.outputs[0].data.hasOwnProperty("concepts")) {
        var tag = response.rawData.outputs[0].data.concepts[0].name;

        for (var i = 0; i < numIngre; i++) {
          var name = response.rawData.outputs[0].data.concepts[i].name;
          document.forms["frompicform"][i].value = name;
          // console.log(name);
          // console.log(document.forms["frompicform"][i]);
        }
      }

    },
    function (err) {
      console.log(err);
    }
  );
}
