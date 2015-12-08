/**
 * app/brow/modules/push.js
 *
 * @project vkcm
 * @module push
 * @summary Push-notifications in-app service
 *
 * @exports PushService
 * @extends EventEmitter
 */

'use strict';

var EventEmitter = require('events').EventEmitter;

/**
* Push notification facade handler
* Toastr.js on backend.
*
* @constructor PushService
*/
var PushService = function(app) {

  // Check if object is instance of Constructor
  if (!this instanceof PushService) {
    return new PushService();
  }

  if (app && app instanceof App) {
    this.linkedApplication = app;
    app.pns = this;
  } else {
    this.linkedApplication = false;
  }

  // Event toolbox
  EventEmitter.call(this);

};

/**
 * Extening module with EventEmitter
 * @type {EventEmitter}
 */
PushService.prototype = new EventEmitter;

/**
 * Exporting module
 */

module.exports = PushService;
