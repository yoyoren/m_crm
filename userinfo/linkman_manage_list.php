<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$userid=$_SESSION["userdlname"];
//modify
$departmentid=$_SESSION["departmentid"];
$parentid=$_SESSION["parentid"];
						$tempi=1;
						if(empty($_REQUEST['page'])) 
						{ 
								$page = 1; 
								$nowpage=0;
								$clientname=chkstring(addslashes(trim(isset($_POST['clientname'])?$_POST['clientname']:"")));
								$select_class=chkstring(addslashes(trim(isset($_POST['select_class'])?$_POST['select_class']:"��ҵ����")));
								switch ($select_class) {
								    case "��ҵ����":
												if ($clientname<>"")
												{
													$gqquery ="SELECT  *  from linkname where userid='".$userid."' and clientname like '%".$clientname."%' ORDER BY addtime desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													}
													else
													{
														$gqquery ="SELECT  *  from linkname where userid='".$userid."'  ORDER BY addtime desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
														}
								        break;
								    case "��ϵ��":
												if ($clientname<>"")
												{
													$gqquery ="SELECT  *  from linkname where userid='".$userid."' and name like '%".$clientname."%' ORDER BY addtime desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													}
													else
													{
														$gqquery ="SELECT  *  from linkname where userid='".$userid."'  ORDER BY addtime desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
														}
								        break;

								}
								


							}
							else 
							{ 
								$page = $_REQUEST['page']; 
							if($page<=0) 
								{ 
								$page = 1; 
								$nowpage=0;
								}else 
								{ 
								$nowpage=($page-1)*$dbzz_bianma_pagenum;
								$clientname=chkstring(addslashes(trim($_GET['clientname'])));
								$select_class=chkstring(addslashes(trim($_GET['select_class'])));
								if ($select_class=="") $select_class="��ҵ����"; 
								switch ($select_class) {
								    case "��ҵ����":
												if ($clientname<>"")
												{				  			
								  				$gqquery ="SELECT  *  from linkname WHERE userid='".$userid."' and clientname like '%".$clientname."%'  ORDER BY addtime desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
													}
													else
													{
								  					$gqquery ="SELECT  *  from linkname WHERE userid='".$userid."'  ORDER BY addtime desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
														}
								        break;
								    case "��ϵ��":
												if ($clientname<>"")
												{				  			
								  				$gqquery ="SELECT  *  from linkname WHERE userid='".$userid."' and name like '%".$clientname."%' ORDER BY addtime desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
													}
													else
													{
								  					$gqquery ="SELECT  *  from linkname WHERE userid='".$userid."' ORDER BY addtime desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
														}
								        break;

								}								

								$tempi=$page*$dbzz_bianma_pagenum-($dbzz_bianma_pagenum-1);
								}
							}


								switch ($select_class) {
								    case "��ҵ����":
												if ($clientname<>"")
												{	
													$query0 ="SELECT id from linkname where clientname like '%".$clientname."%' and  userid='".$userid."'";
													}
													else
													{
														$query0 ="SELECT id from linkname where userid='".$userid."'";
														}
								        break;
								    case "��ϵ��":
												if ($clientname<>"")
												{	
													$query0 ="SELECT id from linkname where name like '%".$clientname."%' and  userid='".$userid."'";
													}
													else
													{
														$query0 ="SELECT id from linkname where userid='".$userid."'";
														}
								        break;

								}							

//							echo $gqquery;
//							exit;
	  			$totalresult=$obj->exec($query0);
				  $allrows=$obj->num_rows($totalresult);
//          echo $allrows.$query0."<br>";
//          echo $gqquery."<br>".$clientname;
//exit;
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
    <td>&nbsp;�ͻ���Դ����->������ϵ��</td>
  </tr>
</table>

<form name="myform" method="post" action="linkman_manage_list.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bianmamanage">
  <tr> 
            <td width="10%" height="27" align="center" bgcolor="DBDEF4" class="select_class">
			<select name=select_class size=1 id="select_class" class="crm_select">
                 
                <OPTION value="��ҵ����" <?if ($select_class=="��ҵ����") echo "selected";?>>-��ҵ����-</OPTION>
                <OPTION value="��ϵ��" <?if ($select_class=="��ϵ��") echo "selected";?>>-��ϵ��-</OPTION>
              </select></td>
    <td width="36%" bgcolor="DBDEF4" class="select_class"><input name="clientname"  value="<?=$clientname;?>" type="text"  id="clientname" size="20"  maxlength="30">
              &nbsp;
              <input type="submit" name="Submit" class="submit" value="-������ҵ-"></td>
            <td width="26%" bgcolor="DBDEF4" class="select_class">&nbsp;</td>
    <td width="11%" bgcolor="DBDEF4" class="select_class"></td>
    <td width="17%" bgcolor="DBDEF4" class="select_class"></td>
  </tr>
</table>
</form>
<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" class="bianmamanage">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi" colspan="7">&nbsp;��ϵ����Ϣ����</td>
  </tr>
				<tr bgcolor="#E8E8E8" height=20>
				<td  width=4% align="center"  class="bianmagxh">���</td>
				<td  width=11%  class="usermanage_1">��ϵ��</td>
				<td  width=25%  class="usermanage_1">��ҵ����</td>
				<td  width=10%  class="usermanage_1">ְ��</td>
				<td  width=8%  class="usermanage_1">����</td>
				<td  width=34%  class="usermanage_1">�̻�/լ��/�ֻ�</td>
				<td  width=8%  class="bianmacz">����</td>
				</tr>


<?

if ($ggallrows==0)
{
	echo "<tr><td align='center' height='25' bgcolor='#FFFFFF' colspan='7'>������Ҫ��ѯ�����ݣ�</td></tr>";
	}

				for ($i=0;$i<$ggallrows;$i++)	
				{
					$id=trim($arrrow[$i]['id']);
					$client_name=trim($arrrow[$i]['clientname']);
					$name=trim($arrrow[$i]['name']);
					$sex=trim($arrrow[$i]['sex']);
					$zhiwu=trim($arrrow[$i]['zhiwu']);
					$department=trim($arrrow[$i]['department']);
					$officetel=trim($arrrow[$i]['officetel']);
					$hometel=trim($arrrow[$i]['hometel']);
					$mobile=trim($arrrow[$i]['mobile']);
					$clientid=trim($arrrow[$i]['clientid']);
					$adduser=trim($arrrow[$i]['userid']);
					//$str_tel="<font color=#2B3580>Tel:".$telcountrycode."-".$telareacode."-".$tel."</font>";
					//$str_fax=" Fax:".$faxcountrycode."-".$faxareacode."-".$fax;
					
				?>
				<tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF">
				<td  width=4% align="center"  style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;"><?=$tempi;?></td>
				<td  width=11%  class="usermanage_2" nowrap><a href="linkman_detail.php?id=<?=$id;?>" target="_blank" title="�鿴[<?=$name;?>]��ϸ��Ϣ��"><?=$name.$sex;?></a></td>
				<td  width=25%  class="usermanage_2"><a href="client_detail.php?id=<?=$clientid;?>" target="_blank" title="�鿴[<?=$client_name;?>]��ϸ��Ϣ��"><?=$client_name!=NULL?$client_name:"&nbsp;";?></a></td>
				<td  width=10%  class="usermanage_2" nowrap><?=$zhiwu!=NULL?$zhiwu:"&nbsp;";?></td>
				<td  width=8%  class="usermanage_2"><?=$department!=NULL?$department:"&nbsp;";?></td>
				<td  width=34%  class="usermanage_2"><?=($officetel!=NULL?$officetel:"&nbsp;")."/".$hometel."/".($mobile!=NULL?$mobile:"&nbsp;");?></td>
		  <td  width=8%  style="padding:1px;height:20px;line-height:20px;border-left:1px solid #D8D8D8;border-bottom:1px solid #D8D8D8;">
					<?
					if ($adduser==trim($_SESSION["userdlname"]) or "admin"==trim($_SESSION["userdlname"])) echo "<a href='linkman_edit_list.php?id=".$id."' title=�༭������>�༭</a> 
					<!--ɾ������-->
					<!--<a href='linkman_del.php?id=".$id."' onclick='return ConfirmDel();' title='��ͻ��´�����ϵ�ˣ�������ɾ����'>ɾ��</a>-->";
					else echo "<font color='BCBCBC' title='�ǹ���Ա���ܶԱ�������κβ�����'>�༭ ɾ��</font>";
					?>					</td>
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
	$link="linkman_manage_list.php?clientname=".rawurlencode($clientname)."&select_class=".rawurlencode($select_class);
	echo getpage($sumrows,$page,$link,$pagelistnum);
	
	?>				</td>
 				</tr>
</table>
