var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();

gulp.task('sass', function () {
    gulp.src('scss/style.scss')
    .pipe(plugins.rubySass())
    .pipe(plugins.minifyCss())
    .pipe(gulp.dest('css'));
});

gulp.task('default', ['sass'], function (){
    gulp.watch('**/*.scss', ['sass']);
});