<?php

class Controller
{


	public static function makeController($cmd)
	{		
		self::writeController($cmd[0]);		
	}

	// 创建控制器
	public static function writeController($module)
	{
		$temp=explode('/',$module);
		$module=ucfirst($temp[0]);
		$controller=ucfirst($temp[1]);
		$name=$controller.'Controller.class.php';


    $tpl =file_get_contents(__DIR__.'/tpl/controller.tpl');

	$config=require 'Config.php';
	$tpls=sprintf($tpl,$module,$controller.$config['DEFAULT_C_LAYER']);

	$path=$config['APP_PATH'].$module.'/'.$config['DEFAULT_C_LAYER'].'/'.$name;

	$dir=$config['APP_PATH'].$module.'/'.$config['DEFAULT_C_LAYER'];

		//判断文件是否存在
		if(is_file($path) ){
			die("Controller file is exists\n");
		}else{
			file_exists( $dir ) ||  mkdir($dir,0755,true);
			file_put_contents($path, $tpls) && die("Controller create success!\n");

		}
		

	}




}