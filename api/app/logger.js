'use strict';

module.exports = function(module) {
  let intel = require('intel');
  let path = module.filename.split('/').slice(-2).join('/');

  let logger = intel.getLogger('runtime');
  logger.addHandler(new intel.handlers.Console({
    formatter: new intel.Formatter({
      format: '[%(date)s] %(levelname)s ' + path + ': \n%(message)s',
      colorize: true
    })
  }));

  return logger;

};
