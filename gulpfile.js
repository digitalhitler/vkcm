/**
 * gulpfile.js
 *
 * @project vkcm
 * @summary A GULP configuration
 *
 * @todo
 * refer configuration to one object
 * beautify intends and req's
 *
 */

var gulp = require('gulp');

// error handler:
var plumber = require('gulp-plumber');

// file renamer
var rename = require('gulp-rename');

// file + file
var concat = require('gulp-concat');

// minificator for CSS
var minifyCSS = require('gulp-minify-css');

// minificator for JS
var uglify = require('gulp-uglify');

// less compiler
var less = require('gulp-less');

// browserify compiler:
var browserify = require('browserify');

// stream for browserify:
var source = require('vinyl-source-stream');

// gulp debugger
var debug = require('gulp-debug');

// eyecandy:
var colors = require('colors');

// filesystem
var fs = require('fs');


global.GulpBoss = {
  config: {
    compiledDestination: './public/build/',
    extensionToQueue: {
      js: 'scripts',
      css: 'styles'
    }
  },

  // == watching ==
  browserify: {
    entryPoint: './app/brow/index.js',
    destinationFilename: 'app.js',
    watchPattern: 'app/brow/**/*.js',
    options: {
      insertGlobals: true,
      detectGlobals: true,
      debug: true
    }
  },

  less: {
    src: [
      'app/less/**/*.less'
    ],
    autoPrefixer: 'last 2 versions'
  },

  // == not watching (used by plugins and compiles once) ==
  styles: {
    src: [

    ],

    concatFilename: 'env/env.css'
  },

  scripts: {
    src: [
      'app/raw/_autoload/*.js',
    ],

    concatFilename: 'env/env.js'
  },

  addPlugin: function(name, files) {
    var _this = this;
    var results = {};
    if (typeof name !== undefined) {
      var fullPath = './app/raw/plugins/' + name;
      var dirInfo;
      try {
        var dirInfo = fs.statSync(fullPath);
      } catch (e) {
        this.reportError('Plugin directory ' + fullPath + ' does not exists.');
      }

      console.log('Checking plugin ' + colors.bold(name) + '...');
      if (typeof dirInfo === 'object') {
        for (file in files) {
          var currentFile = files[file];
          var fileInfo = false;
          var fileExt = false;
          var fileQueue = false;
          if (typeof currentFile === 'string') {
            var fullFile = fullPath + '/' + currentFile;
            try {
              var fileInfo = fs.statSync(fullFile);
              if (typeof fileInfo === 'object') {
                var fileExt = fullFile.split('.').pop();
                if (typeof fileExt === 'string' && fileExt.length > 0) {
                  if (typeof _this.config.extensionToQueue[fileExt] === 'string') {
                    fileQueue = _this.config.extensionToQueue[fileExt];
                    _this[fileQueue].src.push(fullFile);
                    if (!results[fileQueue]) {
                      results[fileQueue] = 1;
                    } else {
                      results[fileQueue] += 1;
                    }
                  }
                } else {
                  _this.reportError('Unknown type of file ' + colors.bold(currentFile) + ' in ' + colors.bold(name) + ' plugin.');
                }
              }
            } catch (e) {
              _this.reportError('File ' + colors.bold(currentFile) + ' of plugin ' + colors.bold(name) + ' does not exists.');
            }
          } else {
            _this.reportError(file + ' is not a string with filename, dude.');
          }
        }

        if (results) {
          var report = 'Queued: ';
          for (result in results) {
            report += colors.bold(results[result]) + ' of ' + result + '; ';
          }

        }
      }
    }
  },

  reportError(desc, terminate) {
    console.log(colors.white('Gulp Toolbox reports you that'));
    console.log(colors.red.bold('SHIT HAPPENS!'));
    console.log(colors.yellow('* * *'));
    console.log(desc);
    if (!terminate || terminate === true) {
      this.terminate(1);
    }
  },

  terminate: function(exitCode) {
    var exitCode = exitCode || 1;
    console.log(colors.inverse('* Process terminated with code ' + exitCode));
    process.exit(exitCode);
  },

  _runtime: {
    includedPlugins: [],
  }
};




GulpBoss.addPlugin(
  'jquery',
  [
    'jquery-2.1.3.min.js'
  ]
);

// GulpBoss.addPlugin(
//   'jquery-ui',
//   [
//     'jquery-ui.js',
//     'jquery-ui.css'
//   ]
// );

GulpBoss.addPlugin(
  'bootstrap',
  [
    'js/bootstrap.min.js',  // dont use minified - its have wrong path to fonts
    'css/bootstrap.css'     // dont use minified - its have wrong path to fonts
  ]
);

GulpBoss.addPlugin(
  'pace-master',
  [
    'pace.min.js',
    'themes/orange/pace-theme-flash.css'
  ]
);

