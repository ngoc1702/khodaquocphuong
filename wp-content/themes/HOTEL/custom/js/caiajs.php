<?php

// Thêm file jquery
add_action('wp_footer', 'caia_add_file_jquery');
function caia_add_file_jquery(){
?>

<script>

document.querySelectorAll('.circle p').forEach(p => {
  if (!p.textContent.trim()) {
    p.remove();
  }
});


</script>


<script>


jQuery(document).ready(function($) {
  var $roomShowcase = $(".hotel-room-showcase");

  if (!$roomShowcase.length || !$.fn.slick || $roomShowcase.hasClass("slick-initialized") || $roomShowcase.children(".hotel-room-card").length < 2) {
    return;
  }

  $roomShowcase.slick({
    arrows: true,
    infinite: true,
    dots: false,
    speed: 600,
    autoplay: true,
    autoplaySpeed: 8000,
    pauseOnHover: false,
    pauseOnFocus: false,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
});



jQuery(document).ready(function($) {
  var $offersTrack = $(".hotel-offers__track");

  if (!$offersTrack.length || !$.fn.slick || $offersTrack.hasClass("slick-initialized") || $offersTrack.children(".hotel-offer-card").length < 2) {
    return;
  }

  $offersTrack.slick({
    arrows: true,
    dots: false,
    speed: 600,
    autoplay: true,
    autoplaySpeed: 5000,
    pauseOnHover: false,
    pauseOnFocus: false,
    slidesToShow: 3,
    slidesToScroll: 1,
   responsive: [
      {
        breakpoint: 1440, 
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
});


jQuery(document).ready(function($) {
  function initSlickForMobile(selector, options) {
    if ($(window).width() < 768) {
      if (!$(selector).hasClass('slick-initialized')) {
        $(selector).slick(options);
      }
    } else {
      if ($(selector).hasClass('slick-initialized')) {
        $(selector).slick('unslick');
      }
    }
  }

  function handleSlickInit() {
    // Cấu hình riêng cho từng class
    initSlickForMobile('.chatluong-wrapper', {
      arrows: false,
      infinite: true,
      dots: true,
      speed: 600,
      autoplay: false,
      autoplaySpeed: 6000,
      pauseOnHover: false,
      pauseOnFocus: false,
      slidesToShow: 1,
      slidesToScroll: 1
    });

    initSlickForMobile('.camket-box', {
      arrows: false,
      infinite: false,
      dots: true,
      speed: 600,
      autoplay: true,
      autoplaySpeed: 4000,
      pauseOnHover: true,
      pauseOnFocus: false,
      slidesToShow: 1.6,
      slidesToScroll: 2
    });
  }

  // Gọi khi tải trang
  handleSlickInit();

  // Gọi lại khi resize cửa sổ
  $(window).on('resize', function() {
    handleSlickInit();
  });
});


</script>



<script>

	document.addEventListener("DOMContentLoaded", function () {
  const counters = document.querySelectorAll(".content-thanhtuu ul li span");

  counters.forEach(counter => {
    const target = parseInt(counter.textContent.replace(/\D/g, "")); // Lấy số từ <em>
    counter.textContent = "0"; // Bắt đầu từ 0

    let count = 0;
    const speed = 30; // ms mỗi lần tăng
    const increment = Math.ceil(target / 100); // tăng từng bước nhỏ

    const updateCount = () => {
      count += increment;
      if (count >= target) {
        counter.textContent = target;
      } else {
        counter.textContent = count;
        setTimeout(updateCount, speed);
      }
    };

    updateCount();
  });
});

jQuery(document).ready(function($) {

  // mở popup từ header
    $('.site-header p').click(function () {
        $('.nhantuvan').show();
        $('.nhantuvan .widget_caldera_forms_widget').show();
    });

    // mở popup từ CTA
    $(document).on('click', '.btn-cta', function () {
        $('.nhantuvan').show();
        $('.nhantuvan .widget_caldera_forms_widget').show();
    });

    // mở popup từ course button
    $(document).on('click', '.course-btn', function () {
        $('.nhantuvan').show();
        $('.nhantuvan .widget_caldera_forms_widget').show();
    });

    // đóng popup
    $('.nhantuvan .widget_caldera_forms_widget .widgettitle').click(function () {
        $('.nhantuvan').hide();
        $('.nhantuvan .widget_caldera_forms_widget').hide();
    });



  var youtube = document.querySelectorAll( ".youtube" );
      for (var i = 0; i < youtube.length; i++) {
          // thumbnail image source.
          var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/hqdefault.jpg"; 

          // Load the image asynchronously
          var image = new Image();
              image.src = source;
              image.addEventListener( "load", function() {
                  youtube[ i ].appendChild( image );
              }( i ) );

          youtube[i].addEventListener( "click", function() {

          var iframe = document.createElement( "iframe" );
   
              iframe.setAttribute( "frameborder", "0" );
              iframe.setAttribute( "allowfullscreen", "" );
              iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );
   
              this.innerHTML = "";
              this.appendChild( iframe );
      } );
       
      }

  


	$('').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: false,
		arrows: false,
		fade: true,
		asNavFor: ''
	});

	$('').slick({
	    slidesToShow: 2,
	    slidesToScroll: 1,
	    infinite: false,
	    asNavFor: '',
	    dots: false,
	    arrows: true,
	    centerMode: false, 
	    focusOnSelect: true
	});

	var nav = $('.nav-primary');
	var head =$('.site-header');
	var click =$('#click-menu');
	var menu = $('#responsive-menu');
	var close = $('#click-menu-close');
	var nhantuvan = $('.nhantuvan');

	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			nav.addClass("f-nav");
			head.addClass("f-head");
			click.addClass("f-click");
			menu.addClass("f-menu");
			close.addClass("f-close");
			nhantuvan.addClass("f-tuvan");

		} else {
			nav.removeClass("f-nav");
			head.removeClass("f-head");
			click.removeClass("f-click");
			menu.removeClass("f-menu");
			close.removeClass("f-close");
			nhantuvan.removeClass("f-tuvan");
		}
		
	});


// đại diện vn

if ($(window).width() > 960) {

	// const slider = document.querySelector('.content-doitac ul');
  // slider.innerHTML += slider.innerHTML; // Clone toàn bộ li

	// $(".content-doitac ul").slick({
	//   arrows: false,
  // infinite: true,
  // dots: false,
  // speed: 15000,             // chậm dần nhưng liên tục
  // cssEase: 'linear',
  // autoplay: true,
  // autoplaySpeed: 0,
  // pauseOnHover: false,
  // pauseOnFocus: false,
  // slidesToShow: 6,
  // slidesToScroll: 1,
  // variableWidth: true,
	// });


}else{

	

	$("").slick({
		arrows: false,
			infinite: true,
			dots: true,
			speed: 600,	
			autoplay: true,
			autoplaySpeed: 5000,	
			pauseOnHover: false,
			pauseOnFocus: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: false,
			variableWidth: false,
			dotsClass: 'custom_paging',
		    customPaging: function (slider, i) {
		        return '<span class="line"></span>';
		    },
	});	


}


$("").slick({
		arrows: true,
		infinite: true,
		dots: false,
		speed: 600,	
		autoplay: false,
		autoplaySpeed: 5000,	
		pauseOnHover: false,
		pauseOnFocus: false,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
			{
			breakpoint: 961,
				settings: {
					slidesToShow: 4,
				}
			},
			{
			breakpoint: 769,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					arrows: false,
					dots: true,
					dotsClass: 'custom_paging',
		    customPaging: function (slider, i) {
		        return '<span class="line"></span>';
		    },
				}
			}
		]
	});

	
	$('a[href*=\\#]:not([href=\\#])').click(function() {
		if (location.pathname.replace('/^\//','') == this.pathname.replace('/^\//','') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html,body').animate({
			  scrollTop: target.offset().top-50
			}, 500);
			return false;
		  }
		}
	});	
});
</script>

