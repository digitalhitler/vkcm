/**
 * app/transport.js
 *
 * @project vkcm-api-server
 * @module appTransport
 * @summary Transport helpers
 *
 * @exports appTransport
 */

'use strict';

const AppException = use('app/exceptions/AppException');

module.exports = {

  debug: applicationDebug,

  /**
   * Good output compiler
   * @param   {object}  response data
   */
  compileResponse: function(data) {

    let response = {
      status: 200,
      error:  false
    };

    data = data || false;

    response.data = data;

  },

  /**
   * Error output compiler
   * @method  function
   * @param   {[object|string]}  exception object or message string
   */
  compileError: function() {

    let errorObject;

    if (arguments.length === 1) {
      if (typeof arguments[0] === 'object') {
        errorObject = arguments[0];
      } else {
        errorObject = {
          message: arguments[0]
        };
      }
    } else {
      let errorObject = arguments[0];
    }

    let errorMessage = errorObject.message || '(no message)';

    if (!applicationDebug) {
      console.log(errorObject);
    } else {

      let response;

      // determine is we need to report user the details
      if (errorObject instanceof AppException || errorObject.type === 'user') {
        if (!errorObject.status) {
          errorObject.status = 500;
        }

        response = errorObject;

      } else {
        response = {
          status: 500,
          message: errorObject.message
        };
      }

      response.error = true;

      delete response.type;

      return response;
    }
  }
};
