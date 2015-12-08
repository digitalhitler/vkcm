/**
 * app/brow/index.js
 *
 * @project vkcm
 * @summary Browserify-powered entry point
 *
 * If you need to compile new /build/bundle.js:
 * $ gulp browserify
 *
 * Real-time recompilation can be started by:
 * $ pm2 gulp start
 * [!] I don't recomment to use pm2-handled gulp on production.
 *     Don't forget to $ pm2 gulp stop after all.
 */

// Issue with global link that diffs in node/common envs handles
// easily fixes with this obvious:


// * Dependencies
//   Transport & network modules
var request       = require('superagent');

//   Utilities
var _             = require('lodash');
var EventEmitter  = require('events').EventEmitter;

global.loadingState = require('./extensions/nprogress');
loadingState.start();
loadingState.set(0.3);

// * Configuration extension
var configuration = {
  DEBUG: true
};

// * App HQ
var App = require('./modules/app');
var vkcm = new App(configuration);

global.vkcm = vkcm;

loadingState.inc();

// * Frameworks
vkcm.requireFrameworks({

  // LocalStorage
  store2: require('store2'),

  // custom emitters for kbd & mouse
  specialEvents: require('./modules/specialEvents'),

  // jQ & BS
  // @todo: kill-out jQuery. Its last instance
});



var Runtime = require('./modules/runtimeCollector.js')(vkcm);
console.log(Runtime);

vkcm.once('frontendReady', function() {
  vkcm.debug('Frontend completely loaded.');
  loadingState.done();

});

console.log(vkcm.frameworks);

// $(document).ready(function() {
//   console.warn('doc ready');
// });
