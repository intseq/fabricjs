<?php
include_once('./_common.php');
include_once(G5_PATH.'/head.sub.php');
?>
<link rel="stylesheet" href="/thema/Basic/colorset/Basic/colorset.css" type="text/css">
<link rel="stylesheet" href="/css/img_editor.css" type="text/css">


<script src="/js/fabric.js"></script>
<script src="/js/jscolor.js"></script>
<script src="/js/jquery.form.js"></script> 

<script>
let imgurl="";//배경 이미지 경로설정
let itemoption="";//선택제품카테고리 옵션
let gubun =""; // 골프티의 경우 기둥 : 1 // 컵은"" 2
$(function(){


})
</script>

<header id="editor_hd">
	<h1><a href="/"><img src="/thema/Basic/img/editor_logo.png" alt="" /></a></h1>
	<strong><img src="/thema/Basic/img/editor_hd_strong.png" alt="My Own Design" />나만의 골프공/골프티 디자인</strong>
	<a href="" class="edi_hd_btn edi_hd_btn1">미리보기</a>
	<a href="" class="edi_hd_btn edi_hd_btn2">편집완료 구매하기</a>
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
				<a href="javascript:void(0)" class="edi_con_btn">편집완료</a>
			</div>
				<button class="edi_hd_btnwon1" height="60"  onclick="sendSelectedObjectBack()"> 레이어 가장 뒤로 </button>
			<button class="edi_hd_btnwon1" height="60"  onclick="sendSelectedObjectToFront ()"> 레이어 가장 앞으로</button>
			<button class="edi_hd_btnwon1" height="60"  onclick="sendSelectedObjectBackwards()"> 레이어 뒤로 </button>
			<button class="edi_hd_btnwon1" height="60"  onclick="sendSelectedObjectForward()"> 레이어 앞으로</button>

			<div id="editor_drow_content">
				이미지들어가는 영역
				<canvas id="xgfCanvas" style="width:100%!important;height:100%!important;" width=1000 height=800 ></canvas>
			</div>
		</div>
		
	</div>

	<div id="editor_content" class="clear">
		<ul class="editor_tab">
			<li><button class="on" data-n="1"><span><img src="/thema/Basic/img/editor_tab01.png" alt="" />골프공/티</span></button></li>
			<li><button data-n="2"><span><img src="/thema/Basic/img/editor_tab02.png" alt="" />클립아트</span></button></li>
			<li><button data-n="3"  onclick="fn_refreshimg()"><span><img src="/thema/Basic/img/editor_tab03.png" alt=""/>이미지</span></button></li>
			<li><button data-n="4"><span><img src="/thema/Basic/img/editor_tab04.png" alt="" />텍스트</span></button></li>
			<li><button data-n="5"><span><img src="/thema/Basic/img/editor_tab05.png" alt="" />베스트</span></button></li>
			<li><button data-n="6"><span><img src="/thema/Basic/img/editor_tab06.png" alt="" />장바구니</span></button></li>
		</ul>
		<div class="editor_content_inner">
			<div class="editor_content_box editor_content_box1 on">
				<h3>골프공/티</h3>
				<ul class='editor_content_box1_ul'>
					<li class='editor_content_box1_li'>
						<img src="/shop/img/ball.png" class='editor_content_box1_img'><Br/>
						<span class='editor_content_box1_span'>골프공</span>
						<button type='button' class='btnEvt' onclick='addbg("/shop/img/ball.png","ball","0")'>골프공</button>
					</li>
					<li class='editor_content_box1_li'>
						<img src="/shop/img/t42.png" class='editor_content_box1_img'><Br/>
						<span class='editor_content_box1_span'>골프티 42</span>
						<button type='button' class='btnEvt' onclick='addbg("/shop/img/t42.png","t42","1")'>기둥</button>
						<button type='button' class='btnEvt' onclick='addbg("/shop/img/tcup.png","t42cup","2")'>컵</button>
					</li>
					<li class='editor_content_box1_li'>
						<img src="/shop/img/t69.png" class='editor_content_box1_img'><Br/>
						<span class='editor_content_box1_span'>골프티 69</span>
						<button type='button' class='btnEvt' onclick='addbg("/shop/img/t69.png","t69","1")'>기둥</button>
						<button type='button' class='btnEvt' onclick='addbg("/shop/img/tcup.png","t69cup","2")'>컵</button>
					</li>
					<li class='editor_content_box1_li'>
						<img src="/shop/img/t85.png" class='editor_content_box1_img'><Br/>
						<span class='editor_content_box1_span'>골프티 85</span>
						<button type='button' class='btnEvt' onclick='addbg("/shop/img/t85.png","t85","1")'>기둥</button>
						<button type='button' class='btnEvt' onclick='addbg("/shop/img/tcup.png","t85cup","2")'>컵</button>
					</li>
					<li class='editor_content_box1_li' style="display:none">
						<img src="/shop/img/tcup.png" class='editor_content_box1_img'><Br/>
						<span class='editor_content_box1_span'>골프티컵</span>
					</li>
				</ul>
			</div><!--editor_content_box1-->
			<div class="editor_content_box editor_content_box2">
				<h3>클립아트</h3>
				<div>
					<?php
						$sql = "select * from g5_write_ImgEditorClipart where wr_10!=1";
						$result = sql_query($sql);
						if($result){ 

							$rowcnt =  $result->num_rows;

							echo "<ul>".PHP_EOL;
							for($i=0;$ro = sql_fetch_array($result);$i++){
								$ro['wr_content'] = str_replace("https://onco.home1.co.kr","",$ro['wr_content']);
								preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $ro['wr_content'], $img);    
								$data = $img[0][0];
								$data = str_replace("src","class='a18' data='clipart".$i."'  onclick='addImage(".$i.")'  id='clipart".$i."' src",$data);
								echo "<li class='a17'>".PHP_EOL;
								echo $data;
								echo "<span class='a19'>";
								echo $ro['wr_subject'];
								echo "</span>";
								echo "</li>".PHP_EOL;
							}
							echo "</ul>".PHP_EOL;
							
						}
					?>
				</div>
			</div><!--editor_content_box2-->
			<div class="editor_content_box editor_content_box3">
				<h3>이미지</h3>
				<form id="fileuploadform" name="fileuploadform" method="post" enctype="multipart/form-data" action="">
				<div class="file_box">
					<span>파일선택</span>
					<p></p>
					<strong>파일첨부</strong> 
					<input type="file" name="fileupload" id="fileupload"> 
				</div>
				</form>
				<div class="fileList">
					<ul class="myfile">
						
					</ul>
				</div>
			</div><!--editor_content_box3-->
			<div class="editor_content_box editor_content_box4">
				<h3>텍스트</h3>
				<table>
					<tr>
						<th>내용</th>
						<td>
								<table>
									<Tr>	
										<td><input type='text' name='addText' id='addText' class='boxarea'></td>
										<td><input type='button' value='텍스트추가'  onclick='addTextBox()' class='edi_hd_btn3'></td>
									</Tr>
								</table>
								
					</tr>
					<tr>
						<th>폰트</th>
						<td>
								<select id="addfontfamily" name='addfontfamily' class='selectarea'>
										<option value="Times New Roman">Times New Roman</option>
										<option value="Pacifico">Pacifico</option>
										<option value="VT323">VT323</option>
										<option value="Quicksand">Quicksand</option>
										<option value="Inconsolata">Inconsolata</option>
								</select>
						</td>
					</tr>
					<tr>
						<th>크기</th>
						<td>
							<select id="addFontsize" name='addFontsize' class='selectarea'>
										<?php
											for($j=5;$j<100;$j++){
												if($j>50){$j=$j+9;}
												?>
												<option value="<?=$j?>" <?php if($j==20){echo "selected";} ?>><?=$j?>px</option>
												<?php
											}
										?>
								</select>	
							</td>
					</tr>
					<tr>
						<th>글색상</th>
						<td><input type='text' name='addfontcolor' id='addfontcolor' class='boxarea left3' data-jscolor="{}" value="#3399FF"></td>
					</tr>
					<tr>
						<th>정렬</th>
						<td>
								<select id="addalign" name='addalign' class='selectarea'>
									<option value="left">left</option>
									<option value="center">center</option>
									<option value="right">right</option> 
								</select> 
					</tr>
					<tr>
						<th>크기/위치</th>
						<td>
								<table>
									<tr>
										<td>위에서<input type='text' name='addtop' id='addtop' class='boxarea2 left3' value="100"></td>
									</tr>
									<tr>
										<td>죄에서<input type='text' name='addleft' id='addleft' class='boxarea2 left3'  value="100"></td>
									</tr>
									<tr>
										<td>가&nbsp;&nbsp;&nbsp;로<input type='text' name='addwidth' id='addwidth' class='boxarea2 left3'  value="200"></td>
									</tr>
									<tr>
										<td>세&nbsp;&nbsp;&nbsp;로<input type='text' name='addheight' id='addheight' class='boxarea2 left3' value="80"></td>
									</tr>									
								</table> 
						</td>
					</tr>
				</table>
			</div><!--editor_content_box4-->
			<div class="editor_content_box editor_content_box5">
				<h3>베스트</h3>
			</div><!--editor_content_box5-->
			<div class="editor_content_box editor_content_box6">
				<h3>장바구니</h3>
			</div><!--editor_content_box6-->
		</div>

	</div>
	

	<div id="editor_buy">
		<button id="editor_buy_btn">옵션선택 및 구매하기<img src="/thema/Basic/img/editor_arrow.png" alt="" /></button>
		<div class="editor_buy_inner">구매영역구매영역구매영역구매영역구매영역</div>
	</div>
