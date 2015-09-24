var buildDir = 'r4-build';
//
var gulp = require('gulp'),
  htmlclean = require('gulp-htmlclean'),
  uglify = require('gulp-uglify'),
  concat = require('gulp-concat'),
  minifyCSS = require('gulp-minify-css'),
  autoprefixer = require('gulp-autoprefixer'),
  imagemin = require('gulp-imagemin'),
  jshint = require('gulp-jshint'),
  cache = require('gulp-cache'),
  pngcrush = require('imagemin-pngcrush'),
  sass = require('gulp-sass'),
  del = require('del'),
  svgstore = require('gulp-svgstore');

gulp.task('login',function(){
  gulp.src('login/*')
    .pipe(gulp.dest('../'+buildDir+'/login'));
});

gulp.task('svgstore', function () {
    return gulp
        .src('assets/svgs/*.svg')
        .pipe(imagemin())
        .pipe(svgstore({ inlineSvg: true }))
        .pipe(gulp.dest('../'+buildDir+'/assets'));
});


gulp.task('cleaner', function (cb) {
  del([
    '../'+buildDir+'**/*'
  ],{force: true}, cb);
});


gulp.task('js', function () {
  gulp.src([ 'js/plugins/*.js', 'js/site.js', 'js/modules/*.js'])
    .pipe(uglify())
    .on('error', console.error.bind(console))
    .pipe(concat('main.js'))
    .pipe(gulp.dest('../'+buildDir+'/js'));
  gulp.src('js/inline-load.js')
    .pipe(uglify())
    .on('error', console.error.bind(console))
    .pipe(gulp.dest('../'+buildDir+'/js'));
});

gulp.task('sass', function () {
  gulp.src(['sass/main.scss', 'sass/inline-modules/*.scss'])
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(concat('main.css'))
    .pipe(minifyCSS({keepBreaks:false, keepSpecialComments: 0}))
    .pipe(gulp.dest('../'+buildDir+'/css'));
  gulp.src(['sass/expanded.scss', 'sass/expanded-modules/*.scss'])
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(concat('expanded.css'))
    .pipe(minifyCSS({keepBreaks:false, keepSpecialComments: 0}))
    .pipe(gulp.dest('../'+buildDir+'/css'));
  gulp.src('sass/ie-fixes.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(minifyCSS({keepBreaks:false, keepSpecialComments: 0}))
    .pipe(gulp.dest('../'+buildDir+'/css'));
  gulp.src('editor-styles.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(minifyCSS({keepBreaks:false, keepSpecialComments: 0}))
    .pipe(gulp.dest('../'+buildDir));
})



gulp.task('imgmin', function () {
  gulp.src('assets/imgs/**/*')
    .pipe(imagemin({interlaced: true, progressive: true,svgoPlugins: [{removeViewBox: false}],use: [pngcrush()]}))
    .pipe(gulp.dest('../'+buildDir+'/assets/imgs'));
});

gulp.task('templatecrush', function() {
  gulp.src(['*.php','*.html','!custom-module-functions.php'])
    .pipe(htmlclean({}))
    .pipe(gulp.dest('../'+buildDir));
});

gulp.task('clear', function (done) {
  return cache.clearAll(done);
});

gulp.task('fontdump', function(){
  gulp.src('assets/fonts/**/*')
    .pipe(gulp.dest('../'+buildDir+'/assets/fonts'));
});

gulp.task('wpdump', function(){
  gulp.src(['style.css', 'screenshot.png'])
    .pipe(gulp.dest('../'+buildDir));
});

gulp.task('lint', function() {
  return gulp.src(['js/site.js', 'modules/*.js', 'js/inline-load.js'])
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});




gulp.task('watch', function() {
    gulp.watch('js/**/*.js', ['js']);
    gulp.watch(['sass/**/*', 'editor-styles.scss'], ['sass']);
    gulp.watch('assets/imgs/**/*', ['imgmin']);
    gulp.watch('assets/fonts/**/*', ['fontdump']);
    gulp.watch(['*.php', '*.html'], ['templatecrush']);
    gulp.watch(['style.css', 'screenshot.png'], ['wpdump']);
    gulp.watch('login/*', ['login']);
    gulp.watch(['assets/svgs/*.svg'], ['svgstore']);
});
gulp.task('build', [ 'clear', 'js', 'imgmin', 'templatecrush', 'fontdump', 'wpdump','sass', 'login', 'svgstore']);
