<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$chancename=chkstring(addslashes(trim($_POST['chancename'])));
$userid=$_SESSION["userdlname"];
//modify
$departmentid=$_SESSION["departmentid"];
$parentid=$_SESSION["parentid"];
						$tempi=1;
						if(empty($_REQUEST['page'])) 
						{ 
								$page = 1; 
								$nowpage=0;
								$chancename=chkstring(addslashes(trim($_POST['chancename'])));
								$select_class=chkstring(addslashes(trim($_POST['select_class'])));
								if ($select_class=="") $select_class="��ҵ����"; 
								switch ($select_class) {
								    case "��ҵ����":
												if ($chancename<>"")
												{
													$gqquery ="SELECT  *  from meddic where  chancename like '%".$chancename."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													}
													else
													{
														$gqquery ="SELECT  *  from meddic   ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
														}
								        break;
								    case "�ճ̱���":
												if ($chancename<>"")
												{
													$gqquery ="SELECT  *  from meddic where rctitle like '%".$chancename."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
													}
													else
													{
														$gqquery ="SELECT  *  from meddic  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
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
								$chancename=chkstring(addslashes(trim($_GET['chancename'])));
								$select_class=chkstring(addslashes(trim($_GET['select_class'])));
								if ($select_class=="") $select_class="��ҵ����"; 
								switch ($select_class) {
								    case "��ҵ����":
												if ($chancename<>"")
												{				  			
								  				$gqquery ="SELECT  *  from meddic WHERE  chancename like '%".$chancename."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
													}
													else
													{
								  					$gqquery ="SELECT  *  from meddic  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
														}
								        break;
								    case "�ճ̱���":
												if ($chancename<>"")
												{				  			
								  				$gqquery ="SELECT  *  from meddic WHERE rctitle like '%".$chancename."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
													}
													else
													{
								  					$gqquery ="SELECT  *  from meddic ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
														}
								        break;

								}								

								$tempi=$page*$dbzz_bianma_pagenum-($dbzz_bianma_pagenum-1);
								}
							}


								switch ($select_class) {
								    case "��ҵ����":
												if ($chancename<>"")
												{	
													$query0 ="SELECT id from meddic where chancename like '%".$chancename."%'";
													}
													else
													{
														$query0 ="SELECT id from meddic ";
														}
								        break;
								    case "�ճ̱���":
												if ($chancename<>"")
												{	
													$query0 ="SELECT id from meddic where rctitle like '%".$chancename."%'";
													}
													else
													{
														$query0 ="SELECT id from meddic";
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
   if(confirm("ȷ��Ҫɾ����һ��ɾ�������ָܻ���"))
     return true;
   else
     return false;

}
</script> 

<table  border="0" class="daohang" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;MEDDIC����->�쵼�����������</td>
  </tr>
</table>

<form name="myform" method="post" action="meddic_manage_list.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bianmamanage">
  <tr> 
            <td width="10%" height="27" align="center" bgcolor="DBDEF4" class="select_class">���ۼ�¼����
 </td>
    <td width="36%" bgcolor="DBDEF4" class="select_class"><input name="chancename"  type="text"  value="<?=$chancename;?>" id="chancename" size="20"  maxlength="30">
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
    <td bgcolor="#EBEBEB" class="tishi" colspan="10">&nbsp;MEDDIC��Ϣ����</td>
  </tr>
				<tr bgcolor="#E8E8E8" height=20>
				<td  width=4% align="center"  class="bianmagxh">���</td>
				<td  width=2%  class="usermanage_1">���ۼ�¼����</td>
				<td  width=7%  class="usermanage_1" title="������������Ч�桢Ͷ������ȣ���ѡ��Ͷ��Ϊ1ʱ�Ĳ����ȣ�������Խ��˵���Կͻ�Խ������"> Metrics </td>
				<td  width=7%  class="usermanage_1" title="�ʽ�����ˣ���ѡ�����ʽ�����˹�ϵ�� ">Economic</td>
				<td  width=7%  class="usermanage_1" title="�˽�ͻ���׼�ľ������̣������Ƿ��˽�ͻ�����֯�ṹ��ϵ���ܻ�����֯�ṹ��ϵͼ��">Criteria</td>
				<td  width=7%  class="usermanage_1" title="���λ����������ʵʩ����������">Process</td>
				<td  width=7%  class="bianmacz" title="���ͻ�ȷ�ϵĿͻ�ʹ�����˽�ͻ�ʹ���������Խ���ͻ�ʹ���ٷֱȣ�">Pain</td>
				<td  width=24%  class="bianmacz" title="����֯����Ȩ������Ӱ������Ը��Ϊ�����۵��ˣ������ӵ���ߣ��ͻ��ڲ�֧�������">Champions</td>
				<td  width=7%  class="bianmacz">�ɹ���</td>
				<td  width=10%  class="bianmacz">����</td>
				</tr>


<?
if ($ggallrows==0)
{
	echo "<tr><td align='center' height='25' bgcolor='#FFFFFF' colspan='10'>������Ҫ��ѯ�����ݣ�</td></tr>";
	}


				for ($i=0;$i<$ggallrows;$i++)	
				{
					$id=trim($arrrow[$i]['id']);
					$adduser=trim($arrrow[$i]['userid']);
					$client_name=trim($arrrow[$i]['chancename']);
					$chanceid=trim($arrrow[$i]['chanceid']);
					$metrics=trim($arrrow[$i]['metrics']);
					$economic=trim($arrrow[$i]['economic']);
					$criteria=trim($arrrow[$i]['criteria']);
 					$process=trim($arrrow[$i]['process']);
          $pain=trim($arrrow[$i]['pain']);
          $champions=trim($arrrow[$i]['champions']);
          if ($champions==30) $strcam="�ܲ�(CEO/C*O)";
          if ($champions==20) $strcam="����/�ܹ�/�����ܼ��";
          if ($champions==10) $strcam="���ż�����";
          if ($champions==1) $strcam="��ְͨԱ";
          $championszt=trim($arrrow[$i]['championszt']);
          $str_cham=$champions+$championszt;
          $str_success=$metrics+$economic+$criteria+$process+$pain+$str_cham;
          if ($str_success<=0) $str_success="û����";
          else
					$str_success=$str_success."%����";
				?>
				<tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF">
				<td  width=4% align="center"  style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;"><?=$tempi;?></td>
				<td  width=20%  class="usermanage_2" nowrap><a href="meddic_detail.php?id=<?=$id;?>" target="_self"><?=$client_name;?></a></td>
				<td  width=7%  class="usermanage_2"> <?=$metrics;?>�� </td>
				<td  width=7%  class="usermanage_2" nowrap> <?=$economic;?>�� </td>
				<td  width=7%  class="usermanage_2"><?=$criteria;?>��</td>
				<td  width=7%  class="usermanage_2"><?=$process;?>��</td>
				<td  width=7%  class="usermanage_2"><?=$pain;?>��</td>
				<td  width=24%  class="usermanage_2"><?=$strcam." ".$str_cham;?>��</td>
				<td  width=7%  class="usermanage_2"><font color=red><?=$str_success;?></font></td>
				<td  width=10%  style="padding:1px;height:20px;line-height:20px;border-left:1px solid #D8D8D8;border-bottom:1px solid #D8D8D8;">	
					<?
					if ($adduser==trim($_SESSION["userdlname"]) or "admin"==trim($_SESSION["userdlname"])) echo "  <a href='meddic_del.php?id=".$id."' onclick='return ConfirmDel();' title='��ͻ��´�����ϵ�ˣ�������ɾ����'>ɾ��</a>";
					else echo "<font color='BCBCBC' title='�ǹ���Ա���ܶԱ�������κβ�����'>�鿴 ɾ��</font>";
					?>					
					</td>
					</tr>
				<?
					$tempi++;
						
					}	
?>	
				<tr>
				<td  width=100% align="center" bgcolor="#FFFFFF" style="padding:2px;height:22px;line-height:22px;border-bottom:1px solid #e8e8e8;" colspan="10">
	          <?
	$sumrows=$allrows;//������
	$pagelistnum=$dbzz_bianma_pagenum;//ÿҳ��ʾ����
	$link="meddic_manage_ceo_list.php?chancename=".rawurlencode($chancename)."&select_class=".rawurlencode($select_class);
	echo getpage($sumrows,$page,$link,$pagelistnum);
	
	?>					
				</td>
 				</tr>
</table>