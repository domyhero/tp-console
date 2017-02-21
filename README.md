# tp-console

*请把文件放到 thinkphp的根目录，命令行切换到thinkphp目录执行

> 这是一款thinkphp3.23的代码生成辅助工具
> 
>
> ## 简单使用
>Controller : php think make:controller Admin/Index
>Model      : php think make:model      Admin/Index		
>View       : php think make:view     Admin/Index/info 
>Widget     : php think make:widget     Admin/info 

#配置
>Console/Config.php可以进行配置，'APP_PATH'表示项目目录名称
>Console/tpl模板都可以自己定义


-----------------------------------------------------------

创建控制器：
php artisan make controller Admin User

这是在Admin模块下生成一个为UserController.class.php的控制器

php artisan make controller Home Index

这是在Home模块下生成一个为IndexController.class.php的控制器

-----------------------------------------------------------

创建模型：
php artisan make model Admin User

这是在Admin模块下生成一个为UserModel.class.php的模型


php artisan make model Home Index

这是在Home模块下生成一个为IndexModel.class.php的模型


