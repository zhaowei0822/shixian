<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title></title>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.js"></script>
</head>


<form name="detail" method="post" action="<?php echo site_url('publish/detail')?>" enctype="multipart/form-data">
选择类别：
<table width="600" border="1">
  <tr>
    <?php
        $i = 0;
       	foreach ($typeArr as $t)
		{
			$pro_type = $t->type;
			echo "<td><input type='radio' name='pro_type' value='$pro_type' />$t->typeName</td>";
			if(6 == $i % 7)
			{
				echo "</tr><tr>";
			}
			$i++;
		}
	?>	    
  </tr>
</table>
<p>项目名称:<input type="text" name="pro_name" id="pro_name"/></p>
<p>发起地点:
<select name="province_id" id="province_id"  style="width:100px;">
	<?php foreach($provinces as $key => $province): ?>
	<option value="<?php echo $province['region_id']; ?>" <?php if($province['region_id']==$province_selected){echo 'selected';}?> ><?php echo $province['region_name']; ?></option>
    <?php endforeach; ?> 
</select>

<select name="city_id" id="city_id"  style="width:100px;">
    <?php foreach($citys as $key => $city): ?>
	<option value="<?php echo $city['region_id']; ?>" <?php if($city['region_id']==$city_selected){echo 'selected';}?> ><?php echo $city['region_name']; ?></option>
	<?php endforeach; ?>
</select>


<!--  
<select name="district_id" id="district_id" style="width:100px;">
    <option value=""></option>
</select>

-->


</p>
<p>简要说明:<input type="textfield" name="pro_simple_desc"/></p>
<p>缩略图:<input type="file" name="upfile">
<p>募集金额:<input type="textfield" name="pro_collect_money"/>元</p>
<p>上线天数:<input type="textfield" name="pro_submit_day"/>天</p>
<p><input type="submit" value="先存一下" name="keep"><input type="submit" value="下一步" name="next"></p>
</form>















<script  language="JavaScript">
<!--

<?php if(isset($province_selected)):?>
var province_selected = <?php echo (int)$province_selected?>;
<?php else:?>
var province_selected = 0;
<?php endif?>

<?php if(isset($city_selected)):?>
var city_selected = <?php echo (int)$city_selected?>;
<?php else:?>
var city_selected = 0;
<?php endif?>

<?php if(isset($district_selected)):?>
var district_selected = <?php echo (int)$district_selected?>;
<?php else:?>
var district_selected = 0;
<?php endif?>




$(document).ready(function() {

  var change_city = function(){
	$.ajax({
	
	  url: '<?php echo site_url('regionChange/selectChildren/parent_id')?>'+'/'+$('#province_id').val(),
	  type: 'GET',
	  dataType: 'html',
	  success: function(data){
		city_json = eval('('+data+')');
		var city = document.getElementById('city_id');
		city.options.length = 0;
		for(var i=0; i<city_json.length; i++){
            var len = city.length;
			city.options[len] = new Option(city_json[i].region_name, city_json[i].region_id); 
			if (city.options[len].value == city_selected){
				city.options[len].selected = true;
			}
		}
		change_district();//重置地区
	  }
	});
  }

  change_city();//初始化城市

  $('#province_id').change(function(){
     change_city();
  });


  var change_district = function(){
	$.ajax({
	  url: '<?php echo site_url('regionChange/selectChildren/parent_id')?>'+'/'+$('#city_id').val(),
	  type: 'GET',
	  dataType: 'html',
	  success: function(data){
        district_json = eval('('+data+')');
		var district = document.getElementById('district_id');
		district.options.length = 0;
		for(var i=0; i<district_json.length; i++){
            var len = district.length;
			district.options[len] = new Option(district_json[i].region_name, district_json[i].region_id); 
			if (district.options[len].value == district_selected){
				district.options[len].selected = true;
			}
		}
	  }
	});
  }

  change_district();//改变地区

  $('#city_id').change(function(){
     change_district();
  });
});

//-->
</script>


