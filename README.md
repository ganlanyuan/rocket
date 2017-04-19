# Rocket v3

![Version](https://img.shields.io/badge/Version-3.4.14-blue.svg)   
Rocket is a powerful Sass framework with many common used components and utility functions, to help you build websites faster and easier.    
Great thanks to [BrowserStack Team <img src="https://avatars0.githubusercontent.com/u/1119453?v=3&s=200" alt="BrowserStack" width=30 align=top>](http://www.browserstack.com/) for giving the access to test this project.  
[demos](http://creatiointl.org/william/rocket/v3/layout-grid.php)   

#### What's new in version 3
Rewrite main layout mixins using `flex-box`. 
Add many new sass mixins, components and javascript components.
+ Scss: `grid`, `metro` , `liquid-3` , `charts` , `validation` , `responsive-type`  
+ Javascript: `sticky` , `priority-nav` , `equalizer` , `reach` , `scrollTo`
+ Improved `ro-breakpoint`: use a single breakpoint (e.g. 800) for both `min` and `max` instead of two (e.g. 799 for `max`, 800 for `min`). You can set `$breakpoint-fix: false;` to turn off this feature.

#### Requests
+ <del>[Modernizr](http://v3.modernizr.com/) (`csscolumns`, `csstransforms`, `cssanimations`, `flexbox`, `flexboxtweener`, `flexwrap`).</del> Update: not required from [v3.4.2](https://github.com/ganlanyuan/rocket/tree/v3.4.2).    
+ [Selectivizr](http://selectivizr.com/) and a Javascript library (if you're not using one).  
+ Please replace `<html>` with the markup below for better IE support.
``` html
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie10 lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js lt-ie10" lang="en"><![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"><!--<![endif]-->
```

#### Tips
+ `Flexbox` 2009 syntax is not supported.  
+ Looking for version 2? please go to branch [v2](https://github.com/ganlanyuan/rocket/tree/v2) 

# Install

```` bash
$ bower install rocket --save
$ npm install rocket-sass --save
````

# Docs
[Guide](https://ganlanyuan.github.io/rocket.site/guide.html)  
[Docs](https://ganlanyuan.github.io/rocket.site/docs.html)  

# License
This project is available under the MIT license.
