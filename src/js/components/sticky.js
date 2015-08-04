// sticky('.sticky', '.wrapper', '.header');
// sticky('.sticky', '.wrapper', 20);

(function (window, undefined) {
  sticky = function(sticky, stickyP, stkT) {
  	var STKMB = getPxValue(k(sticky).getCurrentStyle('marginBottom'));

  	var stickyCore = function () {
			var stk = k(sticky),
			    parent = k(stickyP),
					T1,
					T2,
					B1,
					B2,
					winH = k.win.H(),
			    stkOT = stk.getTop(),
					stkH = stk.outerHeight(),
					stkW = stk.outerWidth(),
					stkMT = getPxValue(stk.getCurrentStyle('marginTop')),
					stkMB = getPxValue(stk.getCurrentStyle('marginBottom')),
					parentOT = parent.getTop(),
					parentH = parent.outerHeight();

			winScroll(function() {
				(typeof stkT === 'number') ? stkT = stkT: stkT = k(stkT).outerHeight();

				var winST = k.win.ST();

				// window shorter than sticky
				if ((stkH + stkT) > winH) {
					T1 = B1 = winST + winH;
					T2 = stkOT + stkH;
					B2 = parentOT + parentH;

					if (T1 > T2 && B1 <= B2 ) {
						stk.css({
							'position': 'fixed',
							'bottom': 0,
							'margin-bottom': 0,
							'width': stkW + 'px',
						});
					} else if (B1 > B2){
						parent.css('position', 'relative');
						stk.css({
							'position': 'absolute',
							'margin-bottom': STKMB + 'px',
						});
					} else {
						parent.css('position', 'static');
						stk.css({
							'position': 'static',
							'bottom': 'auto',
							'width': 'auto',
							'margin-bottom': STKMB + 'px',
						});
					}
				// window higher than sticky
				} else {
					T1 = winST + stkT + stkMT;
					T2 = stkOT;
					B1 = winST + stkT + stkH + stkMT + stkMB;
					B2 = parentOT + parentH;
					if (T1 > T2 && B1 <= B2 ) {
						stk.css({
							'position': 'fixed',
							'top': stkT + 'px',
							'width': stkW + 'px',
						});
					} else if (B1 > B2){
						parent.css('position', 'relative');
						stk.css({
							'position': 'absolute',
							'top': 'auto',
							'bottom': 0,
						});
					} else {
						parent.css('position', 'static');
						stk.css({
							'position': 'static',
							'top': 'auto',
							'bottom': 'auto',
						});
					}
				}
			});
  	};

  	winLoad(function () {
  		stickyCore();
  	});
  	winResize(function () {
  		stickyCore();
  	});
  };
})(window);