</div>

<script>
	$("#xgfCanvas").prop('width',$("#editor_drow_content").width());
	$("#xgfCanvas").prop('height',$("#editor_drow_content").height());

     fabric.Object.prototype.objectCaching = false;

	var design = new fabric.Canvas('xgfCanvas', { containerClass: 'design',preserveObjectStacking: true });
  var minimap = new fabric.Canvas('minimap',  { containerClass: 'minimap', selection: false });

  var objectLayer;

	design.on("selection:created", function(event){
	  objectLayer = event.target; 
	});
	design.on("selection:updated", function(event){
	  objectLayer = event.target;
	});

	var sendSelectedObjectBack = function() {
		console.log("")
	  design.sendToBack(objectLayer);
	}
	var sendSelectedObjectToFront = function() {
		console.log("")
	  design.bringToFront(objectLayer);
	}

	var sendSelectedObjectForward = function() {
		console.log("")
	  design.bringForward(objectLayer);
	} 
  var sendSelectedObjectBackwards = function(){
  	console.log("");
  	design.sendBackwards(objectLayer)
  }
//   var backgroundSet=function(){
// 		var center = design.getCenter();
// 			design.setOverlayImage('/shop/img/ball.png',
// 		    design.renderAll.bind(design), {
// 		        scaleX:0.5,
// 		        scaleY:0.5,
// 		        top: center.top,
// 		        left: center.left,
// 		        originX: 'center',
// 		        originY: 'center'
// 		});	
// }
  // backgroundSet();

  function createCanvasEl() {
    var designSize = { width: 800, height: 600 };
    var originalVPT = design.viewportTransform;
    // zoom to fit the design in the display canvas
    var designRatio = fabric.util.findScaleToFit(designSize, design);

    // zoom to fit the display the design in the minimap.
    var minimapRatio = fabric.util.findScaleToFit(design, minimap);

    var scaling = minimap.getRetinaScaling();

    var finalWidth =  designSize.width * designRatio;
    var finalHeight =  designSize.height * designRatio;

    design.viewportTransform = [
      designRatio, 0, 0, designRatio,
      (design.getWidth() - finalWidth) / 2,
      (design.getHeight() - finalHeight) / 2
    ];
    var canvas = design.toCanvasElement(minimapRatio * scaling);
    design.viewportTransform = originalVPT;
    return canvas;
  }

  function updateMiniMap() {
    var canvas = createCanvasEl();
    minimap.backgroundImage._element = canvas;
    minimap.requestRenderAll();
  }

   function initMinimap() {
    
  }

