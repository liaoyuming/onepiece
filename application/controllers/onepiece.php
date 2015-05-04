<?php  session_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Onepiece extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
	}
	public function index()
	{
		$data['base'] = $this->config->item('base_url');  
		$data['css'] =$this->config->item('css');	
		$this->load->view('index',$data);
	}
	//进入主页；
	public function home(){
		$car_sql = "select * from artwork where theme = 0 order by clip_position desc limit 4 ";
		$star_sql = "select * from artwork where theme = 1 order by clip_position desc limit 4 ";
		$view_sql = "select * from artwork where theme = 2 order by clip_position desc limit 4 ";
		$food_sql = "select * from artwork where theme = 3 order by clip_position desc limit 4 ";
		$apple_sql = "select * from artwork where theme = 4 order by clip_position desc limit 4";
		$mysql = new SaeMysql();
		$storage = new SaeStorage();
		$car_infor = $mysql->getData($car_sql);
		$star_infor = $mysql->getData($star_sql);
		$view_infor = $mysql->getData($view_sql);
		$food_infor = $mysql->getData($food_sql);
		$apple_infor = $mysql->getData($apple_sql);
		$data['car_infor'] = $car_infor;
		$data['star_infor'] = $star_infor;
		$data['view_infor'] = $view_infor;
		$data['food_infor'] = $food_infor;
		$data['apple_infor'] = $apple_infor;
		$data['base'] = $this->config->item('base_url');  
		$data['css'] =$this->config->item('css');	
		$this->load->view('home',$data);
	}
