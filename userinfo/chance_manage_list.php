<?
session_start();
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$select_class=chkstring(addslashes(trim(isset($_POST['select_class'])?$_POST['select_class']:"")));
$clientname=chkstring(addslashes(trim(isset($_POST['clientname'])?$_POST['clientname']:"")));
$tradename=chkstring(addslashes(trim(isset($_POST['tradename'])?$_POST['tradename']:"")));
$start1=chkstring(addslashes(trim(isset($_POST['start1'])?$_POST['start1']:"")));
$end1=chkstring(addslashes(trim(isset($_POST['end1'])?$_POST['end1']:"")));
$userid=$_SESSION["userdlname"];
						$tempi=1;
						if(empty($_REQUEST['page'])) 
						{ 
								$page = 1; 
								$nowpage=0;
								$clientname=chkstring(addslashes(trim(isset($_POST['clientname'])?$_POST['clientname']:"")));
								$tradename=chkstring(addslashes(trim(isset($_POST['tradename'])?$_POST['tradename']:"")));
								$start1=chkstring(addslashes(trim(isset($_POST['start1'])?$_POST['start1']:"")));
								$end1=chkstring(addslashes(trim(isset($_POST['end1'])?$_POST['end1']:"")));
								$select_class=chkstring(addslashes(trim(isset($_POST['select_class'])?$_POST['select_class']:"��ҵ����")));
								switch ($select_class) {
								    case "��ҵ����":
												if ($clientname<>"")
												{
													$gqquery ="SELECT  *  from chance where userid='".$userid."' and clientname like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													}
													else
													{
														$gqquery ="SELECT  *  from chance where userid='".$userid."'  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
														}
								        break;
										case "���ۿ�����":
													$gqquery ="SELECT  *  from chance where cast(substring_index(possibility,'%',1) as signed)>=".$start1." and cast(substring_index(possibility,'%',1) as signed)<=".$end1." and userid='".$userid."' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													break;
								    case "���׷�ʽ":
												if ($tradename<>"")
												{
													$gqquery ="SELECT  *  from chance where userid='".$userid."' and itemname like '%".$tradename."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													}
													else
													{
														$gqquery ="SELECT  *  from chance where userid='".$userid."'  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
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
								//$clientname=chkstring(addslashes(trim($_GET['clientname'])));
								//$select_class=chkstring(addslashes(trim($_GET['select_class'])));
								$clientname=chkstring(addslashes(trim($_GET['clientname'])));
								$start1=chkstring(addslashes(trim($_GET['start1'])));
								$tradename=chkstring(addslashes(trim($_GET['tradename'])));
								$end1=chkstring(addslashes(trim($_GET['end1'])));
								$select_class=chkstring(addslashes(trim($_GET['select_class'])));
								if ($select_class=="") $select_class="��ҵ����"; 
								switch ($select_class) {
								    case "��ҵ����":
												if ($clientname<>"")
												{				  			
								  				$gqquery ="SELECT  *  from chance WHERE userid='".$userid."' and clientname like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
													}
													else
													{
								  					$gqquery ="SELECT  *  from chance WHERE userid='".$userid."' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
														}
								        break;
										
										case "���ۿ�����":
													$gqquery ="SELECT  *  from chance where cast(substring_index(possibility,'%',1) as signed)>=".$start1." and cast(substring_index(possibility,'%',1) as signed)<=".$end1." and userid='".$userid."' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													break;
								    case "���׷�ʽ":
												if ($tradename<>"")
												{				  			
								  				$gqquery ="SELECT  *  from chance WHERE userid='".$userid."' and itemname like '%".$tradename."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
													}
													else
													{
								  					$gqquery ="SELECT  *  from chance WHERE userid='".$userid."' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
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
													$query0 ="SELECT * from chance where clientname like '%".$clientname."%' and  userid='".$userid."'";
													}
													else
													{
														$query0 ="SELECT * from chance where userid='".$userid."'";
														}
								        break;
										
										case "���ۿ�����":
													$query0 ="SELECT  *  from chance where cast(substring_index(possibility,'%',1) as signed)>=".$start1." and cast(substring_index(possibility,'%',1) as signed)<=".$end1." and userid='".$userid."' ORDER BY id desc";
													break;
								    case "���׷�ʽ":
												if ($tradename<>"")
												{	
													$query0 ="SELECT * from chance where itemname like '%".$tradename."%' and  userid='".$userid."'";
													}
													else
													{
														$query0 ="SELECT * from chance where userid='".$userid."'";
														}
								        break;

								}	
//							echo $gqquery;
//							exit;
	  			$totalresult=$obj->exec($query0);
				  $allrows=$obj->num_rows($totalresult);
				$exporttable=$obj->fetch($totalresult);

				  $queryresult=$obj->exec($gqquery);
				  $ggallrows=$obj->num_rows($queryresult);
				  $arrrow=$obj->fetch($queryresult);
				  $_SESSION["chancetop"]=array("���","�޽ύ�׷�ʽ","��ҵ����","���ƽ��","���ۿ�����","��ϵ��");
				  $_SESSION["chancecontent"]=$exporttable;
				  $_SESSION["act"]="chance";
				  
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/inputstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/lefttoggler.js"></script>    	
<script>

function hidetd(txt)
{
	var a=txt;
	//var a=document.getElementById("select_class").value;
	if(a=="��ҵ����")
	{
		document.getElementById("byclient").style.display="block";
		document.getElementById("possibility").style.display="none";
		document.getElementById("bytrade").style.display="none";
	}
	if(a=="���ۿ�����")
	{
		document.getElementById("byclient").style.display="none";
		document.getElementById("bytrade").style.display="none";
		document.getElementById("possibility").style.display="block";
	}
	if(a=="���׷�ʽ")
	{
		document.getElementById("byclient").style.display="none";
		document.getElementById("bytrade").style.display="block";
		document.getElementById("possibility").style.display="none";
	}
}
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
    <td>&nbsp;�ͻ���Դ����->��������</td>
	<td align="right">
	<a href="export_excel.php"style="text-decoration: none">��������</a>&nbsp;
	</td>
  </tr>
</table>
<form name="myform" method="post" action="chance_manage_list.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bianmamanage">
  <tr> 
            <td width="10%" height="27" align="center" bgcolor="DBDEF4" class="select_class">
			<select name="select_class" size=1 id="select_class" class="crm_select" onchange="hidetd(this.value);">
                 
                <OPTION value="��ҵ����">-��ҵ����-</OPTION>
                <OPTION value="���׷�ʽ">-���׷�ʽ-</OPTION>
				<OPTION value="���ۿ�����">-���ۿ�����-</OPTION>
              </select></td>
    <td width="36%" bgcolor="DBDEF4" class="select_class">
		<div id="byclient">��������ҵ���ƣ�<input name="clientname"  type="text"  id="clientname" size="20"  maxlength="30"></div>
		<div id="bytrade" style="display:none;">�����뽻�����ƣ�<input name="tradename"  type="text"  id="tradename" size="20"  maxlength="30"></div>
	    <div id="possibility" style="display:none;">�ɹ������Դӣ�
	 	<select name="start1" size=1 class="crm_select"> 
				<OPTION value="0" >-��ѡ�������-</OPTION>
                <OPTION value="10" >-10% ������-</OPTION>
                <OPTION value="25" >-25% ��ѿ��-</OPTION>
				<OPTION value="50">-50% ������-</OPTION>
				<OPTION value="75">-75% ������-</OPTION>
                <OPTION value="90">-90% ժ����-</OPTION>
				<OPTION value="100" >-100% �����-</OPTION>
        </select>
		&nbsp;����&nbsp;
		<select name="end1" size=1 class="crm_select"> 
                <OPTION value="0">-��ѡ�������-</OPTION>
                <OPTION value="10" >-10% ������-</OPTION>
                <OPTION value="25">-25% ��ѿ��-</OPTION>
				<OPTION value="50" >-50% ������-</OPTION>
				<OPTION value="75" >-75% ������-</OPTION>
                <OPTION value="90">-90% ժ����-</OPTION>
				<OPTION value="100">-100% �����-</OPTION>
        </select>
		</div>
	 </td>
              <td><input type="submit" class="submit" value="-����-"></td>
            <td width="26%" bgcolor="DBDEF4" class="select_class">&nbsp;</td>
    <td width="11%" bgcolor="DBDEF4" class="select_class"></td>
    <td width="17%" bgcolor="DBDEF4" class="select_class"></td>
  </tr>
</table>
</form>
<table border="0" align="center" cellpadding="0" id="chancetable" cellspacing="0" bgcolor="#CCCCCC" class="bianmamanage">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi" colspan="7">&nbsp;������Ϣ����</td>
  </tr>
				<tr bgcolor="#E8E8E8" height=20>
				<td  width=4% align="center"  class="bianmagxh">���</td>
				<td  width=21%  class="usermanage_1">�޽ύ�׷�ʽ</td>
				<td  width=25%  class="usermanage_1">��ҵ����</td>
				<td  width=10%  class="usermanage_1">��ϵ��</td>
				<td  width=8%  class="usermanage_1">���ƽ��</td>
				<td  width=24%  class="usermanage_1">���ۿ�����</td>
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
					$clientid=trim($arrrow[$i]['clientnameid']);
					$itemname=trim($arrrow[$i]['itemname']);
					$linkname=trim($arrrow[$i]['linkname']);
					$possibility=trim($arrrow[$i]['possibility']);
 					$itemmoney=trim($arrrow[$i]['itemmoney']);
 					$adduser=trim($arrrow[$i]['userid']);
 					$linknameid=trim($arrrow[$i]['linknameid']);
 
					
				?>
				<tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF">
				<td  width=4% align="center"  style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;"><?=$tempi;?></td>
				<td  width=21%  class="usermanage_2" nowrap><a href="chance_detail.php?id=<?=$id;?>" target="_blank"><?=$itemname;?></a></td>
				<td  width=25%  class="usermanage_2"><a href="client_detail.php?id=<?=$clientid;?>" target="_blank" title="�鿴[<?=$client_name;?>]��ϸ��Ϣ��"><?=$client_name;?></a></td>
				<td  width=10%  class="usermanage_2" nowrap><a href="linkman_detail.php?id=<?=$linknameid;?>" target="_blank" title="�鿴[<?=$linkname;?>]��ϸ��Ϣ��"><?=$linkname!=NULL?$linkname:"&nbsp;";?></a></td>
				<td  width=8%  class="usermanage_2"><?=$itemmoney!=NULL?$itemmoney:"&nbsp;";?></td>
				<td  width=24%  class="usermanage_2"><?=$possibility!=NULL?$possibility:"&nbsp;";?></td>
				<td  width=8%  style="padding:1px;height:20px;line-height:20px;border-left:1px solid #D8D8D8;border-bottom:1px solid #D8D8D8;">
					<?
					if ($adduser==trim($_SESSION["userdlname"]) or "admin"==trim($_SESSION["userdlname"])) echo "<a href='chance_edit_list.php?id=".$id."' title=�༭������>�༭</a> <a href='chance_del.php?id=".$id."' onclick='return ConfirmDel();' title='��ͻ��´�����ϵ�ˣ�������ɾ����'>ɾ��</a>";
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
	//$link="chance_manage_list.php?clientname=".rawurlencode($clientname)."&select_class=".rawurlencode($select_class);
	$link="chance_manage_list.php?clientname=".rawurlencode($clientname)."&tradename=".rawurlencode($tradename)."&select_class=".rawurlencode($select_class)."&start1=".rawurlencode($start1)."&end1=".rawurlencode($end1);
	echo getpage($sumrows,$page,$link,$pagelistnum);
	
	?>					
				</td>
 				</tr>
</table>