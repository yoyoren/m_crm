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
								$select_class=chkstring(addslashes(trim(isset($_POST['select_class'])?$_POST['select_class']:"企业名称")));
								switch ($select_class) {
								    case "企业名称":
												if ($clientname<>"")
												{
													$gqquery ="SELECT  *  from chance where userid='".$userid."' and clientname like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													}
													else
													{
														$gqquery ="SELECT  *  from chance where userid='".$userid."'  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
														}
								        break;
										case "销售可能性":
													$gqquery ="SELECT  *  from chance where cast(substring_index(possibility,'%',1) as signed)>=".$start1." and cast(substring_index(possibility,'%',1) as signed)<=".$end1." and userid='".$userid."' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													break;
								    case "交易方式":
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
								if ($select_class=="") $select_class="企业名称"; 
								switch ($select_class) {
								    case "企业名称":
												if ($clientname<>"")
												{				  			
								  				$gqquery ="SELECT  *  from chance WHERE userid='".$userid."' and clientname like '%".$clientname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
													}
													else
													{
								  					$gqquery ="SELECT  *  from chance WHERE userid='".$userid."' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
														}
								        break;
										
										case "销售可能性":
													$gqquery ="SELECT  *  from chance where cast(substring_index(possibility,'%',1) as signed)>=".$start1." and cast(substring_index(possibility,'%',1) as signed)<=".$end1." and userid='".$userid."' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													break;
								    case "交易方式":
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
								    case "企业名称":
												if ($clientname<>"")
												{	
													$query0 ="SELECT * from chance where clientname like '%".$clientname."%' and  userid='".$userid."'";
													}
													else
													{
														$query0 ="SELECT * from chance where userid='".$userid."'";
														}
								        break;
										
										case "销售可能性":
													$query0 ="SELECT  *  from chance where cast(substring_index(possibility,'%',1) as signed)>=".$start1." and cast(substring_index(possibility,'%',1) as signed)<=".$end1." and userid='".$userid."' ORDER BY id desc";
													break;
								    case "交易方式":
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
				  $_SESSION["chancetop"]=array("序号","缔结交易方式","企业名称","估计金额","销售可能性","联系人");
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
	if(a=="企业名称")
	{
		document.getElementById("byclient").style.display="block";
		document.getElementById("possibility").style.display="none";
		document.getElementById("bytrade").style.display="none";
	}
	if(a=="销售可能性")
	{
		document.getElementById("byclient").style.display="none";
		document.getElementById("bytrade").style.display="none";
		document.getElementById("possibility").style.display="block";
	}
	if(a=="交易方式")
	{
		document.getElementById("byclient").style.display="none";
		document.getElementById("bytrade").style.display="block";
		document.getElementById("possibility").style.display="none";
	}
}
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
    <td>&nbsp;客户资源管理->管理销售</td>
	<td align="right">
	<a href="export_excel.php"style="text-decoration: none">导出数据</a>&nbsp;
	</td>
  </tr>
</table>
<form name="myform" method="post" action="chance_manage_list.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bianmamanage">
  <tr> 
            <td width="10%" height="27" align="center" bgcolor="DBDEF4" class="select_class">
			<select name="select_class" size=1 id="select_class" class="crm_select" onchange="hidetd(this.value);">
                 
                <OPTION value="企业名称">-企业名称-</OPTION>
                <OPTION value="交易方式">-交易方式-</OPTION>
				<OPTION value="销售可能性">-销售可能性-</OPTION>
              </select></td>
    <td width="36%" bgcolor="DBDEF4" class="select_class">
		<div id="byclient">请输入企业名称：<input name="clientname"  type="text"  id="clientname" size="20"  maxlength="30"></div>
		<div id="bytrade" style="display:none;">请输入交易名称：<input name="tradename"  type="text"  id="tradename" size="20"  maxlength="30"></div>
	    <div id="possibility" style="display:none;">成功可能性从：
	 	<select name="start1" size=1 class="crm_select"> 
				<OPTION value="0" >-请选择可能性-</OPTION>
                <OPTION value="10" >-10% 种子期-</OPTION>
                <OPTION value="25" >-25% 萌芽期-</OPTION>
				<OPTION value="50">-50% 催熟期-</OPTION>
				<OPTION value="75">-75% 成熟期-</OPTION>
                <OPTION value="90">-90% 摘果期-</OPTION>
				<OPTION value="100" >-100% 深耕期-</OPTION>
        </select>
		&nbsp;到：&nbsp;
		<select name="end1" size=1 class="crm_select"> 
                <OPTION value="0">-请选择可能性-</OPTION>
                <OPTION value="10" >-10% 种子期-</OPTION>
                <OPTION value="25">-25% 萌芽期-</OPTION>
				<OPTION value="50" >-50% 催熟期-</OPTION>
				<OPTION value="75" >-75% 成熟期-</OPTION>
                <OPTION value="90">-90% 摘果期-</OPTION>
				<OPTION value="100">-100% 深耕期-</OPTION>
        </select>
		</div>
	 </td>
              <td><input type="submit" class="submit" value="-查找-"></td>
            <td width="26%" bgcolor="DBDEF4" class="select_class">&nbsp;</td>
    <td width="11%" bgcolor="DBDEF4" class="select_class"></td>
    <td width="17%" bgcolor="DBDEF4" class="select_class"></td>
  </tr>
</table>
</form>
<table border="0" align="center" cellpadding="0" id="chancetable" cellspacing="0" bgcolor="#CCCCCC" class="bianmamanage">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi" colspan="7">&nbsp;销售信息管理</td>
  </tr>
				<tr bgcolor="#E8E8E8" height=20>
				<td  width=4% align="center"  class="bianmagxh">序号</td>
				<td  width=21%  class="usermanage_1">缔结交易方式</td>
				<td  width=25%  class="usermanage_1">企业名称</td>
				<td  width=10%  class="usermanage_1">联系人</td>
				<td  width=8%  class="usermanage_1">估计金额</td>
				<td  width=24%  class="usermanage_1">销售可能性</td>
				<td  width=8%  class="bianmacz">操作</td>
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
				<td  width=25%  class="usermanage_2"><a href="client_detail.php?id=<?=$clientid;?>" target="_blank" title="查看[<?=$client_name;?>]详细信息！"><?=$client_name;?></a></td>
				<td  width=10%  class="usermanage_2" nowrap><a href="linkman_detail.php?id=<?=$linknameid;?>" target="_blank" title="查看[<?=$linkname;?>]详细信息！"><?=$linkname!=NULL?$linkname:"&nbsp;";?></a></td>
				<td  width=8%  class="usermanage_2"><?=$itemmoney!=NULL?$itemmoney:"&nbsp;";?></td>
				<td  width=24%  class="usermanage_2"><?=$possibility!=NULL?$possibility:"&nbsp;";?></td>
				<td  width=8%  style="padding:1px;height:20px;line-height:20px;border-left:1px solid #D8D8D8;border-bottom:1px solid #D8D8D8;">
					<?
					if ($adduser==trim($_SESSION["userdlname"]) or "admin"==trim($_SESSION["userdlname"])) echo "<a href='chance_edit_list.php?id=".$id."' title=编辑此数据>编辑</a> <a href='chance_del.php?id=".$id."' onclick='return ConfirmDel();' title='如客户下存在联系人，则不允许删除。'>删除</a>";
					else echo "<font color='BCBCBC' title='非管理员不能对编码进行任何操作！'>编辑 删除</font>";
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
	$sumrows=$allrows;//总行数
	$pagelistnum=$dbzz_bianma_pagenum;//每页显示数量
	//$link="chance_manage_list.php?clientname=".rawurlencode($clientname)."&select_class=".rawurlencode($select_class);
	$link="chance_manage_list.php?clientname=".rawurlencode($clientname)."&tradename=".rawurlencode($tradename)."&select_class=".rawurlencode($select_class)."&start1=".rawurlencode($start1)."&end1=".rawurlencode($end1);
	echo getpage($sumrows,$page,$link,$pagelistnum);
	
	?>					
				</td>
 				</tr>
</table>