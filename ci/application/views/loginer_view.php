<!-- 
登陆页面

 创建者：骆泉
  -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php $this->load->view('header_view') ?>

<script type="text/javascript">
$(
	function()
	{	
		$.formValidator.initConfig(
			{
				autotip: true,
				validatorgroup: "1"
			});
		$("#tbxLoginNickname")
			.formValidator(
				{
					validatorgroup: "1",
					tipid: "loginNickname",
					onshow: "",
					onfocus: "",
					oncorrect: ""
				})
			.inputValidator(
				{
					min: 1,
					onerror: "请填写用户名"
				});
		$("#tbxLoginPassword")
			.formValidator(
				{
					validatorgroup: "1",
					tipid: "loginPassword",
					onshow: "",
					onfocus: "",
					oncorrect: ""
				})
			.inputValidator(
				{
					min: 1,
					onerror: "请填写密码"
				});
		$("#tbxLoginVerifier")
			.formValidator(
				{
					validatorgroup: "1",
					tipid: "loginVerifier",
					onshow: "",
					onfocus: "",
					oncorrect: ""
				})
			.inputValidator(
				{
					min: 1,
					onerror: "请填写验证码"
				});
		$.formValidator.initConfig(
			{
				autotip: true,
				validatorgroup: "2"
			});
		$("#tbxRegisterNickname")
			.formValidator(
				{
					validatorgroup: "2",
					tipid: "registerNickname",
					onshow: "4-20位字符，可由中英文、数字及“_”、“-”组成",
					onfocus: "",
					oncorrect: ""
				})
			.inputValidator(
				{
					min: 4,
					max: 20,
					onerror: "用户名长度只能在4-20位字符之间"
				})
			.regexValidator(
				{
					regexp: "username",
					datatype: "enum",
					onerror: "用户名只能由中英文、数字及“_”、“-”组成"
				});
		//if ($("#hflRegisterNickname").val() != "true")
		//{   
			$("#tbxRegisterNickname")
				.ajaxValidator(
					{
						type: "GET",
						url: '<?php echo site_url('login/check_name')?>',
						datatype: "json",
						success:
							function(result)
							{
								return result.Result;
							},
						buttons: $("#ibtRegister"),
						onwait: "正在检测用户名是否重复...",
						onerror: "该用户名已被使用"
					});
		//}
		/*$("#tbxRegisterNickname").change(
			function()
			{
				$("#tbxRegisterNickname")
					.ajaxValidator(
						{
							type: "GET",
							url: "loginservice.aspx",
							datatype: "json",
							success:
								function(result)
								{
									return result.Result;
								},
							buttons: $("#ibtRegister"),
							onwait: "正在检测用户名是否重复...",
							onerror: "该用户名已被使用"
						});
			});*/
		$("#tbxRegisterPassword")
			.formValidator(
				{
					validatorgroup: "2",
					tipid: "registerPassword",
					onshow: "6-16位字符，可由英文、数字及“_”、“-”组成",
					onfocus: "",
					oncorrect: ""
				})
			.inputValidator(
				{
					min: 6,
					max: 16,
					onerror: "密码长度只能在6-16位字符之间"
				})
			.regexValidator(
				{
					regexp: "password",
					datatype: "enum",
					onerror: "密码只能由英文、数字及“_”、“-”组成"
				});
		/*if ($("#hflRegisterPassword").val() != "true")
		{
			$("#tbxRegisterPassword")
				.ajaxValidator(
					{
						type: "GET",
						url: "<?php echo site_url('login/check_pw')?>",
						datatype: "json",
						success:
							function(result)
							{
								return result.Result;
							},
						buttons: $("#ibtRegister"),
						onwait: "正在检测密码强度...",
						onerror: "该密码不安全，为保证您的账户安全，请更换其它密码"
					});
		}*/
		$("#tbxRegisterPassword").keyup(
			function()
			{
				var strength = checkPasswordStrength($(this).val());
				if (strength)
				{
					$("#pwdStrengh").show();
				}
				else
				{
					$("#pwdStrengh").hide();
				}
				$("#pwdStrengh").attr("className", strength);
			});
		/*$("#tbxRegisterPassword").change(
			function()
			{
				$("#tbxRegisterPassword")
					.ajaxValidator(
						{
							type: "GET",
							url: "<?php echo site_url('login/check_pw')?>",
							datatype: "json",
							success:
								function(result)
								{
								    return true;
									//return result.Result;
								},
							buttons: $("#ibtRegister"),
							onwait: "正在检测密码强度...",
							onerror: "该密码不安全，为保证您的账户安全，请更换其它密码"
						});
			});*/
		$("#tbxRegisterRepeatPassword")
			.formValidator(
				{
					validatorgroup: "2",
					tipid: "registerRepeatPassword",
					onshow: "",
					onfocus: "",
					oncorrect: ""
				})
			.compareValidator(
				{
					desid: "tbxRegisterPassword",
					operateor: "=",
					onerror: "两次输入的密码不一致"
				});
		$("#tbxRegisterEmail")
			.formValidator(
				{
					validatorgroup: "2",
					tipid: "registerEmail",
					onshow: "接收订单通知、促销活动、找回密码，填写后<font color='Red'>不能修改</font>",
					onfocus: "",
					oncorrect: ""
				})
			.inputValidator(
				{
					min: 1,
					onerror: "请填写邮箱"
				})
			.regexValidator(
				{
					regexp: "email",
					datatype: "enum",
					onerror: "邮箱地址格式不正确"
				});
		$("#tbxRegisterEmail").blur(
			function()
			{
				var email = $("#tbxRegisterEmail").val();
				if (email.indexOf("@hotmail") > 0)
				{
					$("#registerEmail").css({color: "Red", display: "inline"});
					$("#registerEmail").text("@hotmail.com无法收到购物提醒邮件，建议更换");
				}
				else if (email.indexOf("@live") > 0)
				{
					$("#registerEmail").css({color: "Red", display: "inline"});
					$("#registerEmail").text("@live.com无法收到购物提醒邮件，建议更换");
				}
				else if (email.indexOf("@gmail") > 0)
				{
					$("#registerEmail").css({color: "Red", display: "inline"});
					$("#registerEmail").text("@gmail.com无法收到购物提醒邮件，建议更换");
				}
			});
		//if ($("#hflRegisterEmail").val() != "true")
		//{
			$("#tbxRegisterEmail")
				.ajaxValidator(
					{
						type: "GET",
						url: "<?php echo site_url('login/check_email')?>",
						datatype: "json",
						success:
							function(result)
							{
								return result.Result;
							},
						buttons: $("#ibtRegister"),
						onwait: "正在检测邮箱是否重复...",
						onerror: "该邮箱已被使用，请您更换其它邮箱"
					});
		//}
		/*$("#tbxRegisterEmail").change(
			function()
			{
				$("#tbxRegisterEmail")
					.ajaxValidator(
						{
							type: "GET",
							url: "loginservice.aspx",
							datatype: "json",
							success:
								function(result)
								{
									return result.Result;
								},
							buttons: $("#ibtRegister"),
							onwait: "正在检测邮箱是否重复...",
							onerror: "该邮箱已被使用，请您更换其它邮箱"
						});
			});*/
		/*$("#tbxReferee")
			.formValidator(
				{
					validatorgroup: "2",
					tipid: "referee",
					onshow: "非必填，如您注册并完成订单，推荐人有机会获得积分",
					onfocus: "",
					oncorrect: ""
				});*/
		$("#tbxRegisterVerifier")
			.formValidator(
				{
					validatorgroup: "2",
					tipid: "registerVerifier",
					onshow: "",
					onfocus: "",
					oncorrect: ""
				})
			.inputValidator(
				{
					min: 1,
					onerror: "请填写验证码"
				});
		$("#choose")
			.formValidator(
				{
					validatorgroup: "2",
					tipid: "agreement",
					onshow: "",
					onfocus: "",
					oncorrect: ""
				})
			.inputValidator(
				{
					min: 1,
					onerror: "请阅读并同意《xx商城用户协议》"
				});
		
		$(":input").focus(
			function()
			{
				var settings = $(this).attr("settings");
				if (settings != null && settings.length > 0)
				{
					var group = settings[0].validatorgroup;
					if (group == "1")
					{
						$.formValidator.resetTipState("2");
					}
					else if (group == "2")
					{
						$.formValidator.resetTipState("1");
					}
				}
			});
	});

