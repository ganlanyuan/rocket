var config = {
  sassLang: 'libsass',
  sourcemaps: 'sourcemaps',
  libsass_options: {
    outputStyle: 'expanded', 
    precision: 7
  },
  rubysass_options: {
    style: 'expanded', 
    precision: 7,
    sourcemap: true
  },
  server: {
    base: '.',
    hostname: '0.0.0.0',
    keepalive: true,
    stdio: 'ignore',
  },
  browserSync: {
    proxy: '0.0.0.0:8000',
    open: true,
    notify: false
  },
  
  // styles
  sass: {
    src: ['tests/html/scss/*.scss', 'demos/scss/*.scss'],
    dest: ['tests/html/css', 'demos/css'],
  },

  // scripts
  js: {
    src:["src/js/**/*.js", "src/js/base/*.js"],
    name: ['kit.js', 'kit.core.js'],
    dest: 'dist',
    options: {
      // mangle: false,
      output: {
        quote_keys: true,
      },
      compress: {
        properties: false,
      }
    }
  },
  
  // watch
  watch: {
    php: '**/*.php',
    html: '**/*.html'
  },
};

var gulp = require('gulp');
var php = require('gulp-connect-php');
var libsass = require('gulp-sass');
var rubysass = require('gulp-ruby-sass');
var sourcemaps = require('gulp-sourcemaps');

var modernizr = require('gulp-modernizr');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var svgstore = require('gulp-svgstore');
var path = require('path');
var svgmin = require('gulp-svgmin');
var svg2png = require('gulp-svg2png');
var colorize = require('gulp-colorize-svgs');
var inject = require('gulp-inject');

var browserSync = require('browser-sync').create();

var rename = require('gulp-rename');
var mergeStream = require('merge-stream');

function errorlog (error) {  
  console.error.bind(error);  
  this.emit('end');  
}  

gulp.task('sass', function () {  
  var tasks = [], 
      srcs = config.sass.src,
      dests = config.sass.dest;

  if (config.sassLang === 'libsass') {
    for (var i = 0; i < srcs.length; i++) {
      tasks.push(
        gulp.src(srcs[i])  
            .pipe(sourcemaps.init())
            .pipe(libsass().on('error', libsass.logError))
            .pipe(sourcemaps.write(config.sourcemaps))
            .pipe(gulp.dest(dests[i]))
      );
    }
  } else {
    for (var i = 0; i < srcs.length; i++) {
      tasks.push(
        rubysass(srcs[i], config.rubysass_options)  
            .pipe(sourcemaps.init())
            .on('error', rubysass.logError)  
            .pipe(sourcemaps.write(config.sourcemaps))
            .pipe(gulp.dest(dests[i]))
      );
    }
  }

  return mergeStream(tasks)
        .pipe(browserSync.stream());
});

// JS Task  
gulp.task('js', function () {  
  var tasks = [], 
      srcs = config.js.src,
      names = config.js.name;

  for (var i = 0; i < srcs.length; i++) {
    tasks.push(
      gulp.src(srcs[i])
          .pipe(sourcemaps.init())
          .pipe(concat(names[i]))
          .on('error', errorlog)  
          .pipe(gulp.dest(config.js.dest))
          .pipe(rename(names[i].replace('.js', '.min.js')))
          .pipe(uglify(config.js.options))
          .pipe(sourcemaps.write(config.sourcemaps))
          .pipe(gulp.dest(config.js.dest))
    );
  }

  return mergeStream(tasks)
        .pipe(browserSync.stream());
});

// Server
gulp.task('server', function () {
  php.server(config.server);
});
gulp.task('sync', ['server'], function() {
  browserSync.init(config.browserSync);
});

// watch
gulp.task('watch', function () {
  gulp.watch(['tests/html/scss/*.scss', 'demos/scss/*.scss'], function (e) {
    var src = e.path.replace('/www/web/', ''), dest;
    if (e.path.indexOf('tests/') !== -1) {
      dest = config.sass.dest[0];
    } else {
      dest = config.sass.dest[1];
    }
    
    if (config.sassLang === 'libsass') {
      return gulp.src(src)  
          .pipe(sourcemaps.init())
          .pipe(libsass().on('error', libsass.logError))
          .pipe(sourcemaps.write(config.sourcemaps))
          .pipe(gulp.dest(dest))
          .pipe(browserSync.stream());
    } else {
      return rubysass(src, config.rubysass_options)  
          .pipe(sourcemaps.init())
          .on('error', rubysass.logError)  
          .pipe(sourcemaps.write(config.sourcemaps))
          .pipe(gulp.dest(dest))
          .pipe(browserSync.stream());
    }
  });
  gulp.watch(config.js.src, ['js']);
  gulp.watch(config.watch.php).on('change', browserSync.reload);
  gulp.watch(config.watch.html).on('change', browserSync.reload);
})

// Default Task
gulp.task('default', [
  'sass', 
  'js',
  'sync', 
  'watch',
]); 