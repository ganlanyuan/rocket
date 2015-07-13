// equalizer
// equalizer('.item1', '#item2')
// equalizer('.parent .item')

function equalizer(){
  var heights = [],
      args,
      value,
      len = arguments.length;

  if (len === 1) {
    args = k(arguments[0]);
    args.css('height', 'auto');
    heights.push(args.outerHeight());
  } else {
    args = arguments;
    for (var i = 0; i < args.length; i++) {
      k(args[i]).css('height', 'auto');
      heights.push(k(args[i]).outerHeight());
    };
  }

  value = Math.max.apply(Math, heights) + 'px';

  if (len === 1) {
    args.css('height', value);
  } else{
    for (var i = 0; i < args.length; i++) {
      k(args[i]).css('height', value);
    };
  }
}