function checkPasswordStrength(password)
{
	var result = "";
	var strength = 0;
	if (password.length >= 6)
	{
		if (/\d/i.test(password))
		{
			strength += 30;
		}
		if (/[a-z]/i.test(password))
		{
			strength += 30;
		}
		if (/[-_]/i.test(password))
		{
			strength += 30;
		}
	}
	switch (strength)
	{
		case 30:
			result = "strenghA";
			break;
		case 60:
			result = "strenghB";
			break;
		case 90:
			result = "strenghC";
			break;
	}
	
	return result;
}

function validate(group)
{
	if (group == "1")
	{
		$.formValidator.resetTipState("2");
	}
	else if (group == "2")
	{
		$.formValidator.resetTipState("1");
	}
	
	return $.formValidator.pageIsValid(group);
}

var msg = '<?php echo $error_msg; ?>';
$(document).ready(function() {
	if (msg != 0){
		switch (msg){
			case 'verifier' : $('#cvlRegister').empty().text('验证码错误').show();break;
			case 'verifier1' : $('#cvlLoginVerifier').show();break;
			case 'customer' : $('#cvlLoginUser').show();break;
			default : break;
		}
	}	
});

function change_yzm(obj)
{

    $(obj).attr('src','<?php echo site_url('login/yzm_img')?>'+'/'+Math.random());
}

