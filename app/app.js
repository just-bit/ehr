'use strict';

// Depends
let $ = require('jquery');
require('bootstrap-sass');

// Modules
let Slider = require('./modules/slider');

// Stylesheet entrypoint
import './assets/stylesheets/app.scss';

// Are you ready?
$(function () {
    new Slider();

    // fixed header

    var header = $('.header'),
        scrollPrev = 0;

    $(window).scroll(function() {
        var scrolled = $(window).scrollTop();

        if (scrolled > 200 && scrolled) {
            header.addClass('fixed');
            $('body').addClass('fixed-header');
        } else {
            header.removeClass('fixed');
            $('body').removeClass('fixed-header');
        }
        scrollPrev = scrolled;
    });

    // accordion

    $('.accordion-item__head').on('click', function () {
        $(this).closest('.accordion-item').toggleClass('active').siblings().removeClass('active');
        $(this).next('.accordion-item__body').slideToggle().closest('.accordion-item').siblings().find('.accordion-item__body').slideUp();
    });

    // mobile menu

    $('.mobile-btn').on('click', function() {
        $(this).toggleClass('active');
        $('.mobile-menu').toggleClass('active');
        $('html').toggleClass('open-mobile-menu');
        $('body').toggleClass('open-mobile-menu').removeClass('search-shown open-search-results');
        $('.header-search__btn').removeClass('active');
        $('.header-search__wrapper').removeClass('focus');
    });

    const $menuList = $('.mobile-menu__list');

    $menuList.on('click', '.menu-item-has-children > span > i', function() {
        const $submenu = $(this).parent().next('div[class*="mobile-menu__lvl"]');
        if ($submenu.length > 0) {
            const level = $submenu.attr('class').match(/lvl(\d+)/)[1];
            $submenu.addClass('show');
            $('body').addClass('mm-lvl' + level);
        }
    });

    $menuList.on('click', '.menu-back > i', function() {
        const $submenu = $(this).closest('div[class*="mobile-menu__lvl"]');
        if ($submenu.length > 0) {
            const level = $submenu.attr('class').match(/lvl(\d+)/)[1];
            $submenu.removeClass('show');
            $('body').removeClass('mm-lvl' + level);
        }
    });

});
