<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');

$userid=$_SESSION["userdlname"];	
function nyye($jylx)
{
         switch($jylx)
          {
           case 1://seconds
               echo "����1����";
               break;

           case 2://minutes
               echo "1����-5����";
               break;

           case 3://minutes
               echo "5����-1ǧ��";
               break;

           case 4://minutes
               echo "1ǧ��-3ǧ��";
               break;

           case 5://minutes
               echo "3ǧ��-5ǧ��";
               break;

           case 6://minutes
               echo "5ǧ��-1����";
               break;
           case 7://minutes
               echo "1����-5����";
               break;
           case 8://minutes
               echo "5����-10����";
               break;
           case 9://minutes
               echo "10����-50����";
               break;
           case 10://minutes
               echo "100��������";
               break;      
           default:
           	   echo "δ��д";
           	   break;         
         }	
	}

?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/inputstyle.css" rel="stylesheet" type="text/css" />
<title>��ѡ�������̻�</title>
<SCRIPT   LANGUAGE="JavaScript">   
  <!--   
  function  CloseSelf(itemname,address,postcode,clientid){  
// alert  (itemname);

    window.opener.document.myform.chancename.value=itemname; 
 
    window.opener.document.myform.chanceid.value=clientid;
  
    window.close();   
  }   
  //-->   
</SCRIPT>	
<form name="myform" method="post" action="chance_select_meddic.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="select_client">
  <tr> 
    <td width="14%" height="27" align="center" bgcolor="DBDEF4" class="select_class">�̻����� 
    </td>
    <td width="41%" bgcolor="DBDEF4" class="select_class"><input name="itemname"  type="text"  id="itemname" size="20"  maxlength="30">
      &nbsp;</td>
    <td width="17%" bgcolor="DBDEF4" class="select_class"><input type="submit" name="Submit" class="submit" value="-����-"></td>
    <td width="11%" bgcolor="DBDEF4" class="select_class"></td>
    <td width="17%" bgcolor="DBDEF4" class="select_class"></td>
  </tr>
</table>
</form>
<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" class="select_client">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi" colspan="7">�̻���Ϣѡ��</td>

<?
						$tempi=1;
						if(empty($_REQUEST['page'])) 
						{ 
								$page = 1; 
								$nowpage=0;
								$itemname=chkstring(addslashes(trim($_POST['itemname'])));
//								$gqquery ="SELECT  *  from chance ORDER BY classcode desc,code";
								if ($itemname<>"")
								{
									$gqquery ="SELECT  *  from chance where userid='".$userid."' and itemname like '%".$itemname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";
									}
									else
									{
										$gqquery ="SELECT  *  from chance where userid='".$userid."'  ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
										}
								 

							}
							else 
							{ 
								$page = $_REQUEST['page']; 
								$itemname=chkstring(addslashes(trim($_GET['itemname'])));
							if($page<=0) 
								{ 
								$page = 1; 
								$nowpage=0;
								}else 
								{ 
								$nowpage=($page-1)*$dbzz_bianma_pagenum;
//				  			$gqquery ="SELECT  *  from chance WHERE id NOT IN (SELECT TOP ".$nowpage." id from chance ORDER BY classcode desc,code) ORDER BY classcode desc,code";  
								if ($itemname<>"")
								{				  			
				  				$gqquery ="SELECT  *  from chance WHERE userid='".$userid."' and itemname like '%".$itemname."%' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum"; 
									}
									else
									{
				  					$gqquery ="SELECT  *  from chance WHERE userid='".$userid."' ORDER BY id desc LIMIT ".$nowpage.","."$dbzz_bianma_pagenum";  
										}
								$tempi=$page*$dbzz_bianma_pagenum-($dbzz_bianma_pagenum-1);
								}
							}
							
					if ($itemname<>"")
					{	
						$query0 ="SELECT id from chance where itemname like '%".$itemname."%'";
						}
						else
						{
							$query0 ="SELECT id from chance";
							}
	  			$totalresult=$obj->exec($query0);
				  $allrows=$obj->num_rows($totalresult);


				  $queryresult=$obj->exec($gqquery);
				  $ggallrows=$obj->num_rows($queryresult);
				  $arrrow=$obj->fetch($queryresult);	

				for ($i=0;$i<$ggallrows;$i++)	
				{
					$id=trim($arrrow[$i]['id']);
					$itemnames=trim($arrrow[$i]['itemname']);
					$clientname=trim($arrrow[$i]['clientname']);

					$yye=trim($arrrow[$i]['yye']);
					$ygrs=trim($arrrow[$i]['ygrs'])."<font color=999999>������</font>";
					$tel=trim($arrrow[$i]['tel']);
					$telcountrycode=trim($arrrow[$i]['telcountrycode']);
					$telareacode=trim($arrrow[$i]['telareacode']);
					$faxcountrycode=trim($arrrow[$i]['faxcountrycode']);
					$faxareacode=trim($arrrow[$i]['faxareacode']);
					$fax=trim($arrrow[$i]['fax']);
					$address=trim($arrrow[$i]['address']);
					$postcode=trim($arrrow[$i]['postcode']);
					$str_tel="<font color=#2B3580>Tel:".$telcountrycode."-".$telareacode."-".$tel."</font>";
					$str_fax=" Fax:".$faxcountrycode."-".$faxareacode."-".$fax;
					
				?>
				<tr onMouseOver="this.bgColor = '<?=$overbackcolor;?>'" onMouseOut="this.bgColor = 'FFFFFF'" bgcolor="#FFFFFF">
		
				<td  width=61%   style="padding:1px;height:20px;line-height:20px;border-bottom:1px solid #D8D8D8;" nowrap >
<SCRIPT   LANGUAGE="JavaScript">   
  <!--   
//	var itemname=;
	var itemname<?=$id;?>=new String('<?=$itemnames;?>'); 
	var address<?=$id;?>=new String('<?=$address;?>'); 
	var postcode<?=$id;?>=new String('<?=$postcode;?>'); 
  var clientid<?=$id;?>=new String('<?=$id;?>'); 
  //-->   
</SCRIPT>						
						
					<a href="" id="td<?=$id;?>"  onclick="CloseSelf(itemname<?=$id;?>,address<?=$id;?>,postcode<?=$id;?>,clientid<?=$id;?>);"><?=$itemnames;?></a></td>
				<td  width=31%  class="usermanage_2"><?=$clientname;?></td>
				<td  width=8%  class="usermanage_2"><a href="" id="td<?=$id;?>"  onclick="CloseSelf(itemname<?=$id;?>,address<?=$id;?>,postcode<?=$id;?>,clientid<?=$id;?>);">ѡ��</a></td>

					</tr>
				<?
					$tempi++;
						
					}	
?>	
				<tr>
				<td  width=100% align="center" bgcolor="#FFFFFF" style="padding:2px;height:22px;line-height:22px;border-bottom:1px solid #e8e8e8;" colspan="9">
	          <?
	$sumrows=$allrows;//������
	$pagelistnum=$dbzz_bianma_pagenum;//ÿҳ��ʾ����
	$link="chance_select_meddic.php?itemname=".$itemname;
	echo getpage($sumrows,$page,$link,$pagelistnum);
	
	?>					
				</td>
 				</tr>
</table>
