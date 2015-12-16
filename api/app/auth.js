'use strict';
// @@todo: add header

var passport                = require('passport');
var BasicStrategy           = require('passport-http').BasicStrategy;
var ClientPasswordStrategy  = require('passport-oauth2-client-password').Strategy;
var BearerStrategy          = require('passport-http-bearer').Strategy;
var UserModel               = require('./models/User');
var UserClientModel         = require('./models/UserClient');
var UserTokenRefreshModel   = require('./models/UserToken');
var UserTokenRefresh        = require('./models/UserTokenRefresh');

passport.use(new BasicStrategy(
  function(username, password, done) {
    UserClientModel.findOne({ clientId: username }, function(err, client) {
      if (err) { return done(err); }
      if (!client) { return done(null, false); }
      if (client.clientSecret != password) { return done(null, false); }

      return done(null, client);
    });
  }
));

passport.use(new ClientPasswordStrategy(
  function(clientId, clientSecret, done) {
    UserClientModel.findOne({ clientId: clientId }, function(err, client) {
      if (err) { return done(err); }
      if (!client) { return done(null, false); }
      if (client.clientSecret != clientSecret) { return done(null, false); }

      return done(null, client);
    });
  }
));

passport.use(new BearerStrategy(
  function(accessToken, done) {
    UserTokenRefreshModel.findOne({ token: accessToken }, function(err, token) {
      if (err) { return done(err); }
      if (!token) { return done(null, false); }

      if( Math.round((Date.now()-token.created)/1000) > 7200 ) {
        UserTokenRefreshModel.remove({ token: accessToken }, function (err) {
          if (err) return done(err);
        });
        return done(null, false, { message: 'Token expired' });
      }

      UserModel.findById(token.userId, function(err, user) {
        if (err) { return done(err); }
        if (!user) { return done(null, false, { message: 'Unknown user' }); }

        var info = { scope: '*' };
        done(null, user, info);
      });
    });
  }
));