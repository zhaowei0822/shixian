<!-- 
主页面

 创建者：骆泉
  -->


<?php $this->load->view('header_view') ?>
<?php $this->load->view('guider_view') ?>
<?php $this->load->view('sort_view') ?>
<?php


?>

<table width="100%" border="1">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<!--<p></p>-->
<!--<div id="zw" class="s" >tttttttt<a id="lq" href="#"> 骆泉</a></div>-->

<script  language="JavaScript">
$(document).ready(function() {
	//alert(9);
	var str;
	 var change_city = function(){
			$.ajax({
			  url: '<?php echo site_url('home/test')?>',
			  type: 'GET',
			  dataType: 'html',
			  success: function(data){
				pro_json = eval('('+data+')');
				$('#zw').append(pro_json[0].name+'^^^^^^^^');
				$('.s').append(pro_json[0].typeName+'^^^^^^^^');
				str=pro_json[0].typeName;
			  },
			  exception:function(e){
				alert(e);
				}
			});
		  }
	  
	 $('#lq').click(function() {
		alert(str)
	});
		
change_city();


})


</script>

<div id="qq">
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
</div>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<p>qqqqqqq</p>
<?php $this->load->view('footer_view') ?>