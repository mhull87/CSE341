function searchByBook(book, callback) {
  console.log("Searching the db for book: " + book);

  var results = {list:[{id:1, book:book, chapter:1, verse:3, content:"test"}, {id:1, book:book, chapter:1, verse:3, content:"test"}, 
  {id:1, book:book, chapter:1, verse:3, content:"test"}, 
  {id:1, book:"John", chapter:1, verse:3, content:"test"}]};

  callback(null, results);
}

function searchByTopic(topicId, callback) {
  var results = {list:[{id:1, book:"John", chapter:1, verse:3, content:"test"},{id:1, book:"John", chapter:1, verse:3, content:"test"},{id:1, book:"John", chapter:1, verse:3, content:"test"},{id:1, book:"John", chapter:1, verse:3, content:"test"}]}

  callback(null, results);
}

function getAllScriptures(callback) {
  var results = {list:[{id:1, book:"John", chapter:1, verse:3, content:"test"},{id:1, book:"John", chapter:1, verse:3, content:"test"},{id:1, book:"John", chapter:1, verse:3, content:"test"},{id:1, book:"John", chapter:1, verse:3, content:"test"}]}

  callback(null, results);
}

function getScriptureById(id, callback) {
    var results = {id:1, book:"John", chapter:1, verse:3, content:"test"};

  callback(null, results);
}

function insertNewScripture(book, chapter, verse, content, callback) {
  var results = {success:true, 
    scripture:{id:1, book:book, chapter:chapter, verse:verse, content:content}};

    callback(null, results);
}

function assignTopicToScripture(topicId, scriptureId, callback) {
  var results = {success:true};

  callback(null, results);
}

module.exports = {
  searchByTopic: searchByTopic,
  searchByBook: searchByBook,
  getAllScriptures: getAllScriptures,
  getScriptureById: getScriptureById,
  insertNewScripture: insertNewScripture,
  assignTopicToScripture: assignTopicToScripture
}