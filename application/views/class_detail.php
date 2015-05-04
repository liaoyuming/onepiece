<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo"$base/$css";?>"/>
		<title>类详情</title>
		<style type="text/css">
			body 
			{ padding-top: 58px; }
			#click
			{
				padding-right: 40px;
			}
			.navbar-text
			{
				font-size: 20px;
				padding-right: 0px;
				font-family: "微软雅黑";
				margin-top: 10px;
			}
			.list
			{
				font-size: 25px;
				color: #414140;
				padding-left: 25px;
			}
			.nav-list
			{
				padding-top: 33px;
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
			.class-d2
			{
				height: 450px;	
			}
			.class-bread
			{
				margin: 0px 8px;
			}
			.foot-size
			{
				text-align: center;
			}
			.breadcrumb
			{
				background-color: #FFFFFF !important;
				font-size: 20px;
				color:rgba(251, 81, 81, 0.75);
			}
			.thumbnail
			{
				height: 110px;
				width: 220px;
			}
		</style>
	</head>
	<script type="text/javascript">
		function AutoResizeImage(maxWidth,maxHeight,objImg){
			var img = new Image();
			img.src = objImg.src;
			var hRatio;
			var wRatio;
			var Ratio = 1;
			var w = img.width;
			var h = img.height;
			wRatio = maxWidth / w;
			hRatio = maxHeight / h;
			if (maxWidth ==0 && maxHeight==0){
				Ratio = 1;
			}else if (maxWidth==0){//
			if (hRatio<1) Ratio = hRatio;
			}else if (maxHeight==0){
			if (wRatio<1) Ratio = wRatio;
			}else if (wRatio<1 || hRatio<1){
			Ratio = (wRatio<=hRatio?wRatio:hRatio);
			}
			if (Ratio<1){
			w = w * Ratio;
			h = h * Ratio;
			}
			objImg.height = h;
			objImg.width = w;
		}
	</script>
	<body>
<?php include "header.php"?>
		<div class="container">
			<p class="navbar-text pull-left">
				<a href="/onepiece/home" class="list">首页</a>
				<a href="/onepiece/class_list/0/0" class="list">海贼王</a>
				<a href="/onepiece/class_list/0/1" class="list">古剑</a>
				<a href="/onepiece/class_list/0/2" class="list">爸爸去哪儿</a>
				<a href="/onepiece/class_list/0/3" class="list">TFBOYS</a>
				<a href="/onepiece/class_list/0/4" class="list">IPHONE</a>
			</p>
			<ul class="nav nav-list">
		    	<li class="divider" style="height: 2px;background-color:rgba(251, 81, 81, 0.75);"></li>
		    </ul>
		    <div class="class-bread">
		    	<ul class="breadcrumb">
    			<li><span class="divider">>></span></li>
    			<li><a href="<?php echo "/onepiece/class_list/0/$theme";?>" class="active">
<?php switch($theme){
			case 0:
				echo "海贼王";
				break;
			case 1:
				echo "古剑奇谭";
				break;
			case 2:
				echo "爸爸去哪儿";
				break;
			case 3:
				echo "TFBOYS";
				break;
			case 4:
				echo "IPHONE";
				break;
			}	
?>
		</a> <span class="divider">/</span></li>
				</ul>
			</div>
			<div class=" class-d2">
				<ul class="thumbnails">
<?php 
if(!empty($res)){
	foreach($res as $item){
		$storage = new SaeStorage();
		$photo_path = $storage->getUrl("onepiece",$item['artwork_url']);
		$artwork_id = $item['artwork_id'];
?>
				    <li class="span3">
					<div class="thumbnail">
						<a href="<?php echo "/onepiece/picture_detail?artwork_id=".$artwork_id?>"><img alt="200 X 300" src="<?php echo $photo_path;?>" border="0" width="0" height="0" onload="AutoResizeImage(0,170,this)"></a>
					</div>
				    </li>
<?php 
	}
}
else
{
	echo "图片不存在！";
}
?>		     
				</ul>
		    </div><!--thumbnail pic-d2-->
		        <div class="pagination pagination-centered">
    				<ul>
						<?php echo $pagination;?>
					</ul>
    			</div>
		</div><!--container-->
		<footer class="foot-size"><a href="http://ingzone.com">山东大学ING工作室 Copyright © 2014</a></footer>	
	</body>
</html>