'use strict';

// @todo: add header

var mongoose    = require('mongoose');

var UserTokenRefresh = new Schema({
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

var UserTokenRefreshModel = mongoose.model('UserTokenRefresh', UserTokenRefresh);

module.exports = UserTokenRefreshModel;
