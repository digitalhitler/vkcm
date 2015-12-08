/**
 * app/brow/modules/transport.js
 *
 * @project vkcm
 * @module transport
 * @summary Storage engine transport
 *
 * @exports Transport
 * @extends EventEmitter
 */

'use strict';

var EventEmitter = require('events').EventEmitter;
var ApplicationError = require('./exceptions');

if (typeof global.appRuntime.transports === 'undefined') {
  global.appRuntime.transpots = {};
}

var debug = global.appRuntime.debug || false;
var Debug = require('debug');

if (debug === true) {
  Debug.enable('transport');
}

/**
* Transport storage & data facade handler
*
* @constructor Transport
*/
var Transport = function(streamName) {

  this.debug = Debug('transport');
  this.debug.err = Debug('transport:errors');

  var stream = streamName || 'default';

  if (typeof global.appRuntime.transports[stream] === 'object' &&
  global.appRuntime.transports[stream] instanceof 'Transport') {
    throw new AppException('Cannot create transport stream: already exists.');
    return false;
  }

  // Check if object is instance of Constructor
  if (!this instanceof Transport) {
    return new Transport();
  }

  this.request = require('superagent');

  global.appRuntime.transports[stream] = this;

  this.debug('Transport stream ' + stream + ' created.');

  // Event toolbox
  EventEmitter.call(this);

};

/**
 * Extening module with EventEmitter
 * @type {EventEmitter}
 */
Transport.prototype = new EventEmitter;

/**
 * Exporting module
 */

module.exports = Transport;
