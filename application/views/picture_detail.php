<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo "$base/$css";?>" />
		<title>画板</title>
		<style type="text/css">
			.row-fluid img:hover
			{
				box-shadow: 0px 0px 15px #rgb(251, 81, 81);
				transform: scale(1.05);
				-ms-transform: scale(1.05);	/* IE 9 */
				-webkit-transform: scale(1.05);	/* Safari 和 Chrome */
				-o-transform: scale(1.05);	/* Opera */
				-moz-transform: scale(1.05);	/* Firefox */
				transform: transform 0.7s;
				-ms-transition: transform 0.7s;
				-webkit-transition: transform 0.7s;
				-o-transition: transform 0.7;
				-moz-transition: transform 0.7s;
			}
			body 
			{ }
			#click
			{
				padding-left: 100px;
				margin-top: 0px;
			}
			#myCarousel
			{
				padding-left: 15px;
				padding-top: 15px;
			}
			#hr
			{
				margin-top: 0px;
				margin-bottom: 7px;
				margin-left: 10px;
				width: 200px;
				border-color: rgba(251, 81, 81, 0.75);
			}
			#det
			{
				margin-left: 120px;
				margin-top: -30px;
				font-size: 23px;
				font-family: 楷体;
				color: #5E3821;
				width: 300px;
			}
			#dlzc
			{
				margin-top: 10px;
			}
			.navbar-text
			{
				font-size: 20px;
				padding-right: 20px;
				
			}
			.list
			{
				font-size: 25px;
				color: #414140;
				padding-left: 50px;
			}
			.nav-list
			{
				padding-top: 35px!important;
			}
			.btn-info
			{
				margin-left:80px ;
			}
			.checkbox
			{
				padding-top: 15px;
				margin-left: 80px;
			}
		    .btn-success
		    {
		    	margin-left: 570px;
		    	
		    }
			.carousel-inner
			{
				margin-left: 55px;
			}
			
			.fenlei
			{
				padding-left: 10px;
				padding-top: 20px;
				margin-bottom: 8px;
				font-size: 22px;
				font-family: "微软雅黑";
				color: #000000;
			}
			p.fenlei:hover
			{
				text-decoration: none!important;
				color: rgba(87, 41, 41, 0.4);
			}
			a:hover
			{
				text-decoration: none!important;
			}
			.more
			{
				font-size: 15px;
				padding-left: 100px;
			}
			.leftimg
			{
				padding-left: 10px;
				width: 95px;
				height: 80px;
				margin-bottom: 5px;
			}
			.leftimg:hover{
				transition: 0.3s ease-in-out;
				transform:scale(0.7);
			}
			.rightimg
			{
				padding-right: 10px;
				width: 95px;
				height: 80px;
			}
			.navbar-fixed-bottom
			{
				margin-left: 523px;
			}
			.picture-list
			{
				float: left;
				height: auto;
				
			}
			.a-list
			{
				width: 210px;
			}
			.left-list
			{
				width: 105px;
				float: left;
			}
			.btn-join
			{
				color: #FFF;
				padding: 5px 0px 5px 0px;
				margin-left: 667px!important;
				margin-top: -30px!important;
				
				position: relative;
				font-weight:bold;
				width: 124px; 
				height: 44px; 
				border-radius: 3px; 
				border: 1px solid #c0c0c0; 
				border-color: #ed7989;  
				box-shadow:0 1px 0 #f9a1b1 inset,0 1px 0 rgba(0,0,0,.2);
				background:-webkit-linear-gradient(top,#f78297,#f56c7e);  /* Safari and Chrome */
				background:-moz-linear-gradient(top,#f78297,#f56c7e); /* Firefox */
				background:-o-linear-gradient(top,#f78297,#f56c7e);  /* Opera */
				background:-ms-linear-gradient(top,#f78297,#f56c7e);  /*IEzhegebiantai */
				background:linear-gradient(top,#f78297,#f56c7e);

			}
			.btn-join:hover{
				background:-webkit-linear-gradient(top,#fbacbb,#f4798f); 
				background:-moz-linear-gradient(top,#fbacbb,#f4798f); 
				background:-o-linear-gradient(top,#fbacbb,#f4798f); 
				background:-ms-linear-gradient(top,#fbacbb,#f4798f); 
				background:linear-gradient(top,#fbacbb,#f4798f); 
				}
			.btn-join:active{
				top:4px;
				box-shadow:inset 0 1px 3px #aa2c3d;
				background:-webkit-linear-gradient(top,#e15c6d,#e15c6d); 
				background:-moz-linear-gradient(top,#e15c6d,#e15c6d); 
				background:-o-linear-gradient(top,#e15c6d,#e15c6d); 
				background:-ms-linear-gradient(top,#e15c6d,#e15c6d); 
				background:linear-gradient(top,#e15c6d,#e15c6d);  
				}	

			a.btn-join:hover
			{
				opacity: 0.8;
				text-decoration:none!important; 
				color: #ffffff!important; 
			}
		
<?php 
	if($artwork_url != "no"){
?>
			.pictures
			{
			<?php
				if($clip_position < 140){
			?>
				background-image: url("<?php echo $artwork_url;?>");
			<?php
				}
			?>
				background-size: 778px 375px;
				width: 778px;
				height: 375px; 
			}
<?php
	}
?>
			.left
			{
				margin-left: 64px;
			}
			.right
			{
				margin-right: -50px;
			}
			#click
			{
				padding-right: 40px;
			}
			#overf
			{
				overflow: visible;
				padding: 0px 5px 50px 120px;
				margin-left: -80px;
				width: 750px;
			}
			#gallery {
			    overflow: visible;
			}
			#gallery ul{
			    
			    margin-left:0px; 
			    }
			#gallery ul li {
			    
			    list-style:none; display:inline-table;margin-left: 0px;
			    }
			
			#gallery ul li .pic{
			    
			    -webkit-transition: all 0.6s ease-in-out;
			    
			    -moz-transition: all 0.6s ease-in-out;
			    
			    -o-transition: all 0.6s ease-in-out;
			    
			    opacity:0;
			    visibility:hidden; 
			    position:absolute; 
			    margin-top:50px; 
			    margin-left:0px; 
			    border:1px solid black;
			}
			#gallery ul li .mini:hover{
			    cursor:pointer;
			}
			
			#gallery ul li:hover .pic {
			    
			    width:400px; 
			    height:autopx;
			    opacity:1; 
			    visibility:visible; 
			    float:right;
			}
			.detail_container
			{
				width:1100px;
				margin-left:auto;
				margin-right:auto;
			}
			.list-pic
			{
				margin: -0px -2px 3px;
			}
			.mini img {
	    		height: auto;
			    max-width: 100%;
			    vertical-align: middle;
			    border: 0px none;
			    margin: -10px 0px 0px 0px!important;
			 }

		</style>
		<script src="<?php echo $base."/js/jquery-2.1.0.js"?>"></script>
        <script src="<?php echo $base."/js/bootstrap.min.js"?>"></script>
	</head>
	<?php include "header.php";?>
	<body style="padding-top: 58px; ">
		<div class="detail_container">
			<p class="navbar-text pull-left">
				<a href="/onepiece/home" class="list">首页</a>
				<a href="/onepiece/class_list/0/0" class="list">海贼王</a>
				<a href="/onepiece/class_list/0/1" class="list">古剑</a>
				<a href="/onepiece/class_list/0/2" class="list">爸爸去哪儿</a>
				<a href="/onepiece/class_list/0/3" class="list">TFBOYS</a>
				<a href="/onepiece/class_list/0/4" class="list">IPHONE</a>
			</p>
			<ul class="nav nav-list" style="margin-top: 10px;">
		    	<li class="divider" style="height: 2px; margin-top: -10px; background-color:rgba(251, 81, 81, 0.75);"></li>
		    </ul>
			<div class="row-fluid">
				<div class="span9" style="height: 480px;">
					<form id="draw_form" name="draw" action="" method="post">
						<div id="myCarousel" class="carousel slide" style="width: 900px;height: 450px;">		  
							<div id="overf" class="carousel-inner">
								<div class="item active" >
								<div id="pictures" class="pictures" alt="" >
									<div id="gallery">
									 <ul>
<?php
	if(!empty($clip_infor)){
		foreach($clip_infor as $clip_item){
/* 			$storage = new SaeStorage();
			$clip_item['lit_image'] = $storage->read('drawpicture',$clip_item['lit_image']);	  */
		
?>
									<li class="list-pic"><a href="<?php echo '/onepiece/show?record_id='.$clip_item['record_id']?>">
										<img src="<?php echo $clip_item['lit_image']?>" class="mini" width="50px" height="25px" id="picture" /><img src="<?php echo $clip_item['lit_image']?>" class="pic" id="picture" /></a>
									</li>
<?php
		}
	}
?>			
								</ul>				
								</div>
								</div>							
									<input name="artwork_id"id="artwork_id" hidden="true"value="<?php echo $artwork_id;?>">
									<input name = "theme" id="theme" hidden="true" value="<?php echo $theme;?>">
									<input name="artwork_url" hidden="true" value="<?php echo $artwork_url;?>">
									<input name="clip_position" hidden="true" value="<?php echo $clip_position;?>">
									<input id="choice" name="choice" hidden="true" value="">
								</div>
									<button type="submit"id="prev" class="left carousel-control"  data-slide="prev">&lsaquo;</button>
									<button type="submit"id="next" class="right carousel-control" data-slide="next">&rsaquo;</button>								
						</div> <!--lunbo-->
<?php 
	if($artwork_url != "no"){
?>
						<button type="submit" id="join" class="btn-join" data-toggle="modal">参与</button>
<?php
}
?>
					</form>
						<p id="det"><?php echo $artwork_name;?></p>
				</div><!--span9-->
			</div>
			<div class="span3" style="height: 480px;">
					<div>
						<a href="/onepiece/class_list/0/3"><p class="fenlei">TFBOYS</p></a>
						<hr id="hr">
					    <div class="row-fluid" >
				    		<div class="a-list" >
<?php 
	foreach($food as $food_item){
		$artwork_url = $food_item['artwork_url'];
		$food_artwork_id = $food_item['artwork_id'];
		$storage = new SaeStorage();
		$artwork = $storage->getUrl('onepiece',$artwork_url);
?>
				    			<a class="left-list" href="<?php echo "/onepiece/picture_detail?artwork_id=".$food_artwork_id;?>"><img class="leftimg" src="<?php echo $artwork;?>"></a>
<?php 
				}
?>
				    		</div>				    	
					    </div>   
					</div>
					<div>
						<a href="/onepiece/class_list/0/1"><p class="fenlei">古剑奇谭</p></a>
						<hr id="hr">
					    <div class="row-fluid" >
				    		<div class=" list-a" >
<?php 
	foreach($star as $star_item){
		$star_artwork_id = $star_item['artwork_id'];
		$artwork_url = $star_item['artwork_url'];
		$storage = new SaeStorage();
		$artwork = $storage->getUrl('onepiece',$artwork_url);
?>
				    			<a href="<?php echo "/onepiece/picture_detail?artwork_id=".$star_artwork_id;?>"><img class="leftimg" src="<?php echo $artwork;?>"></a>
<?php
					}
?>
				    		</div>					    	
					    </div>  
					</div>	
				</div>
			</div>
	<!-- 多说评论框 start -->
	<div class="ds-thread" data-thread-key="<?php echo $artwork_id?>" data-title="ing海贼" data-url="<?php echo 'http://ingonepiece.sinaapp.com/onepiece/picture_detail?artwork_id='.$artwork_id ?>"</div>
		<!-- 多说评论框 end -->
		<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
		<script type="text/javascript">
		var duoshuoQuery = {short_name:"ingonepiece"};
			(function() {
				var ds = document.createElement('script');
				ds.type = 'text/javascript';
				ds.async = true;
				ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
				ds.charset = 'UTF-8';
				(document.getElementsByTagName('head')[0] 
				 || document.getElementsByTagName('body')[0]).appendChild(ds);
			})();
		</script>
		<!-- 多说公共JS代码 end -->
		</div>
		<a href="http://ingzone.com" class="navbar navbar-fixed-bottom">山东大学ING工作室 Copyright © 2014</a>
		<!--提示框-->
		<div id="myModal3" class="modal hide fade" tabindex="-1" style="width: 300px;margin-left:-151px;margin-top:150px;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" hidden>
			<div class="modal-header" style="background-color:#fff">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<img src="http://3.ingonepiece.sinaapp.com/img/m2.png" alt="..." style="width:190px;padding-top:6px;padding-left:30px;text-align:center">
			</div>
				<div class="modal-body">
					<P style="text-align: center;font-family: '微软雅黑';font-size:20px;">请先登录</P>
					<P style="text-align: center;font-family: '微软雅黑';font-size:20px;">未登录状态不能参与活动</P>
					<a id="click" href="#myModal" data-dismiss="modal" data-toggle="modal" onclick="resist()" style="font-size:15px"> 点击登录 >> </a>
				</div>
		</div>   
	</body>
	<script>
		$(document).ready(function(){
			$("#prev").click(function(){
				$("#choice").attr("value",2); 
				$("#draw_form").attr("action","/onepiece/get_picture/"); 
				$("#draw_form").submit();
			});
			$("#next").click(function(){
				$("#choice").attr("value",1); 
				$("#draw_form").attr("action","/onepiece/get_picture/"); 
				$("#draw_form").submit();
			});
			$("#join").click(function(){
				$.post('/onepiece/check_session/',function(msg){
					if(msg=="ok"){
						$("#draw_form").attr("action","/onepiece/draw/"); 
						$("#draw_form").submit();
					}else{		
						$('#myModal3').modal('show');
					} 
				});
			});
		});
	//	$(document).ready(function(){
	//		$('div#divi').hide();
	//		});
	</script>


</html>
