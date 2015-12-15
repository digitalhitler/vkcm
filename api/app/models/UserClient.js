'use strict';

// @todo: add header

var mongoose    = require('mongoose');

var UserClient = new Schema({
  name: {
    type: String,
    unique: true,
    required: true
  },
  clientId: {
    type: String,
    unique: true,
    required: true
  },
  clientSecret: {
    type: String,
    required: true
  }
});

var UserClientModel = mongoose.model('UserClient', UserClient);

module.exports = UserClientModel;
