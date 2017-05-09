# 签到（BETA）

这是一个签到系统：**签到(beta)**，功能：提供一些~~常用网站~~（目前就一个）的签到服务。

  

项目地址：[签到](http://qiandao.istack.cc/)

  

## 原理

通过Cookies进行模拟签到，使用Crontab命令执行计划任务。

  

## 目前提供的签到模块有

- 网易云音乐签到（手机与电脑客户端同时签到，每天+5积分）

   

## 如何使用

1.注册一个账号，使用该账号登录，进入个人中心。

[![QQ20170218-110837@2x](https://oavi5ezjr.qnssl.com/wp-content/uploads/2017/02/QQ20170218-110837@2x.jpg)](https://oavi5ezjr.qnssl.com/wp-content/uploads/2017/02/QQ20170218-110837@2x.jpg)

2.选择功能并添加Cookies，保存。

[![QQ20170218-111012@2x](https://oavi5ezjr.qnssl.com/wp-content/uploads/2017/02/QQ20170218-111012@2x.jpg)](https://oavi5ezjr.qnssl.com/wp-content/uploads/2017/02/QQ20170218-111012@2x.jpg)

  

然后系统就可以替你自动签到了。

 

## 扩展性

每一个签到模块为独立的文件夹，含有三个子文件：

/add：添加cookies使用

/delete：删除cookies使用

/init：执行签到任务使用

 

## 更新日志

2017-02-11 修改css样式

  

## 安装

1.将所有文件复制到服务器端

2.初始化数据表（*qiandao.sql*）手动建立

```sql
--
-- 表的结构 `cloudmusic`
--

CREATE TABLE `cloudmusic` (
  `id` int(11) NOT NULL,
  `uuid` int(11) NOT NULL,
  `cookies` text NOT NULL,
  `status` text NOT NULL,
  `lasttime` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

-- --------------------------------------------------------

--
-- 表的结构 `userlist`
--

CREATE TABLE `userlist` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `passwd` text NOT NULL,
  `role` text NOT NULL,
  `regtime` text NOT NULL,
  `lasttime` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

-- --------------------------------------------------------

--
-- 表的结构 `userstatus`
--

CREATE TABLE `userstatus` (
  `id` int(11) NOT NULL,
  `uuid` int(11) NOT NULL,
  `name` text NOT NULL,
  `nickname` text NOT NULL,
  `status` text NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;
```

或直接导入*qiandao.sql*。

3.配置*config.php*文件，输入数据库host，username，password和数据库名称。

4.注册用户

  

## 实现计划任务

执行*do.php*文件可实现系统签到服务。

### 以Cent OS为例

**安装**

```
yum -y install vixie-cron
yum -y install crontabs
```

**重启服务**

```
service crond restart
```

**编辑任务**

```
crontab -e
```

**每天02:00执行签到任务**

```
0 2 * * * /html/server/php/bin/php /html/www/do.php >> /html/www/cloudmusic/corntab.log
    
```

基本格式 : *　　*　　*　　*　　*　　command
分　时　日　月　周　命令 
第1列表示分钟1～59 每分钟用*或者 */1表示 
第2列表示小时1～23（0表示0点） 
第3列表示日期1～31 
第4列表示月份1～12 
第5列标识号星期0～6（0表示星期天） 
第6列要运行的命令 

  

## LICENSE

MIT © [Hades](http://github.com/mayuko2012)



