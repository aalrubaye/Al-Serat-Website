<style type="text/css">
.font1 {
	font-size: 16px;
	font-weight: bold;
	color:#036;

}
.font2 {
	font-family:Tahoma, Geneva, sans-serif;
	font-size: 12px;
	font-style: normal;
	color:#000;
	line-height:2;
	text-align:justify;
}

body {
	background-color: #F7F7F7;
}
</style>
<?php
include 'connection.php';

$t = $_GET['article'];
$rrr = mysql_query("SELECT * FROM maintable WHERE id = $t");
$subj = mysql_fetch_assoc($rrr);
?>
<table width="400" border="0" cellspacing="0" cellpadding="0" dir="rtl" align="right" bgcolor="#F7F7F7">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top" class="font1">أرسل إلى صديق</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top" dir="rtl"><form method=post action="sf.php" dir="rtl" style="text-align:right">
<table width="600" border="0" align="center" cellpadding="5" cellspacing="0" dir="rtl">
<tr>
<td width="158" class="font2">الإسم</td>
<td width="422"> <input type="text" name="name"></td>
</tr>
<tr>
<td width="158" class="font2">البريد الإلكتروني</td>
<td> <input type="text" name="email"></td>
</tr>
<tr>
<td width="158" class="font2">البريد الإلكتروني الخاص بصديقك</td>
<td> <input type="text" name="email2"></td>
</tr>
<tr>
<td width="158" valign="top" class="font2">الموضوع</td>
<td><textarea name="comments" rows="15" cols="50" readonly="readonly"><?php echo "المصدر : موقع الصراط.. نهج السعادة والتقدم "."\n"."www.al-serat.com"."\n\n\n"."عنوان الموضوع : ".$subj['titr']."\n\n". "إدخل على الرابط التالي لتقرأ الموضوع"."\n\n"."http://www.al-serat.com/content.php?article=".$subj['id']."&part=maintable" ?></textarea></td>
</tr>
<td width="158"></td>
<td><input type="submit" name="Submit" value="إرسـال"></td></tr></table>
</form></td>
  </tr>
</table>
