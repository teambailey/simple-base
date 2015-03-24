var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();

gulp.task('sass', function () {
    gulp.src('scss/style.scss')
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass())
    .pipe(plugins.autoprefixer('last 3 versions'))
    .pipe(plugins.minifyCss())
    .pipe(plugins.sourcemaps.write())
    .pipe(gulp.dest('css'))
    .pipe(plugins.livereload({start: true}));
});

gulp.task('default', ['sass'], function (){
    gulp.watch(['**/*.{scss}'], ['sass']);
});