//  var debouncedMiniMap = _.debounce(updateMiniMap, 250);

  //design.on('object:modified', function() {
    //updateMiniMap();
 // })

// hook up the pan and zoom
  design.on('mouse:wheel', function(opt) {
    var delta = opt.e.deltaY;
    var zoom = design.getZoom();
    zoom *= 0.999 ** delta;
    if (zoom > 20) zoom = 20;
    if (zoom < 0.01) zoom = 0.01;
    this.setZoom(zoom);
    ;
    opt.e.preventDefault();
    opt.e.stopPropagation();
  });
  design.on('mouse:down', function(opt) {
    var evt = opt.e;
    if (evt.altKey === true) {
      this.isDragging = true;
      this.selection = false;
      this.lastPosX = evt.clientX;
      this.lastPosY = evt.clientY;
    }
  });
  design.on('mouse:move', function(opt) {
    if (this.isDragging) {
      var e = opt.e;
      var vpt = this.viewportTransform;
      vpt[4] += e.clientX - this.lastPosX;
      vpt[5] += e.clientY - this.lastPosY;
      this.requestRenderAll();
      ;
      this.lastPosX = e.clientX;
      this.lastPosY = e.clientY;
    }
  });
  design.on('mouse:up', function(opt) {
    this.isDragging = false;
    this.selection = true;
  }); 

	$('#editor_buy_btn').click(function(){
		$(this).toggleClass('on');
		$('#editor_buy').toggleClass('on');
	});
	$('.editor_tab button').click(function(){
		var tabD = $(this).attr('data-n');
		$('.editor_tab button').removeClass('on');
		$('.editor_content_box').hide();
		$(this).addClass('on');
		$('.editor_content_box' + tabD).fadeIn(300);
	});
 function addbg(imgurl,itemoption,gubun){
 		design.clear(); 
		canvasOperations.loadFromUrl(imgurl); 
 		console.log(imgurl,itemoption,gubun);

 }
 function addImage(imgurl){
			imgurl = "#clipart"+imgurl;
			imgurl = $(imgurl).prop('src'); 

            fabric.Image.fromURL(imgurl, function(oImg) {
            	oImg = oImg.scale(0.3)
            design.add(oImg);
            }); 
            
        } 
