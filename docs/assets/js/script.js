var doc = document,
    scrollTimer,
    resizeTimer,
    winHeight;

var rocketSite = {
  docs: {
    toggleNav: function () {
      var toggle = doc.querySelector('.docs-nav-toggle'),
          docsWrapper = doc.querySelector('.docs-wrapper'),
          nav = doc.querySelector('.docs-nav'),
          navLinks = nav.querySelectorAll('a'),
          breakpoint = 900;
      if (toggle) {
        toggle.addEventListener('click', function () {
          docsWrapper.classList.toggle((window.innerWidth >= breakpoint) ? 'hidenav' : 'shownav');
        });
        for (var i = navLinks.length; i--;) {
          navLinks[i].addEventListener('click', function () {
            if (window.innerWidth < 900) {
              docsWrapper.classList.remove('shownav');
            }
          })
        }
      }
    },
    toggleSubnav: function () {
      var headings = doc.querySelectorAll('.docs-nav h4');
      if (headings !== undefined && headings.length > 0) {
        for (var i = headings.length; i--;) {
          headings[i].addEventListener('click', function () {
            this.parentNode.classList.toggle('shrank');
          });
        }
      }
    },
    showActive: function () {
      var docLists = doc.querySelectorAll('.docs-wrapper main > section'),
          navLists = doc.querySelectorAll('.docs-wrapper nav li');
          
      for (var i = docLists.length; i--;) {
        var rect = docLists[i].getBoundingClientRect(),
            target = winHeight  * 0.4;
        if (rect.top < target && rect.bottom >= target) {
          navLists[i].classList.add('active');
        } else {
          navLists[i].classList.remove('active');
        }
      }
    },
    togglePreview: function () {
      var btns = doc.querySelectorAll('.toggle-container button');
      for (var i = btns.length; i--;) {
        btns[i].addEventListener('click', function () {
          demoContainer = this.parentNode.parentNode,
          dataToggle = this.getAttribute('data-toggle');
          demoContainer.setAttribute('data-show', dataToggle);
        });
      }
    }
  }
};

if (doc.querySelector('.docs-nav')) {
  window.addEventListener('load', function () {
    winHeight = window.innerHeight;
    rocketSite.docs.toggleNav();
    rocketSite.docs.toggleSubnav();
    rocketSite.docs.showActive();
    rocketSite.docs.togglePreview();
  });
  window.addEventListener('scroll', function () {
    clearTimeout(scrollTimer);
    scrollTimer = setTimeout(function () {
      rocketSite.docs.showActive();
    }, 100);
  });
  window.addEventListener('resize', function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      winHeight = window.innerHeight;
    }, 100);
  });
}

// clipboard
var clipboard = new Clipboard('.copy-button', {
  text: function (trigger) {
    return doc.querySelector(trigger.getAttribute('data-clipboard-target'))
      .textContent
      .replace(/s$/g, '');
  }
});
clipboard.on('success', function(e) {
    var content = e.trigger.innerHTML;
    
    e.trigger.classList.add('copied');
    e.trigger.innerHTML = 'Copied';
    setTimeout(function () {
      e.trigger.classList.remove('copied');
      e.trigger.innerHTML = content;
    }, 1000);

    e.clearSelection();
});

clipboard.on('error', function(e) {
    console.error('Action:', e.action);
    console.error('Trigger:', e.trigger);
});

var htmlEle = doc.querySelector('html');
htmlEle.classList.remove('no-js');
htmlEle.classList.add('js');

var searchBar = doc.querySelector('#component'),
    docNavs = doc.querySelectorAll('.docs-nav a'),
    len = docNavs.length,
    ids = [];

for (var i = len; i--;) {
  ids.push(docNavs[i].getAttribute('href').replace('#', ''));
}

doc.addEventListener('keydown', function (e) {
  e = e || window.event;
  var code = e.keyCode;

  if (code === 191 && searchBar !== doc.activeElement) {
    searchBar.focus();
  }
});

searchBar.addEventListener('keyup', function (e) {
  e = e || window.event;
  var code = e.keyCode;
  var value = searchBar.value;

  if (value.indexOf('/') !== -1) {
    value = searchBar.value = value.replace('/', '');
  }

  if (ids.indexOf(value) !== -1) {
    window.scrollTo(0, doc.querySelector('#' + value).getBoundingClientRect().top + document.documentElement.scrollTop);
  }
});
