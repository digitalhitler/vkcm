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

var gulp = require('gulp'),
plumber = require('gulp-plumber'),
rename = require('gulp-rename');

var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var less = require('gulp-less');

var browserify = require('browserify');
var source = require('vinyl-source-stream');

global.gulpConfig = {
  'dest': './public/build/',
  'styles': {
    'src': ['app/less/**/*.less'],
    'autoPrefixer': 'last 2 versions'
  }
};


gulp.task('styles', function(){
  gulp.src(gulpConfig.styles.src)
  .pipe(plumber({
    errorHandler: function (error) {
      console.log(error.message);
      console.dir(gulpConfig);
      this.emit('end');
    }}))
    .pipe(less())
    .pipe(gulp.dest(gulpConfig.dest))
  });

  gulp.task('scripts', function(){
    // rawbundle means "no-browserify supported smthng"
    return gulp.src('app/raw/**/*.js')
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        console.dir(gulpConfig);
        this.emit('end');
      }}))
      .pipe(concat('rawbundle.js'))
      .pipe(gulp.dest(gulpConfig.dest))
      .pipe(rename({suffix: '.min'}))
      .pipe(uglify())
      .pipe(gulp.dest(gulpConfig.dest))
    });

    gulp.task('browserify', function() {
        return browserify('./app/brow/index.js')
            .bundle()
            .pipe(source('bundle.js'))
            .pipe(gulp.dest(gulpConfig.dest));
    });

    gulp.task('default', function(){
      gulp.watch("app/less/**.less", ['styles']);
      gulp.watch("app/raw/**.js", ['scripts']);
      gulp.watch("app/brow/**/*.js", ['browserify'])
    });
