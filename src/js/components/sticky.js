(function (window, undefined) {
  sticky = function(sticky, stickyP, stkT) {
		window.onscroll = function () {
			var stk = k(sticky),
			    stkP = k(stickyP),
					stkH = stk.outerHeight(),
					parentH = stkP.outerHeight(),
					tTop = stk.offset().top - stkT,
					tBottom = (stkP.getTop() + stkP.outerHeight()) - (k.win.ST() + stkH),
					winST = k.win.ST(),
					winH = k.win.H();

			stk.html(winST + ' ,' + tTop + ' ,' + tBottom);
			if (stkH >= winH) {} else {
				if (tTop <= 0 && tBottom > 0) {
					console.log('touch top');
				} else if (tBottom <= 0) {
					console.log('touch bottom');
				}
			}
		};
  };
})(window);

ready(function () {
	sticky('.sticky', '.wrapper', 20);
})
