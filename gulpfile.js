const gulp = require('gulp');
const $ = require('gulp-load-plugins')();
const browserSync = require('browser-sync').create();
const nunjucks = require('nunjucks');
const path = require('path');

let dev = false;
let sourcemapDest = '../sourcemaps';
let src = 'src/',
  assets = 'assets/',
  docs = 'docs/',
  docsTemplates = 'docs/templates/',
  docsSrc = 'docs/src/',
  docsAssets = 'docs/assets/',
  tests = 'tests/',
  testsTemplates = 'tests/templates/',
  testsScss = 'tests/scss/',
  testsCss = 'tests/css/',
  testsSyntax = 'tests-syntax/';
  
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
  return gulp.src(docsTemplates + 'code/scss/*.scss')
    .pipe($.change(function(content) {
      return content.replace(/(\/\/=>\s+)/g, '');
    }))
    .pipe($.rename({extname: '.njk'}))
    // .pipe($.cached('scssToNjk'))
    .pipe(gulp.dest(docsTemplates + 'code'));
});

// yml to json
gulp.task('ymlToJson', function () {
  return gulp.src(docsTemplates + 'code/*.yml')
    .pipe($.yaml({space: 2}))
    .pipe(gulp.dest(docsTemplates + 'code'));
});

// Nunjucks Task
gulp.task('docs', function() {
  let data = requireUncached('./' + docsTemplates + 'code/data.json');

  data.is = function (type, obj) {
    var clas = Object.prototype.toString.call(obj).slice(8, -1);
    return obj !== undefined && obj !== null && clas === type;
  };

  data.keys = function (obj) {
    return Object.keys(obj);
  };

  return gulp.src(docsTemplates + '*.njk')
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
    // .pipe($.cached('nunjucks'))
    .pipe(gulp.dest(docs));
});

gulp.task('tests', function() {
  let data = requireUncached('./' + testsTemplates + 'tree.json');

  data.is = function (type, obj) {
    var clas = Object.prototype.toString.call(obj).slice(8, -1);
    return obj !== undefined && obj !== null && clas === type;
  };

  data.keys = function (obj) {
    return Object.keys(obj);
  };

  data.belongTo = function (str, arr) {
    return arr.indexOf(str) !== -1;
  }

  return gulp.src(testsTemplates + '/*.njk')
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
    // .pipe($.cached('nunjucks'))
    .pipe(gulp.dest(tests));
});

gulp.task('svg-sprites', function () {
  return gulp.src(docsSrc + 'svg/sprites/*.svg')
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
    .pipe(gulp.dest(docsAssets + 'svg'));
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

  gulp.watch([docsTemplates + 'code/*.yml'], ['ymlToJson']);
  gulp.watch([docsTemplates + 'code/scss/*.scss'], function (e) {
    if (e.type !== 'deleted') {
      return gulp.src(e.path)
        .pipe($.change(function(content) {
          return content.replace(/(\/\/=>\s+)/g, '');
        }))
        .pipe($.rename({extname: '.njk'}))
        .pipe(gulp.dest(docsTemplates + 'code'));
    }
  });
  gulp.watch([docsTemplates + '**/*.njk', docsTemplates + 'code/*.json'], ['docs']);
  gulp.watch([testsTemplates + '**/*.njk'], ['tests']);
  gulp.watch([docs + '**/*.scss', testsScss + '*.scss', testsSyntax + '**/*.scss'], function (e) {
    if (e.type !== 'deleted') {
      let src, 
          dest,
          pathParsed = path.parse(e.path), 
          dir = pathParsed.dir,
          name = pathParsed.name;

      if(dir.indexOf('docs') !== -1) {
        if (dir.indexOf('video') !== -1) {
          src = e.path;
          dest = docsAssets + 'css/video';
        } else {
          src = docsSrc + 'scss/main.scss';
          dest = docsAssets + 'css';
        }
      } else if (dir.indexOf('tests-syntax') !== -1) {
        src = testsSyntax + 'tests.scss';
        dest = testsSyntax;
      } else {
        src = e.path;
        dest = testsCss;
      }

      return gulp.src(src)  
        .pipe($.plumber())
        .pipe($.if(dev, $.sourcemaps.init()))
        .pipe($.sass({
          outputStyle: 'compressed', 
          precision: 7
        }).on('error', $.sass.logError))  
        .pipe($.if(dev, $.sourcemaps.write(sourcemapDest)))
        .pipe(gulp.dest(dest));
    }
  });
  gulp.watch(docsSrc + 'svg/sprites/*.svg', ['svg-sprites']);
  gulp.watch(scripts.src, ['js']);
  gulp.watch(['**/*.html', 'docs/assets/js/*.js', 'docs/assets/css/*.css', 'tests/css/*.css']).on('change', browserSync.reload);
});

// Default Task
gulp.task('default', [
  // 'docs', 
  // 'tests',
  // 'sass-docs', 
  // 'sass-tests', 
  // 'js', 
  // 'move',
  // 'svgmin', 
  // 'svg-sprites',
  // 'inject',
  'server', 
]);  