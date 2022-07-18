# 说明
基于laravel系统的周公解梦数据接口

# 安装
```
composer require 'oswin/zg_dream' ^1.0
```

生成数据迁移文件

```
php artisan vendor:publish

选择 "Provider: ZGDream\Providers\ZgDreamProvider" 或者 “Tag: laravel-zg-dream” 对应的编号输入，完成迁移数据的准备
```

执行一下命令, 进行迁移数据表 （数据表的建立）
```
php artisan migrate
```
执行一下命令, 填充周公解梦数据
```
php artisan db:seed --class=ZGDreamSeeder
```

# 使用说明

```php
//根据实际情况，基本上用框架（如 Laravel）的话不需要手动引入
//require 'vendor/autoload.php';

use ZGDream\Facades\ZGDream;

//关键词查询列表
$list = ZGDream::search('亿万富豪');
print_r($list);

//根据ID获取详细的内容
$detail = ZGDream::details(1);
print_r($detail);

```
