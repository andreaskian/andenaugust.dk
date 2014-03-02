'use strict';

/**
 * Set up guestlist
 */
(function() {

    var guestlist = document.querySelector('#guestlist'),
        guests    = guestlist.querySelectorAll('.guest'),
        i         = 0;

    if ( guestlist === null || guests.length === 0 ) {
        return;
    }

    for ( i = 0; i < guests.length; i++ ) {

        var li  = guests[i],
            img = li.querySelector('img'),
            src = li.dataset.fbUsername ? 'http://graph.facebook.com/' + li.dataset.fbUsername + '/picture' : null;

            if (img === null || src === null ) {
                continue;
            }

            img.setAttribute('src', src);

    }

})();