//进入类别页面
	public function class_list($page=0,$theme=0){
	//实现分页；
		$config['base_url'] = $this->config->item('base_url').'/onepiece/class_list';
		$config['per_page'] = 16;
		$config['suffix'] = "/$theme"; 
		$config['first_url'] = $this->config->item('base_url').'/onepiece/class_list/1/'.$theme; 
		$per_page = 16;
		$config['uri_segment'] = 3; 
		$current_num = $this->uri->segment(3);
		if(empty($current_num)){
			$current_num = 0;
		}
		$all_class_sql = "select * from artwork where theme = $theme"; 
		$class_sql = "select * from artwork where theme = $theme limit ".$current_num." , ".$per_page;
		$mysql = new SaeMysql();
//数据库总记录
		$all_res = $mysql->getData($all_class_sql);
		$config['total_rows'] = count($all_res);
		$this->pagination->initialize($config); 
		$pagination = $this->pagination->create_links();
		$data['pagination'] = $pagination;
//每个页面显示的图片；
		$res = $mysql->getData($class_sql);
		$data['res'] = $res;
	
		$data['base'] = $this->config->item('base_url');  
		$data['css'] =$this->config->item('css');	
		$data['theme'] = $theme;
		$this->load->view('class_detail',$data);	
	}
	//点击列表中的图片进入详情页面
	public function picture_detail()
	{
		//get方法接受原图id
		$artwork_id = $_GET['artwork_id'];
		$mysql = new SaeMysql();
		$storage = new SaeStorage();
		$artwork_sql = "select * from artwork where artwork_id = '$artwork_id'";
		$artwork_infor = $mysql->getLine($artwork_sql);
		$artwork = $storage->getUrl("onepiece",$artwork_infor['artwork_url']);
		
		//找出该图片所有被划过的部分
		$clip_sql = "select record_id, artwork_id,user_name,coordinate,color,lit_image from record where artwork_id = $artwork_id ORDER BY clip_position";
		$clip_infor = $mysql->getData($clip_sql);
		//为页面旁边的窗口做数据准备
		//两种类别的图片id，url
		//按照切割分数排序取前四个；
		//挑选明星和美食两个类别
		$star_sql = "select * from artwork where theme = 1  order by clip_position desc limit 4";
		$food_sql = "select * from artwork where theme = 3  order by clip_position desc limit 4";
		$star = $mysql->getData($star_sql);
		$food = $mysql->getData($food_sql);
		
		//准备数据
		$data['artwork_url'] = $artwork;
		$data['artwork_id'] =$artwork_infor['artwork_id'];
		$data['artwork_name'] = $artwork_infor['artwork_name'];
		$data['theme'] = $artwork_infor['theme'];
		$data['clip_position'] = $artwork_infor['clip_position'];
		$data['artwork_width'] = $artwork_infor['artwork_width'];
		$data['artwork_height'] = $artwork_infor['artwork_height'];
		$data['clip_infor'] = $clip_infor;
//		$data['clip_width'] = 30*750/$artwork_infor['artwork_width'];
//		$data['clip_height'] = 15*375/$artwork_infor['artwork_height'];
		$data['food'] = $food;
		$data['star'] = $star;

//载入图片详情页面
		$data['base'] = $this->config->item('base_url');  
		$data['css'] =$this->config->item('css');	
		$this->load->view('picture_detail',$data);
	}
	public function get_picture(){
		if(isset($_POST['artwork_id']) && isset($_POST['choice']) && isset($_POST['theme']))
		{
			$_SESSION['artwork_id'] = $_POST['artwork_id'];
			$_SESSION['choice'] = $_POST['choice'];
			$_SESSION['theme'] = $_POST['theme'];
		}
		$artwork_id = $_SESSION['artwork_id'];
		$choice = $_SESSION['choice'];
		$theme = $_SESSION['theme']; 
		switch($choice){
			case 1:
			{
				$sql = "SELECT *
				FROM artwork
				WHERE artwork_id >$artwork_id and theme=$theme
				LIMIT 0 , 1";
				break;

			}
			case 2:
			{
				$sql = "SELECT *
						FROM artwork
						WHERE artwork_id = (

						SELECT MAX( artwork_id ) 
						FROM artwork
						WHERE artwork_id <$artwork_id
						AND theme =$theme
						)
						";
			}
		}
		$mysql = new SaeMysql();
		$artwork_infor = $mysql->getLine($sql);
		if(!empty($artwork_infor)){
			$storage = new SaeStorage();
			$artwork = $storage->getUrl("onepiece",$artwork_infor['artwork_url']);
			$data['artwork_url'] = $artwork;
			$data['artwork_id'] =$artwork_infor['artwork_id'];
			$data['artwork_name'] = $artwork_infor['artwork_name'];
			$data['theme'] = $artwork_infor['theme'];
		}
		else{
			$data['artwork_url'] = "no";
			$data['artwork_id'] =$artwork_id;
			$data['artwork_name'] = "没有更多图片";
			$data['theme'] = $theme;
		}
//找出该图片所有被划过的部分
		$clip_sql = "select record_id,artwork_id,user_name,coordinate,color,lit_image from record where artwork_id = ".$artwork_infor['artwork_id']." ORDER BY clip_position";
		$clip_infor = $mysql->getData($clip_sql);
//为页面旁边的窗口做数据准备
//两种类别的图片id，url
//按照切割分数排序取前四个；
//挑选明星和美食两个类别
		$star_sql = "select * from artwork where theme = 1  order by clip_position desc limit 4";
		$food_sql = "select * from artwork where theme = 3  order by clip_position desc limit 4";
		$star = $mysql->getData($star_sql);
		$food = $mysql->getData($food_sql);
//准备数据
		$data['clip_position'] = $artwork_infor['clip_position'];
		$data['artwork_width'] = $artwork_infor['artwork_width'];
		$data['artwork_height'] = $artwork_infor['artwork_height'];
		$data['clip_infor'] = $clip_infor;
		$data['food'] = $food;
		$data['star'] = $star;
//载入图片详情页面
		$data['base'] = $this->config->item('base_url');  
		$data['css'] =$this->config->item('css');	
		$this->load->view('picture_detail',$data);
	}
