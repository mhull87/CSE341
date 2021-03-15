const express = require("express");
const path = require("path");
const topicController = require("./controllers/topicController.js");
const scriptrueController = require("./controllers/scriptureController.js");
const PORT = process.env.PORT || 5000;

var app = express();


app.use(express.static(path.join(__dirname, "public")));
app.use(express.json()); // support json encoded bodies
app.use(express.urlencoded({extended: true})); //support url encoded bodies


app.get("/topics", topicController.getTopicList);

app.get("/topic", topicController.getTopic);

app.post("/topic", topicController.postTopic);

app.get("/search", scriptrueController.search);
app.get("/scriputres", scriptrueController.getScriptureList);
app.get("/scripture", scriptrueController.getScripture);
app.post("/scripture", scriptrueController.insertNewScripture);
app.post("/assignTopicToScripture", scriptrueController.assignTopicToScripture);

app.listen(PORT, function () {
  console.log("Server listening on port " + PORT);
});