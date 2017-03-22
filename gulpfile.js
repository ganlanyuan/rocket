const gulp = require('gulp');
const $ = require('gulp-load-plugins')();
const browserSync = require('browser-sync').create();
const nunjucks = require('nunjucks');

let dev = false;
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

// scss to njk
gulp.task('scssToNjk', function () {
  return gulp.src(PATHS.templates_docs + 'code/scss/*.scss')
    .pipe($.change(function(content) {
      return content.replace(/(\/\/=>\s+)/g, '');
    }))
    .pipe($.rename({extname: '.njk'}))
    .pipe($.cached('scssToNjk'))
    .pipe(gulp.dest(PATHS.templates_docs + 'code'));
});

// yml to json
gulp.task('ymlToJson', function () {
  return gulp.src(PATHS.templates_docs + 'code/*.yml')
    .pipe($.yaml({space: 2}))
    .pipe(gulp.dest(PATHS.templates_docs + 'code'));
});

// Nunjucks Task
gulp.task('html', function() {
  let data = requireUncached('./' + PATHS.templates_docs + 'code/data.json');

  data.is = function (type, obj) {
    var clas = Object.prototype.toString.call(obj).slice(8, -1);
    return obj !== undefined && obj !== null && clas === type;
  };

  data.keys = function (obj) {
    return Object.keys(obj);
  };

  return gulp.src(PATHS.templates_docs + '*.njk')
    .pipe($.plumber())
    .pipe($.nunjucks.compile(data, {
      watch: true,
      noCache: true,
    }))
    .pipe($.rename(function (path) { path.extname = ".html"; }))
    .pipe($.if(dev, $.htmltidy({
      doctype: 'html5',
      wrap: 0,
      hideComments: true,
      indent: true,
      'indent-attributes': false,
      'drop-empty-elements': false,
      'force-output': true
    }), $.htmlmin({
      collapseWhitespace: true,
      collapseInlineTagWhitespace: true,
      collapseBooleanAttributes: true,
      decodeEntities: true,
      minifyCSS: true,
      minifyJs: true,
      removeComments: true,
    })))
    .pipe($.cached('nunjucks'))
    .pipe(gulp.dest(PATHS.docs));
});

// Sass Task
gulp.task('sass', function () {  
  return gulp.src(PATHS.src_docs + 'scss/*.scss')  
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      outputStyle: 'compressed', 
      precision: 7
    }).on('error', $.sass.logError))  
    .pipe($.cached('sass'))
    .pipe($.sourcemaps.write(sourcemapDest))
    .pipe(gulp.dest(PATHS.assets_docs + 'css'))
    .pipe(browserSync.stream());
});  

gulp.task('sass-video', function () {  
  return gulp.src(PATHS.src_docs + 'scss/video/*.scss')  
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      outputStyle: 'compressed', 
      precision: 7
    }).on('error', $.sass.logError))  
    .pipe($.cached('sass-video'))
    .pipe($.sourcemaps.write(sourcemapDest))
    .pipe(gulp.dest(PATHS.assets_docs + '/css/video'))
    .pipe(browserSync.stream());
});  

gulp.task('svg-sprites', function () {
  return gulp.src(PATHS.src_docs + 'svg/sprites/*.svg')
    .pipe($.svgmin(function (file) {
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
    .pipe($.svgstore({ inlineSvg: true }))
    .pipe($.rename(NAMES.svgSprites))
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
            .pipe($.sourcemaps.init())
            .pipe($.concat(names[i]))
            .pipe($.uglify({
              // mangle: false,
              output: {
                quote_keys: true,
              },
              compress: {
                properties: false,
              }
            }))
            .on('error', errorlog)  
            .pipe($.sourcemaps.write(sourcemapDest))
            .pipe(gulp.dest(PATHS.assets + 'js'))
      );
    }

    return mergeStream(tasks)
        .pipe(browserSync.stream());

  } else if(typeof scripts.name === 'string') {
    return gulp.src(scripts.src)
        .pipe($.sourcemaps.init())
        .pipe($.concat(scripts.name))
        .pipe($.uglify())
        .on('error', errorlog)  
        .pipe($.sourcemaps.write(sourcemapDest))
        .pipe(gulp.dest(PATHS.assets + 'js'))
        .pipe(browserSync.stream());
  }
});  

// Inject Task
gulp.task('inject', function () {
  let svg4everybody = gulp.src('bower_components/svg4everybody/dist/svg4everybody.legacy.min.js')
      .pipe($.uglify());

  return gulp.src(PATHS.templates + 'parts/layout.njk')
      .pipe($.inject(svg4everybody, {
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

  gulp.watch([PATHS.templates_docs + 'code/*.yml'], ['ymlToJson']);
  gulp.watch([PATHS.templates_docs + 'code/scss/*.scss'], ['scssToNjk']);
  gulp.watch([PATHS.templates_docs + '**/*.njk', PATHS.templates_docs + 'code/*.json'], ['html']);
  gulp.watch(PATHS.docs + '**/*.scss', ['sass']);
  // gulp.watch(PATHS.src_docs + 'scss/video/*.scss', ['sass-video']);
  gulp.watch(PATHS.src_docs + 'svg/sprites/*.svg', ['svg-sprites']);
  gulp.watch(scripts.src, ['js']);
  gulp.watch(['**/*.html', 'docs/assets/js/*.js', 'docs/assets/css/*.css']).on('change', browserSync.reload);
});

// Default Task
gulp.task('default', [
  // 'html', 
  // 'sass', 
  // 'js', 
  // 'move',
  // 'svgmin', 
  // 'svg-sprites',
  // 'inject',
  'server', 
]);  