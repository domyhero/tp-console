# tp-console

*请把文件放到 thinkphp的根目录，命令行切换到thinkphp目录执行

*这是一款thinkphp3.23的代码生成辅助工具


## 简单使用
 
 在Admin模块下创建一个为Index的控制器
>Controller : php think make:controller Admin/Index

 在Admin模块下创建一个为Index的模型
>Model      : php think make:model      Admin/Index		

 在Admin模块下创建一个为Index控制器下的info页面
>View       : php think make:view     Admin/Index/info 

 在Admin模块下创建一个为info组件
>Widget     : php think make:widget     Admin/info 


#配置
>Console/Config.php可以进行配置，'APP_PATH'表示项目目录名称

>Console/tpl模板都可以自己定义

#其他

>php think -h

>php think -v
