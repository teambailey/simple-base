var gulp        = require('gulp');
var plugins     = require('gulp-load-plugins')();
var uglify      = require('gulp-uglify');
var del         = require('del');
var browserSync = require('browser-sync').create();
var reload      = browserSync.reload;

// Static server
gulp.task('serve', function() {
    browserSync.init({
        server: {
            baseDir: "./build"
        }
    });
});

gulp.task('clean', function() {
  del(['build'])
});

// ------------------------------
//--- Development Build Tasks ---
// ------------------------------
gulp.task('sass', function () {
    gulp.src('src/scss/styles.scss')
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass().on('error', plugins.sass.logError))
    .pipe(plugins.autoprefixer('last 3 versions'))
    .pipe(plugins.cleanCss())
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(gulp.dest('build/css'))
    .pipe(reload({stream: true}));
});

gulp.task('js', function () {
  gulp.src('src/js/app.js')
  .pipe(plugins.uglify())
  .pipe(gulp.dest('build/js'))
  .pipe(reload({stream: true}));
});

gulp.task('copy:index', function() {
  gulp.src('src/index.html')
  .pipe(gulp.dest('build'))
  .pipe(reload({stream: true}));
});

gulp.task('copy:images', function() {
  gulp.src('src/imgs/*')
  .pipe(gulp.dest('build/imgs'));
});

gulp.task('build:dev', ['clean', 'copy:index', 'copy:images','sass', 'js'], function(cb) {
  cb();
});

gulp.task('default',['build:dev', 'serve'], function (){
    gulp.watch(['src/scss/**/*.scss'], ['sass']);
    gulp.watch('src/index.html', ['copy:index']);
    gulp.watch(['src/js/*.js'], ['js']);
});

// -----------------------------
//--- Production Build Tasks ---
// -----------------------------
gulp.task('sass:prod', function(cb) {
  gulp.src('src/scss/styles.scss')
  .pipe(plugins.sass().on('error', plugins.sass.logError))
  .pipe(plugins.autoprefixer('last 3 versions'))
  .pipe(plugins.cleanCss())
  .pipe(gulp.dest('prod/css'))
  .on('finish', function(){
    cb();
  });
});

gulp.task('js:prod', function (cb) {
  gulp.src('src/js/app.js')
  .pipe(plugins.uglify())
  .pipe(gulp.dest('prod/js'))
  .on('finish', function() {
    cb();
  });
});

gulp.task('copyIndex:prod', function(cb) {
  gulp.src('src/index.html')
  .pipe(gulp.dest('prod'))
  .on('finish', function() {
    cb();
  });
});

gulp.task('build:prod', ['copyIndex:prod', 'sass:prod', 'js:prod'], function(cb) {
  cb();
});











