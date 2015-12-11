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

  console.log('i am loaded', app.use);

  app.get('/api', function(req, res) {
    console.log('approot');
    res.send('GET request to the homepage');
  });

  let v1 = use('routes/v1/index');
  app.use('/api/v1', v1);

};
