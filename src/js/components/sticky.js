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
