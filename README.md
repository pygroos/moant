# 微框架
## 介绍
此项目是基于Slim核心组件开发的微框架，通过Composer按需安装类库文件，可根据业务场景自由组合。微框架封装了日志服务、Redis服务、发送邮件服务并集成单元测试功能，适合开发微服务或轻量级API。

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
4. cp .env.example .env
```
```
5. composer dump-autoload -o
```

## 压测
同样在控制器中输出`Hello World`，以下是电脑配置及与Lumen5.5框架的对比结果。

##### 电脑配置
![](http://moext.io/images/mac.png)

##### Lumen压测结果
![](http://moext.io/images/lumen.png)

##### 微框架压测结果
![](http://moext.io/images/slim.png)

