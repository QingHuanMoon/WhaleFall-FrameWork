# 鲸落
#### A FullStack MVC And MVVM FrameWork

##### 这是一款个人编写的前后端框架

1. 使用Composer自动加载机制,基与PSR-4

2. 引入了Eloquent ORM操作数据库,方法与Laravel一致

3. 支持多个类作为参数自动注入,暂时不支持多层方法的参数注入

4. 使用Smarty3模版引擎,自动缓存,未来考虑支持全站静态化

5. 单独的路由类,方便控制URL

6. 集成了VueJS,VueRouter,Vuex,Axios,jQuery,Lodash以便開發 SPA 和前後端分離應用

7. 近期将集成NuxtJS作为前端SPA的SSR渲染中间件



如果想使用 Vue 進行 SPA 開發,請先安裝依賴

npm i
或
cnpm i

然後使用以下命令進行服務器運行

npm run dev

注意:

這時候的 PHP 路由, 也就是根目錄下得 Router 文件夾內的文件,需要將根目錄指向 View目錄下得 index.php 文件

如果只想使用普通的PHP MVC框架及路由,請直接使用根目錄 Router 文件進行控制器路由引導,并在控制器內展示前台根目錄 View 目錄下的文件


## 注意:

由於系統差異,package.json 打包命令默認支持linux和 mac

如果是 windows 系統,請替換package.json內script部分響應代碼,代碼如下:

  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1",
    "dev": "set NODE_ENV=development && node node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
    "watch": "set NODE_ENV=development && node node_modules/webpack/bin/webpack.js --watch --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
    "hot": "set NODE_ENV=development && webpack-dev-server --inline --hot --config=node_modules/laravel-mix/setup/webpack.config.js",
    "production": "set NODE_ENV=production && node node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js"
  },






