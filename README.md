修改为国内镜像：
    composer config -g repo.packagist composer https://packagist.phpcomposer.com
1. git clone https://github.com/laravel/laravel.git
2. composer install
3. 配置数据库等信息
4. 修改storage目录和bootstrap/cache 的权限
5. 修改.env.example文件 为  .env 配置数据库等信息 
6. php artisan key:generate
7. laravel 调试利器--laravel debugBar 扩展包安装    composer require barryvdh/laravel-debugbar
8. 给.gitignore文件 增加内容

10 php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
11 参考：https://github.com/z-song/laravel-admin/issues/1541
   php artisan admin:install
   在app\Providers\AppServiceProvider.php添加默认值
   public function boot()
   {
       Schema::defaultStringLength(191); //只能是191 其它的试了不行
   }
12 浏览器打开 http://localhost/admin/  用户名admin 密码admin   
13 新建路由文件参考： 
   https://www.jianshu.com/p/5f97da29a716
   https://blog.csdn.net/HZX19941018/article/details/84847180
14 增加后台认证权限 
    https://xueyuanjun.com/post/9741.html
    https://xueyuanjun.com/post/19948   
    https://www.jianshu.com/p/ee8df298841e
15. php artisan make:migration 表名称
   在database/migrations目录设置表字段
   运行php artisan migrate    