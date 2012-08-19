<!-- 
导航栏页面

 创建者：骆泉
  -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
</head>


<table width="100%" border="1">
  <tr>
    <td><table width="100%" border="1">
      <tr>
        <td>主页</td>
        <?php 
       		foreach ($typeArr as $t)
			{
				$address = site_url($t->link);
				$type = $t->type;
				//$address
			    echo "<td><a id=$type href='javascript:bb($type);' >$t->typeName</a></td>";
			}
		?>
      </tr>
    </table></td>
    <td><table width="100%" border="1">
      <tr>
        <td>最新上线</td>
        <td>即将结束</td>
        <td>已经结束</td>
        <td>最多支持</td>
        <td>支持进度</td>
      </tr>
    </table></td>
    <td><table width="100%" border="1">
      <tr>
        <td><a href=<?php echo site_url('publish/brief')?>>发起项目</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<script  language="JavaScript">
function bb(id){
	alert(id);
	$.ajax({
		  url: '<?php echo site_url('home/get_projects_by_type')?>'+'/'+id,
		  type: 'GET',
		  dataType: 'html',
		  success: function(data){
			  var st;
			pro_json = eval('('+data+')');
			$('#qq').append(pro_json[0].name+'^^^^^^^^');
			for(var i=0; i<pro_json.length; i++){
				st+=pro_json[i].name+'______'+pro_json[i].detailContent
			}
			$('#qq').empty().append(st);
			$('#qq').append(st);
		  },
		  exception:function(e){
			alert(e);
			}
		});
	//$('#qq').empty().append('ttttttts');
}

$(document).ready(function() {
	//alert(9);
	var str="zwzw";
	$('#qq').click(function() {
		alert(str)
	});
})


</script>
</html>
