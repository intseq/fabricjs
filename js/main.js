$(function(){
	//메인슬라이더 pc
	var swiper = new Swiper("#pc_slider .swiper-container", {
		loop: true,
		speed: 700,
		autoplay: {
		   delay: 4000,
		 },
		pagination: {
          el: ".swiper-pagination",
          type: "fraction",
        },
		navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
	});

	//메인슬라이더 pc
	var swiper = new Swiper("#m_slider .swiper-container", {
		loop: true,
		speed: 700,
		autoplay: {
		   delay: 4000,
		 },
		pagination: {
          el: ".swiper-pagination",
          type: "fraction",
        },
	});

	//메인상단메뉴
	var swiper = new Swiper("#main_cate_go.swiper-container", {
		slidesPerView: "auto",
	});
	//메인탭메뉴
	var swiper = new Swiper("#main_product01 .swiper-container", {
		slidesPerView: "auto",
	});

	$('#product_tab button').click(function(){
		var best_name = $(this).attr('data-n');
		$('#product_tab li').removeClass('on');
		$(this).parent('li').addClass('on');
		$('.mainP').hide();
		$('.mainP' + best_name).show();
	});
	

});