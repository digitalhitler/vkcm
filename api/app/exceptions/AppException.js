/**
 * app/exceptions/InitException.js
 *
 * @project vkcm-api-server
 * @module InitException
 * @summary General thrown by application exception type
 *
 * @exports AppException
 * @extends Error
 *
 * @@todo: make it more than skeleton
 * @@todo: output to log.
 */

'use strict';

class AppException extends Error {

  constructor(e) {
    super(e);
  }

};


module.exports = AppException;
