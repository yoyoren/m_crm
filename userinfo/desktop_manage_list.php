<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
//session_start();
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$clientname=chkstring(addslashes(trim(isset($_POST['clientname'])?$_POST['clientname']:"")));
$userid=$_SESSION["userdlname"];
						$tempi=1;
						if(empty($_REQUEST['page'])) 
						{ 
								$page = 1; 
								$nowpage=0;
								$clientname=chkstring(addslashes(trim(isset($_POST['clientname'])?$_POST['clientname']:"")));
								$select_class=chkstring(addslashes(trim(isset($_POST['select_class'])?$_POST['select_class']:"��ҵ����")));													                                switch ($select_class) {
								    case "��ҵ����":
												if ($clientname<>"")
												{
													$gqquery ="SELECT  *  from calendar where userid='".$userid."' and clientname like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													}
													else
													{
														$gqquery ="SELECT  *  from calendar where userid='".$userid."'  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
														}
								        break;
								    case "�ճ̱���":
												if ($clientname<>"")
												{
													$gqquery ="SELECT  *  from calendar where userid='".$userid."' and rctitle like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													}
													else
													{
														$gqquery ="SELECT  *  from calendar where userid='".$userid."'  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
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
								  				$gqquery ="SELECT  *  from calendar WHERE userid='".$userid."' and clientname like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
													}
													else
													{
								  					$gqquery ="SELECT  *  from calendar WHERE userid='".$userid."' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
														}
								        break;
								    case "�ճ̱���":
												if ($clientname<>"")
												{				  			
								  				$gqquery ="SELECT  *  from calendar WHERE userid='".$userid."' and rctitle like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
													}
													else
													{
								  					$gqquery ="SELECT  *  from calendar WHERE userid='".$userid."' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
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
													$query0 ="SELECT * from calendar where clientname like '%".$clientname."%' and  userid='".$userid."'";
													}
													else
													{
														$query0 ="SELECT * from calendar where userid='".$userid."'";
														}
								        break;
								    case "�ճ̱���":
												if ($clientname<>"")
												{	
													$query0 ="SELECT * from calendar where rctitle like '%".$clientname."%' and  userid='".$userid."'";
													}
													else
													{
														$query0 ="SELECT * from calendar where userid='".$userid."'";
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
				   $_SESSION["calendartop"]=array("���","�ճ�����","��������","��ҵ����","��ϵ��","�ճ�ִ��ʱ��");
				  $_SESSION["calendarcontent"]= $exporttable;
				  $_SESSION["act"]="calendar";
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
    <td>&nbsp;����</td>
  </tr>
</table>

<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" class="bianmamanage">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi" colspan="2">&nbsp;��������ͳ��</td>
  </tr>
  <tr bgcolor="#E8E8E8" height=20> 
    <td  width=40% align="center"  class="bianmagxh">ͳ������</td>
    <td  width=60%  class="usermanage_1">����</td>
  </tr>
  <tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF"> 
    <td  width=4% align="center"  style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;"> 
      ���Ŀͻ� </td>
    <td  width=21%  class="usermanage_2" nowrap><a href="calendar_detail.php?id=<?=$id;?>" target="_blank"> 
      ���� <font color=red> 
      <?
		  $query = "Select count(*) from client where userid='".$userid."'"; 
						$result = mysql_query($query); 
						$num = mysql_fetch_array($result); 
						echo $num[0];
		  ?>
      </font> �� </a></td>
  </tr>
  <tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF"> 
    <td align="center"  style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;">������ϵ��</td>
    <td  class="usermanage_2" nowrap><a href="calendar_detail.php?id=<?=$id;?>" target="_blank">���� 
      <font color=red> 
      <?
		  $query = "Select count(*) from linkname where userid='".$userid."'"; 
						$result = mysql_query($query); 
						$num = mysql_fetch_array($result); 
						echo $num[0];
		  ?>
      </font> λ </a></td>
  </tr>
  <tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF"> 
    <td align="center"  style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;">��������</td>
    <td  class="usermanage_2" nowrap><a href="calendar_detail.php?id=<?=$id;?>" target="_blank">���� 
      <font color=red> 
      <?
		  $query = "Select count(*) from chance  where userid='".$userid."'"; 
						$result = mysql_query($query); 
						$num = mysql_fetch_array($result); 
						echo $num[0];
		  ?>
      </font> ��</a>
      
       Ԥ�ƺ�ͬ��<font color=red> 
      <?
		  $query = "Select sum(itemmoney) as phase from chance  where userid='".$userid."'"; 
						$result = mysql_query($query); 
						$num = mysql_fetch_array($result); 
						echo $num[0];
		  ?>
      </font>Ԫ(RMB)     
      </td>
  </tr>
  <tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF"> 
    <td align="center"  style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;">���ĸ���</td>
    <td  class="usermanage_2" nowrap><a href="calendar_detail.php?id=<?=$id;?>" target="_blank">���� 
      <font color=red> 
      <?
		  $query = "Select count(*) from calendar where userid='".$userid."'"; 
						$result = mysql_query($query); 
						$num = mysql_fetch_array($result); 
						echo $num[0];
		  ?>
      </font> ��</a></td>
  </tr>
  <tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF">
    <td align="center"  style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;">�����г��</td>
    <td  class="usermanage_2" nowrap><a href="calendar_detail.php?id=<?=$id;?>" target="_blank">���� 
      <font color=red> 
      <?
		  $query = "Select count(*) from market where userid='".$userid."'";
						$result = mysql_query($query); 
						$num = mysql_fetch_array($result); 
						echo $num[0];
		  ?>
      </font> ��</a></td>
  </tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" class="bianmamanage">
  <tr bgcolor="#EBEBEB"> 
    <td class="tishi" colspan="5">&nbsp;������Ϣ����</td>
	<td align="right" class="tishi">
	<a href="export_excel.php"style="text-decoration: none">��������</a>&nbsp;
	</td>
  </tr>
				<tr bgcolor="#E8E8E8" height=20>
				<td  width=4% align="center"  class="bianmagxh">���</td>
				<td  width=21%  class="usermanage_1">��������</td>
				<td  width=25%  class="usermanage_1">��ҵ����</td>
				<td  width=10%  class="usermanage_1">��ϵ��</td>
				<td  width=8%  class="usermanage_1">�ճ�����</td>
				<td  width=24%  class="usermanage_1">����ִ��ʱ��</td>
				<!-- <td  width=8%  class="bianmacz">&nbsp; </td>-->
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
					$clientid=trim($arrrow[$i]['clientid']);
					$rctitle=trim($arrrow[$i]['rctitle']);
					$linkname=trim($arrrow[$i]['linkname']);
					$linknameid=trim($arrrow[$i]['linknameid']);
 					$activitytype=trim($arrrow[$i]['activitytype']);
          $jhtime=trim($arrrow[$i]['jhtime']);
          $jhm=trim($arrrow[$i]['jhm']);
					
				?>
				<tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF">
				<td  width=4% align="center"  style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;"><?=$tempi;?></td>
				<td  width=21%  class="usermanage_2" nowrap><a href="calendar_detail.php?id=<?=$id;?>" target="_blank"><?=$rctitle;?></a></td>
				<td  width=25%  class="usermanage_2"><a href="client_detail.php?id=<?=$clientid;?>" target="_blank" title="�鿴[<?=$client_name;?>]��ϸ��Ϣ��"><?=$client_name;?></a></td>
				<td  width=10%  class="usermanage_2" nowrap><a href="linkman_detail.php?id=<?=$linknameid;?>" target="_blank" title="�鿴[<?=$linkname;?>]��ϸ��Ϣ��"><?=$linkname!=NULL?$linkname:"&nbsp;";?></a></td>
				<td  width=8%  class="usermanage_2"><?=$activitytype!=NULL?$activitytype:"&nbsp;";?></td>
				<td  width=24%  class="usermanage_2"><?=($jhtime!=NULL||$jhm!=NULL)?($jhtime." ".$jhm):"&nbsp;";?></td>
				
    <!--<td  width=8%  style="padding:1px;height:20px;line-height:20px;border-left:1px solid #D8D8D8;border-bottom:1px solid #D8D8D8;">&nbsp; 
    </td>-->
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
	$link="desktop_manage_list.php?clientname=".rawurlencode($clientname)."&select_class=".rawurlencode($select_class);
	echo getpage($sumrows,$page,$link,$pagelistnum);
	
	?>					
				</td>
 				</tr>
</table>