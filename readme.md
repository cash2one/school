# 支付系统


本系统采用laravel 5.2作为开发框架

##环境需求

PHP版本 >= 5.5.9

PHP扩展：OpenSSL

PHP扩展：PDO

PHP扩展：Mbstring

PHP扩展：Tokenizer

Redis 支持

Memcached 支持

## 安装

Laravel 使用 Composer 管理依赖，因此，安装应用程序之前，确保机器上已经安装了Composer。

###安装依赖

系统运行需要加载一些依赖，请在您的终端内运行如下命令安装它们：

composer install

## 配置

为应用程序作出正确的配置以保障应用能够启动。

###创建配置文件

您必须创建配置文件来保证系统正常运行，请在您的终端内输入如下命令：

cp .env.example .env

###修改配置
更改.env文件中的数据库配置信息和其他相关信息。

###生产密钥
您必须重新生成应用密钥才能保证系统正常运行。请在终端运行如下命令：

php artisan key:generate

##迁移数据

请确保您的配置已经完成，否则不保证能够正确的迁移整个数据。

###运行数据库迁移

系统运行需要依赖一些数据表，请在您的终端中运行如下命令：

php artisan migrate

###填充数据

系统运行需要一些基本数据，请在您的终端中运行如下命令：

php artisan db:seed

## 运行队列监听

系统日志需要进行队列处理您可以用以下命令运行队列监听

php artisan queue:listen --sleep=3 --tries=3 --timeout=300

同时也可以使用 supervisor 守护监听进程。