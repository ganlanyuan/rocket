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

  value = Math.max.apply(Math, heights);

  if (len === 1) {
    args.css('height', value);
  } else{
    for (var j = 0; j < args.length; j++) {
      var thisEle = kit(args[j]),
          thisVal,
          bt = getPxValue(thisEle.getCurrentStyle('borderTopWidth')),
          bb = getPxValue(thisEle.getCurrentStyle('borderBottomWidth')),
          pt = getPxValue(thisEle.getCurrentStyle('paddingTop')),
          pb = getPxValue(thisEle.getCurrentStyle('paddingBottom'));
          
      thisVal = value - (bt + bb + pt + pb) + 'px';

      thisEle.css('height', thisVal);
    }
  }
}