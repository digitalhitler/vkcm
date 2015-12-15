/**
 * routes/v1/index.js
 *
 * @project vkcm-api-server
 * @summary API Version 1 root router
 */

'use strict';

const express  = require('express');
let   router   = express.Router();

let   passport = require('passport');

// middleware that is specific to this router
// router.use(function timeLog(req, res, next) {
//   console.log('Time: ', Date.now());
//   next();
// });

// define the home page route
router.get('/', function(req, res) {
  res.send('Birds home page');
});

// define the about route
router.get('/about', function(req, res) {
  res.send('About birds');
});

router.post('/auth/token', oauth2.token);

router.get('/auth/userInfo',
  passport.authenticate('bearer', { session: false }),
  function(req, res) {
    // req.authInfo is set using the `info` argument supplied by
    // `BearerStrategy`.  It is typically used to indicate scope of the token,
    // and used in access control checks.  For illustrative purposes, this
    // example simply returns the scope in the response.
    res.json({ user_id: req.user.userId, name: req.user.username, scope: req.authInfo.scope })
  }
);

module.exports = router;
