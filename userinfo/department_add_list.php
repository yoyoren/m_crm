<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/inputstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/lefttoggler.js"></script>
<script language="javascript">
<!--
function FormCheck() 
{

  if (myform.departmentname.value=="")
  {
    alert("������д�������ƣ�");
    document.myform.departmentname.focus();
    return false;
  }
}


function ConfirmDel()
{
   if(confirm("ȷ��Ҫɾ����һ��ɾ�������ָܻ���"))
     return true;
   else
     return false;

}


//-->
</script>

<table  border="0" class="daohang" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;��������->���Ź���</td>
  </tr>
</table>
<br>

<? if ("admin"==trim($_SESSION["userdlname"])) { ?>
<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" class="inputtable">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi">&nbsp;���Ӳ���</td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" height="30" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
      <form name="myform" method="post" action="department_addto.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr> 
            <td   style="text-align:right;height:25px;line-height:25px;padding:2px;width:15%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;">�������ƣ�</td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:45%;border-bottom:1px solid #e8e8e8;border-right:1px solid #e8e8e8;"><input name="departmentname" type="text" id="departmentname" size="20" maxlength="30"> 
              <input type="submit" name="Submit" class="submit" value="-����-"></td>
            <td   style="text-align:left;height:25px;line-height:25px;padding:2px;width:40%;border-bottom:1px solid #e8e8e8;">ע��ȫ��Ϊ��Ƿ���</td>
          </tr>
          <tr align="left"> 
            <td colspan="3"   style="text-align:left;height:25px;line-height:25px;padding:2px;width:15%;border-bottom:1px solid #e8e8e8;"> 
              <strong>˵����</strong><br>
              1���������Ʊ�����д��&nbsp;&nbsp;&nbsp;&nbsp; </td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
<? }?>
<br>
<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" class="inputtable">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi" colspan="4">&nbsp;���Ź���</td>
  </tr>
				<tr bgcolor="#E8E8E8" height=20>
				<td  width=5% align="center"  style="padding:2px;height:20px;line-height:20px;border-bottom:1px solid #e2e2e2;">���</td>
				
    <td  width=20%  style="padding:2px;height:20px;line-height:20px;border-left:1px solid #e2e2e2;border-bottom:1px solid #e2e2e2;">���ű���</td>
				<td  width=60%  style="padding:2px;height:20px;line-height:20px;border-left:1px solid #e2e2e2;border-bottom:1px solid #e2e2e2;">��������</td>
				<td  width=15%   style="padding:2px;height:20px;line-height:20px;border-left:1px solid #e2e2e2;border-bottom:1px solid #e2e2e2;">����</td>
				</tr>


<?

						$tempi=1;
						if(empty($_REQUEST['page'])) 
						{ 
								$page = 1; 
								$nowpage=0;
								$gqquery ="SELECT *  FROM department ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_class_pagenum"; 

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
								$nowpage=($page-1)*$dbzz_class_pagenum;
				  			$gqquery ="SELECT *  FROM department  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_class_pagenum";
								$tempi=$page*$dbzz_class_pagenum-($dbzz_class_pagenum-1);
								}
							}
					
	  			$query0 ="SELECT id FROM department";
	  			$totalresult=$obj->exec($query0);
				  $allrows=$obj->num_rows($totalresult);


				  $queryresult=$obj->exec($gqquery);
				  $ggallrows=$obj->num_rows($queryresult);
				  $arrrow=$obj->fetch($queryresult);	
					
				for ($i=0;$i<$ggallrows;$i++)	
				{
					$id=trim($arrrow[$i]['id']);
				$departmentname=trim($arrrow[$i]['departmentname']);
				$departmentid=trim($arrrow[$i]['departmentid']);
				?>
				<tr>
				<td  width=5% align="center" bgcolor="#FFFFFF" style="padding:2px;height:21px;line-height:21px;border-bottom:1px solid #e8e8e8;"><?=$tempi;?></td>
				<td  width=20%  bgcolor="#FFFFFF" style="padding:2px;height:20px;line-height:20px;border-left:1px solid #e8e8e8;border-bottom:1px solid #e8e8e8;"><?=$departmentid;?></td>
				<td bgcolor="#FFFFFF"  width=60% style="padding:2px;height:21px;line-height:21px;border-left:1px solid #e8e8e8;border-bottom:1px solid #e8e8e8;"><?=$departmentname;?></td>
				<td bgcolor="#FFFFFF"  width=15% style="padding:2px;height:21px;line-height:21px;border-left:1px solid #e8e8e8;border-bottom:1px solid #e8e8e8;">
					<?
					if (0==trim($_SESSION["departmentid"])) echo "<a href='department_del.php?id=".$departmentid."'  onclick='return ConfirmDel();'>ɾ��</a>";
					else echo "<font color='BCBCBC' title='�ǹ���Ա���ܲ�����'>ɾ��</font>";
					?>				

				
				</td>
				</tr>
				<?
					
					$tempi++;	
					}	
?>	
				<tr>
				<td  width=100% align="center" bgcolor="#FFFFFF" style="padding:2px;height:22px;line-height:22px;border-bottom:1px solid #e8e8e8;" colspan="4">
	          <?
	$sumrows=$allrows;//������
	$pagelistnum=$dbzz_class_pagenum;//ÿҳ��ʾ����
	$link="department_add_list.php?class=".$queryclass;
	echo getpage($sumrows,$page,$link,$pagelistnum);
	
	?>					
				</td>
 				</tr>
</table>