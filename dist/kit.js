// on off click mouseover mouseout focus blur submit keydown keyup
// find eq filter first last parent parents children firstChild lastChild siblings prev prevAll next nextAll
// hide show fadeIn remove 
// text html attr css addClass removeClass toggleClass hasClass 
// outerWidth outerHeight getTop getLeft offset(left top)
// append prepend wrap wrapAll

// KIT START
// DOM MANIPULATION
// HANDLE ATTR
// STYLE INSTANCE METHODS
// STYLE INSTANCE METHODS
// HANDLE NODE
// GET ELEMENT SIZE
// GET WINDOW SIZE

var dome = function (args, el) {
	if ( args.length > 0 ) {
		for (var i = 0; i < args.length; i++) {
			el[i] = args[i];
		}
		el.length = args.length;
	}
};

// ========== KIT START ==========
// (function (window, undefined) {
var kit = function (selector) {
	if ( window === this ) {return new kit(selector); }
	var type = typeof selector;
	if (type === 'string') {
		var result = document.querySelectorAll(selector);
		dome(result, this);
	} else if (type === "object" && selector.nodeType !== "undefined" && selector.nodeType === 1) {
		this[0] = selector;
		this.length = 1;
	}
	return this;
};

// ========= UTILS =========
var whitespace = "[\\x20\\t\\r\\n\\f]",
characterEncoding = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
identifier = characterEncoding.replace( "w", "w#" ),
attributes = "\\[" + whitespace + "*(" + characterEncoding + ")(?:" + whitespace +
	"*([*^$|!~]?=)" + whitespace +
	"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + identifier + "))|)" + whitespace +
	"*\\]",
ID = new RegExp( "^#(" + characterEncoding + ")" ),
CLASS = new RegExp( "^\\.(" + characterEncoding + ")" ),
TAG = new RegExp( "^(" + characterEncoding.replace( "w", "w*" ) + ")" ),
ATTR = new RegExp( "^" + attributes );

