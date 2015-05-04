<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>ONEPIECE</title>
		<link href="<?php echo $base."/css/bootstrap-responsive.css"?>" rel="stylesheet">
		<link href="<?php echo $base."/css/bootstrap.min.css"?>" rel="stylesheet">
		<style type="text/css">
			.span3 img:hover
			{
				box-shadow: 0px 0px 15px #rgb(251, 81, 81);
				transform: scale(1.07);
				-ms-transform: scale(1.07);	/* IE 9 */
				-webkit-transform: scale(1.07);	/* Safari 和 Chrome */
				-o-transform: scale(1.07);	/* Opera */
				-moz-transform: scale(1.07);	/* Firefox */
				transform: transform 0.7s;
				-ms-transition: transform 0.7s;
				-webkit-transition: transform 0.7s;
				-o-transition: transform 0.7;
				-moz-transition: transform 0.7s;
				
			}
			body 
			{ 
				padding-top: 58px; 
			}
			.container
		    {
	    	    width: 80% !important;  
  				min-width: 675px !important;    
		    }
			#dlzc
			{
				margin-top: 10px;
			}
			.navbar-text
			{
				font-size: 20px;
				padding-right: 20px;	
				margin-top: 15px;
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
			.fenlei {
			    padding-left: 10px;
			    padding-top: 10px;
			    margin-bottom: 8px;
			    font-size: 22px;
			    
			}
			.more
			{
				font-size: 15px;
				padding-left: 50px;
			}
			
			.fixed-bottom
			{
				margin-left: 523px;
				
			}
			.carousel-inner {
			    position: relative;
			    width: 100%;
			    overflow: hidden;
			    height: 380px;
			}
			
			
				
			
		</style>
		<script src="<?php echo $base."/js/jquery-2.1.0.js"?>"></script>
		<script src="<?php echo $base."/js/bootstrap.min.js"?>"></script>
		
	</head>
<?php include "header.php"?>
	<body style="background-color:#FCFFF2">
		<div class="container">
			<p class="navbar-text pull-left">
				<a href="/onepiece/home" class="list">首页</a>
				<a href="/onepiece/class_list/0/0" class="list">海贼王</a>
				<a href="/onepiece/class_list/0/1" class="list">古剑</a>
				<a href="/onepiece/class_list/0/2" class="list">爸爸去哪儿</a>
				<a href="/onepiece/class_list/0/3" class="list">TFBOYS</a>
				<a href="/onepiece/class_list/0/4" class="list">iPhone</a>
			</p>
			<ul class="nav nav-list">
		    	<li class="divider" style="height: 2px;background-color: #FB7D79;border-color:#FCFFF2;"></li>
		    </ul>
			<div class="row-fluid" style="background-color:#ffffff;color:#664231;">
				<div id="myCarousel" class="carousel slide">
            		<ol class="carousel-indicators">
		                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		                <li data-target="#myCarousel" data-slide-to="1"></li>
		                <li data-target="#myCarousel" data-slide-to="2"></li>
		            </ol>
		            <div class="carousel-inner">
		                <div class="item active">
		                	<a href="/onepiece/picture_detail?artwork_id=32"><img src="http://ingonepiece-onepiece.stor.sinaapp.com/onepiece_9.jpg" alt=""></a>		              	         
		                </div>
		                <div class="item">
		                	<a href="/onepiece/picture_detail?artwork_id=31"><img src="http://ingonepiece-onepiece.stor.sinaapp.com/onepiece_8.jpg" alt=""></a>	              	             
		                </div>
		                <div class="item">
		                	<a href="/onepiece/picture_detail?artwork_id=29"><img src="http://ingonepiece-onepiece.stor.sinaapp.com/onepiece_6.jpg" alt=""></a>                	
		                </div>
		            </div><!---inner-->
	<!--	            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	-->	    			</div><!--lunbo-->
	   			<hr style="border-color:#FCFFF2"/>
	   			<p class="fenlei"><a href="/onepiece/class_list/0/0" style="color:#414140">海贼王</a></p>
	   			<hr style="border-color:#FCFFF2"/>
	   		  <div  class="row" style="margin-left: 15px;margin-right: 15px;margin-top:10px;">
				<?php
					if(!empty($car_infor)){
						foreach($car_infor as $item){
							$storage = new SaeStorage();
							$photo_path = $storage->getUrl("onepiece",$item['artwork_url']);
				?>
						<div class="span3">
							<a href="<?php echo "/onepiece/picture_detail?artwork_id=".$item['artwork_id']?>"><img src="<?php echo $photo_path;?>" alt=""></a>
							<p style="text-align: center;margin-top: 5px;font-size:16; font-family: 宋体;font-size: 16px;"><?php echo $item['artwork_name'] ?></p>
						</div>
	   			<?php
						}
					}else{
						echo "抱歉，没有相关图片！";
					}
				?>
	   			</div><!--row-->
	   			<hr style="border-color:#FCFFF2"/>
	   			<p class="fenlei"><a href="/onepiece/class_list/0/1" style="color:#414140">古剑</a></p>
	   			<hr style="border-color:#FCFFF2"/>
	   			<div  class="row" style="margin-left: 15px;margin-right: 15px;margin-top:10px;">
	   			<?php
					if(!empty($star_infor)){
						foreach($star_infor as $item){
							$storage = new SaeStorage();
							$photo_path = $storage->getUrl("onepiece",$item['artwork_url']);
							
				?>
						<div class="span3">
							<a href="<?php echo "/onepiece/picture_detail?artwork_id=".$item['artwork_id']?>"><img src="<?php echo $photo_path;?>" alt=""></a>
							<p style="text-align: center;margin-top: 5px; font-family: 宋体;font-size: 16px;"><?php echo $item['artwork_name'] ?></p>
						</div>
	   			<?php
						}
					}else{
						echo "抱歉，没有相关图片！";
					}
				?>
	   			</div><!--row2-->
	   			<hr style="border-color:#FCFFF2"/>
	   			<p class="fenlei"><a href="/onepiece/class_list/0/2" style="color:#414140">爸爸去哪儿</a></p>
	   			<hr style="border-color:#FCFFF2"/>
	   			<div  class="row" style="margin-left: 15px;margin-right: 15px;margin-top:10px;">
	   			<?php
					if(!empty($view_infor)){
						foreach($view_infor as $item){
							$storage = new SaeStorage();
							$photo_path = $storage->getUrl("onepiece",$item['artwork_url']);
				?>
						<div class="span3">
							<a href="<?php echo "/onepiece/picture_detail?artwork_id=".$item['artwork_id']?>"><img src="<?php echo $photo_path;?>" alt=""></a>
							<p style="text-align: center;margin-top: 5px; font-family: 宋体;font-size: 16px;"><?php echo $item['artwork_name'] ?></p>
						</div>
	   			<?php
						}
					}else{
						echo "抱歉，没有相关图片！";
					}
				?>
	   			</div><!--row3-->
				<hr style="border-color:#FCFFF2"/>
	   			<p class="fenlei"><a href="/onepiece/class_list/0/3" style="color:#414140">TFBOYS</a></p>
	   			<hr style="border-color:#FCFFF2"/>
	   			<div  class="row" style="margin-left: 15px;margin-right: 15px;margin-top:10px;">
	   			<?php
					if(!empty($food_infor)){
						foreach($food_infor as $item){
							$storage = new SaeStorage();
							$photo_path = $storage->getUrl("onepiece",$item['artwork_url']);
				?>
						<div class="span3">
							<a href="<?php echo "/onepiece/picture_detail?artwork_id=".$item['artwork_id']?>"><img src="<?php echo $photo_path;?>" alt=""></a>
							<p style="text-align: center;margin-top: 5px;" font-family: 宋体;font-size: 16px;><?php echo $item['artwork_name'] ?></p>
						</div>
	   			<?php
						}
					}else{
						echo "抱歉，没有相关图片！";
					}
				?>
	   			</div><!--row4-->
				<hr style="border-color:#FCFFF2"/>
	   			<p class="fenlei"><a href="/onepiece/class_list/0/4" style="color:#414140">iPhone</a></p>
	   			<hr style="border-color:#FCFFF2"/>
	   			<div  class="row" style="margin-left: 15px;margin-right: 15px;margin-top:10px;">
	   			<?php
					if(!empty($apple_infor)){
						foreach($apple_infor as $item){
							$storage = new SaeStorage();
							$photo_path = $storage->getUrl("onepiece",$item['artwork_url']);
				?>
						<div class="span3">
							<a href="<?php echo "/onepiece/picture_detail?artwork_id=".$item['artwork_id']?>"><img src="<?php echo $photo_path;?>" alt=""></a>
							<p style="text-align: center;margin-top: 5px; font-family: 宋体;font-size: 16px;"><?php echo $item['artwork_name'] ?></p>
						</div>
	   			<?php
						}
					}else{
						echo "抱歉，没有相关图片！";
					}
				?>
	   			</div><!--row4-->

			</div><!--rowfluid-->
		</div>
		<a href="http://ingzone.com" class="fixed-bottom" style="color:#000000;">山东大学ING工作室 Copyright © 2014</a>
	</body>
	
</html>
