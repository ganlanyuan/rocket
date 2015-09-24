// sticky('.sticky', '.wrapper', '.header');
// sticky('.sticky', '.wrapper', 20);

var sticky = function(sticky, stickyP, stkT) {

	var stk = kit(sticky),
	    parent = kit(stickyP),
			T1,
			T2,
			B1,
			B2;

	var stickyCore = function () {
		var winH = kit.win.H(),
		    stkOT = stk.getTop(),
				stkH = stk.outerHeight(),
				stkMB = getPxValue(stk.getCurrentStyle('marginBottom')),
				parentOT = parent.getTop(),
				parentH = parent.outerHeight();

		function updateSticky() {
			(typeof stkT === 'number') ? stkT = stkT: stkT = kit(stkT).outerHeight();

			var winST = kit.win.ST();

			// window shorter than sticky
			if ((stkH + stkT) > winH) {
				T1 = B1 = winST + winH;
				T2 = stkOT + stkH;
				B2 = parentOT + parentH - stkMB;
			// window higher than sticky
			} else {
				T1 = winST + stkT;
				T2 = stkOT;
				B1 = winST + stkT + stkH + stkMB;
				B2 = parentOT + parentH;
			}

			if (T1 > T2 && B1 <= B2 ) {
				stk.css({
					'position': 'relative',
					'top': T1 - T2 + 'px',
				});
			} else if (B1 > B2){
				stk.css({
					'position': 'relative',
					'top': parentH - (stkH + stkMB) - (stkOT - parentOT) + 'px',
				});
			} else {
				stk.css({
					'position': 'static',
					'top': 'auto',
				});
			}
		}
		updateSticky();

		winScroll(function () {
			updateSticky();
		})
	};

	winLoad(function () {
		stickyCore();
	});
	winResize(function () {
		stickyCore();
	});
};
