# 项目使用说明文档
---
## 一 组员使用
* ### 生成key交由组长添加到github  
```
	ssh-keygen -t rsa -C "组员用户名/邮箱"  
```  

* ### 克隆项目  
```
	git clone git@github.com:LinusFans001/kaichang183.git 
```  

* ### 自动安装包依赖  
```
	composer install  
```  

* ### 修改本地.env 
```
	将 .env.example 重命名成 .env 
```  
```
	修改 .env 里的 数据库连接 等配置信息
```  
* ### 生成司机密钥  
```
	key:generate  
```  

* ### 生成随机密钥  
```
	key:generate  
```
* ### 运行数据库迁移 
```
	php artisan migrate  
```