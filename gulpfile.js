const gulp = require('gulp')
const $ = require('gulp-load-plugins')() // 1. gulp-{some-name} === someName; 2. {some-name} !== someName
const del = require('del')
const fse = require('fs-extra')
const runSequence = require('run-sequence')
const browserSync = require('browser-sync').create()
const reload = browserSync.reload

// The Dir's
const devDir = 'src' // adding "./" to the directory broke the watcher for the "imgs" directory
const buildDir = 'build'
const prodDir = 'prod'
const buildImgDir = buildDir + '/imgs'
const optImgDir = devDir + '/opt-imgs'

// Constructor
const stylesString = '// --- General Styling --- \n@import "partials/global";\n\n// --- Partials ---\n@import "partials/variables";'
const globalSassString = 'h1 {\n\tcolor: green;\n\tfont-size: 20px;\n}'
const variablesString = '// Colors\n$white: #ffffff;\n$black: #000000;'
const jsString = "$(() => {\n\tconsole.log('Its working!!')\n})"
const indexString = '<!DOCTYPE html>\n\n<html lang="en">\n\t<head>\n\t\t<meta http-equiv="content-type" content="text/html; charset=utf-8">\n\t\t<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">\n\t\t<title>Simple Base</title>\n\t\t<!-- css Build -->\n\t\t<!-- build:css css/styles.css -->\n\t\t<link rel="stylesheet" type="text/css" href="css/styles.css">\n\t\t<!-- endbuild -->\n\t\t<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>\n\t\t<!-- js Build -->\n\t\t<!-- build:js js/app.js -->\n\t\t<script type="text/javascript" src="js/app.js"></script>\n\t\t<!-- endbuild -->\n\t</head>\n\n\t<body>\n\t\t<h1>Sup bro! Let\'s get started</h1>\n\t</body>\n\n</html>'

gulp.task('constructor', () => {
  fse.mkdirsSync(devDir + '/imgs')
  fse.outputFileSync(devDir + '/js/app.js', jsString)
  fse.outputFileSync(devDir + '/scss/styles.scss', stylesString)
  fse.outputFileSync(devDir + '/scss/partials/_global.scss', globalSassString)
  fse.outputFileSync(devDir + '/scss/partials/_variables.scss', variablesString)
  // fse.outputFileSync(devDir + '/scss/partials/_mixins.scss')
  fse.outputFileSync(devDir + '/index.html', indexString)
})

gulp.task('makie', (cb) => {
  runSequence('clean:dev', 'constructor', cb)
})

// Error reporter
function onBabelError (err) {
  // For gulp-util users u can use a more colorfull variation
  // util.log(util.colors.red('[Compilation Error]'));
  // util.log(err.fileName + ( err.loc ? `( ${err.loc.line}, ${err.loc.column} ): ` : ': '));
  // util.log(util.colors.red('error Babel: ' + err.message + '\n'));
  // util.log(err.codeFrame);

  console.log('[Compilation Error]')
  console.log(err.fileName + (err.loc ? `( ${err.loc.line}, ${err.loc.column} ): ` : ': '))
  console.log('error Babel: ' + err.message + '\n')
  console.log(err.codeFrame)

  this.emit('end')
}

// -------------------------------
// --- Clean Tasks ---
// -------------------------------

// Delete/Clean - Out with the Old
// PT: "Return it... ti nruteR"
gulp.task('clean:build', () => {
  return del([buildDir])
})

gulp.task('clean:prod', () => {
  return del([prodDir])
})

gulp.task('clean:dev', () => {
  return del([devDir])
})

gulp.task('clean:build-images', () => {
  return del([buildImgDir])
})

gulp.task('clean:opt-images', () => {
  return del([optImgDir])
})

// -------------------------------
// --- Development Build Tasks ---
// -------------------------------

// Static Server - browserSync
gulp.task('serve', () => {
  browserSync.init({
    server: {
      baseDir: buildDir
    }
  })
})

