<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>test title</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"/>
  <link rel="stylesheet" href="main.css">
  <link rel="icon" href="favicon.ico">
  <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>

<div data-role="page" id="one">

  <div data-role="header">
    <h1>jq test</h1>
  </div>

  <ul data-role="listview" data-split-icon="info" data-inset="true" data-theme="a">
    <li><a href="#two">
      <img src="1.jpg">

      <h2>test</h2>

      <p>记绣榻闲时，并吹戏雨；雕阑曲处，同倚斜阳。</p></a>
      <a href="#popup" data-rel="dialog" data-position-to="window" data-transition="pop">详情</a>
    </li>
    <li><a href="#two">
      <img src="Home/Tpl/assets/img/album-bb.jpg">

      <h2>test2</h2>

      <p>等闲变却故人心，却道故人心易变……</p></a>
      <a href="#popup" data-rel="dialog" data-position-to="window" data-transition="pop">详情</a>
    </li>
    
  </ul>

  <div data-role="footer" data-theme="a" class="footer">
    <small>Authored by cyrus | Copyright
      <a href="http://tianmaying.com" target="_blank">Tianmaying</a>
      © 2015
    </small>
  </div>
</div>
<!-- /page one -->

<!-- Start of second page: #two -->
<div data-role="page" id="two" data-theme="a">

  <div data-role="panel" id="leftpanel1" data-position="left" data-display="reveal" data-theme="a">
    <h3>执行步骤</h3>

    <div data-role="collapsible" data-collapsed="false">
      <h4>第一阶段</h4>
      <ul data-role="listview">
        <li><a href="#">123</a></li>
        <li><a href="#">456</a></li>
      </ul>
    </div>
    <div data-role="collapsible" data-collapsed="false">
      <h4>第二阶段</h4>
      <ul data-role="listview">
        <li><a href="#">123</a></li>
        <li><a href="#">456</a></li>
        <li><a href="#">789</a></li>
      </ul>
    </div>
    <a href="#demo-links" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-icon-delete">已了解！</a>
  </div>

  <div data-role="header">
    <h1>123123</h1>
    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left ui-btn-icon-notext">Back</a>
  </div>
  <!-- /header -->

  <div role="main" class="ui-content">

      
    <div class="ui-body ui-body-a ui-corner-all">
      <h3>模式</h3>
      <select id="flip-1" name="flip-1" data-role="slider">
        <option value="off">关闭</option>
        <option value="on">开启</option>
      </select>  
    </div>

    <div class="ui-body ui-body-a ui-corner-all">
    <h3>密度</h3>
    <input type="range" name="slider-1" id="slider-1" data-highlight="true" min="0" max="9999" value="999">
    </div>

    <div class="ui-body ui-body-a ui-corner-all">
    <h3>模式</h3>
    <form>
      <fieldset data-role="controlgroup">
        <input type="radio" name="radio-choice-v-2" id="radio-choice-v-2a" value="on" checked="checked">
        <label for="radio-choice-v-2a">1</label>
        <input type="radio" name="radio-choice-v-2" id="radio-choice-v-2b" value="off">
        <label for="radio-choice-v-2b">2</label>
        <input type="radio" name="radio-choice-v-2" id="radio-choice-v-2c" value="other">
        <label for="radio-choice-v-2c">3</label>
      </fieldset>
    </form>
    </div>

    <a href="#leftpanel1" class="ui-btn ui-shadow ui-corner-all">行动指南</a>
    <a href="#action" data-rel="dialog" data-position-to="window" data-transition="pop" class="ui-btn ui-shadow ui-corner-all">开始行动</a>
  </div>
  <!-- /content -->

  <div data-role="footer" data-theme="a" class="footer">
    <small>Authored by cyrus | powered by jQuery Mobile | Copyright
      <a href="http://tianmaying.com" target="_blank">Tianmaying</a>
      © 2015
    </small>
  </div>
</div>
<!-- /page two -->

<!-- Start of third page: #popup -->
<div data-role="page" id="popup">

  <div data-role="header" data-theme="a">
    <h1>木兰花令
      <small>拟古决绝词</small>
    </h1>
  </div>
  <!-- /header -->

  <div role="main" class="ui-content poem">
    <p>人生若只如初见，何事秋风悲画扇？</p>

    <p>等闲变却故人心，却道故人心易变。</p>

    <p>骊山语罢清宵半，泪雨零铃终不怨。</p>

    <p>何如薄倖锦衣郎，比翼连枝当日愿。</p>
  </div>

  <div data-role="footer" data-theme="a" class="footer">
    <small>Copyright
      <a href="http://tianmaying.com" target="_blank">Tianmaying</a>
      © 2015
    </small>
  </div>
</div>
<!-- /page popup -->

<div data-role="page" id="action">

  <div data-role="header" data-theme="a">
    <h1>正在……</h1>
  </div>

  <div role="main" class="ui-content poem">
    <img src="assets/img/atomic.jpeg">
    <p>1232132131！</p>
  </div>

  <div data-role="footer" data-theme="a" class="footer">
    <small>Copyright
      <a href="http://tianmaying.com" target="_blank">Tianmaying</a>
      © 2015
    </small>
  </div>
</div>

</body>
</html>