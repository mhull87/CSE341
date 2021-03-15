function getAllTopics(callback) {
  //get all the topics from the db
  var results = {
    topics: [
      {id:1, name:"faith"},
      {id:2, name:"hope"},
      {id:3, name:"charity"}
    ]
  }
  callback(results);
}

function getTopicById(id, callback) {
  //get the topic from the db that matched that id
  var results = {id:id, name:"hope"};
  callback(results);
}

function insertNewTopic(name, callback) {
  //create the new topic in the db with the new name
  var results = {success:true};
  callback(results);
}

module.exports = {
  getAllTopics: getAllTopics,
  getTopicById: getTopicById,
  insertNewTopic: insertNewTopic
}