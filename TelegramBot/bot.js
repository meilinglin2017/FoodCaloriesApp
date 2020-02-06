const Telegraf = require('telegraf')
const fs = require('fs')
const express = require('express')
const bodyParser = require("body-parser");

//set up express
const app = express()
const port = 3000
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

//set up bot instance
const token = "805260826:AAFXSfnve3eLuA8YLe4rZfGKF1L6J4zWB-o"
const bot = new Telegraf(token);

//register user's id in json file after chatting with bot for the first time
bot.use((ctx, next) => {
  let username = ctx.from.username
  let id = ctx.from.id
  let data = JSON.parse(fs.readFileSync('./data.json', 'utf8'));
  if (!data[username]) {
    data[username] = id;
    fs.writeFileSync('./data.json', JSON.stringify(data));
  }
  console.log(`${ctx.from.username} talked to the bot`);
  next();
})

//handler for send pdf request
app.post('/sendpdf/:docname/:username', (req, res) => {

  let reqData = req.body;

  try {
    let username = req.params.username
    let docname = req.params.docname
    res.send(`File sent to ${username}`)
    let data = JSON.parse(fs.readFileSync('./data.json', 'utf8'));
    if (!data[username]) {
      throw "Cannot find username";
    }

    //sends pdf in root/pdf folder
    bot.telegram.sendDocument(data[username], {
      source: fs.createReadStream(`../results/pdf/${docname}`),
      filename: docname
    }, {
      caption: "Thank you for using Nutrition Noobs!\nHere is your recipe to enjoy.",
      reply_markup: {
        inline_keyboard: [
          [
            { text: "Go to source URL", url: reqData.spoonacularSourceUrl }
          ]
        ]
      }
    });
    res.send();
  } catch (e) {
    console.log(e);
    res.send(400);
  }
});

app.listen(port, () => console.log(`Bot listening on port ${port}!`))

bot.launch()