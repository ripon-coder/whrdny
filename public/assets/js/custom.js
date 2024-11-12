 $(document).on('click', function (e) {
 	if ($(e.target).parents('.popover-main').length === 0) {
 		$('.popover-main').hide();
 	};
 	if($(e.target).parents('.mbl-evSearch').length == 0 && $(e.target).parents('.show-mbl-form').length == 0){

 		$('.show-mbl-form').removeClass('active');
 		$('.mbl-evSearch').hide();
 	};
 });
 
 $(document).on('click','.collapse-button', function(e) {
 	if($(this).hasClass('menu_visible')){
 		$(this).removeClass('menu_visible');
 	}else{
 		$(this).addClass('menu_visible');
 	}
 	$('.mobile-menu').slideToggle();
 });
 $(document).on('click','.mobile-menu .main-a', function(e) {
 	if($(this).hasClass('link-active')){
 		$(this).removeClass('link-active');
 	}else{
 		$(this).addClass('link-active');
 	}
 	$(this).siblings('.sub-menu').slideToggle();
 });
 $(document).on('click','.grop-siglso_share .grop-siglso_plus', function(e) {
 	if($(this).hasClass('link-active')){
 		$(this).siblings('ul').animate({right: "-72px"});
 		$(this).removeClass('link-active');
 	}else{
 		$(this).siblings('ul').animate({right: "0"});
 		$(this).addClass('link-active');
 	}
 });
 $(window).scroll(function () {
 	if ($(this).scrollTop() > $('.top-header').height()) {
 		$('.main-menu').addClass("fixed-header");
 	} else {
 		$('.main-menu').removeClass("fixed-header");
 	}
 });
 $('.calendar-month__multiday-event-hidden').mouseover(function(e) {
 	var container = $(".popover-main");
 	container.css({
 		top: e.pageY,
 		left: e.pageX
 	}).show();
 });
 $(document).on('click','.filter-btn .btn', function(e) {
 	console.log(this.id);
 	if (this.id == 'all') {
 		$('.filterRow > .filterCol').fadeIn(450);
 	} else {
 		var $el = $('.' + this.id).fadeIn(450);
 		$('.filterRow > .filterCol').not($el).hide();
 	}
 	$('.filter-btn .btn').removeClass('active');
 	$(this).addClass('active');
 });
 $(document).on('click','.show-mbl-form', function(e) {
 	if($(this).hasClass('active')){
 		$(this).removeClass('active');
 	}else{
 		$(this).addClass('active');
 	}
 	$('.mbl-evSearch').toggle();
 });
 function tabShow(e,val,month_date) {
 	$('.date-tab-btn').removeClass('active');
 	$(e.currentTarget).addClass('active');
 	$('.event-tab-section').show();
 	$('.event-tab-section .list__month-separator-text').text(month_date);
 	$('.event-tab-item').hide();
 	$('.event-tab-item').eq(val).show();
 	console.log(val);
 }
 
 function selectReply(e,comment_id,user_name) {
 	$('.blog-comment-tlt').hide();
 	$('.blog-reply-tlt').show();
 	$('.reply-name').text(user_name);
 	$('#comment').focus();
 }

 $(document).on('click','.cancel-comment-reply-link', function(e) {
 	$('.blog-comment-tlt').show();
 	$('.blog-reply-tlt').hide();
 });
 var swiper = new Swiper(".howWork", {
 	slidesPerView: 1,
 	spaceBetween: 15,
 	loop: true,
 	pagination: {
 		el: ".swiper-pagination",
 		clickable: true,
 	}
 });

 var swiper = new Swiper(".eventSlider", {
 	slidesPerView: 1,
 	spaceBetween: 15,
 	loop: true,
 	navigation: {
 		nextEl: ".event-next",
 		prevEl: ".event-prev",
 	},
 	breakpoints: {
 		768: {
 			slidesPerView: 2,
 			spaceBetween: 20
 		}
 	}
 });
 var swiper = new Swiper(".newsSlider", {
 	slidesPerView: 1,
 	spaceBetween: 15,
 	loop: true,
 	navigation: {
 		nextEl: ".news-next",
 		prevEl: ".news-prev",
 	},
 	breakpoints: {
 		992: {
 			slidesPerView: 3,
 			spaceBetween: 30
 		},
 		768: {
 			slidesPerView: 2,
 			spaceBetween: 20
 		}
 	}
 });


 if($('.counter1').length>0) {
 	var counted = 0;
 	$(window).scroll(function() {

 		var oTop = $('.counter1').offset().top - window.innerHeight;
 		if (counted == 0 && $(window).scrollTop() > oTop) {
 			$('.count').each(function() {
 				var $this = $(this),
 				countTo = $this.attr('data-count');
 				$({
 					countNum: $this.text()
 				}).animate({
 					countNum: countTo
 				},

 				{

 					duration: 2000,
 					easing: 'swing',
 					step: function() {
 						$this.text(Math.floor(this.countNum));
 					},
 					complete: function() {
 						$this.text(this.countNum);
            //alert('finished');
        }

    });
 			});
 			counted = 1;
 		}

 	});
 }

 if($('.progressbar-circle').length>0) {
 	$(window).scroll(function() {
 		$('.progressbar-circle').each(function() {
 			var elementPos = $(this).offset().top;
 			var topOfWindow = $(window).scrollTop();
 			var percent = $(this).find('.circle').attr('data-percent');
 			var percentage = parseInt(percent, 10) / parseInt(100, 10);
 			var animate = $(this).data('animate');
 			if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
 				$(this).data('animate', true);
 				$(this).find('.circle').circleProgress({
 					startAngle: -Math.PI / 2,
 					value: percent / 100,
 					thickness: 4,
 					size: 62,
 					fill: {
 						color: '#F0C84C'
 					}
 				}).on('circle-animation-progress', function(event, progress, stepValue) {
 					$(this).find('div').text((stepValue * 100).toFixed(0) + "%");
 				}).stop();
 			}
 		});
 	});
 }