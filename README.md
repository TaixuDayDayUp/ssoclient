## 单点登录客户端  
### 接入
1.在项目根目录 composer.json 文件中引入单点登录客户端插件包
#### composer.json
	"require-dev": {
        "taixudaydayup/ssoclient": "1.*"
    }
2.运行命令安装插件包  
```sh
$ sudo composer update
```  
3.在 config/app.php 中注册服务提供者与Facades
#### config/app.php
    'providers' => [
        TaixuDayDayUp\Ssoclient\SsoClientServiceProvider::class,
    ],
    'aliases' => [
        'SsoClient' => TaixuDayDayUp\Ssoclient\Facades\SsoClientFacade::class,
    ],
4.在 app/Http/Kernel.php 中注册路由中间件  
#### app/Http/Kernel.php
    protected $routeMiddleware = [
        'auth.user' => \TaixuDayDayUp\Ssoclient\Middleware\AuthUser::class,
    ];    
5.运行以下命令  
```sh
$ php artisan vendor:publish
```  
6.修改配置文件 config/sso.php
>为你的客户端项目定一个别名，如：ghub，写入到 client_prex_name 中  

#### config/sso.php  
    // 非常重要
    'client_prex_name' => 'ghub',
7.在 app/Http/route.php 中引入单点登录路由
#### app/Http 
    require(__DIR__ . '/Routes/sso.php');  
8.在 config/database.php 中加入单点登录redis配置项  
#### config/database.php
    'redis' => [
        'sso' => [
            'host'     => env('SSO_REDIS_HOST', '127.0.0.1'), // 这个IP 要与 总后台 的sso redis 服务器一致
            'port'     => 7000,
            'database' => 10
        ],
    ],
9.运行以下命令  
```sh
$ composer dumpautoload
```  
10.在 .env 文件中加入以下配置项  

    /** 
	 * 总后台项目的host地址，请根据环境变更
	 * 线上测试为 http://admin.doo.so
	 * 本地测试为 http://www.tx1.com:8067
	**/
	ADMIN_HOST=
	
	/**
	 * 存放用户信息的redis的host地址，要与总后台项目的相同
	 * 线上测试为 127.0.0.1
	 * 本地测试为 127.0.0.1
	**/
	SSO_REDIS_HOST=
12.**进入总后台项目**，在 config/sso.php 中，在 clients 配置项中加入以下代码  

    // 索引名称为自定义的项目别名，前面示例定义为ghub
    'ghub' => [
        // 项目中文名
        'name' => '社区',
        // 社区后台主页
        'startPage' => env('GHUB_HOST', 'http://www.tx4.com:8070') . '/admin'
    ]
13.**进入总后台项目**，在 .env 中，加入客户端项目HOST配置项  

    /** 
	 * 社区host地址，请根据环境变更
	 * 线上测试为 http://f.doo.so
	 * 本地测试为 http://www.tx4.com:8070
	**/
    GHUB_HOST＝
14.**进入总后台项目**，在 config/permissions.php 中，加入客户端路由配置组，具体请参照其他客户端项目的配置组项
15.最后，项目根目录运行以下命令  
```sh
$ composer dumpautoload
```
    
>至此，单点登陆客户端接入完毕，在需要权限过滤的路由组中加入中间件 'auth.user' 即可开启单点登录权限验证功能，有新增功能时需要在总后台更新权限路由组
