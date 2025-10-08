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
    let scrollHandler = null;
    let mouseDownHandler = null;
    let mouseUpHandler = null;
    let mouseLeaveHandler = null;
    let mouseMoveHandler = null;

    function initMarquee() {
        if (isInitialized || window.innerWidth > 1439) return;

        // Save original content if not saved yet
        if (!originalContent) {
            originalContent = marqueeInner.innerHTML;
        }

        // Clone content for infinite scroll (25 copies for smoother transitions)
        let contentClones = '';
        for (let i = 0; i < 25; i++) {
            contentClones += originalContent;
        }
        marqueeInner.innerHTML = contentClones;

        // Set initial position to center (13th copy)
        setTimeout(() => {
            const scrollWidth = marquee.scrollWidth;
            marquee.scrollLeft = (scrollWidth / 25) * 12;
        }, 100);

        // Infinite scroll logic with seamless looping
        let scrollTimeout;
        
        scrollHandler = () => {
            clearTimeout(scrollTimeout);
            
            // Wait for scroll to stop before repositioning
            scrollTimeout = setTimeout(() => {
                const scrollWidth = marquee.scrollWidth;
                const segmentWidth = scrollWidth / 25;
                const currentScroll = marquee.scrollLeft;

                // Calculate position within current segment
                const positionInSegment = currentScroll % segmentWidth;
                
                // If we're in the first few or last few segments, jump to the center
                if (currentScroll < segmentWidth * 5) {
                    // First segments - jump to center
                    marquee.scrollLeft = segmentWidth * 12 + positionInSegment;
                } 
                else if (currentScroll > segmentWidth * 20) {
                    // Last segments - jump to center
                    marquee.scrollLeft = segmentWidth * 12 + positionInSegment;
                }
            }, 100);
        };

        // Mouse drag to scroll
        let isDown = false;
        let startX;
        let scrollLeft;

        mouseDownHandler = (e) => {
            isDown = true;
            marquee.classList.add('active');
            startX = e.pageX - marquee.offsetLeft;
            scrollLeft = marquee.scrollLeft;
            // marquee.style.cursor = 'grabbing';
        };

        mouseUpHandler = () => {
            isDown = false;
            marquee.classList.remove('active');
            // marquee.style.cursor = 'grab';
        };

        mouseLeaveHandler = () => {
            isDown = false;
            marquee.classList.remove('active');
            // marquee.style.cursor = 'grab';
        };

        mouseMoveHandler = (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - marquee.offsetLeft;
            const walk = (x - startX) * 2;
            marquee.scrollLeft = scrollLeft - walk;
        };

        // Add event listeners
        // marquee.style.cursor = 'grab';
        marquee.addEventListener('scroll', scrollHandler, { passive: true });
        marquee.addEventListener('mousedown', mouseDownHandler);
        marquee.addEventListener('mouseup', mouseUpHandler);
        marquee.addEventListener('mouseleave', mouseLeaveHandler);
        marquee.addEventListener('mousemove', mouseMoveHandler);

        isInitialized = true;
    }

    function destroyMarquee() {
        if (!isInitialized) return;

        // Remove event listeners
        if (scrollHandler) {
            marquee.removeEventListener('scroll', scrollHandler);
        }
        if (mouseDownHandler) {
            marquee.removeEventListener('mousedown', mouseDownHandler);
        }
        if (mouseUpHandler) {
            marquee.removeEventListener('mouseup', mouseUpHandler);
        }
        if (mouseLeaveHandler) {
            marquee.removeEventListener('mouseleave', mouseLeaveHandler);
        }
        if (mouseMoveHandler) {
            marquee.removeEventListener('mousemove', mouseMoveHandler);
        }

        // Restore original content
        if (originalContent) {
            marqueeInner.innerHTML = originalContent;
        }

        // marquee.style.cursor = '';
        marquee.scrollLeft = 0;
        marquee.classList.remove('active');
        isInitialized = false;
    }

    function handleResize() {
        if (window.innerWidth <= 1439) {
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