//点击参与，跳转至画图页面
	public function draw(){
			$artwork_url = $_POST['artwork_url'];
			$artwork_id = $_POST['artwork_id'];

			$mysql = new SaeMysql();
//查询数据库，得到下一次将要画的位置
			$artwork_infor_sql = "select clip_position from artwork where artwork_id = '$artwork_id'";
			$clip_position = $mysql->getLine($artwork_infor_sql);
			$clip_position = $clip_position['clip_position'];

//对图片进行裁剪  50*50
			$src = imagecreatefromstring(file_get_contents($artwork_url));
			$array = getimagesize($artwork_url);//得到图片像素值
			$former_width = $array[0];
			$former_height = $array[1];
//x，y方向的切割份数
			$x_clip_num = 15;
			$y_clip_num = 15;
//保存每张原图的宽和高
			$update_sql = "UPDATE  `app_ingonepiece`.`artwork` SET  artwork_width = $former_width,artwork_height = $former_height WHERE  `artwork`.`artwork_id` = $artwork_id";
			$mysql->runSql($update_sql);
//计算分图的宽和高
			$width = $former_width/$x_clip_num;
			$height = $former_height/$y_clip_num;
//按照切割位置计算切割点坐标
			$y_multiples = $clip_position/$y_clip_num;
			$x_multiples = $clip_position%$x_clip_num;
			$x = $x_multiples*$width;
			$y = $y_multiples*$height;		
//将裁剪区域复制到新图片上，并根据源和目标的宽高进行缩放或者拉升
			$new_image = imagecreatetruecolor($width, $height);
			imagecopyresampled($new_image, $src, 0, 0, $x, $y, $width, $height, $width, $height);

			ob_start();
			imagepng($new_image);
// Capture the output
			$imagedata = ob_get_contents();
// Clear the output buffer
			ob_end_clean();

			$clip_before_draw = 'data:image/png;base64,'.base64_encode($imagedata);
			$data['base'] = $this->config->item('base_url');  
			$data['css'] =$this->config->item('css');
			$data['clip_position'] = $clip_position;
			$data['artwork_id'] = $artwork_id;
			$data['clip_before_draw'] = $clip_before_draw;
			$this->load->view("draw",$data);
	}
//保存用户画过得图片
	public function save_draw(){
			$artwork_id = $_POST['artwork_id'];
			$clip_position = $_POST['clip_position'];
//			$big_image = $_POST['big_image'];
			$coordinate = $_POST['coordinate'];
			$lit_image = $_POST['lit_image'];
			$clip_before_draw = $_POST['clip_before_draw'];
			$color = $_POST['color'];
			$storage = new SaeStorage();
			$domain = 'drawpicture';
	//		$little_imgName = "lit_"."$artwork_id"."_"."$clip_position".".txt";
	//		$medium_imgName = "med_"."$artwork_id"."_"."$clip_position".".txt";
	//		$big_imgName = "big_"."$artwork_id"."_"."$clip_position".".txt";
	//		$attr = array('encoding' => 'gzip');
	//		$lit_res  = $storage->write($domain, $little_imgName, $lit_image, -1, $attr, true);//将数据写入storage,并成功返回URL,失败返回FALSE
	//		$med_res  = $storage->write($domain, $medium_imgName, $med_image, -1, $attr, true);
	//		$big_res  = $storage->write($domain, $big_imgName, $big_image, -1, $attr, true);
	/* 		if(!$lit_res || !$big_res)
			{
				var_dump($storage->errno(), $storage->errmsg());
			} */
			$insert_clip_sql = "INSERT INTO  `app_ingonepiece`.`record` (
							`record_id` ,
							`artwork_id` ,
							`user_name` ,
							`clip_before_draw` ,
							`clip_position` ,
							`coordinate`,
							`color`,
							`lit_image`
							
							)
							VALUES (
							NULL ,  '$artwork_id',  'zhou',  '$clip_before_draw',  '$clip_position',  '$coordinate', '$color', '$lit_image'
							)";
			$mysql = new SaeMysql();
			$insert_res = $mysql->runSql($insert_clip_sql);
			if( $mysql->errno() != 0 )
			{
				die( "Error:" . $mysql->errmsg());
			}
