<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$id=$_GET['id'];
 
					$gqquery ="SELECT *  from chance where id='".$id."'"; 
				  $queryresult=$obj->exec($gqquery);
				  $ggallrows=$obj->num_rows($queryresult);
				  $arrrow=$obj->fetch($queryresult);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>���ۼ�¼ ��ϸ��Ϣ</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/inputstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?

				for ($i=0;$i<$ggallrows;$i++)	
				{
					$id=trim($arrrow[$i]['id']);
					$itemname=trim($arrrow[$i]['itemname']);
					$clientname=trim($arrrow[$i]['clientname']);
					$itemmoney=trim($arrrow[$i]['itemmoney']);
					$phase=trim($arrrow[$i]['phase']);//���ۿ�����
					$nextcontent=trim($arrrow[$i]['nextcontent']);
					$expectationmoney=trim($arrrow[$i]['expectationmoney']);
					$intendingday=trim($arrrow[$i]['intendingday']);
					$shic=trim($arrrow[$i]['shic']);
					$possibility=trim($arrrow[$i]['possibility']);//�ͻ�����
					$clew=trim($arrrow[$i]['clew']);
					$linkname=trim($arrrow[$i]['linkname']);
					$remark=trim($arrrow[$i]['remark']);
					$username=trim($arrrow[$i]['username']);
                    $addtime=trim($arrrow[$i]['addtime']);
					//���������
					$signDate=trim($arrrow[$i]['signDate']);//ǩԼʱ��
					$payDate=trim($arrrow[$i]['payDate']);//֧��ʱ��
					$directly=trim($arrrow[$i]['directly']);//����Ŀ��
					$content=trim($arrrow[$i]['content']);//��Ʒ��ʽ
					$discount=trim($arrrow[$i]['discount']);//�ۿ�
                    $contract=trim($arrrow[$i]['contract']);//��Լ��ʽ
					//���������
					
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC"  class="client_detail" style="padding:0px;">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi">���ۼ�¼��ϸ</td>
  </tr>
  <tr> 
    <td height="30" valign="top" bgcolor="#FFFFFF" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
      <table width="114%" border="0" cellspacing="0" cellpadding="0" >
        <tr> 
          <td   class="crm_td">sales name��</td>
          <td   class="crm_input">&nbsp;<?=$username;?></td>
          <td align="right"   class="crm_td">Ԥ�Ƴɽ���</td>
          <td   class="crm_tdright">&nbsp;<?=$itemmoney;?> </td>
        </tr>
        <tr> 
          <td width="15%"   class="crm_td"> <font color="#FF0000">*</font>�޽ύ�׷�ʽ��</td>
          <td width="45%"   class="crm_input">&nbsp;<?=$itemname;?> </td>
          <td   class="crm_td">Ԥ��ǩԼʱ�䣺</td>
            <td   class="crm_tdright">&nbsp;<?=$signDate;?> </td>      
                   </tr>
       
          <!--������ڿ�ʼ-->
                <tr> 
                  
                    <td   class="crm_td"><font color="#FF0000">*</font>��ϵ�ˣ�</td>
                    <td   class="crm_input">&nbsp;<?=$linkname;?> </td>
                  <td align="right"   class="crm_td">Ԥ�Ƹ������ڣ�</td>
                  <td   class="crm_input">&nbsp;<?=$payDate;?> </td>
                </tr>
                <!--������ڽ���-->
       
        <tr> 
        
          <td   class="crm_td"><font color="#FF0000">*</font>�ͻ����ƣ�</td>
          <td   class="crm_input">&nbsp;<?=$clientname;?> </td>
          <td align="right"   class="crm_td"><font color="#FF0000">*</font>���ۿ����ԣ�</td>
          <td   class="crm_tdright">&nbsp;<?=$phase;?> </td>
          <!--��ʼ
          <td align="right"   class="crm_td">���ۿ����ԣ�</td>
          <td   class="crm_input">&nbsp;<?=$possibility;?> </td>
          ����-->
        </tr>
        <tr > 
          <td   class="crm_td">�ͻ�����</td>
          <td   class="crm_input">&nbsp;<?=$possibility;?> </td>
          <td width="40%" align="right"   class="crm_td">�������ڣ�</td>
          <td width="40%"   class="crm_tdright">&nbsp;<?=$intendingday;?> 
        </tr>
        <tr> 
          <td   class="crm_td">����Ŀ�ģ�</td>
          <td   class="crm_input">&nbsp;<?=$directly;?> </td>
          <td align="right"   class="crm_td">��Ʒ��ʽ��</td>
          <td   class="crm_tdright">&nbsp;<?=$content;?> </td>
        </tr>
         <tr> 
          <td   class="crm_td">�ۿۣ�</td>
          <td   class="crm_input">&nbsp;<?=$discount;?> </td>
          <td align="right"   class="crm_td">���۲�Ʒ���ƣ�</td>
          <td   class="crm_tdright">&nbsp;<?=$contract;?> </td>
        </tr>
        <!---->
        <tr> 
          <td   class="crm_td"> ��һ���� </td>
          <td  id=areacodetd class="crm_input">&nbsp;<?=$nextcontent;?> </td>
          <td align="right"   class="crm_td">�������棺</td>
          <td   class="crm_tdright">&nbsp;<?=$expectationmoney;?></td>
        </tr>
        <tr> 
          <td   class="crm_td">������Դ��</td>
          <td   class="crm_input">&nbsp;<?=$clew;?></td>
          <td align="right"   class="crm_td">�г��Դ��</td>
          <td   class="crm_tdright">&nbsp;<?=$shic;?></td>
        </tr>
        <tr> 
          <td   class="crm_td">��ע��</td>
          <td colspan="3"   class="crm_input">&nbsp;<?=$remark;?> </td>
        </tr>
        <tr> 
          <td   class="crm_td">����ʱ�䣺</td>
          <td colspan="3"   class="crm_input">&nbsp;<?=$addtime;?> </td>
        </tr>        
      </table></td>
  </tr>
</table>
<?
					}
				?>				  

</body>
</html>
