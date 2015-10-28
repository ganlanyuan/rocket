# Changelog

### 3.1.0 beta
+ Improved: `grid` now works with `@media query` and can make several rows.
+ Improved: rewrite `container` with `css-calc`, now you can combine `container` with other structure tags:
```html
<header class="header container">
  <!-- Content -->
</header>
```
instead of separate them:
``` html
<header class="header">
  <div class="container">
    <!-- Content -->
  </div>
</header>
```
+ Fixed: `off-canvas` submenu height issue.

### 3.0.2 
+ Fixed: a parameter issue in `off-canvas`.
+ Improved: Errors will be thrown out if the object doesn't exist, in `sticky` and `priority-nav`.

### 3.0.1 
+ Fixed: `grid`, `liquid-2`, `liquid-3` layout issues when have a big image inside them.
+ Fixed: `grid` parameter issue when items are more than 4.
+ Renamed: `numIncrease` to `numChange`
+ Renamed: `$ro-media-type` to `$ro-media-list-type`, `$ro-media` to `$ro-media-type`.

### 3.0.0 
Rewrite main layout mixins using `flex-box`. Add many new sass mixins, components and javascript components.

+ Added: `grid`
+ Added: `metro`
+ Added: `liquid-3`
+ Added: `charts`
+ Added: `validation`
+ Added: `responsive-type`
+ Added: `sticky`
+ Added: `priority-nav`
+ Added: `equalizer`
+ Added: `reach`
+ Added: `scrollTo`
+ ------------------------------------------------------
+ Improved: `gallery`
+ Improved: `button`
+ Improved: `dropdown`
+ Improved: `switch`
+ Improved: `tooltip`
+ Improved: `slider-carousel`
+ Improved: `slider-gallery`
+ Improved: `type`
+ Improved: `breakpoint`
+ ------------------------------------------------------
+ Rename & improved: `two-columns` => `liquid-2`
+ Rename & improved: `mobile-nav` => `off-canvas(css)`    
+ ------------------------------------------------------
+ Renamed: `media` => `media-list`
+ Renamed: `flex-video` => `flex-media`
+ ------------------------------------------------------
+ Removed: `wrap`
+ Removed: `span`
+ Removed: `span-calc`
+ Removed: `off-canvas(js)`    