<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$id=addslashes(trim($_GET['id']));

	$sql="select * from market where id='".$id."'";
	$rows = $obj->get_sql($sql);
	foreach($rows as $k=>$v){
		$leix = $v[leix];
		$marketname = $v[marketname];}
	if ($v[marketname]=="")
	{
			echo "<script language=javascript>alert('�г����ݴ���3');document.location.href=('market_manage.php');</script>";
			exit;			
		}
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?=$clientname;?>��ϸ��Ϣ</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/inputstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC"  class="client_detail" style="padding:0px;">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi">&nbsp;<font color="#A30707">
      <?=$clientname;?>
      </font>��ϸ��Ϣ</td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" height="30" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        <tr> 
          <td   class="crm_td">�ͻ������ߣ�</td>
          <td   class="crm_input"> 
            <?=$v[username];?>
          </td>
          <td align="right"   class="crm_td">���ͣ�</td>
          <td   class="crm_tdright"> 
            <?=$v[leix];?>
          </td>
        </tr>
        <tr> 
          <td width="15%"   class="crm_td"> ����ƣ�</td>
          <td width="45%"   class="crm_input"> 
            <?=$v[marketname];?>
          </td>
          <td width="40%" align="right"   class="crm_td">״̬��</td>
          <td width="40%"   class="crm_tdright">
            <?=$v[zhuangt];?>
        </tr>
        <tr> 
          <td   class="crm_td">��ʼ���ڣ�</td>
          <td   class="crm_input"> 
            <?=$v[starttime];?>
          </td>
          <td align="right"   class="crm_td">�������ڣ�</td>
          <td   class="crm_tdright"> 
            <?=$v[endtime];?>
          </td>
        </tr>
        <tr id=chinaaddress1> 
          <td   class="crm_td">�������棺</td>
          <td   class="crm_input"> 
            <?=$v[qiwsy]; ?>         
          </td>
          <td align="right"   class="crm_td">�����ɹ��ʣ�</td>
          <td   class="crm_input"> 
            <?=$v[qiwcgl];?>
          </td>
        </tr>
        <tr> 
          <td   class="crm_td">Ԥ��ɱ���</td>
          <td  id=areacodetd class="crm_input"> 
            <?=$v[yuscb];?>
          </td>
          <td align="right"   class="crm_td">ʵ�ʳɱ���</td>
          <td   class="crm_tdright"> 
            <?=$v[shijcb];?>
          </td>
        </tr>
        <tr> 
          <td   class="crm_td">����������</td>
          <td colspan="3" class="crm_input"> 
            <?=$v[facsl];?>
          </td>
        </tr>
        <tr> 
          <td   class="crm_td">��ע��</td>
          <td colspan="3"   class="crm_detail"> 
            <?=$v[remark];?>
          </td>
        </tr>
        <tr> 
          <td   class="crm_td">����ʱ�䣺</td>
          <td colspan="3"   class="crm_detail"> 
            <?=$v[addtime];?>
          </td>
        </tr>
      </table></td>
  </tr>
</table>
