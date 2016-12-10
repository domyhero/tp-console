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
		unset($cmd[0]);
		$cmd=array_values($cmd);
		$module=$cmd[0];
		$model=$cmd[1];
		self::writeModel($module,$model);		
	}


	public static function writeModel($module,$model)
	{
		$name=$model.'Model.class.php';
		// die($name);
		$tpl =
<<<EOT
<?php
namespace %s\Model;
use Think\Model;

class %s extends Model {
    
    //插入的时候允许接受的字段
    protected \$insertFields =  'username';
    //更新的时候允许接受的字段
    protected \$updateFields =  'id,username';

    //验证规则
    protected \$_validate = array(
        array('username','require','用户名不能为空',1),
        array('username', '1,30', '用户名最长不能超过 30 个字符！', 1, 'length', 3),
    );

    //自动完成
    protected \$_auto = array (
        array('add_time','time',1,'function'), // 对add_time字段在新增的时候写入当前时间戳
    );
	
    protected function _before_insert(&\$data,\$options) {
		// 插入数据前的回调方法
    }
    
    protected function _after_insert(\$data,\$options) {
    	// 插入成功后的回调方法
    }

	
    protected function _before_update(&\$data,\$options) {
    	// 更新数据前的回调方法
    }
    
    protected function _after_update(\$data,\$options) {
    	// 更新成功后的回调方法
    }

    
    protected function _before_delete(\$options) {
		// 删除数据前的回调方法
    }    
    
    protected function _after_delete(\$data,\$options) {
		// 删除成功后的回调方法
    }


    /**[page 实现分页 筛选] 结果包含分页*/
    public function page(){
        \$where=array();

        I('get.parent_id') && \$where['parent_id']=I('get.parent_id');
        
        \$order='id asc';
        I('get.order') && \$order==I('get.order');


        // 查询满足要求的总记录数
        \$count = \$this->where(\$where)->count();

        \$Page  = new \Think\Page(\$count,10);// 实例化分页类 传入总记录数和每页显示的记录数(10)

        //设置
        \$Page->setConfig('first','首页');
        \$Page->setConfig('last','尾页');    
        \$Page->setConfig('next','下一页');
        \$Page->setConfig('prev','上一页');

        \$show  = \$Page->show();// 分页显示输出

        // 进行分页数据查询
        \$res = \$this->field('*')
                    ->where(\$where)
                    ->order(\$order)
                    ->limit(\$Page->firstRow.','.\$Page->listRows)
                    ->select();
        return array(
            'list' => \$res,
            'page' => \$show,
        );
                 
    }

}
EOT;

	$config=require 'Config.php';
	$tpls=sprintf($tpl,$module,$model.$config['DEFAULT_M_LAYER']);
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