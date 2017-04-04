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
  testsSyntax = 'test/tests-syntax/';
  
let NAMES = {
  cssMain: 'main.css',
  svgSprites: 'sprites.svg',
};

let dataDocs = requireUncached('./' + docsTemplates + 'code/data.json'),
    dataTests = requireUncached('./' + testsTemplates + 'tree.json'),
    isFn = function (type, obj) {
      var clas = Object.prototype.toString.call(obj).slice(8, -1);
      return obj !== undefined && obj !== null && clas === type;
    },
    keysFn = function (obj) {
      return Object.keys(obj);
    },
    belongToFn = function (str, arr) {
      return arr.indexOf(str) !== -1;
    };

function errorlog (error) {  
  console.error.bind(error);  
  this.emit('end');  
}  
function requireUncached( $module ) {
  delete require.cache[require.resolve( $module )];
  return require( $module );
}

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

// Server & Watch Tasks
gulp.task('server', function() {
  browserSync.init({
    server: {
      baseDir: './'
    },
    open: false,
    notify: false
  });

  // yml to json
  gulp.watch([docsTemplates + 'code/*.yml'], function (e) {
    if (e.type !== 'deleted') {
      return gulp.src(e.path)
        .pipe($.yaml({space: 2}))
        .pipe(gulp.dest(docsTemplates + 'code'));
    }
  });

  // scss to njk
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

  // njk to html
  gulp.watch([docsTemplates + '**/*.njk', docsTemplates + 'code/*.json', testsTemplates + '**/*.njk'], function (e) {
    if (e.type !== 'deleted') {
      let data, dest;

      if (e.path.indexOf('docs/') !== -1) {
        data = dataDocs;
        dest = docs;
      } else {
        data = dataTests;
        dest = tests;
      }

      data.is = isFn;
      data.keys = keysFn;
      data.belongTo = belongToFn;

      return gulp.src(e.path)
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
        .pipe(gulp.dest(dest));
    }
  });

  // scss to css
  gulp.watch([docs + '**/*.scss', tests + '**/*.scss'], function (e) {
    if (e.type !== 'deleted') {
      let src, 
          dest,
          pathParsed = path.parse(e.path), 
          dir = pathParsed.dir,
          name = pathParsed.name;

      if(dir.indexOf('docs/') !== -1) {
        if (dir.indexOf('video') !== -1) {
          src = e.path;
          dest = docsAssets + 'css/video';
        } else {
          src = docsSrc + 'scss/main.scss';
          dest = docsAssets + 'css';
        }
      } else if (dir.indexOf('tests-syntax/') !== -1) {
        src = testsSyntax + 'tests.scss';
        dest = testsSyntax;
      } else {
        src = e.path;
        dest = tests + 'css';
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

  // docs: svg-sprites 
  gulp.watch(docsSrc + 'svg/sprites/*.svg', function (e) {
    if (e.type !== 'deleted') {
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
    }
  });

  // reload
  gulp.watch(['**/*.html', '**/css/*.css', '**/js/*.js']).on('change', browserSync.reload);
});

// Default Task
gulp.task('default', [
  // 'inject',
  'server', 
]);  