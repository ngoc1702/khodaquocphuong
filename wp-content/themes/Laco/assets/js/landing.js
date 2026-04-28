/**
 * Landing Page JavaScript
 * Handle carousels, animations, and interactions
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Initialize Courses Slider
        initializeCoursesSlider();
        
        // Initialize Testimonials Slider
        initializeTestimonialsSlider();
        
        // Smooth Scroll
        initializeSmoothScroll();
        
        // Lazy Load Images
        initializeLazyLoad();
    });

    /**
     * Initialize Courses Carousel
     */
    function initializeCoursesSlider() {
        var $slider = $('.courses-slider');
        
        if ($slider.length > 0) {
            $slider.slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 3000,
                dots: true,
                arrows: true,
                prevArrow: '<button class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        }
    }

    /**
     * Initialize Testimonials Carousel
     */
    function initializeTestimonialsSlider() {
        var $slider = $('.testimonials-slider');
        
        if ($slider.length > 0) {
            $slider.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                dots: true,
                arrows: true,
                prevArrow: '<button class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        }
    }

    /**
     * Smooth Scroll Navigation
     */
    function initializeSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            var target = $(this).attr('href');
            if ($(target).length) {
                var offset = $(target).offset().top - 100;
                $('html, body').animate({
                    scrollTop: offset
                }, 1000);
            }
        });
    }

    /**
     * Lazy Load Images
     */
    function initializeLazyLoad() {
        if ('IntersectionObserver' in window) {
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.add('loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Scroll to Top Button
     */
    var $scrollTop = $('<button class="scroll-to-top" title="Back to top">↑</button>');
    $('body').append($scrollTop);

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 200) {
            $scrollTop.addClass('visible');
        } else {
            $scrollTop.removeClass('visible');
        }
    });

    $scrollTop.on('click', function() {
        $('html, body').animate({ scrollTop: 0 }, 500);
    });

})(jQuery);
