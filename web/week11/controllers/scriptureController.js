const scriptureModel = require("../models/scriptureModel.js");

function search(req, res) {
  //TODO:: check if book id or if topic id, and call the appropirate function

  var book = req.query.book;

  scriptureModel.searchByBook(book, function (error, results) {
    res.json(results);
  });

 // scriptureModel.searchByTopic(topicId, function(error, results) {
 //   res.json(results);
 // });
}

function getScriptureList(req, res) {
  scriptureModel.getAllScriptures(function(error, results) {
    res.json(results);
  });
}

function getScripture(req, res) {
  var id = 1;
  scriptureModel.getScriptureById(id, function(error, results) {
    res.json(reuslts);
  });
}

function insertNewScripture(req, res) {
  var book = "John";
  var chapter = 3;
  var verse = 16;
  var content = "For God so loved...";
  scriptureModel.insertNewScripture(book, chapter, verse, content, function(error, results) {
    res.json(results);
  });
}

function assignTopicToScripture(req, res) {
  var topidId = 1;
  var scriputreId = 1;
  scriptureModel.assignTopicToScripture(topicId, scriptureId, function(error, results) {
    res.json(results);
  });
}

module.exports = {
  search: search,
  getScriptureList: getScriptureList,
  getScripture: getScripture,
  insertNewScripture: insertNewScripture,
  assignTopicToScripture: assignTopicToScripture
};