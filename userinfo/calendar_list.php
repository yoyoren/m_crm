<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$userid=$_SESSION["userdlname"];
//�����
$id=$_GET['id']+1;
 
					$gqquery ="SELECT *  from calendar where id='".$id."'"; 
				  $queryresult=$obj->exec($gqquery);
				  $ggallrows=$obj->num_rows($queryresult);
				  $arrrow=$obj->fetch($queryresult);
//�����

$query0 ="SELECT id from calendar where userid='".$userid."'";
	  			$totalresult=$obj->exec($query0);
				  $allrows=$obj->num_rows($totalresult);


				  $queryresult=$obj->exec($gqquery);
				  $ggallrows=$obj->num_rows($queryresult);
				  $arrrow=$obj->fetch($queryresult);
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/inputstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/lefttoggler.js"></script>    	
<script>

function ConfirmDel()
{
   if(confirm("ȷ��Ҫɾ����һ��ɾ�������ָܻ���"))
     return true;
   else
     return false;

}
</script> 

<table  border="0" class="daohang" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;��������->�����ҵĸ���</td>
  </tr>
</table>

<form name="myform" method="post" action="calendar_manage_list.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bianmamanage">
  <tr> 
            <td width="10%" height="27" align="center" bgcolor="DBDEF4" class="select_class">
			<select name=select_class size=1 id="select_class" class="crm_select">
                 
                <OPTION value="�ճ̱���"  <?if ($select_class=="�ճ̱���") echo "selected";?>>-��������-</OPTION>
                <OPTION value="��ҵ����" <?if ($select_class=="��ҵ����") echo "selected";?>>-��ҵ����-</OPTION>
              </select></td>
    <td width="36%" bgcolor="DBDEF4" class="select_class"><input name="clientname"  type="text"  value="<?=$clientname;?>" id="clientname" size="20"  maxlength="30">
              &nbsp;
              <input type="submit" name="Submit" class="submit" value="-����-"></td>
            <td width="26%" bgcolor="DBDEF4" class="select_class">&nbsp;</td>
    <td width="11%" bgcolor="DBDEF4" class="select_class"></td>
    <td width="17%" bgcolor="DBDEF4" class="select_class"></td>
  </tr>
</table>
</form>
<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" class="bianmamanage">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi" colspan="7">&nbsp;������Ϣ����</td>
  </tr>
				<tr bgcolor="#E8E8E8" height=20>
				<td  width=4% align="center"  class="bianmagxh">���</td>
				<td  width=21%  class="usermanage_1">��������</td>
				<td  width=25%  class="usermanage_1">�����ͻ�</td>
				<td  width=10%  class="usermanage_1">��ϵ��</td>
				<td  width=8%  class="usermanage_1">�ճ�����</td>
				<td  width=24%  class="usermanage_1">�ճ�ִ��ʱ��</td>
				<td  width=8%  class="bianmacz">����</td>
				</tr>

<?

				for ($i=0;$i<$ggallrows;$i++)	
				{
					$id=trim($arrrow[$i]['id'])-1;
					$activitytype=trim($arrrow[$i]['activitytype']);
					$rctitle=trim($arrrow[$i]['rctitle']);
					$clientname=trim($arrrow[$i]['clientname']);
					$linkname=trim($arrrow[$i]['linkname']);
					$eventstatus=trim($arrrow[$i]['eventstatus']);
					$jhtime=trim($arrrow[$i]['jhtime']);
					$jhm=trim($arrrow[$i]['jhm']);
					$remark=trim($arrrow[$i]['remark']);
					$username=trim($arrrow[$i]['username']);
					$str_address=trim($arrrow[$i]['str_address']);
					$fbdate=trim($arrrow[$i]['fbdate']);
					//����ӵ�
					$yes=trim($arrrow[$i]['yes']);
					$tryDate=trim($arrrow[$i]['tryDate']);
					$plan=trim($arrrow[$i]['plan']);
					//����ӵ�
					
 
?>

				<tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF">
				<td  width=4% align="center"  style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;"><?=$tempi;?></td>
				<td  width=21%  class="usermanage_2" nowrap><a href="calendar_detail.php?id=<?=$id;?>" target="_blank"><?=$rctitle;?></a></td>
				<td  width=25%  class="usermanage_2"><a href="client_detail.php?id=<?=$id;?>" target="_blank" title="�鿴[<?=$clientname;?>]��ϸ��Ϣ��"><?=$clientname;?></a></td>
				<td  width=10%  class="usermanage_2" nowrap><a href="linkman_detail.php?id=<?=$linknameid;?>" target="_blank" title="�鿴[<?=$linkname;?>]��ϸ��Ϣ��"><?=$linkname;?></a></td>
				<td  width=8%  class="usermanage_2"><?=$activitytype;?></td>
				<td  width=24%  class="usermanage_2"><?=$jhtime." ".$jhm;?></td>
				<td  width=8%  style="padding:1px;height:20px;line-height:20px;border-left:1px solid #D8D8D8;border-bottom:1px solid #D8D8D8;">
					<?
					if ($adduser==trim($_SESSION["userdlname"]) or "admin"==trim($_SESSION["userdlname"])) echo "<a href='calendar_edit_list.php?id=".$id."' title=�༭������>�༭</a>
					
					 <a href='calendar_del.php?id=".$id."' onclick='return ConfirmDel();' title='��ͻ��´�����ϵ�ˣ�������ɾ����'>ɾ��</a>";
					else echo "<font color='BCBCBC' title='�ǹ���Ա���ܶԱ�������κβ�����'>�༭ ɾ��</font>";
					?>
					
					</td>
					</tr>
				<?
					$tempi++;
						
					}	
?>	
				<tr>
				<td  width=100% align="center" bgcolor="#FFFFFF" style="padding:2px;height:22px;line-height:22px;border-bottom:1px solid #e8e8e8;" colspan="7">
	          <?
	$sumrows=$allrows;//������
	$pagelistnum=$dbzz_bianma_pagenum;//ÿҳ��ʾ����
	$link="calendar_manage_list.php?clientname=".rawurlencode($clientname)."&select_class=".rawurlencode($select_class);
	echo getpage($sumrows,$page,$link,$pagelistnum);
	
	?>					
				</td>
 				</tr>
</table>