kit.filter = function (selector, els) {
	var match = [];
	if (selector.match(TAG)) {
		for (var i = 0; i < els.length; i++) {
			if(els[i].tagName.toLowerCase() === selector.replace(/(^\s*)|(\s*$)/g, '')){
				match.push(els[i]);
			}
		}
	} else if(selector.match(CLASS)){
		for (var j = 0; j < els.length; j++) {
			if ((" " + els[j].className + " ").indexOf(" " + selector.replace(/(^\s*\.)|(\s*$)/g, '') + " ") > -1) {
				match.push(els[j]);
			}
		}
	} else if(selector.match(ID)){
		for (var k = 0; k < els.length; k++) {
			if ((" " + els[k].getAttribute('id') + " ").indexOf(" " + selector.replace(/(^\s*\#)|(\s*$)/g, '') + " ") > -1) {
				match.push(els[k]);
			}
		}
	} else if(selector.match(ATTR)){
		for (var q = 0; q < els.length; q++) {
			if (els[q].hasAttribute(selector.replace(/(^\s*\[)|(\]\s*$)/g, ''))) {
				match.push(els[q]);
			}
		}
	}

	return match;
};

kit.prototype.map = function (callback) {
	var results = [];
	for (var i = 0; i < this.length; i++) {
		results.push(callback.call(this, this[i], i));
	}
	return results;
};

kit.prototype.mapOne = function (callback) {
	var m = this.map(callback);
	return m.length > 1 ? m : m[0];
};

kit.prototype.forEach = function (callback) {
	this.map(callback);
	return this; 
};

kit.prototype.filter = function (selector) {
	var results = kit.filter(selector, this);

	if (results.length > 0) {
		dome(results, this);
		return this;
	} else { return; }
};

// ========= EVENT STATIC METHODS =========
if (typeof addEventListener !== "undefined") {
	kit.addEvent = function(obj, evt, fn) {
		obj.addEventListener(evt, fn, false);
	};

	kit.removeEvent = function(obj, evt, fn) {
		obj.removeEventListener(evt, fn, false);
	};
} else if (typeof attachEvent !== "undefined") {
	kit.addEvent = function(obj, evt, fn) {
		var fnHash = "e_" + evt + fn;

		obj[fnHash] = function() {
			var type = event.type,
				relatedTarget = null;

			if (type === "mouseover" || type === "mouseout") {
				relatedTarget = (type === "mouseover") ? event.fromElement : event.toElement;
			}
			
			fn.call(obj, {
				target : event.srcElement,
				type : type,
				relatedTarget : relatedTarget,
				_event : event,
				preventDefault : function() {
					this._event.returnValue = false;
				},
				stopPropagation : function() {
					this._event.cancelBubble = true;
				}
			});
		};

		obj.attachEvent("on" + evt, obj[fnHash]);
	};

	kit.removeEvent = function(obj, evt, fn) {
		var fnHash = "e_" + evt + fn;

		if (typeof obj[fnHash] !== "undefined") {
			obj.detachEvent("on" + evt, obj[fnHash]);
			delete obj[fnHash];
		}
	};
} else {
	kit.addEvent = function(obj, evt, fn) {
		obj["on" + evt] = fn;
	};

	kit.removeEvent = function(obj, evt) {
		obj["on" + evt] = null;
	};
}

// ========= EVENT INSTANCE METHODS =========
kit.prototype.on = function (evt, fn) {
	return this.forEach(function (el) {
		kit.addEvent(el, evt, fn);
	});
};

kit.prototype.off = function (evt, fn) {
	return this.forEach(function (el) {
		kit.removeEvent(el, evt, fn);
	});
};

kit.prototype.click = function(fn) {
	return this.forEach(function (el) {
		kit.addEvent(el, 'click', fn);
	});
};

kit.prototype.mouseover = function(fn) {
	return this.forEach(function (el) {
		kit.addEvent(el, 'mouseover', fn);
	});
};

kit.prototype.mouseout = function(fn) {
	return this.forEach(function (el) {
		kit.addEvent(el, 'mouseout', fn);
	});
};

kit.prototype.focus = function(fn) {
	return this.forEach(function (el) {
		kit.addEvent(el, 'focus', fn);
	});
};

kit.prototype.blur = function(fn) {
	return this.forEach(function (el) {
		kit.addEvent(el, 'blur', fn);
	});
};

kit.prototype.submit = function(fn) {
	return this.forEach(function (el) {
		kit.addEvent(el, 'submit', fn);
	});
};

kit.prototype.keydown = function(fn) {
	return this.forEach(function (el) {
		kit.addEvent(el, 'keydown', fn);
	});
};

kit.prototype.keyup = function(fn) {
	return this.forEach(function (el) {
		kit.addEvent(el, 'keyup', fn);
	});
};

// ========== DOM MANIPULATION ==========
kit.prototype.hide = function() {
	return this.forEach(function (el) {
		el.style.display = 'none';
	});
};

kit.prototype.show = function() {
	return this.forEach(function (el) {
		el.style.display = 'inherit';
	});
};

kit.prototype.fadeIn = function (time) {
	return this.forEach(function (el) {
		var opacity = 0;

		el.style.opacity = 0;
		el.style.filter = '';

		var last = +new Date();
		var tick = function() {
		  opacity += (new Date() - last) / time;
		  el.style.opacity = opacity;
		  el.style.filter = 'alpha(opacity=' + (100 * opacity) || 0 + ')';

		  last = +new Date();

		  if (opacity < 1) {
		    (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16);
		  }
		};

		tick();
	});
};

kit.prototype.find = function (selector) {
	var results = [];
	if (typeof selector === 'string') {
		this.forEach(function (el) {
			var selection = el.querySelectorAll(selector);
			for (var i = 0; i < selection.length; i++) {
				results.push(selection[i]);
			}
		});
	}
	if (results.length > 0) {
		dome(results, this);
		return this;
	} else { return; }
};

kit.eq = function( args, i ) {
	if (args.length > i) {
		return kit(args[i]);
	}
};

kit.prototype.eq = function (i) {
	return kit.eq(this, i);
};

kit.prototype.first = function () {
	return kit.eq(this, 0);
};

kit.prototype.last = function () {
	return kit.eq(this, this.length-1);
};

kit.prototype.parent = function () {
	var results = [];
	this.forEach(function (el) {
		results.push(el.parentNode);
	});

	if (results.length > 0) {
		dome(results, this);
		return this;
	} else { return; }
};

kit.prototype.prev = function () {
	var results = [];
	this.forEach(function (el) {
		do { el = el.previousSibling; } while ( el && el.nodeType !== 1 );
		results.push(el);
	});

	if (results.length > 0) {
		dome(results, this);
		return this;
	} else { return; }
};

kit.prototype.next = function () {
	var results = [];
	this.forEach(function (el) {
		do { el = el.nextSibling; } while ( el && el.nodeType !== 1 );
		results.push(el);
	});

	if (results.length > 0) {
		dome(results, this);
		return this;
	} else { return; }
};

kit.prototype.siblings = function (selector) {
	var results = [],
			type = typeof selector;
	this.forEach(function (el) {
		var siblings = el.parentNode.children;
		for (var i = 0; i < siblings.length; i++) {
			if (siblings[i] !== el) {
				results.push(siblings[i]);
			}
		}
	});
	if (type === 'string') {
		results = kit.filter(selector, results);
	}

	if (results.length > 0) {
		dome(results, this);
		return this;
	} else { return; }
};

kit.prototype.parents = function (selector) {
	if (typeof selector !== 'string') {return;}
	var results = [],
			parent = [];
	this.forEach(function (el) {
		while(el.parentNode && el.parentNode.tagName){
			parent.push(el.parentNode);
			el = el.parentNode;
		}
	});
	results = kit.filter(selector, parent);

	if (results.length > 0) {
		dome(results, this);
		return this;
	} else { return; }
};

kit.prototype.children = function (selector) {
	var children = [],
			type = typeof selector;
	this.forEach(function (el) {
		for (var i=el.children.length; i--;){
			if (el.children[i].nodeType === 1){
				children.unshift(el.children[i]);
			}
		}
	});
	if (type !== 'undefined' && type === 'string') {
		children = kit.filter(selector, children);
	}

	if (children.length > 0) {
		dome(children, this);
		return this;
	} else { return; }
};

kit.prototype.firstChild = function (selector) {
	var type = typeof selector;
	if (type !== 'undefined' && type === 'string') {
		return this.children(selector).eq(0);
	} else if(type === 'undefined'){
		return this.children().eq(0);
	}
};

kit.prototype.lastChild = function (selector) {
	var type = typeof selector;
	if (type !== 'undefined' && type === 'string') {
		return this.children(selector).last();
	} else if(type === 'undefined'){
		return this.children().last();
	}
};

kit.index = function(obj, current){
	for (var i = 0;i < obj.length; i++) {
		if (obj[i] === current) {
			return i;
		}
	}
};

kit.prototype.prevAll = function () {
	var results = [];
	this.forEach(function (el) {
		var siblings = el.parentNode.children,
				index = kit.index(siblings, el);
		for (var i = 0; i < index; i++) {
			results.push(siblings[i]);
		}
	});

	if (results.length > 0) {
		dome(results, this);
		return this;
	} else { return; }
};

kit.prototype.nextAll = function () {
	var results = [];
	this.forEach(function (el) {
		var siblings = el.parentNode.children,
				index = kit.index(siblings, el);
		for (var i = siblings.length-1; i > index; i--) {
			results.push(siblings[i]);
		}
	});

	if (results.length > 0) {
		dome(results, this);
		return this;
	} else { return; }
};

// ========== HANDLE ATTR ==========
kit.prototype.text = function (text) {
	if (typeof text !== "undefined") {
		return this.forEach(function (el) {
			if (el.textContent) {
				el.textContent = text;
			} else{
				el.innerText = text;
			}
		});
	} else {
		return this.mapOne(function (el) {
			if (el.textContent) {
				return el.textContent;
			} else{
				return el.innerText;
			}
		});
	}
};

kit.prototype.html = function (html) {
	if (typeof html !== "undefined") {
		return this.forEach(function (el) {
			el.innerHTML = html;
		});
	} else {
		return this.mapOne(function (el) {
			return el.innerHTML;
		});
	}
};

kit.prototype.attr = function (attr, val) {
	if (typeof val !== 'undefined') {
		return this.forEach(function(el) {
			el.setAttribute(attr, val);
		});
	} else {
		return this.mapOne(function (el) {
			return el.getAttribute(attr);
		});
	}
};

kit.prototype.hasAttr = function (attr) {
	return this.mapOne(function (el) {
		return el.hasAttribute(attr);
	});
};

kit.prototype.removeAttr = function (attr) {
	return this.forEach(function (el) {
		el.removeAttribute(attr);
	});
};

// ========== STYLE INSTANCE METHODS ==========
kit.css = function(el, css, value) {
	var cssType = typeof css,
		valueType = typeof value,
		elStyle = el.style;

	if (cssType !== "undefined" && valueType === "undefined") {
		if (cssType === "object") {
			// set style info
			for (var prop in css) {
				if (css.hasOwnProperty(prop)) {
					elStyle[toCamelCase(prop)] = css[prop];
				}
			}
		} else if (cssType === "string") {
			// get style info for specified property
			return getStyle(el, css);
		} else {
			throw { message: "Invalid parameter passed to css()" };
		}

	} else if (cssType === "string" && valueType === "string") {
		elStyle[toCamelCase(css)] = value;

	} else {
		throw { message: "Invalid parameters passed to css()" };
	}
};

kit.getCurrentStyle = function(el, css) {
  return el.currentStyle ? el.currentStyle[css] : getComputedStyle(el, null)[css];
};

kit.hasClass = function(el, value) {   
	return (" " + el.className + " ").indexOf(" " + value + " ") > -1;
};

kit.addClass = function(el, value) {
	var className = el.className;
	
	if (!className) {
		el.className = value;
	} else {
		var classNames = value.split(/\s+/),
			l = classNames.length;

		for ( var i = 0; i < l; i++ ) {		    
			if (!this.hasClass(el, classNames[i])) {
				className += " " + classNames[i];
			}
		}

		el.className = className.trim();
	}
};

kit.removeClass = function(el, value) {
	if (value) {
		var classNames = value.split(/\s+/),
			className = " " + el.className + " ",
			l = classNames.length;

		for (var i = 0; i < l; i++) {
			className = className.replace(" " + classNames[i] + " ", " ");
		}

		el.className = className.trim();

	} else {
		el.className = "";
	}
};

kit.toggleClass = function(el, value) {
	var classNames = value.split(/\s+/),
		i = 0,
		className;

	while (className = classNames[i++]) {
		this[this.hasClass(el, className) ? "removeClass" : "addClass"](el, className);
	}
};

// ========== STYLE INSTANCE METHODS ==========
kit.prototype.css = function(css, value) {
	return this.forEach(function (el) {
		return kit.css(el, css, value);
	});
};

kit.prototype.getCurrentStyle = function(css) {
  return this.mapOne(function (el) {
    return kit.getCurrentStyle(el, css);
  });
};

kit.prototype.addClass = function(value) {
	return this.forEach(function (el) {
		kit.addClass(el, value);
	});
};

kit.prototype.removeClass = function(value) {
	return this.forEach(function (el) {
		kit.removeClass(el, value);
	});
};

kit.prototype.toggleClass = function(value) {
	return this.forEach(function (el) {
		kit.toggleClass(el, value);
	});
};

kit.prototype.hasClass = function(value) {
	return this.mapOne(function (el) {
		return kit.hasClass(el, value);
	});
};

// ========== HANDLE NODE ==========
kit.createElement = function(obj) {
	if (!obj || !obj.tagName) {
		throw { message : "Invalid argument" };
	}

	var el = document.createElement(obj.tagName);
	obj.id && (el.id = obj.id);
	obj.className && (el.className = obj.className);
	obj.html && (el.innerHTML = obj.html);
	
	if (typeof obj.attributes !== "undefined") {
		var attr = obj.attributes,
			prop;

		for (prop in attr) {
			if (attr.hasOwnProperty(prop)) {
				el.setAttribute(prop, attr[prop]);
			}
		}
	}

	if (typeof obj.children !== "undefined") {
		var child,
			i = 0;

		while (child = obj.children[i++]) {
			el.appendChild(this.createElement(child));
		}
	}

	return el;
};
// var el = kit.createElement({
// 	tagName: 'div',
// 	id: 'foo',
// 	className: 'foo',
// 	children: [{
// 		tagName: 'div',
// 		html: '<b>Hello, creatElement</b>',
// 		attributes: {
// 			'am-button': 'primary'
// 		}
// 	}]
// });

kit.prototype.clone = function () {
	return this.forEach(function (el) {
		el.cloneNode(true);
	});
};

kit.prototype.remove = function () {
	return this.forEach(function (el) {
		return el.parentNode.removeChild(el);
	});
};

kit.prototype.append = function(data) {
	if (typeof data.nodeType !== "undefined" && data.nodeType === 1) {
		return this.forEach(function (el) {
			// var from = data.parentNode;
			el.appendChild(data);
			// redrawElement(from); // fix IE8- overlapping when using insertBefore
		});
	} else if (typeof data === "string") {
		return this.forEach(function (el) {
			el.insertAdjacentHTML('afterend', data);
		});
	}
};

kit.prototype.prepend = function(data) {
	if (typeof data.nodeType !== "undefined" && data.nodeType === 1) {
		return this.forEach(function (el) {
			// var from = data.parentNode;
			el.insertBefore(data, el.firstChild);
			// redrawElement(from); // fix IE8- overlapping when using insertBefore
		});
	} else if (typeof data === "string") {
		return this.forEach(function (el) {
			el.insertAdjacentHTML('beforebegin', data);
		});
	}
};

kit.prototype.wrap = function (obj) {
	// Loops backwards to prevent having to clone the wrapper on the
  // first element (see `child` below).
  for (var i = this.length - 1; i >= 0; i--) {
      var child = (i > 0) ? obj.cloneNode(true) : obj;
      var el = this[i];

      // Cache the current parent and sibling.
      var parent = el.parentNode;
      var sibling = el.nextSibling;

      // Wrap the element (is automatically removed from its current parent).
      child.appendChild(el);

      // If the element had a sibling, insert the wrapper before
      // the sibling to maintain the HTML structure; otherwise, just
      // append it to the parent.
      if (sibling) {
          parent.insertBefore(child, sibling);
      } else {
          parent.appendChild(child);
      }
  }
};

kit.prototype.wrapAll = function (obj) {
	var el = this.length ? this[0] : this;

  // Cache the current parent and sibling of the first element.
  var parent  = el.parentNode;
  var sibling = el.nextSibling;

  // Wrap all elements (if applicable). Each element is
  // automatically removed from its current parent and from the elms
  // array.
  for (var i = 0; i < this.length; i++) {
   	obj.appendChild(this[i]);
	}
	
  // If the first element had a sibling, insert the wrapper before the
  // sibling to maintain the HTML structure; otherwise, just append it
  // to the parent.
  if (sibling) {
      parent.insertBefore(obj, sibling);
  } else {
      parent.appendChild(obj);
  }
};

// ========== GET ELEMENT SIZE ==========
kit.prototype.outerWidth = function () {
	return this.mapOne(function (el) {
		var box = el.getBoundingClientRect();
		var ow = box.width || (box.right - box.left);
		return ow;
	});
};

kit.prototype.outerHeight = function () {
	return this.mapOne(function (el) {
		var box = el.getBoundingClientRect();
		var oh = box.height || (box.bottom - box.top);
		return oh;
	});
};

kit.prototype.getTop = function () {
	return this.mapOne(function (el) {
		var actualTop = el.offsetTop, current = el.offsetParent;
		while (current !== null){
		actualTop += current.offsetTop;
		current = current.offsetParent;
		}
		return actualTop;
	});
};

kit.prototype.getLeft = function () {
	return this.mapOne(function (el) {
		var actualLeft = el.offsetLeft, current = el.offsetParent;
		while (current !== null){
		actualLeft += current.offsetLeft;
		current = current.offsetParent;
		}
		return actualLeft;
	});
};

kit.prototype.offset = function () {
	return this.mapOne(function (el) {
		var rect = el.getBoundingClientRect();
		var offset = {
		  top: rect.top + document.body.scrollTop,
		  left: rect.left + document.body.scrollLeft
		};
		return offset;
	});
};

// ========== GET WINDOW SIZE ==========
kit.win = {
	W: function  () {
		return document.documentElement.clientWidth;
	},

	H: function () {	
		var winH, 
			d = document, 
			w = window;

		winH = w.innerHeight || 
					 d.documentElement.clientHeight || 
					 d.body.clientHeight;

		return winH;
	},

	ST: function () {
		return window.pageYOffset || 
					 document.documentElement.scrollTop;
	},

	SL: function () {
	  return window.pageXOffset || 
	  			 document.documentElement.scrollLeft;
	}
};

// 	window.k = k;
// })(window);

// ========== LANGUAGE EXTENSIONS ==========
if (typeof String.prototype.trim === "undefined") {
  String.prototype.trim = function() {
    return this.replace( /^\s+/, "" ).replace( /\s+$/, "" );
  };
}

if (typeof Array.prototype.indexOf !== 'function') {
  Array.prototype.indexOf = function (item) {
    for(var i = 0; i < this.length; i++) {
      if (this[i] === item) {
        return i;
      }
    }
    return -1;
  }; 
}

// ========== HELPER FUNCTIONS ==========
function toCamelCase(str) {
  return str.replace(/-([a-z])/ig, function( all, letter ) {
    return letter.toUpperCase();
  });
}

var getStyle = (function() {
  if (typeof getComputedStyle !== "undefined") {
    return function(el, cssProp) {
      return window.getComputedStyle(el, null).getPropertyValue(cssProp);
    };
  } else {
    return function(el, cssProp) {
      return el.currentStyle[toCamelCase(cssProp)];
    };
  }
}());

// get px value
function getPxValue (val) {
  var unit = val.match(/\D+$/),
      valPx;
  if (unit === 'em') {
    valPx = Math.round(val.replace(/[A-Za-z]+/, '') * 16);
  } else {
    valPx = val.replace(/[A-Za-z]+/, '');
  }

  return Number(valPx);
}

// bind window load
function winLoad (fn) {
  if (typeof addEventListener !== "undefined") {
    window.addEventListener('load', fn, false);
  } else if (typeof attachEvent !== "undefined") {
    window.attachEvent('onload', fn);
  }
}

// bind window resize
function winResize (fn) {
  if (typeof addEventListener !== "undefined") {
    window.addEventListener('resize', fn, false);
  } else if (typeof attachEvent !== "undefined") {
    window.attachEvent('onresize', fn);
  }
}

// bind window scroll
function winScroll (fn) {
  if (typeof addEventListener !== "undefined") {
    window.addEventListener('scroll', fn, false);
  } else if (typeof attachEvent !== "undefined") {
    window.attachEvent('onscroll', fn);
  }
}

// bind keydown
function keyDown (fn) {
  if (typeof addEventListener !== "undefined") {
    document.addEventListener('keydown', fn, false);
  } else if (typeof attachEvent !== "undefined") {
    document.attachEvent('onkeydown', fn);
  }
}

// check keydown
function checkKeyDown (code, callback) {
  function checkKey(e) {
      e = e || window.event;
      if (e.keyCode === code) {
        callback();
      }
  }
  keyDown(checkKey);
}
// checkKeyDown(37, alertThis);
// function alertThis () {
//   alert('left arrow');
// }

// redrawElement: fix IE8- overlapping when using insertBefore
function redrawElement(e) {
  if (/MSIE (\d+\.\d+);/.test(navigator.userAgent) && new Number(RegExp.$1) <= 8) {
    e.innerHTML = e.innerHTML;
  }
}

// extend
function extend() {
  var obj, name, copy,
      target = arguments[0] || {},
      i = 1,
      length = arguments.length;

  for (; i < length; i++) {
    if ((obj = arguments[i]) != null) {
      for (name in obj) {
        copy = obj[name];

        if (target === copy) { 
          continue; 
        } else if (copy !== undefined) {
          target[name] = copy;
        }
      }
    }
  }

  return target;
}
// function sticky (options) {
//   options = extend({ 
//     sticky: '.sticky',
//     spacing: 0,
//     stickTo: 'top',
//   }, options || {});
// }
// ========== READY ==========
// Author: Diego Perini (diego.perini at gmail.com)
// Summary: cross-browser wrapper for DOMContentLoaded
// URL: https://github.com/dperini/ContentLoaded/blob/master/src/contentloaded.js
function ready(fn) {
  var win = window, 
  done = false, 
  top = true,
  doc = win.document,
  root = doc.documentElement,
  modern = doc.addEventListener,
  add = modern ? 'addEventListener' : 'attachEvent',
  rem = modern ? 'removeEventListener' : 'detachEvent',
  pre = modern ? '' : 'on',
  init = function(e) {
    if (e.type === 'readystatechange' && doc.readyState !== 'complete') {return;}
    (e.type === 'load' ? win : doc)[rem](pre + e.type, init, false);
    if (!done && (done = true)) {fn.call(win, e.type || e);}
  },
  poll = function() {
    try { root.doScroll('left'); } catch(e) { setTimeout(poll, 50); return; }
    init('poll');
  };
  if (doc.readyState === 'complete') { fn.call(win, 'lazy'); }
  else {
    if (!modern && root.doScroll) {
      try { top = !win.frameElement; } catch(e) { }
      if (top) { poll(); }
    }
    doc[add](pre + 'DOMContentLoaded', init, false);
    doc[add](pre + 'readystatechange', init, false);
    win[add](pre + 'load', init, false);
  }
}

/*! H5F
* https://github.com/ryanseddon/H5F/
* Copyright (c) Ryan Seddon | Licensed MIT */

(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(factory);
    } else if (typeof module === 'object' && module.exports)  {
        // CommonJS
        module.exports = factory();
    } else {
        // Browser globals
        root.H5F = factory();
    }
}(this, function () {

    var d = document,
        field = d.createElement("input"),
        emailPatt = /^[a-zA-Z0-9.!#$%&'*+-\/=?\^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,
        urlPatt = /[a-z][\-\.+a-z]*:\/\//i,
        nodes = /^(input|select|textarea)$/i,
        isSubmit, bypassSubmit, usrPatt, curEvt, args,
        // Methods
        setup, validation, validity, checkField, bypassChecks, checkValidity, setCustomValidity, support, pattern, placeholder, range, required, valueMissing, listen, unlisten, preventActions, getTarget, addClass, removeClass, isHostMethod, isSiblingChecked;

    setup = function(form, settings) {
        var isCollection = !form.nodeType || false;

        var opts = {
            validClass : "valid",
            invalidClass : "error",
            requiredClass : "required",
            placeholderClass : "placeholder",
            onSubmit : Function.prototype,
            onInvalid : Function.prototype
        };

        if(typeof settings === "object") {
            for (var i in opts) {
                if(typeof settings[i] === "undefined") { settings[i] = opts[i]; }
            }
        }

        args = settings || opts;

        if(isCollection) {
            for(var k=0,len=form.length;k<len;k++) {
                validation(form[k]);
            }
        } else {
            validation(form);
        }
    };

    validation = function(form) {
        var f = form.elements,
            flen = f.length,
            isRequired,
            noValidate = !!(form.attributes["novalidate"]);

        listen(form,"invalid",checkField,true);
        listen(form,"blur",checkField,true);
        listen(form,"input",checkField,true);
        listen(form,"keyup",checkField,true);
        listen(form,"focus",checkField,true);
        listen(form,"change",checkField,true);
        listen(form,"click",bypassChecks,true);

        listen(form,"submit",function(e){
            isSubmit = true;
            if(!bypassSubmit && !noValidate && !form.checkValidity()) {
                preventActions(e);
                return;
            }
            args.onSubmit.call(form, e);
        },false);

        if(!support()) {
            form.checkValidity = function() { return checkValidity(form); };

            while(flen--) {
                isRequired = !!(f[flen].attributes["required"]);
                // Firefox includes fieldsets inside elements nodelist so we filter it out.
                if(f[flen].nodeName.toLowerCase() !== "fieldset") {
                    validity(f[flen]); // Add validity object to field
                }
            }
        }
    };
    validity = function(el) {
        var elem = el,
            missing = valueMissing(elem),
            attrs = {
                type: elem.getAttribute("type"),
                pattern: elem.getAttribute("pattern"),
                placeholder: elem.getAttribute("placeholder")
            },
            isType = /^(email|url)$/i,
            evt = /^(input|keyup)$/i,
            fType = ((isType.test(attrs.type)) ? attrs.type : ((attrs.pattern) ? attrs.pattern : false)),
            patt = pattern(elem,fType),
            step = range(elem,"step"),
            min = range(elem,"min"),
            max = range(elem,"max"),
            customError = !( elem.validationMessage === "" || elem.validationMessage === undefined );

        elem.checkValidity = function() { return checkValidity.call(this,elem); };
        elem.setCustomValidity = function(msg) { setCustomValidity.call(elem,msg); };

        elem.validity = {
            valueMissing: missing,
            patternMismatch: patt,
            rangeUnderflow: min,
            rangeOverflow: max,
            stepMismatch: step,
            customError: customError,
            valid: (!missing && !patt && !step && !min && !max && !customError)
        };

        if(attrs.placeholder && !evt.test(curEvt)) { placeholder(elem); }
    };
    checkField = function(e) {
        var el = getTarget(e) || e, // checkValidity method passes element not event
            events = /^(input|keyup|focusin|focus|change)$/i,
            ignoredTypes = /^(submit|image|button|reset)$/i,
            specialTypes = /^(checkbox|radio)$/i,
            checkForm = true;

        if(nodes.test(el.nodeName) && !(ignoredTypes.test(el.type) || ignoredTypes.test(el.nodeName))) {
            curEvt = e.type;

            if(!support()) {
                validity(el);
            }

            if(el.validity.valid && (el.value !== "" || specialTypes.test(el.type)) || (el.value !== el.getAttribute("placeholder") && el.validity.valid)) {
                removeClass(el.parentNode,[args.invalidClass,args.requiredClass]);
                addClass(el.parentNode,args.validClass);
            } else if(!events.test(curEvt)) {
                if(el.validity.valueMissing) {
                    removeClass(el.parentNode,[args.invalidClass,args.validClass]);
                    addClass(el.parentNode,args.requiredClass);
                } else if(!el.validity.valid) {
                    removeClass(el.parentNode,[args.validClass,args.requiredClass]);
                    addClass(el.parentNode,args.invalidClass);
                }
            } else if(el.validity.valueMissing) {
                removeClass(el.parentNode,[args.requiredClass,args.invalidClass,args.validClass]);
            }
            if(curEvt === "input" && checkForm) {
                // If input is triggered remove the keyup event
                unlisten(el.form,"keyup",checkField,true);
                checkForm = false;
            }
        }
    };
    checkValidity = function(el) {
        var f, ff, isDisabled, isRequired, hasPattern, invalid = false;

        if(el.nodeName.toLowerCase() === "form") {
            f = el.elements;

            for(var i = 0,len = f.length;i < len;i++) {
                ff = f[i];

                isDisabled = !!(ff.attributes["disabled"]);
                isRequired = !!(ff.attributes["required"]);
                hasPattern = !!(ff.attributes["pattern"]);

                if(ff.nodeName.toLowerCase() !== "fieldset" && !isDisabled && (isRequired || hasPattern && isRequired)) {
                    checkField(ff);
                    if(!ff.validity.valid && !invalid) {
                        if(isSubmit) { // If it's not a submit event the field shouldn't be focused
                            ff.focus();
                        }
                        invalid = true;
                        args.onInvalid.call(el, ff);
                    }
                }
            }
            return !invalid;
        } else {
            checkField(el);
            return el.validity.valid;
        }
    };
    setCustomValidity = function(msg) {
        var el = this;

        el.validationMessage = msg;
    };

    bypassChecks = function(e) {
        // handle formnovalidate attribute
        var el = getTarget(e);

        if(el.attributes["formnovalidate"] && el.type === "submit") {
            bypassSubmit = true;
        }
    };

    support = function() {
        return (isHostMethod(field,"validity") && isHostMethod(field,"checkValidity"));
    };

    // Create helper methods to emulate attributes in older browsers
    pattern = function(el, type) {
        if(type === "email") {
            return !emailPatt.test(el.value);
        } else if(type === "url") {
            return !urlPatt.test(el.value);
        } else if(!type) {
            return false;
        } else {
            var placeholder = el.getAttribute("placeholder"),
                val = el.value;

            usrPatt = new RegExp('^(?:' + type + ')$');

            if(val === placeholder) {
                return false;
            } else if(val === "") {
                return false;
            } else {
                return !usrPatt.test(el.value);
            }
        }
    };
    placeholder = function(el) {
        var attrs = { placeholder: el.getAttribute("placeholder") },
            focus = /^(focus|focusin|submit)$/i,
            node = /^(input|textarea)$/i,
            ignoredType = /^password$/i,
            isNative = !!("placeholder" in field);

        if(!isNative && node.test(el.nodeName) && !ignoredType.test(el.type)) {
            if(el.value === "" && !focus.test(curEvt)) {
                el.value = attrs.placeholder;
                listen(el.form,'submit', function () {
                  curEvt = 'submit';
                  placeholder(el);
                }, true);
                addClass(el.parentNode,args.placeholderClass);
            } else if(el.value === attrs.placeholder && focus.test(curEvt)) {
                el.value = "";
                removeClass(el.parentNode,args.placeholderClass);
            }
        }
    };
    range = function(el, type) {
        // Emulate min, max and step
        var min = parseInt(el.getAttribute("min"),10) || 0,
            max = parseInt(el.getAttribute("max"),10) || false,
            step = parseInt(el.getAttribute("step"),10) || 1,
            val = parseInt(el.value,10),
            mismatch = (val-min)%step;

        if(!valueMissing(el) && !isNaN(val)) {
            if(type === "step") {
                return (el.getAttribute("step")) ? (mismatch !== 0) : false;
            } else if(type === "min") {
                return (el.getAttribute("min")) ? (val < min) : false;
            } else if(type === "max") {
                return (el.getAttribute("max")) ? (val > max) : false;
            }
        } else if(el.getAttribute("type") === "number") {
            return true;
        } else {
            return false;
        }
    };
    required = function(el) {
        var required = !!(el.attributes["required"]);

        return (required) ? valueMissing(el) : false;
    };
    valueMissing = function(el) {
        var placeholder = el.getAttribute("placeholder"),
            specialTypes = /^(checkbox|radio)$/i,
            isRequired = !!(el.attributes["required"]);
        return !!(isRequired && (el.value === "" || el.value === placeholder || (specialTypes.test(el.type) && !isSiblingChecked(el))));
    };

    /* Util methods */
    listen = function (node,type,fn,capture) {
        if(isHostMethod(window,"addEventListener")) {
            /* FF & Other Browsers */
            node.addEventListener( type, fn, capture );
        } else if(isHostMethod(window,"attachEvent") && typeof window.event !== "undefined") {
            /* Internet Explorer way */
            if(type === "blur") {
                type = "focusout";
            } else if(type === "focus") {
                type = "focusin";
            }
            node.attachEvent( "on" + type, fn );
        }
    };
    unlisten = function (node,type,fn,capture) {
        if(isHostMethod(window,"removeEventListener")) {
            /* FF & Other Browsers */
            node.removeEventListener( type, fn, capture );
        } else if(isHostMethod(window,"detachEvent") && typeof window.event !== "undefined") {
            /* Internet Explorer way */
            node.detachEvent( "on" + type, fn );
        }
    };
    preventActions = function (evt) {
        evt = evt || window.event;

        if(evt.stopPropagation && evt.preventDefault) {
            evt.stopPropagation();
            evt.preventDefault();
        } else {
            evt.cancelBubble = true;
            evt.returnValue = false;
        }
    };
    getTarget = function (evt) {
        evt = evt || window.event;
        return evt.target || evt.srcElement;
    };
    addClass = function (e,c) {
        var re;
        if (!e.className) {
            e.className = c;
        }
        else {
            re = new RegExp('(^|\\s)' + c + '(\\s|$)');
            if (!re.test(e.className)) { e.className += ' ' + c; }
        }
    };
    removeClass = function (e,c) {
        var re, m, arr = (typeof c === "object") ? c.length : 1, len = arr;
        if (e.className) {
            if (e.className === c) {
                e.className = '';
            } else {
                while(arr--) {
                    re = new RegExp('(^|\\s)' + ((len > 1) ? c[arr] : c) + '(\\s|$)');
                    m = e.className.match(re);
                    if (m && m.length === 3) { e.className = e.className.replace(re, (m[1] && m[2])?' ':''); }
                }
            }
        }
    };
    isHostMethod = function(o, m) {
        var t = typeof o[m], reFeaturedMethod = new RegExp('^function|object$', 'i');
        return !!((reFeaturedMethod.test(t) && o[m]) || t === 'unknown');
    };
    /* Checking if one of the radio siblings is checked */
    isSiblingChecked = function(el) {
        var siblings = document.getElementsByName(el.name);
        for(var i=0; i<siblings.length; i++){
            if(siblings[i].checked){
                return true;
            }
        }
        return false;
    };

    // Since all methods are only used internally no need to expose globally
    return {
        setup: setup
    };

}));

// ========== ANIMATE ==========
function animate(el, attr, from, to, duration){
  if (duration < 0) {return;}
  if (typeof attr === "string") {
    var difference = to - from,
        perTick = difference / duration * 10;

    setTimeout(function () {
      from += perTick;
      el.style[toCamelCase(attr)] = from + 'px';
      if (from === to) { return; }
      animate(el, attr, from, to, duration - 10);
    }, 10);
  } else { throw { message: "Invalid parameters passed to css()" }; }
}

// function animate(el, attr, to, duration){
//   if (duration < 0) {return;}
//   if (typeof attr === "string") {
//     var from = parseFloat(getStyle(el, attr)),
//         difference = to - from,
//         perTick = difference / duration * 10;
//         alert(from);

//     setTimeout(function () {
//       from += perTick;
//       el.style[toCamelCase(attr)] = from + 'px';
//       if (from === to) { return; }
//       animate(el, attr, to, duration - 10);
//     }, 10);
//   } else { throw { message: "Invalid parameters passed to css()" }; }
// };

// ready(function () {
//   kit('button').click(function() {
//     animate(kit('.target')[0], 'height', kit('.target').outerHeight(), 50, 500);
//   });
// })

// AUTO HEIGHT CAROUSEL
// get max
function getMaxOfArray(numArray) {
  return Math.max.apply(null, numArray);
}

function autoheightCarousel(selector) {
  if (kit(selector).length > 0) {
    var containers = kit(selector).find('.outer');

    // setting original height
    function setCarouselHeight () {
      containers.forEach(function(el) {
        var thisHeight = kit(el).outerHeight() + 'px';
        if (thisHeight === '0px') { thisHeight = 'auto'; }
        kit(el).css('height', thisHeight);
      });
    }
    winLoad(function () {
      setCarouselHeight();
    });

    // autoheight-carousel
    function autoheightCarouselCore() {
      containers.forEach(function(el) {
        var heights = [],
            containerH,
            containerL = kit(el).getLeft(),
            containerR = containerL + kit(el).outerWidth(),
            children = kit(el).find('li');
        children.forEach(function(ele) {
          var childL = kit(ele).getLeft(),
              childR = childL + kit(ele).outerWidth(),
              childH = kit(ele).outerHeight();
          if ( childL >= containerL && childL < containerR || childR > containerL && childR <= containerR ) {
            heights.push(childH);
          }
        });
        containerH = getMaxOfArray(heights) + 'px';
        kit(el).css('height', containerH);
      });
    }

    setInterval(autoheightCarouselCore, 200);
  }
}


// AUTO HEIGHT GALLERY
function autoheightGallery (selector) {
  if (kit(selector).length > 0) {
    var outer = kit(selector).find('.outer'),
        inner = kit(selector).find('.inner');


    // autoheight-gallery-core
    function autoheightGalleryCore() {
      var outerH = outer.outerHeight(),
          innerH = inner.outerHeight();
      if (outerH === innerH) {
        return;
      } else{
        outer.css('height', innerH + 'px');
      }
    }
    // if (outer.length > 0) {
      outer.css('height', inner.outerHeight() + 'px');
      setInterval(autoheightGalleryCore, 200);
    // }
  }
}

// AUTOPLAY
var sliderAutoplay = function (selector, timeout, pages, hoverPause) {
  timeout = typeof timeout !== 'undefined' ? timeout : 3000;
  hoverPause = typeof hoverPause !== 'undefined' ? hoverPause : true;

  function sliderAutoplayTimer () {
    var radiosSelectors = selector + ' > [type="radio"]',
        checkboxSelector = selector + ' > [type="checkbox"]',
        radios = kit(radiosSelectors),
        len = typeof pages !== 'undefined' ? pages : radios.length,
        checkedIndex;

    // check radios
    if (len > 0) {
      // autoplay input is checked
      if (kit(checkboxSelector)[0].checked) {
        for (var i = 0; i < len; i++) {
          if (radios.eq(i)[0].checked) {
            checkedIndex = i;
          }
        }

        radios.forEach(function (el) {
          el.checked = false;
        });

        if (checkedIndex === len - 1) {
          radios.eq(0)[0].checked = true;
        } else {
          radios.eq(checkedIndex + 1)[0].checked = true;
        }
      }
    }
  }

  if (kit(selector).length > 0) {
    // setInterval
    var autoPlayer = setInterval(function(){ sliderAutoplayTimer(); }, timeout);

    if (hoverPause) {
      // clearInterval
      kit(selector).mouseover(function() {
        clearInterval(autoPlayer);
      });
      kit(selector).mouseout(function() {
        autoPlayer = 0;
        autoPlayer = setInterval(function(){ sliderAutoplayTimer() }, timeout);
      });
    }
  }
};

// Usage:
// ready(function () {
//   sliderAutoplay('.js-autoplay', 1000);
// });

// equalizer
// equalizer('.item1', '#item2')
// equalizer('.parent .item')

function equalizer(){
  var heights = [],
      args,
      value,
      len = arguments.length;

  if (len === 1) {
    args = kit(arguments[0]);
    args.css('height', 'auto');
    heights.push(args.outerHeight());
  } else {
    args = arguments;
    for (var i = 0; i < args.length; i++) {
      kit(args[i]).css('height', 'auto');
      heights.push(kit(args[i]).outerHeight());
    }
  }

  value = Math.max.apply(Math, heights);

  if (len === 1) {
    args.css('height', value);
  } else{
    for (var j = 0; j < args.length; j++) {
      var thisEle = kit(args[j]),
          thisVal,
          bt = getPxValue(thisEle.getCurrentStyle('borderTopWidth')),
          bb = getPxValue(thisEle.getCurrentStyle('borderBottomWidth')),
          pt = getPxValue(thisEle.getCurrentStyle('paddingTop')),
          pb = getPxValue(thisEle.getCurrentStyle('paddingBottom'));
          
      thisVal = value - (bt + bb + pt + pb) + 'px';

      thisEle.css('height', thisVal);
    }
  }
}
// ie placeholder
function iePlaceholder () {
  kit('.lt-ie10 [placeholder]').forEach(function (el) {
    var input = kit(el),
        text = el.getAttribute('placeholder');

    if (text) { input.attr('value', text); }
    
    input.focus(function(){  
      if (input[0].value === text) {
        input.attr('value', '');
      }
    });
    input.blur(function(){ 
      if (input[0].value === "") {
        input.attr('value', text); 
      }
    }); 
  });
}
ready(function () {
  iePlaceholder();
});
// ========== inputFile ==========

function inputFile (selector) {
  var inputs = document.querySelectorAll( selector );
  Array.prototype.forEach.call( inputs, function( input )
  {
    var label  = input.nextElementSibling,
      labelVal = label.innerHTML;

    input.addEventListener( 'change', function( e ) {
      var fileName = '';
      if( this.files && this.files.length > 1 ) {
        fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
      } else {
        fileName = e.target.value.split( '\\' ).pop();
      }

      if( fileName ) {
        label.querySelector( 'span' ).innerHTML = fileName;
      } else {
        label.innerHTML = labelVal;
      }
    });
  });
}

// ========== NUMCHANGE ==========
function numChange(element, from, to, duration){
  if (duration < 0) {return;}
  var difference = to - from,
      perTick = difference / duration * 10;

  setTimeout(function () {
    from += perTick;
    element.text(Math.round(from));
    if (from === to) { return; }
    numChange(element, from, to, duration - 10);
  }, 10);
}

// priorityNav
function priorityNav (navClass, buttonText, restore, distory) {
  var restore = (typeof restore !== 'undefined' && typeof restore !== false && typeof restore !== null) ? restore : 0;
  var distory = (typeof distory !== 'undefined' && typeof distory !== false && typeof distory !== null) ? distory : 0;
  
  var nav = kit(navClass);

  if (nav.length > 0) {
    nav.find('ul').first().addClass('visible-links');
    nav.first().prepend('<button class="js-nav-toggle is-hidden" data-count="">' + buttonText + '</button>').append('<ul class="hidden-links is-hidden"></ul>');

    var nav = kit(navClass);
    var btn = kit(navClass + '> .js-nav-toggle');
    var vlinks = kit(navClass + '> .visible-links > li');

    // get breakpoints
    var breaks = [];
    for (var i = 0; i < vlinks.length; i++) {
      var last = breaks[breaks.length - 1],
          thisWidth = vlinks.eq(i).outerWidth(),
          newWidth = (last) ? last + thisWidth : thisWidth;
      breaks.push(newWidth);
    };

    // update nav
    function updateNav () {
      var outerWidth = nav.outerWidth(),
          availableSpace,
          target,
          current;

      var ww = kit.win.W();

      // get target, show / hide btn
      if (outerWidth >= breaks[breaks.length - 1] || ww < restore) {
        btn.addClass('is-hidden');
        availableSpace = outerWidth;
        target = breaks.length;
      } else {
        btn.removeClass('is-hidden');
        availableSpace = outerWidth - btn.outerWidth();

        if (ww < distory) {
          target = 0;
        } else {
          for (var i = 0; i < breaks.length; i++) {
            if (availableSpace >= breaks[i] && availableSpace < breaks[i + 1]) {
              target = i + 1;
            } else if (availableSpace < breaks[0]) {
              target = 0;
            }
          }
        }
      }

      // set current
      var vlinks = kit(navClass + '> .visible-links > li');
      if (vlinks.length) {
        current = vlinks.length;
      } else {
        current = 0;
      }

      // update
      if (target > current) {
        var a = current;
        while (a < target) {
          var vlink = kit(navClass + '> .visible-links');
          var hlinks = kit(navClass + '> .hidden-links > li');

          vlink.append(hlinks.first()[0]);
          a++;
        }
      } else if (target < current) {
        var a = current;
        while (a > target ) {
          var vlinks = kit(navClass + '> .visible-links > li');
          var hlink = kit(navClass + '> .hidden-links');

          hlink.prepend(vlinks.last()[0]);
          a--;
        }
      }

      // update data-count
      var hlinks = kit(navClass + '> .hidden-links > li'),
          count;

      if (hlinks.length) {
        count = hlinks.length;
      } else {
        count = 0;
      }
      btn.attr("data-count", count);
    }

    // run updateNav
    updateNav();
    winResize(function () { updateNav(); });

    // show / hide hidden-links
    kit(navClass + '> .js-nav-toggle').click(function() {
      kit(navClass + '> .hidden-links').toggleClass('is-hidden');
    });
  } else {
    console.log('"' + navClass + '" can\'t be found.');
  }
};
kit.prototype.reach = function (edge,distance) {
  if (!distance) {
    distance = 0; 
  } else {
    distance = - distance;
  }

  var winH = kit.win.H(),
        target,
        elTop = kit(this[0]).offset().top;
    switch (edge) {
      case 'top':
        target = distance;
        break;
      case 'middle':
        target = distance + (winH / 2);
        break;
      case 'bottom':
        target = distance + winH;
        break;
    }

    if (elTop < target) {
      return true;
    } else {
      return false;
    }
};

// <ul class="target">
//   <li>item1</li>
//   <li>item2</li>
//   <li>item3</li>
//   <li>item4</li>
// </ul>
// <ul class="content">
//   <li>content1</li>
//   <li>content2</li>
//   <li>content3</li>
//   <li>content4</li>
// </ul>

// window.onscroll = function () {
//   kit('.target li').forEach(function (el) {
//     if (kit(el).reach('middle',0)) {
//       kit('.content li').eq(k.index(kit('.target li'), el)).css('color', 'red');
//     } else {
//       kit('.content li').eq(k.index(kit('.target li'), el)).css('color', 'black');
//     }
//   })
// };
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

var lastScrollTop = 0,
    scrollDirection;
winScroll(function() {
  var st = kit.win.ST();
  if(st < lastScrollTop) {
    scrollDirection = 'up';
  } else {
    scrollDirection = 'down';
  }
  lastScrollTop = st;

  return scrollDirection;
});

// ========== SCROLL TO ==========
function scroll(element, to, duration) {
  if (duration < 0) {return;}
  var difference = to - element.scrollTop;
  var perTick = difference / duration * 10;

  setTimeout(function() {
    element.scrollTop = element.scrollTop + perTick;
    if (element.scrollTop === to) {return;}
    scroll(element, to, duration - 10);
  }, 10);
}
function scrollTo (to, duration) {
  var wh = kit.win.H(),
      bh = kit('body').outerHeight(),
      total = to + wh,
      goal = bh - wh - 1;
  if (total > bh) { to = goal; }
  
  to = Math.round(to);

  scroll(document.body, to, duration);
  scroll(document.documentElement, to, duration);
}

// sticky({sticky: '.sticky', stickyWrapper: '.wrapper', spacing: '.header'});
// sticky({sticky: '.sticky', stickyWrapper: '.wrapper', spacing: 20});

function sticky (options) {
  options = extend({ 
    sticky: '.sticky',
    stickyWrapper: false,
    spacing: 0,
    stickTo: 'top',
    breakpoints: false,
  }, options || {});

	// set wrapper, spacing, stickTo
	var sticky = options.sticky;
	var wrapper = (options.stickyWrapper) ? kit(options.stickyWrapper) : false;
	var spacing = (typeof options.spacing === 'number') ? options.spacing : kit(options.spacing).outerHeight();
	var stickTo = options.stickTo;
	var winBp = options.breakpoints;

	if (kit(sticky).length > 0) {
	  // wrap sticky with '.js-stk-wrapper'
	  // set sticky, parent
		kit(sticky).wrap(kit.createElement({tagName: 'div', className: 'js-stk-wrapper'}));
		var parent = (kit(sticky).length > 1) ? kit(sticky).eq(0).parent() : kit(sticky).parent(),
			  stk = (kit(sticky).length > 1) ? kit(sticky).eq(0) : kit(sticky);

	  var run = false, bp1, bp2, winST, winW, winH, stkOT, stkW, stkH, wrapperOT, wrapperH;

	  // on init and resize: get and set sticky, parent sizes
		function stkResizer() {
			winST = kit.win.ST(),
			winW = kit.win.W();
			winH = kit.win.H();
	    stkOT = parent.getTop();
			stkW = stk.outerWidth();
			stkH = parent.outerHeight();
			newStkW = parent.outerWidth();
			newStkH = stk.outerHeight();

		  // set window breakpoints
		  if (!winBp) {
		  	run = true;
		  } else if (typeof winBp === 'number') {
		  	if (winW >= winBp) {
		  		run = true;
		  	} else {
		  		run = false;
		  	}
		  } else if (typeof winBp === 'object' && winBp.length >= 2) {
		  	if (winW >= winBp[0] && winW < winBp[1]) {
		  		run = true;
		  	} else {
		  		run = false;
		  	}
		  }

			if (wrapper) {
				wrapperOT = wrapper.getTop();
				wrapperH = wrapper.outerHeight();
			}


			if (stickTo === 'bottom' || (stkH + spacing) > winH) {
				bp1 = (stkOT + stkH + spacing) - winH;
				if (wrapper) {
					bp2 = (wrapperOT + wrapperH + spacing) - winH;
				}
			} else {
				bp1 = stkOT - spacing;
				if (wrapper) {
					bp2 = (wrapperOT + wrapperH) - (stkH + spacing);
				}
			}

			if (winST > bp1 && run) {
				if (newStkW !== stkW) {
					stkW = newStkW;
					stk.css({
						'width': stkW + 'px',
						'box-sizing': 'border-box',
						'margin-top': '0px',
						'margin-bottom': '0px',
					});
				}
				if (newStkH !== stkH) {
					stkH = newStkH;
					parent.css('height', stkH + 'px');
				}
			} else {
				stk.css({
					'position': '',
					'width': '',
					'box-sizing': '',
					'top': '',
					'bottom': '',
					'margin-top': '',
					'margin-bottom': '',
				});
				parent.css('height', '');

				if (wrapper) { wrapper.css('position', ''); }
			}

			return run, bp1, bp2, stkW, stkH;
		}


		// on scroll: update sticky status
		function stkScroll() { 
			winST = kit.win.ST();

			// set position
			if (!wrapper) {
				if (winST > bp1 && run) {
					if (stk[0].style.position !== 'fixed') {
						stk.css('position', 'fixed').addClass('js-is-sticky');

						if (stickTo === 'bottom' || (stkH + spacing) > winH) {
							stk.css('bottom', spacing + 'px');
						} else {
							stk.css('top', spacing + 'px');
						}
					}
				} else {
					if (stk[0].style.position) {
						stk.css('position', '').removeClass('js-is-sticky');

						if (stickTo === 'bottom' || (stkH + spacing) > winH) {
							stk.css('bottom', '');
						} else {
							stk.css('top', '');
						}
					}
				}
			} else {
				if (winST > bp1 && winST <= bp2 && run) {
					if (stk[0].style.position !== 'fixed') {
						wrapper.css('position', '');
						stk.css('position', 'fixed').addClass('js-is-sticky').removeClass('js-is-following');

						if (stickTo === 'bottom' || (stkH + spacing) > winH) {
							stk.css({
								'bottom': spacing + 'px',
								'top': '',
							});
						} else {
							stk.css({
								'top': spacing + 'px',
								'bottom': '',
							});
						}
					}
				} else if (winST > bp2 && run){
					if (stk[0].style.position !== 'absolute') {
						wrapper.css('position', 'relative');
						stk.css({
							'position': 'absolute',
							'top': '',
						}).removeClass('js-is-sticky').addClass('js-is-following');

						if (stickTo === 'bottom' || (stkH + spacing) > winH) {
							stk.css('bottom', spacing + 'px');
						} else {
							stk.css('bottom', '0px');
						}
					}
				} else {
					if (stk[0].style.position) {
						wrapper.css('position', '');
						stk.css({
							'position': '',
							'top': '',
							'bottom': '',
						}).removeClass('js-is-sticky').removeClass('js-is-following');
					}
				}
			}

			// set width & height
			if (winST > bp1 && run) {
				if (stk[0].style.width !== stkW) {
					parent.css('height', stkH + 'px');
					stk.css({
						'width': stkW + 'px',
						'box-sizing': 'border-box',
						'margin-top': '0px',
						'margin-bottom': '0px',
					});
				}
			} else {
				if (stk[0].style.width) {
					parent.css('height', '');
					stk.css({
						'width': '',
						'box-sizing': '',
						'margin-top': '',
						'margin-bottom': '',
					});
				}
			}
			
		}

		winLoad(function () { stkResizer(); });
		winResize(function () { stkResizer(); });
		winScroll(function () { stkScroll(); });
	} else {
    console.log('"' + sticky + '" can\'t be found.');
  }

}

// validation-helper

ready(function () {
  kit('input:not([type="radio"]):not([type="checkbox"]), textarea').blur(function() {
    kit(this).addClass('js-blur');
  });
  kit('input:not([type="radio"]):not([type="checkbox"]), textarea').focus(function() {
    kit(this).removeClass('js-blur');
  });
});
