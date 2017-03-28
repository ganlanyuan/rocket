const gulp = require('gulp');
const $ = require('gulp-load-plugins')();
const browserSync = require('browser-sync').create();
const nunjucks = require('nunjucks');

let dev = false;
let sourcemapDest = '../sourcemaps';
let src = 'src/',
  assets = 'assets/',
  docs = 'docs/',
  docs__templates = 'docs/templates/',
  docs__src = 'docs/src/',
  docs__assets = 'docs/assets/',
  tests = 'tests/',
  tests__templates = 'tests/templates/',
  tests__src = 'tests/src/',
  tests__assets = 'tests/assets/';
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
  return gulp.src(docs__templates + 'code/scss/*.scss')
    .pipe($.change(function(content) {
      return content.replace(/(\/\/=>\s+)/g, '');
    }))
    .pipe($.rename({extname: '.njk'}))
    .pipe($.cached('scssToNjk'))
    .pipe(gulp.dest(docs__templates + 'code'));
});

// yml to json
gulp.task('ymlToJson', function () {
  return gulp.src(docs__templates + 'code/*.yml')
    .pipe($.yaml({space: 2}))
    .pipe(gulp.dest(docs__templates + 'code'));
});

// Nunjucks Task
gulp.task('docs', function() {
  let data = requireUncached('./' + docs__templates + 'code/data.json');

  data.is = function (type, obj) {
    var clas = Object.prototype.toString.call(obj).slice(8, -1);
    return obj !== undefined && obj !== null && clas === type;
  };

  data.keys = function (obj) {
    return Object.keys(obj);
  };

  return gulp.src(docs__templates + '*.njk')
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
    .pipe(gulp.dest(docs));
});

gulp.task('tests', function() {
  // let data = requireUncached('./' + docs__templates + 'code/data.json');
  let data = {};

  data.is = function (type, obj) {
    var clas = Object.prototype.toString.call(obj).slice(8, -1);
    return obj !== undefined && obj !== null && clas === type;
  };

  data.keys = function (obj) {
    return Object.keys(obj);
  };

  return gulp.src(docs__templates + 'tests/**/*.njk')
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
    .pipe(gulp.dest(docs + 'tests/'));
});

// Sass Task
gulp.task('sass', function () {  
  return gulp.src(docs__src + 'scss/*.scss')  
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      outputStyle: 'compressed', 
      precision: 7
    }).on('error', $.sass.logError))  
    .pipe($.cached('sass'))
    .pipe($.sourcemaps.write(sourcemapDest))
    .pipe(gulp.dest(docs__assets + 'css'))
    .pipe(browserSync.stream());
});  

gulp.task('sass-video', function () {  
  return gulp.src(docs__src + 'scss/video/*.scss')  
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      outputStyle: 'compressed', 
      precision: 7
    }).on('error', $.sass.logError))  
    .pipe($.cached('sass-video'))
    .pipe($.sourcemaps.write(sourcemapDest))
    .pipe(gulp.dest(docs__assets + '/css/video'))
    .pipe(browserSync.stream());
});  

gulp.task('svg-sprites', function () {
  return gulp.src(docs__src + 'svg/sprites/*.svg')
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
    .pipe(gulp.dest(docs__assets + 'svg'));
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
            .pipe(gulp.dest(assets + 'js'))
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
        .pipe(gulp.dest(assets + 'js'))
        .pipe(browserSync.stream());
  }
});  

// Inject Task
gulp.task('inject', function () {
  let svg4everybody = gulp.src('bower_components/svg4everybody/dist/svg4everybody.legacy.min.js')
      .pipe($.uglify());

  return gulp.src(templates + 'parts/layout.njk')
      .pipe($.inject(svg4everybody, {
        starttag: '/* svg4everybody:js */',
        endtag: '/* endinject */',
        transform: function (filePath, file) {
          return file.contents.toString().replace('height:100%;width:100%', '');
        }
      }))
      .pipe(gulp.dest(templates + 'partials'));
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

  gulp.watch([docs__templates + 'code/*.yml'], ['ymlToJson']);
  gulp.watch([docs__templates + 'code/scss/*.scss'], ['scssToNjk']);
  gulp.watch([docs__templates + '**/*.njk', docs__templates + 'code/*.json'], ['docs']);
  gulp.watch([docs__templates + 'tests/**/*.njk'], ['tests']);
  gulp.watch(docs + '**/*.scss', ['sass']);
  // gulp.watch(docs__src + 'scss/video/*.scss', ['sass-video']);
  gulp.watch(docs__src + 'svg/sprites/*.svg', ['svg-sprites']);
  gulp.watch(scripts.src, ['js']);
  gulp.watch(['**/*.html', 'docs/assets/js/*.js', 'docs/assets/css/*.css']).on('change', browserSync.reload);
});

// Default Task
gulp.task('default', [
  // 'docs', 
  // 'tests',
  // 'sass', 
  // 'js', 
  // 'move',
  // 'svgmin', 
  // 'svg-sprites',
  // 'inject',
  'server', 
]);  