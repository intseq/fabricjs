$(function(){
	var winW;
	var menuV;
	var mainScroll;
	var mainOff;
	var quL = $('#quick_con').length;

	function winSize(){
		winW = window.innerWidth;//스크롤포함
	}winSize();
	
	if( quL > 0){
		function mainQuick(){
			mainScroll = $(window).scrollTop();
			mainOff = $('.quick_container').offset().top;
			headerH = $('#hd').height();
			if( winW <= 768 ){
				pathH = headerH; 
			}else{
				pathH = $('.sub_path_con').height();
			}
			mainQuickTop = (mainScroll - mainOff) + 50 + pathH;
		}mainQuick();
	}
	
	if( quL > 0){
		function mainQuickAni(){
			if( mainScroll >=  mainOff - 142){
				$('#quick_con').css({'top': mainQuickTop + 'px'});
			}else{
				$('#quick_con').css({'top': '0px'});
			}
		}mainQuickAni();
	}

	function menuOpen(){
		if( winW <= 768 ){
			menuV = "m";
			$('#all_menu_con .list_dep1_a').removeClass('open');
			$('#all_menu_con .list_dep2_ul').slideUp(300);
		}else{
			menuV = "p";
			$('#all_menu_con nav .list_dep2_ul').show();
		}	
	}menuOpen();

	$(window).resize(function(){
		winSize();
		menuOpen();
		if( quL > 0){
			mainQuick();
			mainQuickAni();
		}
	});

	$(window).scroll(function(){
		if( quL > 0){
			mainQuick();
			mainQuickAni();
		}
	});

	$('#all_menu_con .list_dep1_a').click(function(){
		if( menuV == "m" ){
			var dep2S = $(this).siblings('ul').length;
			if( dep2S > 0){
				if($(this).hasClass('open')){
					$('#all_menu_con .list_dep1_a').removeClass('open');
					$('#all_menu_con .list_dep2_ul').slideUp(300);
				}else{
					$('#all_menu_con .list_dep1_a').removeClass('open');
					$('#all_menu_con .list_dep2_ul').slideUp(300);
					$(this).addClass('open');
					$(this).siblings('ul').stop().slideDown(300);	
				}
				return false
			}
		}
	});


	//상단 마이페이지 버튼
	$('#hd_member').click(function(){
		$(this).children('ul').fadeToggle(300);
	});
	//상단메뉴 슬라이더
	var swiper1 = new Swiper("#gnb.swiper-container", {
		slidesPerView: "auto",
	});

	//전체메뉴
	$('#all_menu').click(function(){
		$('#all_menu, body').toggleClass('on');
		$('#all_menu_con').fadeToggle(300);
	});

	//상품상단메뉴
	var swiper2 = new Swiper("#sub_cate_go.swiper-container", {
		slidesPerView: "auto",
	});

	//탑버튼
	$('#top_btn').click(function(){
		$('body, html').animate({ scrollTop : 0 }, 500);
	});
	
	//퀵버튼
	$('#m_quick').click(function(){
		$('#quick_con').toggleClass('on');
	});
	
	//퀵 최근본상품
	var quickSwiper = new Swiper("#quick_con .swiper-container", {
		slidesPerView : 1,
		spaceBetween: 5,
        pagination: {
          el: ".quick_pd_pagination",
          type: "fraction",
        },
        navigation: {
          nextEl: ".quick_pd_next",
          prevEl: ".quick_pd_prev",
        },
	});
});