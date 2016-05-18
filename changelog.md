# Changelog

##### 3.4.0
- Added: `masonry-cluster` to support Masonry Layout.
- Added: many utility functions.
- Added: unit test for utility functions.
- Fixed: a quote warning in `get-slider-selector`.
- Fixed: `liquid-2`.
- Fixed: update parameters for `ro-transition` in `off-canvas` to prevent future syntax issues.
- Fixed: a parameter issue in `responsive-type`.
- Fixed: an issue in `grid` which cause IE8 broken layout.

##### 3.3.4
- Fixed `liquid-3`
- Improved: simplify `liquid-2`, `liquid-3` and `gallery`.

##### 3.3.3
- Fixed: `liquid-2`, `liquid-3` gutter issue when use css flexbox.

##### 3.3.2
- Fixed: a mixin name issue (breakpoint => bp).

##### 3.3.1
- Fixed: a comment issue.

##### 3.3.0
- Added: `masonry` (http://creatiointl.org/gallery/william/rocket/v3/demos/layout-masonry.php).
- Improved: add 'ro-' prefixer to `breakpoint`, `transition`, `transition-property`, `transition-duration`, `transition-timing-function`, `transition-delay`, `flexbox `, `inline-flexbox `, `flex-direction`, `flex-dir`, `flex-wrap`, `flex-flow`, `order`, `flex-grow`, `flex-shrink`, `flex-basis`, `flex`, `justify-content`, `flex-just`, `align-items`, `align-self`, `align-content`, `keyframes`, `perspective`, `perspective-origin`, `prefixer`, `disable-prefix-for-all`, `transform`, `transform-origin`, `transform-style`, `transition`, `transition-property`, `transition-duration`, `transition-timing-function`, `transition-delay` and `triangle`, to prevent clashing with other frameworks.

##### 3.2.1
- Added: scroll mode to `responsive-table`.
- Added: `responsive-table.js`.
- Added: add breakpoint to `liquid-3`(holy-grail).
- Improved: `liquid-2`, `liquid-3` now accept breakpoint parameters.
- Fixed: a parameter issue in `transition.scss`.
- Fixed: `priority-nav`, `grid` and `container`.

##### 3.2.0 
- Added: `hide-text`.
- Added: `input-file`.
- Added: `diamond` layout.
- Added: `responsive-table`.
- Improved: `gallery` now accept map parameter as breakpoints.
- Improved: `angled-edges`. Now the element with angled edges could has any background (image, gradient), but its previous and next siblings elements must be plain background.
- Fixed: a parameter issue in `gallery` when the only parameter is a number.
- Fixed: a mathematical issue in `contrast` when the color is #000.

##### 3.1.1 
- Fixed: `button: simple` border-color issue.
- Improved: remove text-decoration property from `button`.

##### 3.1.0 
- Added: `sticky-footer`.
- Added: `angled-edges`.
- Added: `parallelogram`.
- Added: `drop-shadow`.
- Improved: `grid` now works with `@media query` and can make several rows.
- Improved: rewrite `container` with `css-calc`, now you can combine `container` with other structure tags:
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
- Improved & fixed: simplify `center` and fix a layout broken issue while the content is wider than the container.
- Fixed: `off-canvas` submenu height issue.

##### 3.0.2 
- Fixed: a parameter issue in `off-canvas`.
- Improved: Errors will be thrown out if the object doesn't exist, in `sticky` and `priority-nav`.

##### 3.0.1 
- Fixed: `grid`, `liquid-2`, `liquid-3` layout issues when have a big image inside them.
- Fixed: `grid` parameter issue when items are more than 4.
- Renamed: `numIncrease` to `numChange`
- Renamed: `$ro-media-type` to `$ro-media-list-type`, `$ro-media` to `$ro-media-type`.

##### 3.0.0 
Rewrite main layout mixins using `flex-box`. Add many new sass mixins, components and javascript components.

- Added: `grid`
- Added: `metro`
- Added: `liquid-3`
- Added: `charts`
- Added: `validation`
- Added: `responsive-type`
- Added: `sticky`
- Added: `priority-nav`
- Added: `equalizer`
- Added: `reach`
- Added: `scrollTo`
- ------------------------------------------------------
- Improved: `gallery`
- Improved: `button`
- Improved: `dropdown`
- Improved: `switch`
- Improved: `tooltip`
- Improved: `slider-carousel`
- Improved: `slider-gallery`
- Improved: `type`
- Improved: `breakpoint`
- ------------------------------------------------------
- Rename & improved: `two-columns` => `liquid-2`
- Rename & improved: `mobile-nav` => `off-canvas(css)`    
- ------------------------------------------------------
- Renamed: `media` => `media-list`
- Renamed: `flex-video` => `flex-media`
- ------------------------------------------------------
- Removed: `wrap`
- Removed: `span`
- Removed: `span-calc`
- Removed: `off-canvas(js)`    