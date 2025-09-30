'use strict';

require('./jquery.fancybox.min.scss');

window.jQuery = require('jquery');

module.exports = function() {
  $('.fancybox').fancybox();
};
