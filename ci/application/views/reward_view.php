<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title></title>
</head>


<body>
<form action="<?php echo site_url('publish/question')?>" method="post">
<p>支持金额:  <input type="text" name="pro_support_money" /></p>
<p>回报内容:<textarea name="textarea"  name="pro_content"></textarea></p>
<p>说明图片: 
<input type="file" name="pro_img_url">
</p>
<p>限定名额: 
<input type="radio" name="pro_limit_num" value="0" />是
<input type="radio" name="pro_limit_num" value="1" />否
</p>
<p> 是否邮寄:
<input type="radio" name="pro_is_mail" value="1" />是
<input type="radio" name="pro_is_mail" value="0" />否
</p>

<p>
   <input type="submit" value="保存">
   <input type="submit" value="取消添加">
</p>
</form>
</body>