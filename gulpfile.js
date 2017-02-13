const gulp = require('gulp');
const path = require('path');
const mergeStream = require('merge-stream');
const browserSync = require('browser-sync').create();
const rename = require('gulp-rename');
const libsass = require('gulp-sass');
const rubysass = require('gulp-ruby-sass');
const sourcemaps = require('gulp-sourcemaps');
const modernizr = require('gulp-modernizr');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const imagemin = require('gulp-imagemin');
const svgmin = require('gulp-svgmin');
const svgstore = require('gulp-svgstore');
const inject = require('gulp-inject');
const uncss = require('gulp-uncss');
const nunjucks = require('gulp-nunjucks');
const htmltidy = require('gulp-htmltidy');

let sassLang = 'libsass';
let sourcemapDest = '../sourcemaps';
let PATHS = {
  src: 'src/',
  assets: 'assets/',
  docs: 'docs/',
  templates_docs: 'docs/templates/',
  src_docs: 'docs/src/',
  assets_docs: 'docs/assets/',
};
let NAMES = {
  cssMain: 'main.css',
  svgSprites: 'sprites.svg',
};
let scripts = {
  src:[
    'bower_components/go-native/dist/go-native.js',
    'bower_components/sticky/dist/sticky.native.js',
    'src/js/script.js'
  ],
  name: 'script.js',
};

function errorlog (error) {  
  console.error.bind(error);  
  this.emit('end');  
}  
function requireUncached( $module ) {
  delete require.cache[require.resolve( $module )];
  return require( $module );
}

// Nunjucks Task
gulp.task('nunjucks', function() {
  let data = requireUncached('./' + PATHS.templates_docs + 'data.json');
  data.year = new Date().getFullYear();

  let imageCount = 0;
  data.getImageCount = function () { return imageCount += 1; };

  return gulp.src(PATHS.templates_docs + '*.njk')
    .pipe(nunjucks.compile(data), {
      watch: true,
      noCache: true,
    })
    .pipe(rename(function (path) { path.extname = ".html"; }))
    .pipe(htmltidy({
      doctype: 'html5',
      wrap: 0,
      hideComments: true,
      indent: true,
      'indent-attributes': false,
      'drop-empty-elements': false,
      'force-output': true
    }))
    .pipe(gulp.dest(PATHS.docs));
});

// Sass Task
gulp.task('sass', function () {  
  return gulp.src(PATHS.src + 'scss/**/*.scss')  
      .pipe(sourcemaps.init())
      .pipe(libsass({
        outputStyle: 'compressed', 
        precision: 7
      }).on('error', libsass.logError))  
      .pipe(sourcemaps.write(sourcemapDest))
      .pipe(gulp.dest(PATHS.assets + 'css'))
      .pipe(browserSync.stream());
});  

gulp.task('sass-docs', function () {  
  return gulp.src(PATHS.src_docs + 'scss/**/*.scss')  
      .pipe(sourcemaps.init())
      .pipe(libsass({
        outputStyle: 'compressed', 
        precision: 7
      }).on('error', libsass.logError))  
      .pipe(sourcemaps.write(sourcemapDest))
      .pipe(gulp.dest(PATHS.assets_docs + 'css'))
      .pipe(browserSync.stream());
});  

gulp.task('svg-sprites', function () {
  return gulp.src(PATHS.src_docs + 'svg/sprites/*.svg')
    .pipe(svgmin(function (file) {
      let prefix = path.basename(file.relative, path.extname(file.relative));
      return {
        plugins: [{
          cleanupIDs: {
            prefix: prefix + '-',
            minify: true
          }
        }],
        // js2svg: { pretty: true }
      }
    }))
    .pipe(svgstore({ inlineSvg: true }))
    .pipe(rename(NAMES.svgSprites))
    .pipe(gulp.dest(PATHS.assets_docs + 'svg'));
});

// JS Task  
gulp.task('js', function () {  
  if (scripts.name instanceof Array) {
    let tasks = [], 
        srcs = scripts.src,
        names = scripts.name;
        
    for (let i = 0; i < srcs.length; i++) {
      tasks.push(
        gulp.src(srcs[i])
            .pipe(sourcemaps.init())
            .pipe(concat(names[i]))
            .pipe(uglify({
              // mangle: false,
              output: {
                quote_keys: true,
              },
              compress: {
                properties: false,
              }
            }))
            .on('error', errorlog)  
            .pipe(sourcemaps.write(sourcemapDest))
            .pipe(gulp.dest(PATHS.assets + 'js'))
      );
    }

    return mergeStream(tasks)
        .pipe(browserSync.stream());

  } else if(typeof scripts.name === 'string') {
    return gulp.src(scripts.src)
        .pipe(sourcemaps.init())
        .pipe(concat(scripts.name))
        .pipe(uglify())
        .on('error', errorlog)  
        .pipe(sourcemaps.write(sourcemapDest))
        .pipe(gulp.dest(PATHS.assets + 'js'))
        .pipe(browserSync.stream());
  }
});  

// Inject Task
gulp.task('inject', function () {
  let svg4everybody = gulp.src('bower_components/svg4everybody/dist/svg4everybody.legacy.min.js')
      .pipe(uglify());

  return gulp.src(PATHS.templates + 'partials/layout.njk')
      .pipe(inject(svg4everybody, {
        starttag: '/* svg4everybody:js */',
        endtag: '/* endinject */',
        transform: function (filePath, file) {
          return file.contents.toString().replace('height:100%;width:100%', '');
        }
      }))
      .pipe(gulp.dest(PATHS.templates + 'partials'));
});

// Server Task
gulp.task('server', function() {
  browserSync.init({
    server: {
      baseDir: './'
    },
    open: false,
    notify: false
  });
});

// Watch Task
gulp.task('watch', function () {
  gulp.watch([PATHS.templates_docs + '**/*.njk', PATHS.templates_docs + '*.json'], ['nunjucks']);
  gulp.watch(PATHS.src_docs + 'scss/**/*.scss', ['sass-docs']);
  gulp.watch(PATHS.src_docs + 'svg/sprites/*.svg', ['svg-sprites']);
  gulp.watch(scripts.src, ['js']);
  gulp.watch(['**/*.html', 'docs/assets/js/*.js']).on('change', browserSync.reload);
});

// Default Task
gulp.task('default', [
  // 'nunjucks', 
  // 'sass', 
  // 'js', 
  // 'move',
  // 'svgmin', 
  // 'svg-sprites',
  // 'inject',
  'server', 
  'watch',
]);  