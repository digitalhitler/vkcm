/**
 * app/exceptions/InitException.js
 *
 * @project vkcm-api-server
 * @module InitException
 * @summary Exception type for starting phase
 *
 * @exports InitException
 * @extends AppException
 */

'use strict';

const AppException = use('app/exceptions/AppException');

class InitException extends AppException {

  constructor(e) {
    super(e);
  }

};


module.exports = InitException;
