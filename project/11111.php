<!DOCTYPE html>
<html>


<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="lib/css/ionic.min.css" />
<script src="lib/js/ionic.bundle.min.js"></script>
<style>
body {
width: 800px;
margin: 0 auto;
}

ul: {
float: left;
}

#content {
margin-top: -142px;
width: 600px;
background-color: red;
float: right;
}
</style>
<script>
angular.module("ll", ["ionic"])
.config(function($stateProvider) {
$stateProvider
.state("state1", {
url: "/index",
templateUrl: "views/index.html"
})
.state("state2", {
url: "/tocart", //點擊 結算超鏈接的路徑    href="#/cart"
templateUrl: "views/cart.html"
})


})
.controller("dataCtrl", function($scope, $http, $filter, $state) {
//默認把路徑設置 state1
$state.go("state1");


//定義變量  ,存放從json得到數據
var datagoods;
$scope.count = 0; //總數量
$scope.sumprice = 0; //總價
$scope.goodCart = []; //買的商品 ,商品數量


$http.get("datas.json").success(function(resp) {


console.log("獲取到的商品數組,", resp); //resp 指向數組
$scope.goods = resp;
datagoods = resp;


})
//點擊分類,顯示對應類型的數據
$scope.selData = function(t) {
$f = $filter("filter"); //從服務$filter中獲取能夠過濾數組的 過濾器
$scope.goods = $f(datagoods, {
"type": t
});
}
$scope.goCart = function(i) { //i 是顯示商品的下標
//獲取點擊的商品信息
var good = $scope.goods[i];
console.log("商品價格", good.price);
$scope.sumprice = $scope.sumprice + good.price;
$scope.count = $scope.count + 1;


/*
* 自定義向購物車中添加商品的方法addCart 
*/
addCart(good);


}
//向購物車中添加商品 私有函數
addCart = function(good) {
// [{"good":{"proname","鼠標","price":10},"num":1},{"good":good,"num":1}]  購物車的結構
var b = false; //b=true,有  b=false 沒有   b代表購物車中是否存在本次購買的商品


//遍歷購物車,查找 本次good是否在
for(var i = 0; i < $scope.goodCart.length; i++) {
if($scope.goodCart[i].good == good) {
$scope.goodCart[i].num = $scope.goodCart[i].num + 1;
b = true;
return;
}
}
if(b == false) {
$scope.goodCart.push({
"good": good,
"num": 1
});
}
}


$scope.del=function(index){
//獲取購物車的商品和數量
 var gcart= $scope.goodCart[index];
 gcart.num=gcart.num-1;
 //移除商品和數量 以後 數量0
 if(gcart.num==0){
  $scope.goodCart.splice(index,1);//index:刪除指定索引,  1 刪除1個
 }
 
//改變 標題欄
$scope.count = $scope.count-1; //總數量
$scope.sumprice = $scope.sumprice-gcart.good.price; //總價

}


})
</script>
</head>


<body ng-app="ll" ng-controller="dataCtrl">
<ion-header-bar align-title="right" class="bar-positive">
<a class="button" href="#/index">運動商城</a>
<h1 class="title">您的購物車:{{count}} {{sumprice|currency:"RMB ￥"}} </h1>
<div class="buttons">
<a class="button" href="#/tocart">結算</a>
</div>
</ion-header-bar>
<br /><br /><br />
<div ui-view></div>
</body>


</html>







views的index代碼



<ul>
<li><button class="button button-light" style="width: 200px;" ng-click="selData('')">首頁</button> </li>
<li><button class="button button-light" style="width: 200px;" ng-click="selData('女裝')">女裝</button> </li>
<li><button class="button button-light" style="width: 200px;" ng-click="selData('男裝')">男裝</button> </li>
</ul>
<div id="content">
<!-- ionic 的分類列表 -->
<ul class="list">
<li class="item" ng-repeat="g in goods">
<h3> {{g.proname}}</h3>
<img src="img/y.jpg" width="160px" />
<button class="button button-calm" style="float: right;"  ng-click="goCart($index)">加入購物車</button>
<span style="float: right;">{{g.price|currency:"RMB ￥"}}</span>
</li>
</ul>
</div>







views的cart代碼





<div class="alert alert-warning" ng-show="goodCart.length==0">
        您的購物車是空的。<a href="#/index" class="alert-link">繼續購物</a>
</div>
<table ng-hide="goodCart.length==0">
<tr>
<th>數量</th>
<th>商品名稱</th>
<th>單價</th>
<th>小計</th>
</tr>
<tr ng-repeat="c in goodCart ">
<td>{{c.num}}</td>
<td>{{c.good.proname}}</td>
<td>{{c.good.price}}</td>
<td>{{c.good.price * c.num|currency:"RMB ￥"}}
<button class="button-small" ng-click="del($index)">刪除</button>

</td>
</tr>

</table>

