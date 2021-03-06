<?php
namespace %s\Controller;
use Think\Controller;

class %s extends Controller {

    private $slideModel;
    function __construct(){
        parent::__construct();
        $this->slideModel=D('Slide');
    }

    public function index(){
        $this->display();
    }

   /**
     * [add 添加]
     */
    public function add(){
        if(IS_POST){
            $model=$this->slideModel;
            $data=I('post.');
            if( $model->create($data,1) ){
                if($model->add($data)){
                    $this->success('添加成功！',U('Node/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }
    }

    /**
     * [edit 编辑]
     */
    public function edit($id){
        if(IS_POST){
            $model=$this->slideModel;
            $data=I('post.');
            if( $model->create($data,2) ){
                if($model->save($data)){
                    $this->success('修改成功！',U('Node/index')) && exit();
                }else{
                    $this->success('修改成功！',U('Node/index')) && exit();
                }
            }else{
                $this->error( $model->getError() );
            }
        }
    }


    /**
     * [del 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function del($id){  
        $model=$this->slideModel;
        if( $model->delete($id) ){
            $this->success('删除成功！',U('Node/index')) && exit();
        }else{
            $this->error('删除失败！');
        }
    }

}
