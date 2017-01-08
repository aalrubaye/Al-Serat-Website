<style type="text/css">
body {
	margin-top: 0px;
	background-image: url(pic/back.jpg);
}
.font1 {
	font-size: 15px;
	font-weight: bold;
	color:#000;

}
.font2 {
	font-size: 15px;
	color:#F00;

}
.font3 {
	font-size: 15px;
	color:#0C0;

}
</style>
<?php

if (isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_text']))
{
	$contact_name = $_POST['contact_name'];
	$contact_email = $_POST['contact_email'];
	$contact_text = $_POST['contact_text'];
	
	
	if (!empty($contact_name) && !empty($contact_email) && !empty($contact_text)){
		$to = 'info@al-serat.com';	
		$subject = 'from alserat';
		$body = $contact_name."\n".$contact_text;
		$headers = 'From: '.$contact_email;
		
		if (@mail($to, $subject, $body, $headers)){
			
			echo '<p align="center" class="font3">شكراً لكم.. رسالتك قد أرسلت إلينا</p>';
			
		} else
		{
			echo '<p align="center" class="font2">خطأ بالإرسال</p>';
		}
		
		}
		
	else{
		
		echo '<p align="center" class="font2">جميع الحقول مطلوبة</p>';
	}
	
}

?>
<table width="485" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl" bgcolor="#F2F0F3">
  <form action="contact.php" method="post">
  <tr>
    <td width="11">&nbsp;</td>
    <td width="93">&nbsp;</td>
    <td width="381">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="font1">الإسم :</td>
    <td> <input type="text" name="contact_name" maxlength="25" dir="rtl" size="50" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="font1">البريد الإلكتروني :</td>
    <td><input type="text" name="contact_email" maxlength="50" dir="ltr" size="50"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td valign="top" class="font1">نص الرسالة :</td>
    <td><textarea name="contact_text" rows="6" cols="40" dir="rtl" ></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" value="أرســــل" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>