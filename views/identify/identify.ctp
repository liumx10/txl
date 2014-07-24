<script language=javascript>
function checkform()
{
	if (document.form1.tel.value == "")
	{
		alert("请输入手机号码!!!");
		return false;
	}
	if (document.form1.verfication.value == "")
	{
		alert("请输入公司验证码!!!");
		return false;
	}
	return true;
}
</script>

<br />
<form name=form1 onsubmit="return checkform()" action="verfication" method="post">
	<label> 手机号码</label>
	<input type=text value="" name=tel />

	<label> 验证码</label>
	<input type=text value=""  name=verfication />
	<input class="btn btn-primary btn-block" type="submit" value="提交" />
</form>

<?php echo $openid; ?>
