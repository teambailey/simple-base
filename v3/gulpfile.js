var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();
var browserSync = require('browser-sync').create();
var reload      = browserSync.reload;

// Static server
gulp.task('browser-sync', function() {
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });
});

gulp.task('sass', function () {
    gulp.src('scss/style.scss')
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass().on('error', plugins.sass.logError))
    .pipe(plugins.autoprefixer('last 3 versions'))
    .pipe(plugins.minifyCss())
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(gulp.dest('css'))
    .pipe(reload({stream: true}));
});

gulp.task('js', function () {
    gulp.src(['js/partials/jquery-2.1.3.min.js', 'js/partials/app.js'])
    .pipe(plugins.concat('all.js'))
    .pipe(plugins.uglify())
    .pipe(gulp.dest('js'));
});

gulp.task('default',['sass', 'js','browser-sync'], function (){
    gulp.watch(['scss/**/*.scss'], ['sass']);
    gulp.watch('index.html').on('change', reload);
    gulp.watch(['js/partials/*.js'], ['js']);
});