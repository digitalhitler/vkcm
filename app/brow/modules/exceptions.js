/**
 * app/brow/modules/exceptions.js
 *
 * @project vkcm
 * @module exceptions
 * @summary Custom app exceptions prototypes
 *
 * @exports AppException
 */

'use strict';

/**
 * @constructor
 * @param {string} message        Description of the happens
 * @param {object} [dumpObject]   Object with additional debug data
 */
var AppException = function(message, dumpObject) {
  this.name = 'AppException';
  this.message = message || 'No message given.';
  this.stack = (new Error()).stack;

  if (typeof dumpObject === 'object') {
    console.log('Exception dump:');
    console.dir(dumpObject);
    this.dump = dumpObject;
  }

  this.stack = (new Error()).stack;
  return true;
};

AppException.prototype = Object.create(Error.prototype);
AppException.prototype.constructor = AppException;

//throw new AppException('Shit happens', { a: 'b', c: [1,2,3]});

module.exports = AppException;
