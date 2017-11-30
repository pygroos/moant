# Micro Framework
## 介绍
公司重调组织架构后，我们小组被规划为<基础服务组>，主要工作内容是提供独立的微服务供别人调用。诸如，发送短信服务、垃圾过滤服务、心跳监测服务、异常捕获服务等。这些微服务提供少量接口，有些甚至不需要数据层和缓存层。这时候使用`Lumen`都显得臃肿更别提`Laravel`了。而且线上环境强制使用`composer`国外源，一次简单升级就要耗费一上午时间。看过一些轻量级框架，对比选择后，还是觉得[Slim](http://slimframework.com)用起来顺手点。有关`Slim`各种吹逼的介绍及特性在这里就不细说了，毕竟，每个框架都说自己是最牛逼的。鲁迅说，没有最好的框架，只有最适合业务场景的框架(老子没说过这句话.jpg)。微框架使用`Slim`核心组件并配合其它包组合而成，使用过程中可以自由组合自己熟悉的composer包。


**Composer包**

* [Medoo](https://medoo.in/) 轻量级数据库ORM框架
* [predis](https://github.com/nrk/predis/wiki) Redis操作 [文档](http://www.cnblogs.com/ikodota/archive/2012/03/05/php_redis_cn.html)
* [monolog](https://seldaek.github.io/monolog/) 日志
* [phpdotenv](https://github.com/vlucas/phpdotenv/blob/master/README.md) 配置文件
* [guzzle](http://docs.guzzlephp.org/en/stable/overview.html) HTTP请求

## 安装
```
1. git clone -b master git@github.com:moext/slim-framework.git
```
```
2. cd slim-framework/
```
```
3. composer install -vvv
```
```
4. composer dump-autoload -o
```
```
5. cp .env.example .env
```

## 使用

**路由**

所有路由都定义在`route`目录下的`api.php`文件里。示例：

```
use App\Controllers\TestController;
$app->any('/', TestController::class . ':test');
```
如上，定义路由用到控制器的时候，需要先把控制器类引入。

**配置**

在`.env`文件中配置连接mysql和redis。新建`test`数据库，在库中新建`users`表，插入几条测试数据。

```
# 新建数据库
create database test;

# 新建表
use test;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# 插入数据
INSERT INTO `users` (`id`, `username`, `password`)
VALUES
    (1, '张三', '123'),
    (2, '李四', '456');
```

**示例**

```
<?php

namespace App\Controllers;

use App\Services\DB;
use Slim\Http\Request;
use App\Services\Redis;
use Slim\Http\Response;
use App\Services\Logger;

class TestController
{
    public function test(Request $request, Response $response)
    {
        $db = DB::getInstance();
        $arrUser = $db->select('users', ['username']);

        $redis = Redis::getInstance();
        $redis->setex('redis_key', 3600, json_encode($arrUser));

        Logger::add('name', [$request->getUri(), $request->getMethod(), $response->withJson('logger record success!')]);

        echo '<h1 style="text-align: center; margin-top: 200px">';
        echo 'Micro Framework';
        echo '</h1>';
    }
}
```

进入`slim-framework\public`目录，执行`php -S localhost:8080`，在浏览器访问`localhost:8080`，页面会显示`Micro Framework`。同时，将DB查询出的数据保存到redis并把这次请求的输入输出在日志文件记录。

## 通用方法

`support`目录下的`helper.php`文件里定义一些通用函数。

## ab压测对比（仅供参考）

最近把小框架完善了下，并用它和Lumen做了次压测对比。压测数据不具说服力，仅供参考。使用同样的方式，通过路由找到控制器然后在方法里输出一串字符。

电脑配置
![file](https://dn-phphub.qbox.me/uploads/images/201710/23/14915/uNEJAkBolY.png)

Lumen压测图如下：
![file](https://dn-phphub.qbox.me/uploads/images/201710/23/14915/XlnqZOe8po.png)

Slim-Framework压测图如下：
![file](https://dn-phphub.qbox.me/uploads/images/201710/23/14915/I4GamHEQ1E.png)

