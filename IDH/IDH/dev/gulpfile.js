// Gulp Plugins
var
  gulp = require('gulp'),
  minify = require('gulp-minifier'),
  concat = require('gulp-concat'),
  autoprefixer = require('gulp-autoprefixer'),
  zip = require('gulp-zip'),
  tinypng = require('gulp-tinypng-compress');
const sass = require('gulp-sass')(require('sass'));



// Firing Plugin TinyPNG
gulp.task('tinypng', function () {
  return gulp.src('./assets/imgs/**/*.{png,jpg,jpeg}')
    .pipe(tinypng({
      key: 'SRjGxB4NDv9vfgkN4YnHtwv57d2j7bMs',
      sigFile: './assets/imgs/.tinypng-sigs',
      log: true
    }))
    .pipe(gulp.dest('../dist/assets/imgs'));
});


// Watching any changes in images folder, 
// move images to <dist/imgs> and reload in browser
gulp.task('imgs', function () {
  return gulp.src('./assets/imgs/**')
    .pipe(gulp.dest('../dist/assets/imgs'))
})

// Compiling & minifying main scss and move compiled minified file to <css> folder
// and reload in browser
gulp.task('sass', function () {
  return gulp.src('assets/scss/*.scss')
    .pipe(sass())
    .pipe(minify({
      minify: true,
      collapseWhitespace: true,
      conservativeCollapse: true,
      minifyCSS: true,
    }))
    .pipe(autoprefixer({
      browsersList: ['last 2 versions'],
      cascade: false
    }))
    .pipe(concat('idh.css'))
    .pipe(gulp.dest('../dist/assets/css'))
})

// RTL Stylsheet
gulp.task('sassRTL', function () {
  return gulp.src('assets/scss/ar.scss')
    .pipe(sass())
    .pipe(minify({
      minify: true,
      collapseWhitespace: true,
      conservativeCollapse: true,
      minifyCSS: true,
    }))
    .pipe(autoprefixer({
      browsersList: ['last 2 versions'],
      cascade: false
    }))
    .pipe(concat('ar.css'))
    .pipe(gulp.dest('../dist/assets/css'))
})

// Compressing 'Dev' folder for backup
gulp.task('zip', function () {
  return gulp.src('./**/**')
    .pipe(zip('bcp-.zip'))
    .pipe(gulp.dest('../../BCP'))
})

// Gulp Default Task
gulp.task('watch', function () {
  require('./server.js');
  gulp.watch('./**/assets/imgs/**', gulp.series('imgs'));
  gulp.watch('./**/assets/imgs/**', gulp.series('tinypng'));
  gulp.watch('assets/scss/**/**/*.scss', gulp.series('sass'));
  gulp.watch('assets/scss/ar.scss', gulp.series('sassRTL'));
})

gulp.task('default', gulp.series('imgs', 'tinypng', 'sassRTL', 'watch'))