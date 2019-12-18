1. git clone https://github.com/laravel/laravel.git
2. composer install
3. 配置数据库等信息
4. 修改storage目录和bootstrap/cache 的权限
5. 修改.env.example文件 为  .env 配置数据库等信息 
6. php artisan key:generate
7. laravel 调试利器--laravel debugBar 扩展包安装    composer require barryvdh/laravel-debugbar
8. 给.gitignore文件 增加内容
9. 安装laravel-admin后台管理扩展 composer require encore/laravel-admin
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