//更新原图的clip_position,+1.
		$clip_position = $clip_position + 1;
		$updata_sql = "UPDATE  `app_ingonepiece`.`artwork` SET  `clip_position` =  '$clip_position' WHERE  `artwork`.`artwork_id` =$artwork_id;";
		$update_res = $mysql->runSql($updata_sql);
		if( $mysql->errno() != 0 )
		{
			die( "Error:" . $mysql->errmsg());
		}
		else{
			redirect('/onepiece/picture_detail?artwork_id='.$artwork_id);
		}
	}
	//展示画图过程
	function show(){
		$record_id = $_GET['record_id'];
		$sql = "select * from record where record_id = $record_id";
		$mysql = new SaeMysql();
		$res = $mysql->getLine($sql);
		$data['res'] = $res;
		$data['base'] = $this->config->item('base_url');  
		$data['css'] =$this->config->item('css');
		$this->load->view('show',$data);
	}
	public function check_sign_in(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$check_sql = "select * from users where user_name = '$username' and password = '$password'";
		$mysql = new SaeMysql();
		$user = $mysql->getLine($check_sql);
		if(!empty($user)){
			echo "ok";
		}
		else
		{
			echo "fail";
		}
	}
	public function check_sign_up(){
		$username = $_POST['username'];
		$code = $_POST['code'];
		$check_sql = "select * from users where user_name = '$username'";
		$mysql = new SaeMysql();
		$user = $mysql->getLine($check_sql);
		if(!empty($user)){//该用户已经存在
			echo "1*";
		}
		//检查验证码输入是否正确；
		if($code !== $_SESSION['code_num']){
			echo "2";
		}
	}
	public function handle_sign_in(){
		$username = $_POST['username'];
		$_SESSION['username'] = $username;
		redirect('/onepiece/home');
	}
	public function handle_sign_up(){
		$username = $_POST['username_sign_up'];
		$_SESSION['username'] = $username;
		$password = $_POST['pass_sign_up'];
		$mysql = new SaeMysql();
		$insert_sql = "INSERT INTO  `app_ingonepiece`.`users` (
						`user_name` ,
						`password`
						)
						VALUES (
						'$username',  '$password'
						)";
		$res = $mysql->runSql($insert_sql);
		redirect('/onepiece/home');
	}
	public function check_session(){
		if($_SESSION['username']){
			echo "ok";
		}else{
			echo "no";
		}
	}
//生成验证码：
	function getCode($num=4,$w=60,$h=31) {
		$code = "";
		for ($i = 0; $i < $num; $i++) {
			$code .= rand(0, 9);
		}
		//4位验证码也可以用rand(1000,9999)直接生成
		//将生成的验证码写入session，备验证页面使用
		$_SESSION["code_num"] = $code;
		//创建图片，定义颜色值
		Header("Content-type: image/PNG");
		$im = imagecreate($w, $h);
		$black = imagecolorallocate($im, 0, 0, 0);
		$gray = imagecolorallocate($im, 200, 200, 200);
		$bgcolor = imagecolorallocate($im, 255, 255, 255);

		imagefill($im, 0, 0, $gray);

		//画边框
		imagerectangle($im, 0, 0, $w-1, $h-1, $black);

		//随机绘制两条虚线，起干扰作用
		$style = array (
			$black,
			$black,
			$black,
			$black,
			$black,
			$gray,
			$gray,
			$gray,
			$gray,
			$gray
		);
		imagesetstyle($im, $style);
		$y1 = rand(0, $h);
		$y2 = rand(0, $h);
		$y3 = rand(0, $h);
		$y4 = rand(0, $h);
		imageline($im, 0, $y1, $w, $y3, IMG_COLOR_STYLED);
		imageline($im, 0, $y2, $w, $y4, IMG_COLOR_STYLED);

		//在画布上随机生成大量黑点，起干扰作用;
		for ($i = 0; $i < 80; $i++) {
			imagesetpixel($im, rand(0, $w), rand(0, $h), $black);
		}
		//将数字随机显示在画布上,字符的水平间距和位置都按一定波动范围随机生成
		$strx = rand(3, 8);
		for ($i = 0; $i < $num; $i++) {
			$strpos = rand(1, 6);
			imagestring($im, 5, $strx, $strpos, substr($code, $i, 1), $black);
			$strx += rand(8, 12);
		}
		imagepng($im);
		imagedestroy($im);
	}	
	public function session_clear(){
		session_unset();
		redirect('/onepiece/home');
	}
	
}