function addTextBox(){ 
		var addText = $("#addText").prop('value');
		var addfontfamily = $("#addfontfamily :option selected").prop('value');
		var addFontsize = $("#addFontsize").prop('value');
		var addfontcolor = $("#addfontcolor").prop('value');
		var addalign = $("#addalign").prop('value');
		var addtop = $("#addtop").prop('value');
		var addleft = $("#addleft").prop('value');
		var addwidth = $("#addwidth").prop('value'); 
		var addheight = $("#addheight").prop('value');
	
		//if(addText.length==0){alert('그대의잘못된 행동이 프로그램을 망치고 있다.\n내용을 넣으라!!!')}
		if(addfontfamily==''||addfontfamily==undefined){addfontfamily='Times New Roman'}
		if(addFontsize==''||addFontsize==undefined){addFontsize='20'}
		if(addfontcolor==''|| addfontcolor==undefined){addfontcolor='#000000'};
		if(addalign==''|| addalign==undefined){addalign='left'}; // option value : left ,center , right
		if(addtop==''|| addtop==undefined){addtop=5};
		if(addleft==''|| addleft==undefined){addleft=20};
		if(addwidth==''|| addwidth==undefined){addwidth=20};
		if(addheight==''|| addheight==undefined){addheight=20};
		
		
		
		var t2 = new fabric.Textbox(addText, {
	    width: parseInt(addwidth,10),
	    height: parseInt(addheight,10),
	    top: parseInt(addtop,10),
	    left: parseInt(addleft,10),
	    fontSize: addFontsize,
	    fill: addfontcolor,
	    //fontFamily:addfontfamily,
	    //textAlign:addalign,
		}); 
    design.add(t2);
    console.log('addText Event end');
}

// 삭제 에벤트 
$('html').keyup(function(e){
        if(e.keyCode == 46) {
            deleteSelectedObjectsFromCanvas();
        }
});    

function deleteSelectedObjectsFromCanvas(){
    var selection = design.getActiveObject();
    if (selection.type === 'activeSelection') {
        selection.forEachObject(function(element) {
            console.log(element);
            design.remove(element);
        });
    }
    else{
        design.remove(selection);
    }
    design.discardActiveObject();
    design.requestRenderAll();
}
// 삭제 에벤트 

//배경 입력 이벤트
var canvasOperations = {
  loadFromFile : function(imgFile){
    console.log("calling imgFile");
    fabric.Image.fromURL(imgFile, function(image){ 
    	image = image.scale(0.7); 
      design.add(image.set({  
        }));
    });
    canvasJSONCallBack();
  },
  loadFromUrl : function(imgurl){
    console.log("calling loadFromUrl");
    fabric.Image.fromURL(imgurl, function(image){ 
    	image = image.scale(0.7); 
      design.add(image.set({  
        }));
    });
    canvasJSONCallBack();
  },
  save : function(){
    console.log("calling save");
    JSONData = JSON.stringify(design.toDatalessJSON(['id', 'alt']));
    console.log(JSONData);
  },
  clear : function(){
    console.log("calling clear");
    // clear design
    design.clear();
  },
  open : function(){
    console.log("calling open");
    // and load everything from the same json
    design.loadFromJSON(JSONData, canvasJSONCallBack, function(o, object) {
      console.log(JSONData);
      design.setActiveObject(object);
      console.log(object.id, object.alt);
    });
  }
}
//배경 입력 이벤트

