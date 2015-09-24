// sticky('.sticky', '.wrapper', '.header');
// sticky('.sticky', '.wrapper', 20);

var sticky = function(sticky, stickyP, stkT) {

	var stk = kit(sticky),
	    parent = kit(stickyP),
			T1,
			T2,
			B1,
			B2,
			winH,
	    stkOT,
			stkH,
			stkMB,
			parentOT,
			parentH,
			parentPB;

	function stickyCore () {
		winH = kit.win.H();
    stkOT = stk.getTop();
		stkH = stk.outerHeight();
		stkMB = getPxValue(stk.getCurrentStyle('marginBottom'));
		parentOT = parent.getTop();
		parentH = parent.outerHeight();
		parentPB = getPxValue(parent.getCurrentStyle('paddingBottom'));

		return winH, stkOT, stkH, stkMB, parentOT, parentH, parentPB;
	};

	function updateSticky() {
		(typeof stkT === 'number') ? stkT = stkT: stkT = kit(stkT).outerHeight();

		var winST = kit.win.ST();

		if ((stkH + stkT) > winH) {
			// higher sticky
			T1 = B1 = winST + winH;
			T2 = stkOT + stkH;
			B2 = parentOT + parentH - parentPB;
		} else {
			T1 = winST + stkT;
			T2 = stkOT;
			B1 = winST + stkT + stkH + parentPB;
			B2 = parentOT + parentH;
		}

		if (T1 > T2 && B1 <= B2 ) {
			stk.css({
				'position': 'relative',
				'top': T1 - T2 + 'px',
			});
		} else if (B1 > B2){
			var topValue = parentH - (stkH + parentPB) - (stkOT - parentOT) + 'px';

			if (stk[0].style.top !== topValue) {
				stk.css({
					'position': 'relative',
					'top': topValue,
				});
			}
		} else {
			stk.css({
				'position': 'static',
				'top': 'auto',
			});
		}
	}

	winScroll(function () {
		updateSticky();
	});

	winLoad(function () {
		stickyCore();
		updateSticky();
	});

	winResize(function () {
		stickyCore();
		updateSticky();
	});

};
