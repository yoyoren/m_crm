<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$id=$_GET['id'];

	$sql="select * from client where id='".$id."'";
//	echo $sql;
	$rs=$obj->fetchrow($sql);
	$id=trim($rs->id);
	$clientname=trim($rs->clientname);
	$username=trim($rs->username);
	$clientlevel=trim($rs->clientlevel);
	$address=trim($rs->address);
	$web=trim($rs->web);
	$type=trim($rs->type);
	$calling=trim($rs->calling);
	$suoyq=trim($rs->suoyq);
	$ygrs=trim($rs->ygrs);
	$yye=trim($rs->yye);
	$sheng=trim($rs->sheng);
	$chinacomcity=trim($rs->chinacomcity);
	$telcountrycode=trim($rs->telcountrycode);
	$telareacode=trim($rs->telareacode);
	$tel=trim($rs->tel);
	$faxcountrycode=trim($rs->faxcountrycode);
	$faxareacode=trim($rs->faxareacode);
	$fax=trim($rs->fax);
	$remark=trim($rs->remark);
	//��ӵĲ��ſ�ʼ
	$bumen1=trim($rs->bumen1);
	$addr1=trim($rs->addr1);
	//��ӵĲ��Ž���
	$postcode=trim($rs->postcode);
					$str_tel="  ".$telcountrycode."-".$telareacode."-".$tel." ";
					$str_fax="  ".$faxcountrycode."-".$faxareacode."-".$fax;	
	if ($clientname=="")
	{
			echo "<script language=javascript>alert('�ͻ����ݴ���3');document.location.href=('client_manage.php');</script>";
			exit;			
		}
