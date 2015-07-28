// ========== LANGUAGE EXTENSIONS ==========
if (typeof String.prototype.trim === "undefined") {
  String.prototype.trim = function() {
    return this.replace( /^\s+/, "" ).replace( /\s+$/, "" );
  };
}

if (typeof Array.prototype.indexOf !== 'function') {
  Array.prototype.indexOf = function (item) {
    for(var i = 0; i < this.length; i++) {
      if (this[i] === item) {
        return i;
      }
    }
    return -1;
  }; 
}
