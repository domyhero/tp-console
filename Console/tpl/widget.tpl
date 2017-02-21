<?php
namespace %s\Widget;
use Think\Controller;
class %sWidget extends Controller {

    //菜单
    public function %s(){
        return $this->fetch('Widget:%s');
        // view调用  {:W('Menu/Menu')}  
    }     
    
}