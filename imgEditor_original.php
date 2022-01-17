<?php
include_once('./_common.php');
include_once(G5_PATH.'/head.sub.php');
?>
<link rel="stylesheet" href="/thema/Basic/colorset/Basic/colorset.css" type="text/css">
<link rel="stylesheet" href="/css/img_editor.css" type="text/css">
<script src="/js/fabric.js"></script>
<!--폰트 변경 테스트를 위한 임의 폰트 호출-->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">


<header id="editor_hd">
	<h1><a href="/"><img src="/thema/Basic/img/editor_logo.png" alt="" /></a></h1>
	<strong><img src="/thema/Basic/img/editor_hd_strong.png" alt="My Own Design" />나만의 골프공/골프티 디자인</strong>
	<a href="" class="edi_hd_btn edi_hd_btn1">미리보기</a>
</header>


<div id="editor_con">
	<div id="editor_drow">
		<div class="editor_drow_inner">
			<div class="editor_tit">
				<h2>골프공 디자인하기</h2>
				<p>
					<span>편집영역</span>
					<span>지름 20mm</span>
				</p>
			</div>
			
			<div id="editor_drow_content">
				<div class="xgfCanvas_con">
					<p id="test_txt_p" style="font-size:1px; position:absolute; top:0px; left:0px; z-index:1; width:100%; ">텍스트 편집 예시</p><!--테스트용 삭제가능-->
					<img src="/thema/Basic/img/editor_dummy.png" />
					<canvas id="xgfCanvas" width="1920" height="1080"></canvas>
				</div>
				<script>
					//테스트용 캔버스 호출 삭제가능
					var canvas = document. getElementById ( "xgfCanvas" );
					var context = canvas. getContext ( "2d" );
					var img = new Image (); 
					img. src = "/thema/Basic/img/editor_canvas_bak.png" ; 
					img. onload = function () 
					{
						context.drawImage(img,0,0,canvas.width,canvas.height)
					}
				</script>
			</div>
		</div>
		
	</div>

	<div id="editor_content" class="clear">
		<button id="m_close">
			닫기
			<span class="bar bar1"></span>
			<span class="bar bar2"></span>
		</button>
		<ul class="editor_tab">
			<li><button class="on" data-n="1"><span><img src="/thema/Basic/img/editor_tab01.png" alt="" />골프공/티</span></button></li>
			<li><button data-n="2"><span><img src="/thema/Basic/img/editor_tab02.png" alt="" />클립아트</span></button></li>
			<li><button data-n="3"><span><img src="/thema/Basic/img/editor_tab03.png" alt="" />이미지</span></button></li>
			<li><button data-n="4"><span><img src="/thema/Basic/img/editor_tab04.png" alt="" />텍스트</span></button></li>
		</ul>
		<div class="editor_content_inner">
			<div class="editor_content_box editor_content_box1 on">
				<h3>골프공/티</h3>
				<strong class="notice">
					다른 제품을 선택하시면 <b>기존에 편집중인 이미지는 삭제</b>됩니다.
					또한, 골프티는 <b>기둥과 컵 두가지의 이미지를 모두 편집완료</b> 하셔야만 구매가 가능합니다.
				</strong>
				<ul class="clear">
					<li class="on">
						<button>
							<div class="img_box"><img src="/thema/Basic/img/editor_product01.png" alt="" /></div>
							<div class="txt_box">
								<strong>골프공</strong>
								<span>골프공</span>
							</div>
						</button>
					</li>
					<li>
						<button>
							<div class="img_box"><img src="/thema/Basic/img/editor_product02.png" alt="" /></div>
							<div class="txt_box">
								<strong>42mm 골프티</strong>
								<span>기둥</span>
								<span>컵</span>
							</div>
						</button>
					</li>
					<li>
						<button>
							<div class="img_box"><img src="/thema/Basic/img/editor_product03.png" alt="" /></div>
							<div class="txt_box">
								<strong>69mm 골프티</strong>
								<span>기둥</span>
								<span>컵</span>
							</div>
						</button>
					</li>
					<li>
						<button>
							<div class="img_box"><img src="/thema/Basic/img/editor_product04.png" alt="" /></div>
							<div class="txt_box">
								<strong>85mm 골프티</strong>
								<span class="on">기둥(편집완료)</span>
								<span>컵</span>
							</div>
						</button>
					</li>
				</ul>
			</div><!--editor_content_box1-->
			<div class="editor_content_box editor_content_box2">
				<h3>클립아트</h3>
				<ul class="clip_tab clear">
					<li><button data-clip="1" class="on">BEST</button></li>
					<li><button data-clip="2">NEW</button></li>
					<li><button data-clip="3">캐릭터</button></li>
					<li><button data-clip="4">골프공</button></li>
					<li><button data-clip="5">도형</button></li>
					<li><button data-clip="6">동물</button></li>
					<li><button data-clip="7">감사인사</button></li>
					<li><button data-clip="8">프로선수</button></li>
				</ul>
				<ul class="clip_list clip_list1 clear on">
					<li><button class="on"><img src="/thema/Basic/img/clip_ico01.png" alt="" /></button></li>
					<li><button><img src="/thema/Basic/img/clip_ico02.png" alt="" /></button></li>
					<li><button><img src="/thema/Basic/img/clip_ico03.png" alt="" /></button></li>
					<li><button><img src="/thema/Basic/img/clip_ico01.png" alt="" /></button></li>
				</ul>
				<ul class="clip_list clip_list2 clear">
					<li><button><img src="/thema/Basic/img/clip_ico01.png" alt="" /></button></li>
					<li><button><img src="/thema/Basic/img/clip_ico02.png" alt="" /></button></li>
				</ul>
				<ul class="clip_list clip_list3 clear">
					<li><button><img src="/thema/Basic/img/clip_ico01.png" alt="" /></button></li>
				</ul>
				<ul class="clip_list clip_list4 clear">
					<li><button><img src="/thema/Basic/img/clip_ico01.png" alt="" /></button></li>
					<li><button><img src="/thema/Basic/img/clip_ico02.png" alt="" /></button></li>
					<li><button><img src="/thema/Basic/img/clip_ico03.png" alt="" /></button></li>
				</ul>
				<ul class="clip_list clip_list5 clear">
					<li><button><img src="/thema/Basic/img/clip_ico01.png" alt="" /></button></li>
				</ul>
				<ul class="clip_list clip_list6 clear">
					<li><button><img src="/thema/Basic/img/clip_ico01.png" alt="" /></button></li>
					<li><button><img src="/thema/Basic/img/clip_ico02.png" alt="" /></button></li>
				</ul>
				<ul class="clip_list clip_list7 clear">
					<li><button><img src="/thema/Basic/img/clip_ico01.png" alt="" /></button></li>
					<li><button><img src="/thema/Basic/img/clip_ico02.png" alt="" /></button></li>
					<li><button><img src="/thema/Basic/img/clip_ico01.png" alt="" /></button></li>
				</ul>
				<ul class="clip_list clip_list8 clear">
					<li><button><img src="/thema/Basic/img/clip_ico01.png" alt="" /></button></li>
				</ul>
			</div><!--editor_content_box2-->
			<div class="editor_content_box editor_content_box3">
				<h3>이미지</h3>
				<div class="file_box">
					<span>파일선택</span>
					<p></p>
					<strong>파일첨부</strong>
					<input type="file">
				</div>
				<script>
					$('.file_box input').change(function(){
						var file_name = $(this).val();
						file_name = file_name.replace(/.*[\/\\]/, '');
						$(this).siblings('p').text(file_name);
						$(this).siblings('p').addClass('on');
						console.log(file_name);
					});
				</script>
			</div><!--editor_content_box3-->
			<div class="editor_content_box editor_content_box4">
				<h3>텍스트</h3>
				<div class="text_list" >
					<span>내용</span>
					<input type="text" class="add_input"  />
					<button id="text_add">텍스트 추가</button>
				</div>
				<div class="text_list">
					<span>폰트</span>
					<select id="font_family">
						<option value="NEXON Lv1 Gothic">넥슨 Lv1고딕</option>
						<option value="Noto Sans KR">본고딕</option> 
						<option value="KyoboHandwriting2020A">교보손글씨</option> 
						<option value="OTWelcomeBA">웰컴체</option> 
					</select>
				</div>
				<div class="text_list">
					<span>크기</span>
					<button id="minus_font">작게</button>
					<input type="text" value="1" class="font_size_input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
					<button id="plus_font">크게</button>
				</div>
				<div class="text_list">
					<span>색상</span>
					<button id="font_color"></button>
					<b id="color_text">#333333</b>
				</div>
				<div class="text_list" >
					<span>자간</span>
					<div class="letter_bar"><div id="letter_circle"></div></div>
					<input type="text" id="letter_input" value="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
				</div>
				<div class="text_list">
					<span>행간</span>
					<div class="line_bar"><div id="line_circle"></div></div>
					<input type="text" id="line_input" value="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
				</div>
				<div class="text_list align_list" >
					<span>정렬</span>
					<button data-option="left"><img src="/thema/Basic/img/editor_left.png" alt="왼쪽정렬'" /></button>
					<button data-option="center"><img src="/thema/Basic/img/editor_center.png" alt="가운데정렬'" /></button>
					<button data-option="right"><img src="/thema/Basic/img/editor_right.png" alt="오른쪽정렬'" /></button>
				</div>
				<div class="text_list align_list">
					<span>옵션</span>
					<button data-option="bold"><img src="/thema/Basic/img/editor_bold.png" alt="왼쪽정렬'" /></button>
					<button data-option="italic"><img src="/thema/Basic/img/editor_italic.png" alt="가운데정렬'" /></button>
					<button data-option="underline"><img src="/thema/Basic/img/editor_under.png" alt="오른쪽정렬'" /></button>
				</div>
			</div><!--editor_content_box4-->
		</div>

	</div>
	

	<div id="editor_buy">
		<button id="editor_buy_btn">옵션선택 및 구매하기<img src="/thema/Basic/img/editor_arrow.png" alt="" /></button>
		<div class="editor_buy_inner">
			<ul class="editor_buy_option">
				<li>
					<b>종류</b>
					<select>
						<option>1</option>
						<option>1</option>
						<option>1</option>
						<option>1</option>
					</select>
				</li>
				<li>
					<b>브랜드</b>
					<select>
						<option>1</option>
						<option>1</option>
						<option>1</option>
						<option>1</option>
					</select>
				</li>
				<li>
					<b>상품명</b>
					<select>
						<option>1</option>
						<option>1</option>
						<option>1</option>
						<option>1</option>
					</select>
				</li>
				<li>
					<b>포장유무</b>
					<select>
						<option>1</option>
						<option>1</option>
						<option>1</option>
						<option>1</option>
					</select>
				</li>
			</ul>
			<div class="editor_buy_bottom">
				<table>
					<caption>선택구매옵션정보</caption>
					<colgroup>
						<col width="50%" />
						<col width="50%" />
					</colgroup>
					<tbody>
						<tr>
							<th>커클랜드 12구</th>
							<td>44,000원</td>
						</tr>
						<tr>
							<th>포장</th>
							<td>44,000원</td>
						</tr>
						<tr>
							<th>배송비</th>
							<td>44,000원</td>
						</tr>
					</tbody>
				</table>
				<div class="editor_total clear">
					<span>총 합계금액</span>
					<b><strong>50,000</strong>원</b>
				</div>
				<button type="submit" id="editor_submit">편집완료 구매하기</button>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