function nyye($jylx)
{
         switch($jylx)
          {
           case 1://seconds
               echo "����1����";
               break;

           case 2://minutes
               echo "1����-5����";
               break;

           case 3://minutes
               echo "5����-1ǧ��";
               break;

           case 4://minutes
               echo "1ǧ��-3ǧ��";
               break;

           case 5://minutes
               echo "3ǧ��-5ǧ��";
               break;

           case 6://minutes
               echo "5ǧ��-1����";
               break;
           case 7://minutes
               echo "1����-5����";
               break;
           case 8://minutes
               echo "5����-10����";
               break;
           case 9://minutes
               echo "10����-50����";
               break;
           case 10://minutes
               echo "100��������";
               break;      
           default:
           	   echo "δ��д";
           	   break;         
         }	
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
          <td   class="crm_td">sales name��</td>
          <td   class="crm_input"> 
            <?=$username;?>
          </td>
          <td align="right"   class="crm_td">�ͻ�����</td>
          <td   class="crm_tdright"> 
            <?=$clientlevel;?>
          </td>
        </tr>
        <tr> 
          <td width="15%"   class="crm_td"> �ͻ����ƣ�</td>
          <td width="45%"   class="crm_input"> 
            <?=$clientname;?>
          </td>
          <td width="40%" align="right"   class="crm_td">�ͻ���Դ��</td>
          <td width="40%"   class="crm_tdright">
            <?=$type;?>
        </tr>
        <tr> 
          <td   class="crm_td">����Ȩ��</td>
          <td   class="crm_input"> 
            <?=$suoyq;?>
          </td>
          <td align="right"   class="crm_td">��ҵ���ʣ�</td>
          <td   class="crm_tdright"> 
            <?=$calling;?>
          </td>
        </tr>
        <tr id=chinaaddress1> 
          <td   class="crm_td">���ڵ�����</td>
          <td   class="crm_input"> 
            <?
           // findarea($chinacomcity);
            echo $chinacomcity;
            ?>
          </td>
          <td align="right"   class="crm_td">Ա��������</td>
          <td   class="crm_input"> 
            <?=$ygrs;?>
          </td>
        </tr>
        <tr> 
          <td   class="crm_td">�̶��绰��</td>
          <td  id=areacodetd class="crm_input"> 
            <?=$str_tel;?>
          </td>
          <td align="right"   class="crm_td">��˾��ַ��</td>
          <td   class="crm_tdright"> 
            <?=$web;?>
          </td>
        </tr>
        <tr> 
          <td   class="crm_td">���棺</td>
          <td   class="crm_input"> 
            <?=$str_fax;?>
          </td>
          <td align="right"   class="crm_td">��Ӫҵ�</td>
          <td   class="crm_tdright"> 
            <?=nyye($yye);?>
            �����</td>
        </tr>
        <tr> 
          <td   class="crm_td">��ϸ��ַ��</td>
          <td colspan="3"   class="crm_input"> 
            <?=$address;?>
            &nbsp;�ʱࣺ 
            <?=$postcode;?>
          </td>
        </tr>
        
        <!--��Ӳ��ſ�ʼ-->
          <tr> 
          <td   class="crm_td">�������ƣ�</td>
          <td   class="crm_input">&nbsp;<?=$bumen1;?></td>
          <td align="right"   class="crm_td">�ͻ�������ַ��</td>
          <td   class="crm_tdright">&nbsp;<?=$addr1;?></td>
        </tr>   
          
        <!--��Ӳ��Ž���-->
        <tr> 
          <td   class="crm_td">��ע��</td>
          <td colspan="3"   class="crm_detail"> 
            <?=stripslashes($remark);?><!--<?php echo $emark;?>-->
          </td>
        </tr>
      </table></td>
  </tr>
</table>
<?
				  $gqquery ="SELECT *  from linkname where clientid='".$id."'"; 
				  $queryresult=$obj->exec($gqquery);
				  $ggallrows=$obj->num_rows($queryresult);
				  $arrrow=$obj->fetch($queryresult);
				for ($i=0;$i<$ggallrows;$i++)	
				{
					$id=trim($arrrow[$i]['id']);
					$client_name=trim($arrrow[$i]['clientname']);
					$name=trim($arrrow[$i]['name']);
					$clew=trim($arrrow[$i]['clew']);
					$sex=trim($arrrow[$i]['sex']);
					$zhiwu=trim($arrrow[$i]['zhiwu']);
					$email=trim($arrrow[$i]['email']);
					$department=trim($arrrow[$i]['department']);
					$officetel=trim($arrrow[$i]['officetel']);
					$hometel=trim($arrrow[$i]['hometel']);
					$mobile=trim($arrrow[$i]['mobile']);
					$fax=trim($arrrow[$i]['fax']);
					$birthday=trim($arrrow[$i]['birthday']);
					$qq=trim($arrrow[$i]['qq']);
					$skypeid=trim($arrrow[$i]['skypeid']);
					$assistant=trim($arrrow[$i]['assistant']);
					$assistanttel=trim($arrrow[$i]['assistanttel']);
					$address=trim($arrrow[$i]['address']);
					$postcode=trim($arrrow[$i]['postcode']);
					$remark=trim($arrrow[$i]['remark']);
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC"  class="client_detail" style="padding:0px;">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi">&nbsp;��ϵ��:<?=$name;?></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" height="30" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        <tr> 
          <td   class="crm_td">������</td>
          <td   class="crm_input"><?=$name;?> <?=$sex;?></td>
          <td align="right"   class="crm_td">������Դ��</td>
          <td   class="crm_tdright">&nbsp;<?=$clew;?> </td>
        </tr>
        <tr> 
          <td width="15%"   class="crm_td">���ţ� </td>
          <td width="45%"   class="crm_input">&nbsp;<?=$department;?> </td>
          <td width="40%" align="right"   class="crm_td">ְ��</td>
          <td width="40%"   class="crm_tdright">&nbsp;<?=$zhiwu;?> </tr>
        <tr> 
          <td   class="crm_td">�ʼ���</td>
          <td   class="crm_input">&nbsp;<?=$email;?></td>
          <td align="right"   class="crm_td">סլ�绰��</td>
          <td   class="crm_tdright">&nbsp;<?=$hometel;?></td>
        </tr>
        <tr id=chinaaddress1> 
          <td   class="crm_td"> �칫�̻���</td>
          <td   class="crm_input"><?=$officetel;?> </td>
          <td align="right"   class="crm_td">�ֻ���</td>
          <td   class="crm_input">&nbsp;<?=$mobile;?> </td>
        </tr>
        <tr> 
          <td   class="crm_td">���棺</td>
          <td  id=areacodetd class="crm_input">&nbsp;<?=$fax;?></td>
          <td align="right"   class="crm_td">���գ�</td>
          <td   class="crm_tdright">&nbsp;<?=$birthday;?></td>
        </tr>
        <tr> 
          <td   class="crm_td">QQ��</td>
          <td   class="crm_input">&nbsp;<?=$qq;?></td>
          <td align="right"   class="crm_td">Skype ID��</td>
          <td   class="crm_tdright">&nbsp;<?=$skypeid;?></td>
        </tr>
        <tr> 
          <td   class="crm_td">����</td>
          <td   class="crm_input">&nbsp;<?=$assistant;?></td>
          <td align="right"   class="crm_td">����绰��</td>
          <td   class="crm_tdright">&nbsp;<?=$assistanttel;?> </td>
        </tr>
        <tr> 
          <td   class="crm_td"><font color="#FF0000">*</font>��ϸ��ַ��</td>
          <td   class="crm_input">&nbsp;<?=$address;?></td>
          <td align="right"   class="crm_td">�ʱࣺ</td>
          <td   class="crm_tdright">&nbsp;<?=$postcode;?></td>
        </tr>
        
        <tr> 
          <td   class="crm_td">��ע��</td>
          <td colspan="3"   class="crm_detail">&nbsp;<?=stripslashes($remark);?> </td>
        </tr>
      </table></td>
  </tr>
</table>
<?
					}
				?>				  

</body>
</html>
