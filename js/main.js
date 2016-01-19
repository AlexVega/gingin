/**
 * main.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */
(function() {
var support = { animations : Modernizr.cssanimations },
container = document.getElementById("container" ),
loader = new PathLoader( document.getElementById( 'loader-circle' ) ),
header = container.querySelector(".ip-header"),
animEndEventNames = { 'WebkitAnimation' : 'webkitAnimationEnd', 'OAnimation' : 'oAnimationEnd', 'msAnimation' : 'MSAnimationEnd', 'animation' : 'animationend' },
// animation end event name
animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ],
imgCount = $('#container img').length,
imgLoaded = 0;
function init() {
var onEndInitialAnimation = function() {
if( support.animations ) {
this.removeEventListener( animEndEventName, onEndInitialAnimation );
}
startLoading();
};
// disable scrolling
window.addEventListener( 'scroll', noscroll );
// initial animation
classie.add( container, 'loading' );
if( support.animations ) {
container.addEventListener( animEndEventName, onEndInitialAnimation );
}
else {
onEndInitialAnimation();
}
}
function startLoading() {
$('#container').imagesLoaded()
.progress( onProgress )
.done( onComplete );
}
function onProgress() {
imgLoaded++;
loader.setProgress(imgLoaded/imgCount);
}
function onComplete() {
classie.remove( container, 'loading' );
classie.add( container, 'loaded' );
var onEndHeaderAnimation = function(ev) {
if( support.animations ) {
if( ev.target !== header ) return;
this.removeEventListener( animEndEventName, onEndHeaderAnimation );
}
classie.add( document.body, 'layout-switch' );
window.removeEventListener( 'scroll', noscroll );
};
if( support.animations ) {
header.addEventListener( animEndEventName, onEndHeaderAnimation );
}
else {
onEndHeaderAnimation();
}
}
function noscroll() {
window.scrollTo( 0, 0 );
}
init();
})();