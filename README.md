# Micro Framework
## 介绍
公司重调组织架构后，我们小组被规划为<基础服务组>，主要工作内容是提供独立的微服务供别人调用。诸如，发送短信服务、垃圾过滤服务、心跳监测服务、异常捕获服务等。这些微服务提供少量接口，有些甚至不需要数据层和缓存层。这时候使用`Lumen`都显得臃肿更别提`Laravel`了。而且线上环境强制使用`composer`国外源，一次简单升级就要耗费一上午时间。看过一些轻量级框架，对比选择后，还是觉得[Slim](http://slimframework.com)用起来顺手点。有关`Slim`各种吹逼的介绍及特性在这里就不细说了，毕竟，每个框架都说自己是最牛逼的。鲁迅说，没有最好的框架，只有最适合业务场景的框架(老子没说过这句话.jpg)。微框架使用`Slim`核心组件并配合其它包组合而成，使用过程中可以自由组合自己熟悉的composer包。

**Composer包**

* [medoo](https://medoo.in/) 轻量级数据库ORM框架
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



