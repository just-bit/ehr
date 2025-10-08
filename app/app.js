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

    $(".header-menu, .mobile-menu, .footer-menu").find('a:not([href])').attr('href', 'javascript:void(0)');

});

// marquee
document.addEventListener('DOMContentLoaded', function () {
    const marquee = document.querySelector('.main-marquee');
    if (!marquee) return;

    const marqueeInner = marquee.querySelector('.main-marquee__inner[data-marquee-content]');
    if (!marqueeInner) return;

    let isInitialized = false;
    let originalContent = null;
    let handlers = {
        mousedown: null,
        mouseup: null,
        mouseleave: null,
        mousemove: null,
        touchstart: null,
        touchend: null,
        touchmove: null,
        scroll: null
    };

    function initMarquee() {
        if (isInitialized || window.innerWidth > 1480) return;

        // Save original content if not saved yet
        if (!originalContent) {
            originalContent = marqueeInner.innerHTML;
        }

        // Clone content for infinite scroll
        marqueeInner.innerHTML = originalContent + originalContent + originalContent;

        // Set initial position to center
        setTimeout(() => {
            const scrollWidth = marquee.scrollWidth;
            marquee.scrollLeft = scrollWidth / 3;
        }, 100);

        let isDown = false;
        let startX;
        let startY;
        let scrollLeft;
        let isDragging = false;

        // Mouse events
        handlers.mousedown = (e) => {
            isDown = true;
            isDragging = false;
            marquee.classList.add('active');
            startX = e.pageX - marquee.offsetLeft;
            scrollLeft = marquee.scrollLeft;
        };

        handlers.mouseup = () => {
            isDown = false;
            marquee.classList.remove('active');
        };

        handlers.mouseleave = () => {
            isDown = false;
            marquee.classList.remove('active');
        };

        handlers.mousemove = (e) => {
            if (!isDown) return;
            e.preventDefault();
            isDragging = true;
            const x = e.pageX - marquee.offsetLeft;
            const walk = (x - startX) * 2;
            marquee.scrollLeft = scrollLeft - walk;
        };

        // Touch events for mobile
        handlers.touchstart = (e) => {
            isDown = true;
            isDragging = false;
            startX = e.touches[0].pageX - marquee.offsetLeft;
            startY = e.touches[0].pageY;
            scrollLeft = marquee.scrollLeft;
        };

        handlers.touchend = () => {
            isDown = false;
        };

        handlers.touchmove = (e) => {
            if (!isDown) return;
            
            const x = e.touches[0].pageX - marquee.offsetLeft;
            const y = e.touches[0].pageY;
            const walkX = Math.abs(x - startX);
            const walkY = Math.abs(y - startY);

            // Check if the movement is horizontal
            if (walkX > walkY && walkX > 5) {
                isDragging = true;
                const walk = (x - startX) * 1.5;
                marquee.scrollLeft = scrollLeft - walk;
            }
        };

        // Infinite scroll logic
        handlers.scroll = () => {
            const scrollWidth = marquee.scrollWidth;
            const oneThird = scrollWidth / 3;

            if (marquee.scrollLeft <= 0) {
                marquee.scrollLeft = oneThird;
            } else if (marquee.scrollLeft >= oneThird * 2) {
                marquee.scrollLeft = oneThird;
            }
        };

        // Add event listeners
        marquee.addEventListener('mousedown', handlers.mousedown);
        marquee.addEventListener('mouseup', handlers.mouseup);
        marquee.addEventListener('mouseleave', handlers.mouseleave);
        marquee.addEventListener('mousemove', handlers.mousemove);
        marquee.addEventListener('touchstart', handlers.touchstart, { passive: true });
        marquee.addEventListener('touchend', handlers.touchend, { passive: true });
        marquee.addEventListener('touchmove', handlers.touchmove, { passive: true });
        marquee.addEventListener('scroll', handlers.scroll);

        isInitialized = true;
    }

    function destroyMarquee() {
        if (!isInitialized) return;

        // Remove event listeners
        marquee.removeEventListener('mousedown', handlers.mousedown);
        marquee.removeEventListener('mouseup', handlers.mouseup);
        marquee.removeEventListener('mouseleave', handlers.mouseleave);
        marquee.removeEventListener('mousemove', handlers.mousemove);
        marquee.removeEventListener('touchstart', handlers.touchstart);
        marquee.removeEventListener('touchend', handlers.touchend);
        marquee.removeEventListener('touchmove', handlers.touchmove);
        marquee.removeEventListener('scroll', handlers.scroll);

        // Restore original content
        if (originalContent) {
            marqueeInner.innerHTML = originalContent;
        }

        marquee.scrollLeft = 0;
        marquee.classList.remove('active');
        isInitialized = false;
    }

    function handleResize() {
        if (window.innerWidth <= 1480) {
            initMarquee();
        } else {
            destroyMarquee();
        }
    }

    // Initial setup
    handleResize();

    // Handle resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(handleResize, 250);
    });
});

