<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$clientname=chkstring(addslashes(trim(isset($_POST['clientname'])?$_POST['clientname']:"")));
$userid=$_SESSION["userdlname"];
//modify
$departmentid=$_SESSION["departmentid"];
$parentid=$_SESSION["parentid"];
//checkuserexit(trim($_SESSION["isfuze"]));
						$tempi=1;
						if(empty($_REQUEST['page'])) 
						{ 
								$page = 1; 
								$nowpage=0;
								$clientname=chkstring(addslashes(trim(isset($_POST['clientname'])?$_POST['clientname']:"")));
								$select_class=chkstring(addslashes(trim(isset($_POST['select_class'])?$_POST['select_class']:"企业名称")));
								switch ($select_class) {
								    case "企业名称":
												if ($clientname<>"")
												{ 
													if($parentid==-1)
													$gqquery ="SELECT  *  from calendar where clientname like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													else
													$gqquery ="SELECT  *  from calendar where userid in(select userid from userinfo where parentid=$departmentid) and clientname like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													}
													else
													{
														if($parentid==-1)
														$gqquery ="SELECT  *  from calendar  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
														else
														$gqquery ="SELECT  *  from calendar where userid in(select userid from userinfo where parentid=$departmentid)  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
														}
								        break;
								    case "日程标题":
												if ($clientname<>"")
												{
													if($parentid==-1)
													$gqquery ="SELECT  *  from calendar where rctitle like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													else
													$gqquery ="SELECT  *  from calendar where userid in(select userid from userinfo where parentid=$departmentid) and  rctitle like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													}
													else
													{
														if($parentid==-1)
														$gqquery ="SELECT  *  from calendar  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
														else
														$gqquery ="SELECT  *  from calendar where userid in(select userid from userinfo where parentid=$departmentid)  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
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
								if ($select_class=="") $select_class="企业名称"; 
								switch ($select_class) {
								    case "企业名称":
												if ($clientname<>"")
												{	
													if($parentid==-1)			  			
								  				$gqquery ="SELECT  *  from calendar WHERE  clientname like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
												else
												$gqquery ="SELECT  *  from calendar WHERE userid in(select userid from userinfo where parentid=$departmentid) and   clientname like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
													}
													else
													{
														if($parentid==-1)
								  					$gqquery ="SELECT  *  from calendar ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
													else
													$gqquery ="SELECT  *  from calendar where userid in(select userid from userinfo where parentid=$departmentid) ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
														}
								        break;
								    case "日程标题":
												if ($clientname<>"")
												{	
													if($parentid==-1)			  			
								  				$gqquery ="SELECT  *  from calendar WHERE  rctitle like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
												else
												$gqquery ="SELECT  *  from calendar WHERE userid in(select userid from userinfo where parentid=$departmentid) and   rctitle like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
													}
													else
													{
														if($parentid==-1)
								  					$gqquery ="SELECT  *  from calendar ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
													else
													$gqquery ="SELECT  *  from calendar where userid in(select userid from userinfo where parentid=$departmentid) ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
														}
								        break;

								}								

								$tempi=$page*$dbzz_bianma_pagenum-($dbzz_bianma_pagenum-1);
								}
							}


								switch ($select_class) {
								    case "企业名称":
												if ($clientname<>"")
												{	
													if($parentid==-1)
													$query0 ="SELECT id from calendar where clientname like '%".$clientname."%' ";
													else
													$query0 ="SELECT id from calendar where userid in(select userid from userinfo where parentid=$departmentid) and  clientname like '%".$clientname."%' ";
													}
													else
													{
														if($parentid==-1)
														$query0 ="SELECT id from calendar";
														else
														$query0 ="SELECT id from calendar where userid in(select userid from userinfo where parentid=$departmentid)";
														}
								        break;
								    case "日程标题":
												if ($clientname<>"")
												{	
													if($parentid==-1)
													$query0 ="SELECT id from calendar where rctitle like '%".$clientname."%' ";
													else
													$query0 ="SELECT id from calendar where userid in(select userid from userinfo where parentid=$departmentid) and  rctitle like '%".$clientname."%' ";
													}
													else
													{
														if($parentid==-1)
														$query0 ="SELECT id from calendar ";
														else
														$query0 ="SELECT id from calendar where userid in(select userid from userinfo where parentid=$departmentid) ";
														}
								        break;

								}	
//							echo $gqquery;
//							exit;
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
   if(confirm("确定要删除吗？一旦删除将不能恢复！"))
     return true;
   else
     return false;

}
</script> 

<table  border="0" class="daohang" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;跟进管理->领导查询跟进</td>
  </tr>
</table>

<form name="myform" method="post" action="calendar_manage_ceo_list.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bianmamanage">
  <tr> 
            <td width="10%" height="27" align="center" bgcolor="DBDEF4" class="select_class">
			<select name=select_class size=1 id="select_class" class="crm_select">
                 
                <OPTION value="日程标题"  <?if ($select_class=="日程标题") echo "selected";?>>-跟进标题-</OPTION>
                <OPTION value="企业名称" <?if ($select_class=="企业名称") echo "selected";?>>-企业名称-</OPTION>
              </select></td>
    <td width="36%" bgcolor="DBDEF4" class="select_class"><input name="clientname"  type="text"  value="<?=$clientname;?>" id="clientname" size="20"  maxlength="30">
              &nbsp;
              <input type="submit" name="Submit" class="submit" value="-查找-"></td>
            <td width="26%" bgcolor="DBDEF4" class="select_class">&nbsp;</td>
    <td width="11%" bgcolor="DBDEF4" class="select_class"></td>
    <td width="17%" bgcolor="DBDEF4" class="select_class"></td>
  </tr>
</table>
</form>
<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" class="bianmamanage">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi" colspan="7">&nbsp;跟进信息管理</td>
  </tr>
				<tr bgcolor="#E8E8E8" height=20>
				<td  width=4% align="center"  class="bianmagxh">序号</td>
				<td  width=21%  class="usermanage_1">跟进标题</td>
				<td  width=25%  class="usermanage_1">所属客户</td>
				<td  width=10%  class="usermanage_1">联系人</td>
				<td  width=8%  class="usermanage_1">跟进类型</td>
				<td  width=24%  class="usermanage_1">跟进执行时间</td>
				<td  width=8%  class="bianmacz">所有者</td>
				</tr>


<?
if ($ggallrows==0)
{
	echo "<tr><td align='center' height='25' bgcolor='#FFFFFF' colspan='7'>暂无您要查询的数据！</td></tr>";
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
          $username=trim($arrrow[$i]['username']);
					
				?>
				<tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF">
				<td  width=4% align="center"  style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;"><?=$tempi;?></td>
				<td  width=21%  class="usermanage_2" nowrap><a href="calendar_detail.php?id=<?=$id;?>" target="_blank"><?=$rctitle;?></a></td>
				<td  width=25%  class="usermanage_2"><a href="client_detail.php?id=<?=$clientid;?>" target="_blank" title="查看[<?=$client_name;?>]详细信息！"><?=$client_name;?></a></td>
				<td  width=10%  class="usermanage_2" nowrap><a href="linkman_detail.php?id=<?=$id;?>" target="_blank" title="查看[<?=$linkname;?>]详细信息！"><?=$linkname!=NULL?$linkname:"&nbsp;";?></a></td>
				<td  width=8%  class="usermanage_2"><?=$activitytype!=NULL?$activitytype:"&nbsp;";?></td>
				<td  width=24%  class="usermanage_2"><?=($jhtime!=NULL||$jhm!=NULL)?($jhtime." ".$jhm):"&nbsp;";?></td>
				<td  width=8%  style="padding:1px;height:20px;line-height:20px;border-left:1px solid #D8D8D8;border-bottom:1px solid #D8D8D8;">&nbsp;
					<?=$username;?>
					
					</td>
					</tr>
				<?
					$tempi++;
						
					}	
?>	
				<tr>
				<td  width=100% align="center" bgcolor="#FFFFFF" style="padding:2px;height:22px;line-height:22px;border-bottom:1px solid #e8e8e8;" colspan="7">
	          <?
	$sumrows=$allrows;//总行数
	$pagelistnum=$dbzz_bianma_pagenum;//每页显示数量
	$link="calendar_manage_ceo_list.php?clientname=".rawurlencode($clientname)."&select_class=".rawurlencode($select_class);
	echo getpage($sumrows,$page,$link,$pagelistnum);
	
	?>					
				</td>
 				</tr>
</table>