// GulpBoss.addPlugin(
//   'jquery-blockui',
//   [
//     'jquery.blockui.js'
//   ]
// );
//
// GulpBoss.addPlugin(
//   'jquery-slimscroll',
//   [
//     'jquery.slimscroll.min.js',
//   ]
// );
//
// GulpBoss.addPlugin(
//   'switchery',
//   [
//     'switchery.min.js',
//     'switchery.min.css'
//   ]
// );
//
// GulpBoss.addPlugin(
//   'uniform',
//   [
//     'jquery.uniform.min.js',
//     'css/uniform.default.min.css'
//   ]
// );
//
// GulpBoss.addPlugin(
//   'offcanvasmenueffects',
//   [
//     'js/classie.js',
//     'js/main.js',
//     'css/menu_cornerbox.css'
//   ]
// );
//
// GulpBoss.addPlugin(
//   'waves',
//   [
//     'waves.min.js',
//     'waves.min.css'
//   ]
// );
//
// GulpBoss.addPlugin(
//   '3d-bold-navigation',
//   [
//     'js/main.js',
//     'css/style.css'
//   ]
// );
//
//
// GulpBoss.addPlugin(
//   'waypoints',
//   [
//     'jquery.waypoints.min.js',
//   ]
// );
//
// GulpBoss.addPlugin(
//   'jquery-counterup',
//   [
//     'jquery.counterup.min.js',
//   ]
// );
//
// GulpBoss.addPlugin(
//   'toastr',
//   [
//     'toastr.min.js',
//     'toastr.min.css'
//   ]
// );
//
// GulpBoss.addPlugin(
//   'flot',
//   [
//     'jquery.flot.min.js',
//     'jquery.flot.time.min.js',
//     'jquery.flot.symbol.min.js',
//     'jquery.flot.resize.min.js',
//     'jquery.flot.tooltip.min.js',
//     ''
//   ]
// );
//
// GulpBoss.addPlugin(
//   'curvedlines',
//   [
//     'curvedLines.js',
//   ]
// );
//
// GulpBoss.addPlugin(
//   'metrojs',
//   [
//     'MetroJs.min.js',
//     'MetroJs.min.css'
//   ]
// );
//
// GulpBoss.addPlugin(
//   'slidepushmenus',
//   [
//     'css/component.css',
//   ]
// );
//
// GulpBoss.addPlugin(
//   'modern_theme',
//   [
//     'modern.css',
//     'purple.css',
//     'modern.js'
//   ]
// );

gulp.task('less', function() {
  return gulp
    .src('app/less/*.less')
    .pipe(plumber({
      errorHandler: function(error) {
        GulpBoss.reportError(error.message, false);
        this.emit('end');
      }
    }))
    .pipe(less())
    .pipe(minifyCSS())
    .pipe(gulp.dest(GulpBoss.config.compiledDestination));
});

gulp.task('scripts', function() {
  // rawbundle means "no-browserify supported smthng"
  return gulp
    .src(GulpBoss.scripts.src)
    .pipe(debug())
    .pipe(plumber({
      errorHandler: function(error) {
        GulpBoss.reportError(error.message, false);
        this.emit('end');
      }
    }))
    .pipe(concat(GulpBoss.scripts.concatFilename))
    .pipe(gulp.dest(GulpBoss.config.compiledDestination))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest(GulpBoss.config.compiledDestination));
});

gulp.task('styles', function() {
  return gulp
    .src(GulpBoss.styles.src)
    .pipe(debug())
    .pipe(minifyCSS())
    .pipe(concat(GulpBoss.styles.concatFilename))
    .pipe(gulp.dest(GulpBoss.config.compiledDestination));
});

gulp.task('browserify', function() {
  return browserify(GulpBoss.browserify.entryPoint, GulpBoss.browserify.options)
    .bundle()
    .pipe(source(GulpBoss.browserify.destinationFilename))
    .pipe(gulp.dest(GulpBoss.config.compiledDestination));
});

gulp.task('compile', ['styles', 'scripts']);

gulp.task('default', function() {
  console.log(colors.yellow(colors.bold.underline('GulpBoss') + ' are here.'));
  console.log(colors.grey('Made by DigitalHitler <spetrenko@me.com>\n'));
  console.log(colors.bold('Hey-ho!\n'));
  console.log('There is no default task, make the right decision:\n');
  console.log(colors.white.bold('  less') + '          compile LESS styles into CSS\n');
  console.log(colors.white.bold('  browserify') + '    compile browserify-powered application\n');
  console.log(colors.white.bold('  styles') + '        compile non-dynamic style files\n');
  console.log(colors.white.bold('  scripts') + '       compile non-dynamic script files\n');
  console.log(colors.white.bold('  compile') + '       alias for running ' + colors.bold('styles') + ' and then ' + colors.bold('scripts') + '  tasks\n');
  console.log(colors.white.bold('  watch') + '         starts watching for changes in ' + colors.bold('less') + ' and ' + colors.bold('browserify') + ' sources\n');
  console.log('By the way, check out the ' + colors.underline.bold('GulpBoss') + ' object in gulpfile.js for configuration, plugins etc.\n');
});

gulp.task('watch', function() {
  gulp.watch(GulpBoss.less.src, ['less']);
  gulp.watch(GulpBoss.browserify.watchPattern, ['browserify']);
});
