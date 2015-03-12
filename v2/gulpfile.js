var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();

gulp.task('sass', function () {
    gulp.src('scss/style.scss')
    .pipe(plugins.rubySass())
    .pipe(plugins.minifyCss())
    .pipe(gulp.dest('css'))
    .pipe(plugins.livereload({start: true}));
});

gulp.task('default', ['sass'], function (){
    gulp.watch('**/*.{scss,html,js}', ['sass']);
});