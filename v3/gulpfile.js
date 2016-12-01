var gulp        = require('gulp');
var plugins     = require('gulp-load-plugins')();
var uglify      = require('gulp-uglify');
var del         = require('del');
var runSequence = require('run-sequence');
var browserSync = require('browser-sync').create();
var reload      = browserSync.reload;

var buildDir = './build';

// Static server
gulp.task('serve', function() {
    browserSync.init({
        server: {
            baseDir: "./build"
        }
    });
});

gulp.task('build:clean', function() {
  del([buildDir])
});

// ------------------------------
//--- Development Build Tasks ---
// ------------------------------
gulp.task('build:sass', function () {
    gulp.src('src/scss/styles.scss')
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass().on('error', plugins.sass.logError))
    .pipe(plugins.autoprefixer('last 3 versions'))
    .pipe(plugins.cleanCss())
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(gulp.dest(buildDir + '/css'))
    .pipe(reload({stream: true}));
});

gulp.task('build:js', function () {
  gulp.src('src/js/app.js')
  .pipe(plugins.uglify())
  .pipe(gulp.dest(buildDir + '/js'))
  .pipe(reload({stream: true}));
});

gulp.task('copy:index', function() {
  gulp.src('src/index.html')
  .pipe(gulp.dest(buildDir))
  .pipe(reload({stream: true}));
});

gulp.task('copy:images', function() {
  gulp.src('src/imgs/*')
  .pipe(gulp.dest(buildDir + '/imgs'))
  .pipe(reload({stream: true}));
});

gulp.task('build:dev', function(callback) {
  runSequence('build:clean', 'copy:index', 'copy:images', ['build:sass', 'build:js'], callback);
});

gulp.task('default',['build:dev', 'serve'], function (){
    gulp.watch(['src/scss/**/*.scss'], ['build:sass']);
    gulp.watch('src/index.html', ['copy:index']);
    gulp.watch('src/imgs/*', ['copy:images']);
    gulp.watch(['src/js/*.js'], ['build:js']);
});

// -----------------------------
//--- Production Build Tasks ---
// -----------------------------
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

// This only works if the build dir is
// in a fully launchable state (that sux).
// But check it out. The css and js files are
// cache busted
gulp.task('build:prod', function(callback) {
  runSequence('build:dev', 'prod:usemin', callback);
});

// gulp.task('sass:prod', function(cb) {
//   gulp.src(buildDir + '/css/styles.css')
//   .pipe(gulp.dest('prod/css'))
//   .on('finish', function(){
//     cb();
//   });
// });
//
// gulp.task('js:prod', function (cb) {
//   gulp.src(buildDir + '/js/app.js')
//   .pipe(gulp.dest('prod/js'))
//   .on('finish', function() {
//     cb();
//   });
// });
//
// gulp.task('copyIndex:prod', function(cb) {
//   gulp.src(buildDir + '/index.html')
//   .pipe(gulp.dest('prod'))
//   .on('finish', function() {
//     cb();
//   });
// });
//
// gulp.task('build:prod', ['copyIndex:prod', 'sass:prod', 'js:prod'], function(cb) {
//   cb();
// });











