//@todo: add header

'use strict';

var mongoose    = require('mongoose');
let intel = require('intel');

let logger = intel.getLogger('runtime');
logger.addHandler(new intel.handlers.Console({
  formatter: new intel.Formatter({
    format: '[%(date)s] %(levelname)s: %(message)s',
    colorize: true
  })
}));

mongoose.connect('mongodb://localhost/vkcm');

let db = mongoose.connection;

db.on('error', function (err) {
  logger.error('connection error:', err.message);
});

db.once('open', function callback() {
  logger.info('Connected to DB!');
});

db.logger = logger;
global.db = db;
global.Schema = mongoose.Schema;