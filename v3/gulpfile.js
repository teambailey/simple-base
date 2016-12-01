var gulp        = require('gulp');
var plugins     = require('gulp-load-plugins')(); // 1. gulp-{some-name} === someName; 2. {someName} !== someName
var del         = require('del');
var runSequence = require('run-sequence');
var browserSync = require('browser-sync').create();
var reload      = browserSync.reload;

// The Dir's
var devDir   = 'src' // adding "./" to the directory broke the watcher for the "imgs" folder
var buildDir = 'build';

// -------------------------------
// --- Global Tasks ---
// -------------------------------

// Delete/Clean - Out with the Old
gulp.task('build:clean', function() {
  del([buildDir])
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
// a development build and browserSync will startup
gulp.task('build:dev', function(callback) {
  runSequence('build:clean', 'copy:index', 'copy:images', ['build:sass', 'build:js'], 'serve', callback);
});

// The Default - Dev Build and Watchers. #friendsForever
gulp.task('default',['build:dev'], function (){
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
gulp.task('prod:usemin', function(cb) {
  gulp.src(buildDir + '/index.html')
  .pipe(plugins.usemin({
    css: [ plugins.rev() ],
    js: [ plugins.rev() ]
  }))
  .pipe(gulp.dest('prod'))
  .on('finish', function() {
    cb();
  });
});

// Leeroy Jenkins - Final production build with
// some manual requirements. Soo... this only works
// if the build directory is in a fully launchable state.
// That sux.
// But check it out. The css and js files are
// cache busted
gulp.task('build:prod', function(callback) {
  runSequence('build:dev', 'prod:usemin', callback);
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









