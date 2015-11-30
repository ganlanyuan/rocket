// responsiveTable(obj);
function windowWidth () {
  var d = document, w = window,
  winW = w.innerWidth || d.documentElement.clientWidth || d.body.clientWidth;
  return winW;  
}

function windowResize (fn) {
  if (typeof addEventListener !== "undefined") {
    window.addEventListener('resize', fn, false);
  } else if (typeof attachEvent !== "undefined") {
    window.attachEvent('onresize', fn);
  }
}

var updated = false;
function responsiveTable (el, breakpoint) {
  var ww = windowWidth();

  windowResize(function  () {
    ww = windowWidth();
    
    if (ww <= breakpoint) {
      if (!updated) {
        responsiveTableRun(el);
      }
    } else {
      if (updated) {
        responsiveTableRemove(el);
      };
    }
  });

  if (ww <= breakpoint) {
    if (!updated) {
      responsiveTableRun(el);
    }
  }
}

function responsiveTableRun (el) {
  if (el.length === undefined) {
    el = [el];
  }

  for (var i = 0; i < el.length; i++) {
    var container = el[i];
    var table = container.querySelector('table');

    if (table.className.indexOf('pinned') === -1) {
      table.className += ' pinned';
    }

    var clonedTable = table.cloneNode(true);
    clonedTable.className = clonedTable.className.replace('pinned', 'scrollable').trim();
    container.appendChild(clonedTable);
  };

  updated = true;
}

function responsiveTableRemove (el) {
  if (el.length === undefined) {
    el = [el];
  }

	for (var i = 0; i < el.length; i++) {
		var container = el[i];
    var pinnedTable = container.querySelector('.pinned');
		var scrollableTable = container.querySelector('.scrollable');

    container.removeChild(scrollableTable);
    pinnedTable.className = pinnedTable.className.replace('pinned', '').trim();
  };

  updated = false;
}