function change_yzm1(obj)
{

    $(obj).attr('src','<?php echo site_url('login/yzm_img1')?>'+'/'+Math.random());
}

function change_action(group)
{
	if(group==1){
		$('#form1').attr('action','<?php echo site_url('login/check_customer')?>')
	}
}
</script>


<form name="form1" 
      method="post" 
      action="<?php echo site_url('login/check_loginer')?>" 
      onsubmit="javascript:return WebForm_OnSubmit();" 
      id="form1">
      
<div class="Main">
  <div class="mleft">
	<div class="lo_corner_t">
	  <div class="lo_corner_tl"></div>
	  <div class="lo_corner_tr"></div>
	</div>
	<div class="lo_corner_c">
	  <h2 class="logon">
	    <div class="lo_h2_left"></div>
		<div class="lo_h2_right"></div>
		  <em>登陆</em>
      </h2>
	  <div class="lo_child">
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用户名：
	    <input value="" name="tbxLoginNickname" maxlength="20" id="tbxLoginNickname" type="text">
		<div style="display: none;" id="loginNickname"></div>
	  </div>
	  <div class="lo_child">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;密&nbsp;&nbsp;码：
		<input name="tbxLoginPassword" maxlength="50" id="tbxLoginPassword" type="password">
		<div style="display: none;" id="loginPassword"></div>
		<div class="onError"><span id="cvlLoginUser" style="color: Red; display: none;">用户名或密码错误</span></div>
	  </div>
	  	
	  <div style="height: 290px;">
	    <div id="pnlVerifier" class="lo_child yzm">
	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;验证码：
	      <input name="tbxLoginVerifier"
	             maxlength="5" 
	             id="tbxLoginVerifier"
	             autocomplete="off"
	              type="text">
		  <div class="onError" style="overflow: hidden;">
		    <span id="cvlLoginVerifier" style="color: Red; display: none; float: left; margin-right: 5px;">验证码错误</span>
		    <em id="loginVerifier" style="padding-left: 0pt; float: left; display: none;"></em>
		  </div>
		  <input name="hflLoginTimes" id="hflLoginTimes" type="hidden">
		  <div class="yzm_img">
		    <img src="<?php echo site_url('login/yzm_img1')?>" 
		         id="ivrLoginVerifier" 
		         onclick="change_yzm1(this)">
		  </div>
	    </div>
	    
	    
	    <!--<div class="lo_child">
	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	      <input name="cbxRememberNickname" id="cbxRememberNickname" class="radio" type="checkbox">记住用户名
	      &nbsp;&nbsp;&nbsp;&nbsp;
	      <input name="cbxRememberMe" id="cbxRememberMe" class="radio" type="checkbox">自动登录
	    </div>-->
	    
	    
	    <div class="lo_submit2 lo_submit3">
	      <input name="ibtLogin" id="ibtLogin" src="<?php echo base_url()?>images/Login_bg_38_2.jpg" onclick="change_action('1');return validate('1');WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ibtLogin&quot;, &quot;&quot;, true, &quot;1&quot;, &quot;&quot;, false, false))" style="border-width: 0px;" type="image">&nbsp;<a href="#" class="grey">忘记密码？</a>
	    </div>
	  </div>
	</div><!-- /lo_corner_c -->
	
	<div class="lo_corner_b">
	  <div class="lo_corner_bl"></div>
	  <div class="lo_corner_br"></div>
	</div>
	
  </div><!-- /mleft -->
</div><!-- /Main -->
</form>


<script type="text/javascript">
<!--
function WebForm_OnSubmit() 
{
  if(typeof(ValidatorOnSubmit) == "function" && ValidatorOnSubmit() == false) return false;
    return true;
}
// -->
</script>


<script type="text/javascript" src="<?php echo base_url()?>js/jquery_002.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-validate.js"></script>
<?php $this->load->view('footer_view') ?>