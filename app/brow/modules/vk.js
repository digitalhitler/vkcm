var request = require('superagent');
var EventEmitter = require('events').EventEmitter;
var _ = require('lodash');

VK = function() {

  this._runtime = {
    isAuthorized: false,
    accessToken: false
  };

};

// inherit VK with EventEmitter:
_.assign(VK.prototype, new EventEmitter());

module.exports = VK;
