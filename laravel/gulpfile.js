var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();

gulp.task('sass', function () {
    gulp.src('resources/assets/scss/style.scss')
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass())
    .pipe(plugins.autoprefixer('last 3 versions'))
    .pipe(plugins.minifyCss())
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(gulp.dest('public/css'))
    .pipe(plugins.livereload({start: true}));
});

gulp.task('default', ['sass'], function (){
    gulp.watch(['public/scss/**/*.scss', 'resources/views/*.php'], ['sass']);
});