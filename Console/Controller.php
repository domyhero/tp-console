<?php

class Controller
{

	/**
	 * [switchCmd 判断第命令第三、四个参数个参数]
	 * @param  [array] $cmd [命令的结果集]
	 * @return [type]      [description]
	 */
	public static function makeController($cmd)
	{
		unset($cmd[0]);
		$cmd=array_values($cmd);
		$module=$cmd[0];
		$controller=$cmd[1];
		self::writeController($module,$controller);		
	}


	public static function writeController($module,$controller)
	{
		$name=$controller.'Controller.class.php';
		// die($name);
		$tpl =
<<<EOT
<?php
namespace %s\Controller;
use Think\Controller;

class %s extends Controller {
    public function index(){
        \$this->show('Welcome to Console');
    }
}
EOT;

	$config=require 'Config.php';
	$tpls=sprintf($tpl,$module,$controller.$config['DEFAULT_C_LAYER']);
	$path=$config['APP_PATH'].$module.'/Controller/'.$name;
	$dir=$config['APP_PATH'].$module.'/Controller';

		//判断文件是否存在
		if(is_file($path) ){
			die('Controller file is exists');
		}else{
			file_exists( $dir ) ||  mkdir($dir,0777,true);
			file_put_contents($path, $tpls) && die('Controller create success!');

		}
		

	}



}