// CSS Build - Compile sass, prefix, minify, create source.map, browserSync
gulp.task('build:sass', () => {
  gulp.src(devDir + '/scss/styles.scss')
    .pipe($.sourcemaps.init())
    .pipe($.sass().on('error', $.sass.logError))
    .pipe($.autoprefixer('last 3 versions'))
    .pipe($.cleanCss())
    .pipe($.sourcemaps.write('.'))
    .pipe(gulp.dest(buildDir + '/css'))
    .pipe(reload({stream: true}))
})

// JS Build - Uglify, browserSync
gulp.task('build:js', () => {
  gulp.src(devDir + '/js/**/*.js')
    .pipe($.sourcemaps.init())
    .pipe($.babel().on('error', onBabelError))
    .pipe($.concat('app.js'))
    .pipe($.sourcemaps.write('.'))
    .pipe(gulp.dest(buildDir + '/js'))
    .pipe(reload({stream: true}))
})

// Copy to Build Dir - index.html
gulp.task('copy:index', () => {
  gulp.src(devDir + '/index.html')
    .pipe(gulp.dest(buildDir))
    .pipe(reload({stream: true}))
})

// Copy to Build Dir - Images
gulp.task('opt:images', ['clean:opt-images', 'clean:build-images'], (cb) => {
  gulp.src(devDir + '/imgs/**/*')
    .pipe($.imagemin())
    .pipe(gulp.dest(optImgDir))
    .on('end', () => {
      cb()
    })
})

// Copy to Build Dir - Images
gulp.task('copy:images', ['clean:build-images'], () => {
  gulp.src(devDir + '/imgs/*')
    .pipe(gulp.dest(buildDir + '/imgs'))
    .pipe(reload({stream: true}))
})

// The Build - fully sequenced tasks will perform
// a development build
gulp.task('build:dev', (cb) => {
  runSequence('clean:build', 'copy:index', 'copy:images', ['build:sass', 'build:js'], cb)
})

// Startup browserSync
gulp.task('browserSync', (cb) => {
  runSequence('build:dev', 'serve', cb)
})

// The Default - Dev Build and Watchers. #friendsForever
gulp.task('default', ['browserSync'], () => {
  gulp.watch(devDir + '/scss/**/*.scss', ['build:sass'])
  gulp.watch(devDir + '/index.html', ['copy:index'])
  gulp.watch(['src/imgs', 'src/imgs/**/*'], ['copy:images'])
  gulp.watch(devDir + '/js/*.js', ['build:js'])
})

// ------------------------------
// --- Production Build Tasks ---
// ------------------------------

// Cache Busting - Adds a hash to the
// CSS and JS files so that dat cache can
// be busted. Also edits the index.html file
// so that the newly added hashs match the
// link tags. Sorcery
// ----------
// TODO fix this below
// need the timeout so that the index.html
// can be built completely
gulp.task('prod:usemin', (cb) => {
  setTimeout(() => {
    gulp.src(buildDir + '/index.html')
      .pipe($.usemin({
        css: [ $.rev() ],
        js: [ $.uglify(), $.rev() ]
      }))
      .pipe(gulp.dest(prodDir))
      .on('end', () => {
        cb()
      })
  }, 1000)
})

// Copy to Images Prod Dir - Images
gulp.task('prod:images', ['opt:images'], (cb) => {
  gulp.src(buildDir + '/imgs/**/*')
    .pipe(gulp.dest(prodDir + '/imgs'))
    .on('finish', () => {
      cb()
    })
})

// Leeroy Jenkins - Final production build
gulp.task('build:prod', ['build:dev'], (cb) => {
  runSequence('clean:prod', 'prod:images', 'prod:usemin', cb)
})

// This might be useful at some point
// -- Parses a json file or whatever i think
// -- That can be used for private keys and such
// ----------------------------------
// const fs          = require('fs')
// const config = JSON.parse(fs.readFileSync('./config.json'))
// gulp.task('sup', () => {
//   console.log(config.myvar)
//   console.log(config.paths.myvar2)
//   console.log(config.paths.myvar3)
// })
