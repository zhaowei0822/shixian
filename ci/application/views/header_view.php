<!-- 
顶部页面

 创建者：骆泉
  -->


<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/effects-20090707.js"></script>
</head>
<body>
<table width="100%" border="1">
  <tr>
    <td width="30%" align="center"><a href="<?php echo site_url('home')?>">实现网</a></td>
    <td width="40%" align="center">
	  <form id="form1" name="form1" method="post" action="" >
        <input type="text" name="textfield" />搜索
	  </form>
    </td>
    <td width="30%" align="center">
    	<?php
			if($this->session->userdata('user_in'))
			{
		?>
			<?php echo $this->session->userdata('user_nickname')?>
			<a href="<?php echo site_url('manage/user')?>">个人设置</a>
			<a href="<?php echo site_url('manage/project')?>">项目管理</a>
			<a href="<?php echo site_url('login/logout')?>">退出</a>
		<?php
			}
		    else
		    {
		?>
		    <a href="<?php echo site_url('login/loginer')?>">[登录]</a>
	  		<a href="<?php echo site_url('login/register')?>">[注册]</a>    
		<?php
			}
    	?>
    	
	 </td>
  </tr>
</table>
</body>
</html>
  