<script>
jQuery(document).ready( function($){
	$(".content .comment-form #submit").click(function(){
		var comment_content = $(".content .comment-form #comment").val();
		if( !comment_content )
		{
			alert('Bạn chưa nhập nội dung bình luận!');
			return false;
		}else{
			$(".content .comment-form .popup-comment").fadeIn();
			return false;
		}
	});
	$(".content .comment-form .popup-comment .close-popup-comment").click(function(){
		$(".content .comment-form .popup-comment").fadeOut();
	});
	$("main.content #respond input#submit-commnent").click(function(){
		var comment_name = $(".content .comment-form #author").val();
		var comment_email = $(".content .comment-form #email").val();
		var comment_phone = $(".content .comment-form .comment-form-phone #author").val();
		if( !comment_name ){
			alert('Bạn chưa nhập họ và tên!');
			return false;
		}else if( !comment_email ){
			alert('Bạn chưa nhập email!');
			return false;
		}else if( !comment_phone ){
			alert('Bạn chưa nhập số điện thoại!');
			return false;
		}else{
			$(".content #commentform").submit();
			$(".content .comment-form .popup-comment").fadeOut();
		}
	});
});
</script>


<script>
(function ($) {
    'use strict';

    $(function () {
        var $videoModal = $('.hotel-video-modal');
        var $videoFrame = $videoModal.find('[data-video-frame]');
        var lastVideoTrigger = null;

        function getHotelVideoEmbed(url) {
            if (!url || url === '#') {
                return null;
            }

            try {
                var parsedUrl = new URL(url, window.location.href);
                var host = parsedUrl.hostname.replace(/^www\./, '');
                var videoId = '';

                if (host === 'youtu.be') {
                    videoId = parsedUrl.pathname.split('/').filter(Boolean)[0];
                    return videoId ? { type: 'iframe', url: 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0' } : null;
                }

                if (host === 'youtube.com' || host === 'm.youtube.com') {
                    if (parsedUrl.pathname === '/watch') {
                        videoId = parsedUrl.searchParams.get('v');
                    } else {
                        videoId = parsedUrl.pathname.split('/').filter(Boolean).pop();
                    }

                    return videoId ? { type: 'iframe', url: 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0' } : null;
                }

                if (host === 'vimeo.com' || host === 'player.vimeo.com') {
                    videoId = parsedUrl.pathname.split('/').filter(Boolean).pop();
                    return videoId ? { type: 'iframe', url: 'https://player.vimeo.com/video/' + videoId + '?autoplay=1' } : null;
                }

                if (/\.(mp4|webm|ogg)(\?.*)?$/i.test(parsedUrl.href)) {
                    return { type: 'video', url: parsedUrl.href };
                }
            } catch (error) {
                return null;
            }

            return null;
        }

        function closeHotelVideoModal() {
            if (!$videoModal.length) {
                return;
            }

            $videoModal.removeClass('is-open').attr('aria-hidden', 'true');
            $videoFrame.empty();
            $('body').removeClass('hotel-video-modal-open');

            if (lastVideoTrigger) {
                lastVideoTrigger.focus();
                lastVideoTrigger = null;
            }
        }

        $('.js-hotel-video-play').on('click', function (event) {
            var embed = getHotelVideoEmbed($(this).data('video-url') || $(this).attr('href'));

            event.preventDefault();

            if (!$videoModal.length || !embed) {
                return;
            }

            lastVideoTrigger = this;
            $videoFrame.empty();

            if (embed.type === 'video') {
                $('<video>', {
                    src: embed.url,
                    controls: true,
                    autoplay: true,
                    playsinline: true
                }).appendTo($videoFrame);
            } else {
                $('<iframe>', {
                    src: embed.url,
                    title: $(this).attr('aria-label') || 'Hotel video',
                    allow: 'autoplay; fullscreen; picture-in-picture',
                    allowfullscreen: 'allowfullscreen'
                }).appendTo($videoFrame);
            }

            $('body').addClass('hotel-video-modal-open');
            $videoModal.addClass('is-open').attr('aria-hidden', 'false');
            $videoModal.find('.hotel-video-modal__close').focus();
        });

        $videoModal.on('click', function (event) {
            if ($(event.target).is('.hotel-video-modal')) {
                closeHotelVideoModal();
            }
        });

        $videoModal.find('.hotel-video-modal__close').on('click', closeHotelVideoModal);

        $(document).on('keydown', function (event) {
            if (event.key === 'Escape' && $videoModal.hasClass('is-open')) {
                closeHotelVideoModal();
            }
        });

        $('.hotel-landing a[href^="#"]').on('click', function (event) {
            var target = $(this).attr('href');

            if (!target || target === '#' || !$(target).length) {
                return;
            }

            event.preventDefault();

            $('html, body').animate({
                scrollTop: $(target).offset().top - 24
            }, 500);
        });

        $('.hotel-footer__newsletter form').on('submit', function (event) {
            if ($(this).attr('action') === '#') {
                event.preventDefault();
            }
        });
    });
})(jQuery);
</script>
<?php
}
