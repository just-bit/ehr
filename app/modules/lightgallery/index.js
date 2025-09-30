'use strict';

require('./index.scss');

let $ = require('jquery');
require('lightgallery');
require('lg-thumbnail');
// require('lg-autoplay');
// require('lg-video');
// require('lg-fullscreen');
// require('lg-pager');
// require('lg-zoom');
// require('lg-hash');
// require('lg-share');

module.exports = function () {
    $('.lightgallery').each(function () {
        let $this = $(this);
        let settings = {};
        if (typeof $this.data('lightgallery-settings') == 'object') {
            settings = $this.data('lightgallery-settings');
        }
        $(this).lightGallery(settings);
    });
};


