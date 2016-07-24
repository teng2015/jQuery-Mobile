<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://apps.bdimg.com/libs/jquerymobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/jquerymobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>欢迎来到我的主页</h1>
  </div>

  <div data-role="main" class="ui-content">
    <p>点击链接查看淡入效果 (页面从右至左淡入)。</p>
    <a href="#pagetwo" data-transition="slide">淡入第二个页面</a>
  </div>

  <div data-role="footer">
    <h1>底部文本</h1>
  </div>
</div> 

<div data-role="page" id="pagetwo">
  <div data-role="header">
    <h1>欢迎来到我的主页</h1>
  </div>

  <div data-role="main" class="ui-content">
    <p>点击链接查看相反方向的淡入效果 (页面从左至右淡入)。</p>
    <a href="#pageone" data-transition="slide" data-direction="reverse">淡入第一个页面(reversed)</a>
  </div>

  <div data-role="footer">
    <h1>底部文本</h1>
  </div>
</div> 

</body>
</html>