<p align="center"><img src="./moto.svg" width=350 height=350></p>
<p align="center">
    <a href="https://packagist.org/packages/moext/moant"><img src="https://poser.pugx.org/moext/moant/v/stable.svg"></a>
    <a href="https://packagist.org/packages/moext/moant"><img src="https://poser.pugx.org/moext/moant/downloads.svg"></a>
    <a href="https://packagist.org/packages/moext/moant"><img src="https://poser.pugx.org/moext/moant/license.svg"></a>
</p>

## 关于
确切地说，这算是轮子。之所以造这个轮子，因于工作中开发的一些微服务的思考。微服务旨在提供某种单一或是某类特定的功能，解耦是其目的之一，也方便架构变更后横向扩展。在使用Lumen框架完成几个项目之后，产生了一些想法。假设把框架比喻成一道菜，Laravel是`小葱豆腐`，ThinkPHP是`皮蛋黄瓜`，这两道菜都是经厨师选料配料烹制而成的，倘若合你胃口，再好不过了。假如你厌倦了这两道菜，或是考虑自己动手做一道`皮蛋豆腐`，把做菜这个问题抽象成日常生活的一部分或许稍好理解一些。把Packagist比作菜市场，`composer.json`是买菜清单，做一道`皮蛋豆腐`，首先要到菜市场买回`皮蛋`和`豆腐`这两种食料，Composer就是买菜的工具。配料齐全后，就要开始自己动手加工了，至于用大锅做还是小锅、做成甜口还是咸口、佐以其他什么配料，完全由你自己决定。熟悉这个套路之后，暂时忘记你是一个程序员，此刻，你就是一个厨师。你要做`宫保鸡丁`，OK！去菜市场买回`鸡肉`、`花生`、`黄瓜`等食料，加点`盐`和`味精`，左手腕用力抖锅、右手由下而上翻炒、铲切换成勺打开水龙头盛半勺水放进锅里......于是，一道菜(一个框架)就这样完成了。
这样做的好处其一是自由度高，组件按需引入抛开不必要的文件，什么样的业务场景组合什么样的微框架。其二必定是性能上有所提升。

## 结构
既然是用来开发API，当然是不需要视图层(V)的。框架只有控制器(C)和模型(M)，为了更好地实现API版本管理，控制器的作用仅是接收参数判断请求版本之后调用指定版本的模型而不掺杂任何业务逻辑，待模型处理完数据，最后由控制器返回并携带版本号。

<div align="center">
    <img src="./structure.jpg">
</div>

## 组件
* [Medoo](https://medoo.in/) 轻量级数据库ORM框架
* [predis](https://github.com/nrk/predis/wiki) Redis操作 [文档](http://www.cnblogs.com/ikodota/archive/2012/03/05/php_redis_cn.html)
* [monolog](https://seldaek.github.io/monolog/) 日志
* [phpdotenv](https://github.com/vlucas/phpdotenv/blob/master/README.md) 配置文件
* [guzzle](http://docs.guzzlephp.org/en/stable/overview.html) HTTP请求

## 性能


## 安装
```
composer create-project moext/moant your-app '1.0.*' --prefer-dist -vvv
```

## 教程
http://study.163.com/course/introduction/1004712047.htm



