// sticky('.sticky', '.wrapper', '.header');
// sticky('.sticky', '.wrapper', 20);

function sticky (sticky, stickyWrapper, stickySpacing, stickTo) {

	kit(sticky).wrap(kit.createElement({tagName: 'div', className: 'stk-wrapper'}));
	var parent = kit(sticky).parent(),
		  stk = kit(sticky), wrapper;
  if (stickyWrapper) { wrapper = kit(stickyWrapper); }
  if (!stickTo) { stickTo = 'top'; }

  // console.log(parent);
  var bp1, bp2, winH, stkOT, stkH, stkMB, wrapperOT, wrapperH, wrapperPB, wrapperBB;

	function getSizes () {
		winH = kit.win.H();
    stkOT = parent.getTop();
		stkH = stk.outerHeight();
		stkMB = getPxValue(stk.getCurrentStyle('marginBottom'));
		wrapperOT = wrapper.getTop();
		wrapperH = wrapper.outerHeight();
		wrapperPB = getPxValue(wrapper.getCurrentStyle('paddingBottom'));
		wrapperBB = getPxValue(wrapper.getCurrentStyle('borderBottomWidth'));

		// return winH, stkOT, stkH, stkMB, wrapperOT, wrapperH, wrapperPB;

		if (!stickySpacing) { stickySpacing = 0; }
		spacing = (typeof stickySpacing === 'number') ? stickySpacing : kit(stickySpacing).outerHeight();

		if (stickTo === 'bottom' || (stkH + spacing) > winH) {
			bp1 = (stkOT + stkH + spacing) - winH;
			if (stickyWrapper) {
				bp2 = (wrapperOT + wrapperH + spacing) - winH;
			}
		} else {
			bp1 = stkOT - spacing;
			if (stickyWrapper) {
				bp2 = (wrapperOT + wrapperH) - (stkH + spacing + wrapperPB);
			}
		}


		return bp1, bp2, winH, stkOT, stkH, stkMB, wrapperOT, wrapperH, wrapperPB;
	}


	function updateSticky() { 
		console.log(bp1, bp2);
		var winST = kit.win.ST();

		// isolate mode
		if (!stickyWrapper) {
			if (winST > bp1) {
				stk.css({
					'position': 'relative',
					'top': winST - bp1 + 'px',
				});
			} else {
				stk.css({
					'position': '',
					'top': '',
				});
			}
		// inside wrapper
		} else {
			if (winST > bp1 && winST < bp2 ) {
				stk.css({
					'position': 'relative',
					'top': winST - bp1 + 'px',
				});
			} else if (winST > bp2){
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
						'position': '',
						'top': '',
					});
				}
			}
		}
		
	}

	winLoad(function () { getSizes(); });
	winResize(function () { getSizes(); });
	winScroll(function () { updateSticky(); });

}
