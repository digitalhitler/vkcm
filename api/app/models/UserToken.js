'use strict';

// @todo: add header

var mongoose    = require('mongoose');

var UserToken = new Schema({
  userId: {
    type: String,
    required: true
  },
  clientId: {
    type: String,
    required: true
  },
  token: {
    type: String,
    unique: true,
    required: true
  },
  created: {
    type: Date,
    default: Date.now
  }
});

var UserTokenModel = mongoose.model('UserToken', UserToken);

module.exports = UserTokenModel;