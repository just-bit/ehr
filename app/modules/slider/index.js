'use strict';

require("./index.scss");

var $ = require('jquery');
require('slick-carousel');

module.exports = function() {
  $('.slick-slider').each(function() {
    var $this = $(this);
    if ($this.parents('.hidden').length == 0) {
      $this.slick();
    }
  });

  $('.video-next').on('click', function() {
    $('.video-slider').slick('slickNext');
  });

  $('.video-prev').on('click', function() {
    $('.video-slider').slick('slickPrev');
  });
};
