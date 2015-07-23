function getPxValue (val) {
	var unit = val.match(/\D+$/),
			valPx;
	if (unit === 'em') {
		valPx = Math.round(val.replace(/[A-Za-z]+/, '') * 16);
	} else {
		valPx = val.replace(/[A-Za-z]+/, '');
	}

	return valPx;
}

(function (window, undefined) {
  sticky = function(sticky, stickyP, stkT) {
  	window.onload = function () {
			var winH = k.win.H(),
					stk = k(sticky),
			    parent = k(stickyP),
			    stkOT = stk.getTop(),
					stkH = stk.outerHeight(),
					stkW = stk.outerWidth(),
					stkMT = getPxValue(stk.getCurrentStyle('marginTop')),
					stkMB = getPxValue(stk.getCurrentStyle('marginBottom')),
					parentOT = parent.getTop(),
					parentH = parent.outerHeight(),
					T1,
					T2,
					B1,
					B2;
			window.onscroll = function () {
				(typeof stkT === 'number') ? stkT = stkT: stkT = k(stkT).outerHeight();

				var winST = k.win.ST();

				if ((stkH + stkT) > winH) {
					T1 = B1 = winST + winH;
					T2 = stkOT + stkH;
					B2 = parentOT + parentH;

					if (T1 > T2 && B1 <= B2 ) {
						stk.css({
							'position': 'fixed',
							'bottom': 0,
							'width': stkW + 'px',
						});
					} else if (B1 > B2){
						parent.css('position', 'relative');
						stk.css({
							'position': 'absolute',
						});
					} else {
						parent.css('position', 'static');
						stk.css({
							'position': 'static',
							'bottom': 'auto',
							'width': 'auto',
						});
					}
				} else {
					T1 = winST + stkT;
					T2 = stkOT;
					B1 = winST + stkT + stkH;
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
			};
  	};
  };
})(window);

// ready(function () {
// 	var header = k('.header');
// 	sticky('.sticky', '.wrapper', '.header');
// 	document.onscroll = function () {
// 		if (k.win.ST() > 10) {
// 			header.css({
// 				'position': 'fixed',
// 				'width': '1000px',
// 				'top': '0',
// 			});
// 			k('body').css('padding-top', '130px');
// 		} else{
// 			header.css({
// 				'position': 'static',
// 				'width': 'auto',
// 			});
// 			k('body').css('padding-top', '0');
// 		}
// 	};
// });
