$(document).ready(function() {
    $("iframe").each(function(index) {
        var ratio = $(this).height() / $(this).width();
        var origHeight = $(this).height();
        var origWidth  = $(this).width();
        var self = this;
        // bind to window with closure that references the
        // iframe since the iframe doesn't get resize events
        // until (you know) we resize it.
        $(window).resize(function() {
            if($(self).parent().width() > origWidth) {
                $(self).width(origWidth);
                $(self).height(origHeight);
            } else {
                $(self).width($(self).parent().width());
                $(self).height($(self).parent().width() * ratio);
                $(self).css('marginLeft', parseInt($(self).parent().width()/2, 10)*-1 );
            }
        });
    });
    $(window).resize();
});