//캔버스 랜더링
function canvasJSONCallBack() {
    design.renderAll();
    design.calcOffset();
    console.log("canvasJSONCallBack call");
}
//캔버스 랜더링


//편집완료 이벤트 시작
$(".edi_con_btn").on("click",function(){ 
	var canvas = document.getElementById('xgfCanvas');
	var dataURL = canvas.toDataURL('image/jpeg', 1.0);
	console.log(dataURL);
	$("#savefileimg").attr('src',dataURL);
	$("#savefile").attr('src',dataURL);
	var photo = dataURL;
	$.ajax({
  method: 'POST',
  url: '/shop/imgEditor4Save.php',
	  data: {
	    "photo": photo,
	    "imgurl":imgurl,
	    "itemoption":itemoption,
	    "gubun":gubun
	  },success : function(result) { // 결과 성공 콜백함수
        console.log(result);
    }, 
	});

})


$("#fileupload").on("change",function(){ 
  $("#fileuploadform").ajaxForm({
  		type:'POST',
  		url:"imgEditor6Save.php",
  		enctype:"multpart/form-data",
  		contentType:false,
  		processData:false, 
		  success: function(responseText, statusText, xhr, $form){ 
  				var jdata = JSON.parse(responseText);
  				if(jdata.one==true){ 
  					fn_refreshimg();
  				}else if(jdata.one==false){
  					if(jdata.two=='nombid'){
  						if(confirm('로그인후 이용 가능 합니다.\n로그인 페이지로 이동하시겠습니까?')){
  							window.location.href='/_NBoard/login.php?url=/shop/imgEditor6.php';
  							return false;		
  						}
  						
  					} 
  				}
  				

  		},error:function(e){e.responseText}
  }).submit(); 
});
 
function fn_refreshimg(){  
	console.log("*************************fn_refreshimg*************************");  
	$.ajax({
	  	method: 'POST',
	  	url: '/shop/imglist.php',
		  data: {},
		  success : function(result) { // 결과 성공 콜백함수
		  		console.log(result)
		  		if(result.length>4){ 
				      	jdata = JSON.parse(result);
				      	if(jdata.length>0){
				      		var htmls = "";
				      		for(i=0;i<jdata.length;i++){
				      			htmls = htmls + "<li>";
				      			htmls = htmls + "<img src='"+jdata[i].url+"' style=''><br/>";
				      			htmls = htmls + "<button class='edi_hd_btnwon2'  type='button' onclick='addupimg(\""+jdata[i].url+"\")'>추가</button>";
				      			htmls = htmls + "<button class='edi_hd_btnwon2' type='button' onclick='deleteimg(\""+jdata[i].idx+"\")'>삭제</button>"
				      			htmls = htmls + "</li>";
				      		}	
				      		$(".myfile").html(htmls);
				      	}
	      	}
	      	
	    }, 
	}); 
}

function addupimg(fileurl){ 
	canvasOperations.loadFromFile(fileurl);  
}

function deleteimg(idx){
	console.log(idx);	
	$.ajax({
	  	method: 'POST',
	  	url: '/shop/imgdel.php',
		  data: {"idx":idx},
		  success : function(responseText) { // 결과 성공 콜백함수
				console.log(responseText);
				var jdata = JSON.parse(responseText);
				console.log(responseText);
				fn_refreshimg();
	    }, 
	}); 
}




</script>
<form method="post" name="saveImgForm" id="saveImgForm">
	<input type="file" name="savefile" id="savefile">
	<img src="" id="savefileimg">	
