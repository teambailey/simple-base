var gulp        = require('gulp');
var plugins     = require('gulp-load-plugins')(); // 1. gulp-{some-name} === someName; 2. {some-name} !== someName
var del         = require('del');
var fse         = require('fs-extra');
var runSequence = require('run-sequence');
var browserSync = require('browser-sync').create();
var reload      = browserSync.reload;

// The Dir's
var devDir   = 'src' // adding "./" to the directory broke the watcher for the "imgs" directory
var buildDir = 'build';
var prodDir  = 'prod';

// Constructor
var temp_src = devDir;
var stylesString = '// --- General Styling --- \n@import "partials/global";\n\n// --- Partials ---\n@import "partials/variables";'
var globalString = 'h1 {\n\tcolor: green;\n\tfont-size: 20px;\n}'
var variablesString = '// Colors\n$white: #ffffff;\n$black: #000000;'
var jsString = '$(function() {\n\tconsole.log(\'Its working!!\');\n});'
var indexString = '<!DOCTYPE html>\n\n<html lang="en">\n\t<head>\n\t\t<meta http-equiv="content-type" content="text/html; charset=utf-8">\n\t\t<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">\n\t\t<title>Simple Base</title>\n\t\t<!-- css Build -->\n\t\t<!-- build:css css/styles.css -->\n\t\t<link rel="stylesheet" type="text/css" href="css/styles.css">\n\t\t<!-- endbuild -->\n\t\t<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>\n\t\t<!-- js Build -->\n\t\t<!-- build:js js/app.js -->\n\t\t<script type="text/javascript" src="js/app.js"></script>\n\t\t<!-- endbuild -->\n\t</head>\n\n\t<body>\n\t\t<h1>Sup bro! Let\'s get started</h1>\n\t</body>\n\n</html>'

gulp.task('constructor', function() {
  fse.mkdirsSync(temp_src + '/imgs');
  fse.outputFileSync(temp_src + '/js/app.js', jsString);
  fse.outputFileSync(temp_src + '/scss/styles.scss', stylesString);
  fse.outputFileSync(temp_src + '/scss/partials/_global.scss', globalString);
  fse.outputFileSync(temp_src + '/scss/partials/_variables.scss', variablesString);
  // fse.outputFileSync(temp_src + '/scss/partials/_mixins.scss');
  fse.outputFileSync(temp_src + '/index.html', indexString);
});

gulp.task('makie', function(cb) {
  runSequence('prod:temp', 'constructor', cb);
});

// -------------------------------
// --- Global Tasks ---
// -------------------------------

// Delete/Clean - Out with the Old
// PT: "Return it... ti nruteR"
gulp.task('build:clean', function() {
  return del([buildDir]);
});

gulp.task('prod:clean', function() {
  return del([prodDir]);
});

gulp.task('prod:temp', function() {
  return del([temp_src]);
});


// -------------------------------
// --- Development Build Tasks ---
// -------------------------------

// Static Server - browserSync
gulp.task('serve', function() {
  browserSync.init({
    server: {
      baseDir: buildDir
    }
  });
});

// CSS Build - Compile sass, prefix, minify, create source.map, browserSync
gulp.task('build:sass', function () {
    gulp.src(devDir + '/scss/styles.scss')
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass().on('error', plugins.sass.logError))
    .pipe(plugins.autoprefixer('last 3 versions'))
    .pipe(plugins.cleanCss())
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(gulp.dest(buildDir + '/css'))
    .pipe(reload({stream: true}));
});

// JS Build - Uglify, browserSync
gulp.task('build:js', function () {
  gulp.src(devDir + '/js/app.js')
  .pipe(plugins.uglify())
  .pipe(gulp.dest(buildDir + '/js'))
  .pipe(reload({stream: true}));
});

// Copy to Build Dir - index.html
gulp.task('copy:index', function() {
  gulp.src(devDir + '/index.html')
  .pipe(gulp.dest(buildDir))
  .pipe(reload({stream: true}));
});

// Copy to Build Dir - Images
gulp.task('copy:images', function(cb) {
  gulp.src(devDir + '/imgs/**/*')
  .pipe(plugins.imagemin())
  .pipe(gulp.dest(buildDir + '/imgs'))
  .on('finish', function() {
    cb();
  })
  .pipe(reload({stream: true}));
});

// The Build - fully sequenced tasks will perform
// a development build
gulp.task('build:dev', function(cb) {
  runSequence('build:clean', 'copy:index', 'copy:images', ['build:sass', 'build:js'], cb);
});

// Startup browserSync
gulp.task('browserSync', function(cb) {
  runSequence('build:dev', 'serve', cb)
});

// The Default - Dev Build and Watchers. #friendsForever
gulp.task('default',['browserSync'], function () {
    gulp.watch(devDir + '/scss/**/*.scss', ['build:sass']);
    gulp.watch(devDir + '/index.html', ['copy:index']);
    gulp.watch(devDir + '/imgs/*', ['copy:images']);
    gulp.watch(devDir + '/js/*.js', ['build:js']);
});


// ------------------------------
// --- Production Build Tasks ---
// ------------------------------

// Cache Busting - Adds a hash to the
// CSS and JS files so that dat cache can
// be busted. Also edits the index.html file
// so that the newly added hashs match the
// link tags. Sorcery
// ----------
// TODO fix this below
// need the timeout so that the index.html
// can be built completely
gulp.task('prod:usemin', function(cb) {
  setTimeout(function() {
    gulp.src(buildDir + '/index.html')
    .pipe(plugins.usemin({
      css: [ plugins.rev() ],
      js: [ plugins.rev() ]
    }))
    .pipe(gulp.dest(prodDir))
    .on('finish', function() {
      cb();
    });
  }, 1000);
});

// Copy to Images Prod Dir - Images
gulp.task('prod:images', function(cb) {
  gulp.src(buildDir + '/imgs/**/*')
  .pipe(gulp.dest(prodDir + '/imgs'))
  .on('finish', function() {
    cb();
  })
});

// Leeroy Jenkins - Final production build
gulp.task('build:prod', ['build:dev'], function(cb) {
  runSequence('prod:clean', 'prod:images', 'prod:usemin', cb);
});


// This might be useful at some point
// -- Parses a json file or whatever i think
// -- That can be used for private keys and such
// ----------------------------------
// var fs          = require('fs');
// var config = JSON.parse(fs.readFileSync('./config.json'));
// gulp.task('sup', function() {
//   console.log(config.myvar);
//   console.log(config.paths.myvar2);
//   console.log(config.paths.myvar3);
// });
