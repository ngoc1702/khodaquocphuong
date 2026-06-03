(function ($) {
  'use strict';

  $(function () {
    var $header = $('.water-header');

    function updateHeader() {
      $header.toggleClass('is-scrolled', $(window).scrollTop() > 8);
    }

    if ($header.length) {
      updateHeader();
      $(window).on('scroll.waterCareHeader resize.waterCareHeader', updateHeader);
    }

    $('.water-care-landing a[href^="#"], .water-header a[href^="#"], .water-footer a[href^="#"]').on('click', function (event) {
      var hash = $(this).attr('href');
      var target;
      var headerOffset;
      var adminBarOffset;
      var targetTop;

      if (!hash || hash === '#') {
        return;
      }

      target = document.getElementById(hash.substring(1));

      if (!target) {
        return;
      }

      event.preventDefault();

      headerOffset = $header.length ? $header.outerHeight() : 0;
      adminBarOffset = $('#wpadminbar').length ? $('#wpadminbar').outerHeight() : 0;
      targetTop = Math.max($(target).offset().top - headerOffset - adminBarOffset - 12, 0);

      $('html, body').stop().animate({
        scrollTop: targetTop
      }, 500).promise().done(function () {
        if (window.history && window.history.pushState) {
          window.history.pushState(null, '', hash);
        }
      });
    });
  });
})(jQuery);
