# Rocket v4

![Version](https://img.shields.io/badge/Version-4.0.0-beta4-blue.svg)   
Rocket is a powerful Sass framework with many common used components and utility functions, to help you build websites faster and easier.    
Great thanks to [BrowserStack Team <img src="https://avatars0.githubusercontent.com/u/1119453?v=3&s=200" alt="BrowserStack" width=30 align=top>](http://www.browserstack.com/) for giving the access to test this project.  

#### What's new in version 4
- Simplify layout mixins (remove flex-box, IE8 classes).  
- Rename `liquid-2` to `liquid`, `liquid-3` to `holy-grail`.
- Remove CSS sliders (`slider-carousel`, `slider-gallery`), `sticky-footer`, `type`, `responsive-type`, `opacity`, `ie-rgba`, `media-list`.
<!-- - Add acceessibility support. -->
- Remove kit.js.
- Drop IE8 support.

[version 2](https://github.com/ganlanyuan/rocket/tree/v2)   
[version 3](https://github.com/ganlanyuan/rocket/tree/v3)   

#### Requests
+ Please replace `<html>` with the markup below for better IE support.
``` html
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie10 lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js lt-ie10" lang="en"><![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"><!--<![endif]-->
```

# Install

```` bash
$ bower install rocket --save
$ npm install rocket-sass --save
````

# Docs
[Guide](https://ganlanyuan.github.io/rocket.site/v4/guide.html)  
[Docs](https://ganlanyuan.github.io/rocket.site/v4/docs.html)  

# License
This project is available under the MIT license.