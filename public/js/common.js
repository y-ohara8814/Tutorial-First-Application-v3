$(function () {

    $('.popup-youtube').magnificPopup({
        type: 'iframe'
    });
    $('.popup-image').magnificPopup({
        type: 'image',

        mainClass: 'mfp-zoom-in',
        tLoading: '',
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {

            imageLoadComplete: function () {
                var self = this;
                setTimeout(function () {
                    self.wrap.addClass('mfp-image-loaded');
                }, 16);
            },
            close: function () {
                this.wrap.removeClass('mfp-image-loaded');
            },




            // don't add this part, it's just to avoid caching of image
            beforeChange: function () {
                this.items[0].src = this.items[0].src + '?=' + Math.random();
            }
        },

        closeBtnInside: false,
        closeOnContentClick: true,
        midClick: true
    });

});
