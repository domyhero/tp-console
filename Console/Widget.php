<?php

class Widget
{

	public static function makeWidget($cmd)
	{
		self::writeWidget($cmd[0]);		
	}


	public static function writeWidget($module)
	{
		$temp=explode('/',$module);
		$module=ucfirst($temp[0]);
		$name=ucfirst($temp[1]);		

		$tpl =file_get_contents(__DIR__.'/tpl/widget.tpl');
		$config=require 'Config.php';
		$tpls=sprintf($tpl,$module,$name,$name,strtolower($name) );
		$path=$config['APP_PATH'].$module.'/'.$config['DEFAULT_W_LAYER'].'/'.$name.$config['DEFAULT_W_LAYER'].'.class.php';
		
		$dir=$config['APP_PATH'].$module.'/'.$config['DEFAULT_W_LAYER'];


		//判断文件是否存在
		if(is_file($path) ){
			die('Widget file is exists');
		}else{
			file_exists( $dir ) ||  mkdir($dir,0755,true);
			file_put_contents($path, $tpls) ? 'Widget create success!' : 'Widget create error!';

		}
		
		self::writeview($module,$name);
	}


	public static function writeview($module,$name)
	{


		$tpl =file_get_contents(__DIR__.'/tpl/widgetView.tpl');
		$config=require 'Config.php';
		$tpls=sprintf($tpl,$module,$name);
		$path=$config['APP_PATH'].$module.'/'.$config['DEFAULT_V_LAYER'].'/'.$config['DEFAULT_W_LAYER'].'/'.$name.'.html';
		
		$dir=$config['APP_PATH'].$module.'/'.$config['DEFAULT_V_LAYER'].'/'.$config['DEFAULT_W_LAYER'];

		//判断文件是否存在
		if(is_file($path) ){
			die('WidgetView file is exists');
		}else{
			file_exists( $dir ) ||  mkdir($dir,0755,true);
			file_put_contents($path, $tpls)? 'WidgetView create success!':'WidgetView create error!';

		}
		

	}


}