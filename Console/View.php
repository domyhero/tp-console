<?php

class View
{

	/**
	 * [makeModel 判断第命令第三、四个参数个参数]
	 * @param  [array] $cmd [命令的结果集]
	 * @return [type]      [description]
	 */
	public static function makeModel($cmd)
	{
		unset($cmd[0]);
		$cmd=array_values($cmd);
		$module=$cmd[0];
		$model=$cmd[1];
		self::writeModel($module,$model);		
	}


	public static function writeModel($module,$model)
	{
		$name=$model.'Model.class.php';

		$tpl =
<<<EOT
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <title>Document</title>
 </head>
 <body>
    
 </body>
 </html>
EOT;

	$config=require 'Config.php';
	$tpls=sprintf($tpl,$module,$model.$config['DEFAULT_V_LAYER']);
	$path=$config['APP_PATH'].$module.'/Model/'.$name;
	$dir=$config['APP_PATH'].$module.'/Model';

		//判断文件是否存在
		if(is_file($path) ){
			die('Model file is exists');
		}else{
			file_exists( $dir ) ||  mkdir($dir,0777,true);
			file_put_contents($path, $tpls) && die('Model create success!');

		}
		

	}



}