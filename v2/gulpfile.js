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

gulp.task('javascript', function () {
    gulp.src('js/partials/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('js/all.js'));
});

gulp.task('default', ['sass', 'javascript'], function (){
    gulp.watch(['scss/**/*.scss', 'index.html', 'js/**/*.js'], ['sass']);
});