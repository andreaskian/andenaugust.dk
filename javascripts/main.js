'use strict';

var scrollPos = [];

var getScroll = function() {
    var doc  = document.documentElement;
    var left = (window.pageXOffset || doc.scrollLeft) - (doc.clientLeft || 0);
    var top  = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);
    return [left,top];
};

var initAnimation = function () {
    scrollPos = getScroll();
    if ( scrollPos[1] > 800 ) {
        document.querySelector('#guestlist').classList.add('animate');

        window.removeEventListener('scroll', initAnimation, false);
    }
};

window.addEventListener('scroll', initAnimation, false);