</form>
<style>
.a17{width:110px;float:left;border:1px solid #e0e0e0;padding:10px;text-align:center;}
.a18{width:100px;cursor:pointer;}
.a18:hover{background-color:#ff0000}
.a19{padding-top:15px;}
#xgfCanvas{width:100%;height:100%;background:#;border:1px solid #000}

 .edi_hd_btn3 {
	/* Font & Text */
	font-family: "NEXON Lv1 Gothic";	font-size: 17px; 	font-weight: 400; 	line-height: 50px;      	background-attachment: scroll;	background-color: rgb(212, 32, 42);	background-image: none;
	background-position: 0% 0%;	background-repeat: repeat;	color: rgb(255, 255, 255);
	/* Box */
	height: 50px;	width: auto;	border: 0px none rgb(255, 255, 255);	border-top: 0px none rgb(255, 255, 255);	border-right: 0px none rgb(255, 255, 255);	border-bottom: 0px none rgb(255, 255, 255);
	border-left: 0px none rgb(255, 255, 255);	margin: 0px 0px 0px 10px;	padding: 0px 15px;	max-height: none;	min-height: auto;	max-width: none;	min-width: auto; 
	list-style-type: disc;	list-style-position: outside;	cursor: pointer; 
	/* Effects */
	outline: #cdcdcd solid 1px;box-sizing: border-box;text-overflow: clip;border-radius: 5px;
}

select.selectarea{ 
	/* Font & Text */
	margin-left: 3px;
	font-family: "NEXON Lv1 Gothic";	font-size: 16px;font-weight: 400;	line-height: 16.9px;	text-decoration: none solid rgb(51, 51, 51);
	text-align: start;	text-indent: 0px;text-transform: none;		white-space: normal;	word-spacing: 0px; 	color: rgb(51, 51, 51);
	/* Box */
	height: 50px;	width: 285px;	border: 1px solid #e0e0e0; 		padding: 0px 25px;outline: #cdcdcd solid 1px; 	border-radius: 5px; 
}

input.boxarea {
	/* Font & Text */
	font-family: "NEXON Lv1 Gothic";	font-size: 16px;font-weight: 400;	line-height: 16.9px;	text-decoration: none solid rgb(51, 51, 51);
	text-align: start;	text-indent: 0px;text-transform: none;		white-space: normal;	word-spacing: 0px; 	color: rgb(51, 51, 51);
	/* Box */
	height: 50px;	width: 285px;	border: 1px solid #e0e0e0; 		padding: 0px 25px;outline: #cdcdcd solid 1px; 	border-radius: 5px; 
}

input.boxarea2 {
	/* Font & Text */
	font-family: "NEXON Lv1 Gothic";	font-size: 16px;font-weight: 400;	line-height: 16.9px;	text-decoration: none solid rgb(51, 51, 51);
	text-align: start;	text-indent: 0px;text-transform: none;		white-space: normal;	word-spacing: 0px; 	color: rgb(51, 51, 51);
	/* Box */
	height: 50px;	width: 245px;	border: 1px solid #e0e0e0; 		padding: 0px 25px;outline: #cdcdcd solid 1px; 	border-radius: 5px; 
}

.left3{margin-left: 3px}
.editor_content_box1_img{width: 140px;vertical-align: middle;clear: both;line-height: 140px;text-align: center;}
.editor_content_box1_span{width: 100%;text-align: center;clear: both;font-size: 20px;display: inline-block;line-height: 50px;}
.editor_content_box1_ul{width:100% ;padding: 10px;}
.editor_content_box1_li{width: 220px;float: left;height: 230px;vertical-align: middle;display: inline-block;text-align: center;border: 2px solid #cecece;border-radius: 5px;background-color: #fff}
.btnEvt{width: auto;height: auto;padding: 5px;border: 1px solid #a0a0a0}

ul.myfile{width:100%;padding: 0px;margin: 0px;margin-top: 15px;}
ul.myfile > li {float: left;width: 45%;border: 1px solid #e0e0e0;margin: 5px;cursor: pointer;text-align: center;}
ul.myfile > li:hover{border: 1px solid #FF572C 		;		transition: all ease 1.5s;}
ul.myfile > li > img {max-width: 100%;padding: 5px;max-height: 221px	;}
.edi_hd_btnwon1{border: 1px solid #aaa;padding: 10px;border-radius: 5px;}
.edi_hd_btnwon1:hover{background-color: #0099ff;color: #fff}

.edi_hd_btnwon2{border: 1px solid #aaa;padding: 5px;border-radius: 5px;margin: 5px}
.edi_hd_btnwon2:hover{background-color: #0099ff;color: #fff}
</style>
