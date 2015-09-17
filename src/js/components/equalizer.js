// equalizer
// equalizer('.item1', '#item2')
// equalizer('.parent .item')

function equalizer(){
  var heights = [],
      args,
      value,
      len = arguments.length;

  if (len === 1) {
    args = kit(arguments[0]);
    args.css('height', 'auto');
    heights.push(args.outerHeight());
  } else {
    args = arguments;
    for (var i = 0; i < args.length; i++) {
      kit(args[i]).css('height', 'auto');
      heights.push(kit(args[i]).outerHeight());
    }
  }

  value = Math.max.apply(Math, heights) + 'px';

  if (len === 1) {
    args.css('height', value);
  } else{
    for (var j = 0; j < args.length; j++) {
      kit(args[j]).css('height', value);
    }
  }
}