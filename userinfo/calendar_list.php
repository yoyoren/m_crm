<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$userid=$_SESSION["userdlname"];
//我添加
$id=$_GET['id']+1;
 
					$gqquery ="SELECT *  from calendar where id='".$id."'"; 
				  $queryresult=$obj->exec($gqquery);
				  $ggallrows=$obj->num_rows($queryresult);
				  $arrrow=$obj->fetch($queryresult);
//我添加

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
   if(confirm("确定要删除吗？一旦删除将不能恢复！"))
     return true;
   else
     return false;

}
</script> 

<table  border="0" class="daohang" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;跟进管理->管理我的跟进</td>
  </tr>
</table>

<form name="myform" method="post" action="calendar_manage_list.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">	
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
				<td  width=8%  class="usermanage_1">日程类型</td>
				<td  width=24%  class="usermanage_1">日程执行时间</td>
				<td  width=8%  class="bianmacz">操作</td>
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
					//我添加的
					$yes=trim($arrrow[$i]['yes']);
					$tryDate=trim($arrrow[$i]['tryDate']);
					$plan=trim($arrrow[$i]['plan']);
					//我添加的
					
 
?>

				<tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF">
				<td  width=4% align="center"  style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;"><?=$tempi;?></td>
				<td  width=21%  class="usermanage_2" nowrap><a href="calendar_detail.php?id=<?=$id;?>" target="_blank"><?=$rctitle;?></a></td>
				<td  width=25%  class="usermanage_2"><a href="client_detail.php?id=<?=$id;?>" target="_blank" title="查看[<?=$clientname;?>]详细信息！"><?=$clientname;?></a></td>
				<td  width=10%  class="usermanage_2" nowrap><a href="linkman_detail.php?id=<?=$linknameid;?>" target="_blank" title="查看[<?=$linkname;?>]详细信息！"><?=$linkname;?></a></td>
				<td  width=8%  class="usermanage_2"><?=$activitytype;?></td>
				<td  width=24%  class="usermanage_2"><?=$jhtime." ".$jhm;?></td>
				<td  width=8%  style="padding:1px;height:20px;line-height:20px;border-left:1px solid #D8D8D8;border-bottom:1px solid #D8D8D8;">
					<?
					if ($adduser==trim($_SESSION["userdlname"]) or "admin"==trim($_SESSION["userdlname"])) echo "<a href='calendar_edit_list.php?id=".$id."' title=编辑此数据>编辑</a>
					
					 <a href='calendar_del.php?id=".$id."' onclick='return ConfirmDel();' title='如客户下存在联系人，则不允许删除。'>删除</a>";
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
	$link="calendar_manage_list.php?clientname=".rawurlencode($clientname)."&select_class=".rawurlencode($select_class);
	echo getpage($sumrows,$page,$link,$pagelistnum);
	
	?>					
				</td>
 				</tr>
</table>