<script>
$(function(){
	//반응형 작업
	var winW;
	var winM;
	function winSize(){
		winW = window.innerWidth;
		if( winW > 1200){
			winM = "pc";
			if( !$('.editor_tab button').hasClass('on')){
				$('.editor_tab li:nth-child(1) button').addClass('on');
				$('.editor_content_box1 ').show();
			}
		}else{
			winM = "m";
			$('.editor_tab button').removeClass('on');
			$('.editor_content_box, #m_close').hide();
		}
	}winSize();

	$(window).resize(function(){
		winSize();
	});

	//모바일 닫기 버튼
	$('#m_close').click(function(){
		$('.editor_tab button').removeClass('on');
		$('.editor_content_box, #m_close').fadeOut(300);
	});
	//구매 버튼
	$('#editor_buy_btn').click(function(){
		$(this).toggleClass('on');
		$('#editor_buy').toggleClass('on');
	});

	//우측 탭
	$('.editor_tab button').click(function(){
		var tabD = $(this).attr('data-n');
		$('.editor_tab button').removeClass('on');
		$('.editor_content_box').hide();
		$(this).addClass('on');
		$('.editor_content_box' + tabD).fadeIn(300);
		if(winM == 'm'){
			$('#m_close').fadeIn(300);
		}
	});

	//클립아트
	$('.clip_tab button').click(function(){
		var tabC = $(this).attr('data-clip');
		$('.clip_tab button').removeClass('on');
		$('.clip_list').hide();
		$(this).addClass('on');
		$('.clip_list' + tabC).fadeIn(300);
	});

	//폰트
	$('#font_family').change(function(){
		$('#test_txt_p').css('font-family', this.value);
	});

	//폰트크기
	$('#minus_font').click(function(){
		var size_val = parseInt($('.font_size_input').val());
		if( size_val > 1){
			$('.font_size_input').val(size_val - 1);	
			$('#test_txt_p').css('font-size', size_val + 'px');
		}else{
			alert('폰트크기 미만은 불가합니다');
		}
	});
	$('#plus_font').click(function(){
		var size_val2 = parseInt($('.font_size_input').val());
		if( size_val2 >= 1){
			$('.font_size_input').val(size_val2 + 1);	
			$('#test_txt_p').css('font-size', size_val2 + 'px');
		}else{
			alert('폰트크기 미만은 불가합니다');
		}
	});
	$('.font_size_input').on("propertychange change keyup paste input", function(){
		var size_val3 = parseInt($(this).val());
		if(size_val3 < 1){
			$(this).val('1');
		}else{
			$('#test_txt_p').css('font-size', size_val3 + 'px');
		}
	});

	//자간
	$('#letter_circle').draggable({
		axis: 'x',
		containment: '.letter_bar',
		drag: function(event){
			var alpha = parseInt($('#letter_circle').css('left'));
			$('#letter_input').val(alpha);	
			$('#test_txt_p').css('letter-spacing', alpha + 'px');
		}
	});
	 $('#letter_input').on("propertychange change keyup paste input", function() {
		var letter_num = $(this).val();
		if( letter_num >= 200 ){
			$('#letter_circle').css('left', '200px');
		}else{
			$('#letter_circle').css('left', letter_num + 'px');
		}
		$('#test_txt_p').css('letter-spacing', letter_num + 'px');
	 });

	 //행간
	 $('#line_circle').draggable({
		axis: 'x',
		containment: '.line_bar',
		drag: function(event){
			var alpha2 = parseInt($('#line_circle').css('left'));
			$('#line_input').val(alpha2);	
			$('#test_txt_p').css('line-height', alpha2 + 'px');
		}
	});
	 $('#line_input').on("propertychange change keyup paste input", function() {
		var line_num = $(this).val();
		if( line_num >= 200 ){
			$('#line_circle').css('left', '200px');
		}else{
			$('#line_circle').css('left', line_num + 'px');
		}
		$('#test_txt_p').css('line-height', line_num + 'px');
	 });

	 //정렬 및 옵션
	 $('.align_list button').click(function(){
		 var align_val = $(this).attr('data-option');
		if( align_val == 'left' || align_val == 'center' || align_val == 'right'){
			$('#test_txt_p').css('text-align', align_val);
		}else{
			if( align_val == 'bold'){
				$('#test_txt_p').css('font-weight', align_val);
			}
			if( align_val == 'italic'){
				$('#test_txt_p').css('font-style', align_val);
			}
			if( align_val == 'underline'){
				$('#test_txt_p').css('text-decoration', align_val);
			}
		}
	 });
});
</script>



