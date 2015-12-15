/**
 * index.js
 *
 * @project vkcm-api-server
 * @summary API server entry point
 */

'use strict';

console.log('Starting...');

const path = require('path');

// * Connecting to database
require('./app/storage');

// * Initialization
let app = require('./app/init');

// * Routing middlewares
require('./routes/index')(app);

// * Final middlewares & listening
app.start();
