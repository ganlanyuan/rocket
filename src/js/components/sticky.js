// sticky('.sticky', '.wrapper', '.header');
// sticky('.sticky', '.wrapper', 20);

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

function sticky (options) {
	options = extend({ 
    sticky: '.sticky',
    spacing: 0,
    stickTo: 'top',
  }, options || {});

  var isolate = (options.wrapper) ? false : true,
			stk = kit(options.sticky),
			wrapper,
	    spacing = options.spacing,
			S1,
			S2,
			W1,
			W2,
			winH,
	    stkOT,
			stkH,
			stkMB,
			wrapperOT,
			wrapperH,
			wrapperPB,
			wrapperBB;

  if (!isolate) {
    wrapper = kit(options.wrapper);
  }

	function getSizes () {
		// isolate mode
		if (isolate) {
			if (options.stickTo === 'top') {
		    stkOT = stk.getTop();

				return stkOT;
			} else {
				winH = kit.win.H();
		    stkOT = stk.getTop();
				stkH = stk.outerHeight();

				return winH, stkOT, stkH;
			}
		// inside wrapper
		} else {
			winH = kit.win.H();
	    stkOT = stk.getTop();
			stkH = stk.outerHeight();
			stkMB = getPxValue(stk.getCurrentStyle('marginBottom'));
			wrapperOT = wrapper.getTop();
			wrapperH = wrapper.outerHeight();
			wrapperPB = getPxValue(wrapper.getCurrentStyle('paddingBottom'));
			wrapperBB = getPxValue(wrapper.getCurrentStyle('borderBottomWidth'));

			return winH, stkOT, stkH, stkMB, wrapperOT, wrapperH, wrapperPB;
		}
	};

	function updateSticky() {
		spacing = (typeof spacing === 'number') ? spacing: kit(spacing).outerHeight();

		var winST = kit.win.ST();

		// isolate mode
		if (isolate) {
			if (options.stickTo === 'top') {
				S1 = winST;
				S2 = stkOT - spacing;
			} else {
				S1 = winST + winH;
				S2 = stkOT + stkH + spacing;
			}

			if (S1 > S2) {
				stk.css({
					'position': 'relative',
					'top': S1 - S2 + 'px',
				});
			} else {
				stk.css({
					'position': 'static',
					'top': 'auto',
				});
			}
		// inside wrapper
		} else {
			// higher sticky
			if ((stkH + spacing) > winH) {
				S1 = W1 = winST + winH;
				S2 = stkOT + stkH + spacing;
				W2 = wrapperOT + wrapperH - wrapperPB - wrapperBB + spacing;
			} else {
				if (options.stickTo === 'top') {
					S1 = winST + spacing;
					S2 = stkOT;
					W1 = winST + spacing + stkH + wrapperPB + wrapperBB;
					W2 = wrapperOT + wrapperH;
				} else {
					S1 = winST + winH - spacing;
					S2 = stkOT + stkH;
					W1 = winST + winH - spacing;
					W2 = wrapperOT + wrapperH;
				}
			}

			if (S1 > S2 && W1 <= W2 ) {
				stk.css({
					'position': 'relative',
					'top': S1 - S2 + 'px',
				});
			} else if (W1 > W2){
				var topValue = wrapperH - (stkH + wrapperPB + wrapperBB) - (stkOT - wrapperOT) + 'px';

				if (stk[0].style.top !== topValue) {
					stk.css({
						'position': 'relative',
						'top': topValue,
					});
				}
			} else {
				if (stk[0].style.position !== 'static') {
					stk.css({
						'position': 'static',
						'top': 'auto',
					});
				}
			}
		}
		
	}

	winScroll(function () {
		updateSticky();
	});

	winLoad(function () {
		getSizes();
		updateSticky();
	});

	winResize(function () {
		getSizes();
		updateSticky();
	});

};
