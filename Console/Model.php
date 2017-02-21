<?php

class Model
{

	/**
	 * [makeModel 判断第命令第三、四个参数个参数]
	 * @param  [array] $cmd [命令的结果集]
	 * @return [type]      [description]
	 */
	public static function makeModel($cmd)
	{
		self::writeModel($cmd[0]);		
	}


	public static function writeModel($module)
	{
        $temp=explode('/',$module);
        $module=ucfirst($temp[0]);
        $model=ucfirst($temp[1]); 

		$name=$model.'Model.class.php';

        $tpl =file_get_contents(__DIR__.'/tpl/model.tpl');
        
    	$config=require 'Config.php';
    	$tpls=sprintf($tpl,$module,$model);
    	$path=$config['APP_PATH'].$module.'/'.$config['DEFAULT_M_LAYER'].'/'.$name;
    	$dir=$config['APP_PATH'].$module.'/'.$config['DEFAULT_M_LAYER'];

		//判断文件是否存在
		if(is_file($path) ){
			die('Model file is exists');
		}else{
			file_exists( $dir ) ||  mkdir($dir,0755,true);
			file_put_contents($path, $tpls) && die('Model create success!');

		}
		

	}



}