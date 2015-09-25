// sticky('.sticky', '.wrapper', '.header');
// sticky('.sticky', '.wrapper', 20);

function sticky (sticky, stickyWrapper, stickyOffset, stickTo) {

  var isolate = (stickyWrapper) ? false : true,
			stk = kit(sticky),
			wrapper,
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

  if (stickyWrapper) { wrapper = kit(stickyWrapper); }
  if (!stickTo) { stickTo = 'top'; }

	function getSizes () {
		// isolate mode
		if (isolate) {
			if (stickTo === 'top') {
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
		if (!stickyOffset) { stickyOffset = 0; }
		offset = (typeof stickyOffset === 'number') ? stickyOffset : kit(stickyOffset).outerHeight();

		var winST = kit.win.ST();

		// isolate mode
		if (isolate) {
			if (stickTo === 'top') {
				S1 = winST;
				S2 = stkOT - offset;
			} else {
				S1 = winST + winH;
				S2 = stkOT + stkH + offset;
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
			if ((stkH + offset) > winH) {
				S1 = W1 = winST + winH;
				S2 = stkOT + stkH + offset;
				W2 = wrapperOT + wrapperH - wrapperPB - wrapperBB + offset;
			} else {
				if (stickTo === 'top') {
					S1 = winST + offset;
					S2 = stkOT;
					W1 = winST + offset + stkH + wrapperPB + wrapperBB;
					W2 = wrapperOT + wrapperH;
				} else {
					S1 = winST + winH - offset;
					S2 = stkOT + stkH;
					W1 = winST + winH - offset;
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
