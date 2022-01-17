<?php
include_once('./_common.php');
include_once(G5_PATH.'/head.sub.php');
?>
<link rel="stylesheet" href="/thema/Basic/colorset/Basic/colorset.css" type="text/css">
<link rel="stylesheet" href="/css/img_editor.css" type="text/css">
<script src="/js/fabric.js"></script>
<script src="/js/jscolor.js"></script>


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
				<a href="" class="edi_con_btn">편집완료</a>
			</div>

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
			<li><button data-n="3"><span><img src="/thema/Basic/img/editor_tab03.png" alt="" />이미지</span></button></li>
			<li><button data-n="4"><span><img src="/thema/Basic/img/editor_tab04.png" alt="" />텍스트</span></button></li>
			<li><button data-n="5"><span><img src="/thema/Basic/img/editor_tab05.png" alt="" />베스트</span></button></li>
			<li><button data-n="6"><span><img src="/thema/Basic/img/editor_tab06.png" alt="" />장바구니</span></button></li>
		</ul>
		<div class="editor_content_inner">
			<div class="editor_content_box editor_content_box1 on">
				<h3>골프공/티</h3>
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
												<option value="<?=$j?>"><?=$j?>px</option>
												<?php
											}
										?>
								</select>	
							</td>
					</tr>
					<tr>
						<th>글색상</th>
						<td><input type='text' name='addfontcolor' id='addfontcolor' class='boxarea left3' data-jscolor="{}"></td>
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
										<td>위에서<input type='text' name='addtop' id='addtop' class='boxarea2 left3'></td>
									</tr>
									<tr>
										<td>죄에서<input type='text' name='addleft' id='addleft' class='boxarea2 left3'></td>
									</tr>
									<tr>
										<td>가&nbsp;&nbsp;&nbsp;로<input type='text' name='addwidth' id='addwidth' class='boxarea2 left3'></td>
									</tr>
									<tr>
										<td>세&nbsp;&nbsp;&nbsp;로<input type='text' name='addheight' id='addheight' class='boxarea2 left3'></td>
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
<style>
.a17{width:110px;float:left;border:1px solid #e0e0e0;padding:10px;text-align:center;}
.a18{width:100px;cursor:pointer;}
.a18:hover{background-color:#ff0000}
.a19{padding-top:15px;}
#xgfCanvas{width:100%;height:100%;background:#;border:1px solid #000}

 .edi_hd_btn3 {
	/* Font & Text */
	font-family: "NEXON Lv1 Gothic";
	font-size: 17px;
	font-style: normal;
	font-variant: normal;
	font-weight: 400;
	letter-spacing: normal;
	line-height: 50px;
	text-decoration: none solid rgb(255, 255, 255);
	text-align: start;
	text-indent: 0px;
	text-transform: none;
	vertical-align: baseline;
	white-space: normal;
	word-spacing: 0px;

	/* Color & Background */
	background-attachment: scroll;
	background-color: rgb(212, 32, 42);
	background-image: none;
	background-position: 0% 0%;
	background-repeat: repeat;
	color: rgb(255, 255, 255);

	/* Box */
	height: 50px;
	width: auto;
	border: 0px none rgb(255, 255, 255);
	border-top: 0px none rgb(255, 255, 255);
	border-right: 0px none rgb(255, 255, 255);
	border-bottom: 0px none rgb(255, 255, 255);
	border-left: 0px none rgb(255, 255, 255);
	margin: 0px 0px 0px 10px;
	padding: 0px 15px;
	max-height: none;
	min-height: auto;
	max-width: none;
	min-width: auto;

	/* Positioning */
	position: static;
	top: auto;
	bottom: auto;
	right: auto;
	left: auto;
	float: none;
	display: block;
	clear: none;
	z-index: auto;

	/* List */
	list-style-image: none;
	list-style-type: disc;
	list-style-position: outside;

	cursor: pointer; 
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
</style>

<script>
	$("#xgfCanvas").prop('width',$("#editor_drow_content").width());
	$("#xgfCanvas").prop('height',$("#editor_drow_content").height());

     fabric.Object.prototype.objectCaching = false;

	var design = new fabric.Canvas('xgfCanvas', { containerClass: 'design' });
  var minimap = new fabric.Canvas('minimap',  { containerClass: 'minimap', selection: false });

  design.loadFromJSON({"version":"3.6.3","objects":[{"type":"textbox","version":"3.6.3","left":254,"top":195,"width":300,"height":75.03,"fill":"#049c82","text":"Lorem ipsum dolor sit amet,\nconsectetur adipisicing elit,\nsed do eiusmod tempor ","fontSize":20,"fontWeight":"","fontFamily":"helvetica","minWidth":20,"splitByGrapheme":false,"styles":{}},]}, function() {  });

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

 function addImage(imgurl){
			imgurl = "#clipart"+imgurl;
			imgurl = $(imgurl).prop('src'); 
            fabric.Image.fromURL(imgurl, function(oImg) {
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
</script>