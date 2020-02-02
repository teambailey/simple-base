// NOTE: String Interpolation is spotty with some of the packages
// so for consistency use of string concatenation recommended

const { series, parallel, src, dest, watch } = require('gulp');
const $ = require('gulp-load-plugins')() // 1. gulp-{some-name} === someName; 2. {some-name} !== someName
const del = require('del')
const fse = require('fs-extra')
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

// ---------------------
// --- Utility Tasks ---
// ---------------------

// Error reporter
function onBabelError (err) {
  console.log('[Compilation Error]')
  console.log(err.fileName + (err.loc ? `( ${err.loc.line}, ${err.loc.column} ): ` : ': '))
  console.log('error Babel: ' + err.message + '\n')
  console.log(err.codeFrame)

  this.emit('end')
}

// Delete/Clean Tasks
const cleanDev = () => {
  return del([devDir])
}
const cleanProd = () => {
  return del([prodDir])
}
const cleanBuild = () => {
  return del([buildDir])
}
const cleanBuildImgs = () => {
  return del([buildImgDir])
}
const cleanOtpImgs = () => {
  return del([optImgDir])
}
const cleanSourceMaps = () => {
  return del(['build/**/*.map'])
}

// Static Server - browserSync
const serve = () => {
  browserSync.init({
    server: {
      baseDir: buildDir
    }
  })
}

// ------------------------
// --- Constructor Task ---
// ------------------------

// The Contructor
const constructor = (cb) => {
  fse.mkdirsSync(devDir + '/imgs')
  fse.outputFileSync(devDir + '/js/app.js', jsString)
  fse.outputFileSync(devDir + '/scss/styles.scss', stylesString)
  fse.outputFileSync(devDir + '/scss/partials/_global.scss', globalSassString)
  fse.outputFileSync(devDir + '/scss/partials/_variables.scss', variablesString)
  // fse.outputFileSync(devDir + '/scss/partials/_mixins.scss')
  fse.outputFileSync(devDir + '/index.html', indexString)
  cb();
}

// -------------------------------
// --- Development Build Tasks ---
// -------------------------------

// CSS Build - Compile sass, prefix, minify, create source.map, browserSync
const buildSass = () => {
  return src(devDir + '/scss/styles.scss')
    .pipe($.sourcemaps.init())
    .pipe($.sass().on('error', $.sass.logError))
    .pipe($.autoprefixer('last 3 versions'))
    .pipe($.cleanCss())
    .pipe($.sourcemaps.write('.'))
    .pipe(dest(buildDir + '/css'))
    .pipe(reload({stream: true}))
}

// JS Build - Uglify, browserSync
const buildJs = () => {
  return src(devDir + '/js/**/*.js')
    .pipe($.sourcemaps.init())
    .pipe($.babel().on('error', onBabelError))
    .pipe($.concat('app.js'))
    .pipe($.sourcemaps.write('.'))
    .pipe(dest(buildDir + '/js'))
    .pipe(reload({stream: true}))
}

// Copy to Build Dir - index.html
const copyIndex = () => {
  return src(devDir + '/index.html')
    .pipe(dest(buildDir))
    .pipe(reload({stream: true}))
}

// Copy to Build Dir - Images
const copyImgs = () => {
  return src(devDir + '/imgs/*')
    .pipe(dest(buildDir + '/imgs'))
    .pipe(reload({stream: true}))
}

// Clean and Copy to Build Dir - Images
const cleanCopyImgs = series(cleanBuildImgs, copyImgs);

// Copy, and Optimize to Build Dir - Image
const buildOptImgs = (cb) => {
  return src(devDir + '/imgs/**/*')
    .pipe($.imagemin())
    .pipe(dest(optImgDir))
    .on('end', () => {
      cb()
    })
}

// Clean, Copy, and Optimize to Build Dir - Image
const OptImgs = series(cleanCopyImgs, buildOptImgs);

// Copy, and Optimize to Prod Dir - Image
const prodOptImgs = (cb) => {
  return src(buildDir + '/imgs/**/*')
    .pipe(dest(prodDir + '/imgs'))
    .on('end', () => {
      cb()
    })
}

// Clean, Copy, and Optimize to Prod Dir - Image
const buildProdOtpImgs = series(OptImgs, prodOptImgs)

// Startup BrowserSync and Add Watchers
const watchers = () => {
  serve();
  watch(devDir + '/scss/**/*.scss', buildSass);
  watch(devDir + '/js/*.js', buildJs);
  watch(devDir + '/index.html', copyIndex);
  watch(['src/imgs', 'src/imgs/**/*'], cleanCopyImgs);
}

// ------------------------------
// --- Production Build Tasks ---
// ------------------------------

// CSS Build Prod - Compile sass, prefix, minify, create source.map, browserSync
const buildProdSass = () => {
  return src(devDir + '/scss/styles.scss')
    .pipe($.sass().on('error', $.sass.logError))
    .pipe($.autoprefixer('last 3 versions'))
    .pipe($.cleanCss())
    .pipe(dest(buildDir + '/css'))
}

// JS Build Prod - Uglify, browserSync
const buildProdJs = () => {
  return src(devDir + '/js/**/*.js')
    .pipe($.babel().on('error', onBabelError))
    .pipe($.concat('app.js'))
    .pipe(dest(buildDir + '/js'))
}

// Cache Busting - Adds a hash to the
// CSS and JS files so that dat cache can
// be busted. Also edits the index.html file
// so that the newly added hashs match the
// link tags
const cacheBuster = (cb) => {
  return src(buildDir + '/index.html')
    .pipe($.usemin({
      css: [ $.rev() ],
      js: [ $.uglify(), $.rev() ]
    }))
    .pipe(dest(prodDir))
    .on('end', () => {
      cb()
    })
}

// The Dev Build - fully sequenced tasks will perform a development build
const buildDev = series(cleanBuild, copyIndex, cleanCopyImgs, parallel(buildSass, buildJs))
exports.buildDev = buildDev

// The Prod Build - fully sequenced tasks will perform a production build
const buildProd = series(cleanProd, cleanBuild, copyIndex, cleanCopyImgs, parallel(buildProdSass, buildProdJs), buildProdOtpImgs, cacheBuster)
exports.buildProd = buildProd

// Initial Contructor
exports.makie = series(cleanDev, constructor)

// The Default - Dev Build and Watchers
exports.default = series(buildDev, watchers)
