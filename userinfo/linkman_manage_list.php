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
								$select_class=chkstring(addslashes(trim(isset($_POST['select_class'])?$_POST['select_class']:"企业名称")));
								switch ($select_class) {
								    case "企业名称":
												if ($clientname<>"")
												{
													$gqquery ="SELECT  *  from linkname where userid='".$userid."' and clientname like '%".$clientname."%' ORDER BY addtime desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													}
													else
													{
														$gqquery ="SELECT  *  from linkname where userid='".$userid."'  ORDER BY addtime desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
														}
								        break;
								    case "联系人":
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
								if ($select_class=="") $select_class="企业名称"; 
								switch ($select_class) {
								    case "企业名称":
												if ($clientname<>"")
												{				  			
								  				$gqquery ="SELECT  *  from linkname WHERE userid='".$userid."' and clientname like '%".$clientname."%'  ORDER BY addtime desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
													}
													else
													{
								  					$gqquery ="SELECT  *  from linkname WHERE userid='".$userid."'  ORDER BY addtime desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
														}
								        break;
								    case "联系人":
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
								    case "企业名称":
												if ($clientname<>"")
												{	
													$query0 ="SELECT id from linkname where clientname like '%".$clientname."%' and  userid='".$userid."'";
													}
													else
													{
														$query0 ="SELECT id from linkname where userid='".$userid."'";
														}
								        break;
								    case "联系人":
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
   if(confirm("确定要删除吗？一旦删除将不能恢复！"))
     return true;
   else
     return false;

}
</script> 

<table  border="0" class="daohang" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;客户资源管理->管理联系人</td>
  </tr>
</table>

<form name="myform" method="post" action="linkman_manage_list.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bianmamanage">
  <tr> 
            <td width="10%" height="27" align="center" bgcolor="DBDEF4" class="select_class">
			<select name=select_class size=1 id="select_class" class="crm_select">
                 
                <OPTION value="企业名称" <?if ($select_class=="企业名称") echo "selected";?>>-企业名称-</OPTION>
                <OPTION value="联系人" <?if ($select_class=="联系人") echo "selected";?>>-联系人-</OPTION>
              </select></td>
    <td width="36%" bgcolor="DBDEF4" class="select_class"><input name="clientname"  value="<?=$clientname;?>" type="text"  id="clientname" size="20"  maxlength="30">
              &nbsp;
              <input type="submit" name="Submit" class="submit" value="-查找企业-"></td>
            <td width="26%" bgcolor="DBDEF4" class="select_class">&nbsp;</td>
    <td width="11%" bgcolor="DBDEF4" class="select_class"></td>
    <td width="17%" bgcolor="DBDEF4" class="select_class"></td>
  </tr>
</table>
</form>
<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" class="bianmamanage">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi" colspan="7">&nbsp;联系人信息管理</td>
  </tr>
				<tr bgcolor="#E8E8E8" height=20>
				<td  width=4% align="center"  class="bianmagxh">序号</td>
				<td  width=11%  class="usermanage_1">联系人</td>
				<td  width=25%  class="usermanage_1">企业名称</td>
				<td  width=10%  class="usermanage_1">职务</td>
				<td  width=8%  class="usermanage_1">部门</td>
				<td  width=34%  class="usermanage_1">固话/宅电/手机</td>
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
				<td  width=11%  class="usermanage_2" nowrap><a href="linkman_detail.php?id=<?=$id;?>" target="_blank" title="查看[<?=$name;?>]详细信息！"><?=$name.$sex;?></a></td>
				<td  width=25%  class="usermanage_2"><a href="client_detail.php?id=<?=$clientid;?>" target="_blank" title="查看[<?=$client_name;?>]详细信息！"><?=$client_name!=NULL?$client_name:"&nbsp;";?></a></td>
				<td  width=10%  class="usermanage_2" nowrap><?=$zhiwu!=NULL?$zhiwu:"&nbsp;";?></td>
				<td  width=8%  class="usermanage_2"><?=$department!=NULL?$department:"&nbsp;";?></td>
				<td  width=34%  class="usermanage_2"><?=($officetel!=NULL?$officetel:"&nbsp;")."/".$hometel."/".($mobile!=NULL?$mobile:"&nbsp;");?></td>
		  <td  width=8%  style="padding:1px;height:20px;line-height:20px;border-left:1px solid #D8D8D8;border-bottom:1px solid #D8D8D8;">
					<?
					if ($adduser==trim($_SESSION["userdlname"]) or "admin"==trim($_SESSION["userdlname"])) echo "<a href='linkman_edit_list.php?id=".$id."' title=编辑此数据>编辑</a> 
					<!--删除禁用-->
					<!--<a href='linkman_del.php?id=".$id."' onclick='return ConfirmDel();' title='如客户下存在联系人，则不允许删除。'>删除</a>-->";
					else echo "<font color='BCBCBC' title='非管理员不能对编码进行任何操作！'>编辑 删除</font>";
					?>					</td>
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
	$link="linkman_manage_list.php?clientname=".rawurlencode($clientname)."&select_class=".rawurlencode($select_class);
	echo getpage($sumrows,$page,$link,$pagelistnum);
	
	?>				</td>
 				</tr>
</table>
