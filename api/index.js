/**
 * index.js
 *
 * @project vkcm-api-server
 * @summary API server entry point
 */

'use strict';

console.log('Starting...');

const path = require('path');

let app = require("./app/init");

// * Routing middlewares

require('./routes/index')(app);
console.log('loaded!!!');

app.start();

console.log('Listening...');
