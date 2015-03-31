var gulp = require('gulp');
var uglify = require('gulp-uglify');
var plugins = require('gulp-load-plugins')();

gulp.task('sass', function () {
    gulp.src('scss/style.scss')
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass())
    .pipe(plugins.autoprefixer('last 3 versions'))
    .pipe(plugins.minifyCss())
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(gulp.dest('css'))
    .pipe(plugins.livereload({start: true}));
});

gulp.task('js', function () {
    gulp.src(['js/partials/jquery-2.1.3.min.js', 'js/partials/app.js'])
    .pipe(plugins.concat('all.js'))
    .pipe(uglify())
    .pipe(gulp.dest('js'))
    .pipe(plugins.livereload({start: true}));
});

gulp.task('default',['sass', 'js'], function (){
    gulp.watch(['scss/**/*.scss', 'index.html'], ['sass']);
    gulp.watch(['js/partials/*.js'], ['js']);
});