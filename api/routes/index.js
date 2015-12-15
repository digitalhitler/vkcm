/**
 * routes/index.js
 *
 * @project vkcm-api-server
 * @summary Root routes definitions
 *
 * @exports indexRoute
 */

'use strict';

module.exports = function(app) {

  /*

   */

  app.get('/api', function(req, res) {
    res.send();
  });

  let v1 = use('routes/v1/index');
  app.use('/api/v1', v1);

};
