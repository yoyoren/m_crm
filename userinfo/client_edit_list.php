<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$id=$_GET['id'];

	$sql="select * from client where id='".$id."'";
//	echo $sql;
	$rs=$obj->fetchrow($sql);
	$id=trim($rs->id);
	$clientname=trim($rs->clientname);
	$clientlevel=trim($rs->clientlevel);
	$address=trim($rs->address);
	$web=trim($rs->web);
	$type=trim($rs->type);
	$calling=trim($rs->calling);
	$suoyq=trim($rs->suoyq);
	$ygrs=trim($rs->ygrs);
	$yye=trim($rs->yye);
	$sheng=trim($rs->sheng);
	$chinacomcity=trim($rs->chinacomcity);
	$telcountrycode=trim($rs->telcountrycode);
	$telareacode=trim($rs->telareacode);
	$tel=trim($rs->tel);
	$faxcountrycode=trim($rs->faxcountrycode);
	$faxareacode=trim($rs->faxareacode);
	$fax=trim($rs->fax);
	$remark=trim($rs->remark);
	$postcode=trim($rs->postcode);
	
	//��ӿ�ʼ
	$bumen1=trim($rs->bumen1);
	$addr1=trim($rs->addr1);
	//��ӽ���
	if ($clientname=="")
	{
			echo "<script language=javascript>alert('�ͻ����ݴ���3');document.location.href=('client_manage.php');</script>";
			exit;			
		}

?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/inputstyle.css" rel="stylesheet" type="text/css" /> 
<script language="javascript">
<!--
function FormCheck() 
{

  if (myform.clientname.value=="")
  {
    alert("�ͻ����Ʋ���Ϊ�գ�");
    document.myform.clientname.focus();
    return false;
  }
  if (myform.hangy.value=="")
  {
    alert("��ѡ��ͻ�������ҵ");
    document.myform.hangy.focus();
    return false;
  }  
 
  if (myform.sheng.value=="")
  {
    alert("����ѡ��ͻ�����ʡ��");
    document.myform.sheng.focus();
    return false;
  }  
  
  if (myform.yuangrs.value=="")
  {
    alert("����ѡ��Ա��������");
    document.myform.yuangrs.focus();
    return false;
  } 
    
  if (myform.tel.value=="")
  {
    alert("������д�ͻ��̶��绰���룡");
    document.myform.tel.focus();
    return false;
  }    

  if (myform.yye.value=="")
  {
    alert("������дӪҵ�");
    document.myform.yye.focus();
    return false;
  } 	
 
  if (myform.address.value=="")
  {
    alert("������д�ͻ���ϸ��ַ��");
    document.myform.address.focus();
    return false;
  }         
 
 
    
  return true;  
}



function textLimitCheck(thisArea, maxLength)
{
    if (thisArea.value.length > maxLength)
	{
      alert(maxLength + ' ��������. \r�����Ľ��Զ�ȥ��.');
      thisArea.value = thisArea.value.substring(0, maxLength);
      thisArea.focus();
    }
    /*��дspan��ֵ����ǰ��д���ֵ�����*/
   
  }


//-->
</script>

<table  border="0" class="daohang" cellspacing="0" cellpadding="0">
  <tr>
          <td>&nbsp;�ͻ���Դ����->�༭�ͻ�</td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC"  class="bianmamanage" style="padding:0px;">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi">&nbsp;�޸Ŀͻ�(<font color="#FF0000">*����д</font>)</td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" height="30" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
	<form name="myform" method="post" action="client_editto.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">
	    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr> 
            <td   class="crm_td">sales name��</td>
            <td   class="crm_input"><input name="userid" type="text" value="<?=$_SESSION["userdlname"];?>" id="userid" size="20" maxlength="30" readonly></td>
            <td align="right"   class="crm_td">�ȼ���</td>
            <td   class="crm_tdright"> 
              <select name=dengji size=1 id="dengji" class="crm_select">
                <OPTION value="��" <?if ($clientlevel=="��") echo"selected";?>>-��-</OPTION>
                <OPTION value="�ѻ��" <?if ($clientlevel=="�ѻ��") echo"selected";?>>-�ѻ��-</OPTION>
                <OPTION value="��Ч��" <?if ($clientlevel=="��Ч��") echo"selected";?>>-��Ч��-</OPTION>
                <OPTION value="�г�ʧ��" <?if ($clientlevel=="�г�ʧ��") echo"selected";?>>-�г�ʧ��-</OPTION>
                <OPTION value="��Ŀȡ��" <?if ($clientlevel=="��Ŀȡ��") echo"selected";?>>-��Ŀȡ��-</OPTION>
                <OPTION value="�ر�" <?if ($clientlevel=="�ر�") echo"selected";?>>-�ر�-</OPTION>
              </select></td>
          </tr>
          <tr> 
            <td width="15%"   class="crm_td"> 
              <font color="#FF0000">*</font>�ͻ����ƣ�</td>
            <td width="45%"   class="crm_input"> 
              <input name="clientname" type="text" value="<?=$clientname;?>" id="clientname" size="30" maxlength="40" > 
            </td>
            <td width="40%" align="right"   class="crm_td">�ͻ���Դ��</td>
            <td width="40%"   class="crm_tdright"> 
              <select name=kehlx size=1 id="kehlx" class="crm_select">
                <OPTION value="��" <?if ($type=="��") echo"selected";?>>-��-</OPTION>
                <OPTION value="ת����" <?if ($type=="ת����") echo"selected";?>>-ת����-</OPTION>
                <OPTION value="cold call" <?if ($type=="cold call") echo"selected";?>>-cold call-</OPTION>
                <OPTION value="İ���ݷ�" <?if ($type=="İ���ݷ�") echo"selected";?>>-İ���ݷ�-</OPTION>
                <OPTION value="�г��" <?if ($type=="�г��") echo"selected";?>>-�г��-</OPTION>
                <OPTION value="����" <?if ($type=="����") echo"selected";?>>-����-</OPTION>
           
                <OPTION value="����" <?if ($type=="����") echo"selected";?>>-����-</OPTION>
              </select> </tr>
          <tr> 
            <td   class="crm_td">����Ȩ��</td>
            <td   class="crm_input"> 
              <select name=suoyq size=1 id="suoyq" class="crm_select">
                <OPTION value="��" <?if ($suoyq=="��") echo"selected";?>>-��-</OPTION>
                <OPTION value="˽��" <?if ($suoyq=="˽��") echo"selected";?>>-˽��-</OPTION>
                <OPTION value="����" <?if ($suoyq=="����") echo"selected";?>>-����-</OPTION>
              </select> </td>
            <td align="right"   class="crm_td"><font color="#FF0000">*</font>��ҵ���ʣ�</td>
            <td   class="crm_tdright"> 
              <select name=hangy size=1 id="hangy" class="crm_select">
                <OPTION value="" selected>-��ѡ����ҵ-</OPTION>
                <OPTION value="��С��ҵ" <?if ($calling=="��С��ҵ") echo"selected";?>>-��С��ҵ-</OPTION>
                <OPTION value="����ҵ" <?if ($calling=="����ҵ") echo"selected";?>>-����ҵ-</OPTION>
                <OPTION value="Ӧ�÷����ṩ��" <?if ($calling=="Ӧ�÷����ṩ��") echo"selected";?>>-Ӧ�÷����ṩ��-</OPTION>
                <OPTION value="���ݵ���OEM" <?if ($calling=="���ݵ���OEM") echo"selected";?>>-���ݵ���OEM-</OPTION>
                <OPTION value="���������" <?if ($calling=="���������") echo"selected";?>>-���������-</OPTION>
                <OPTION value="����ṩ��" <?if ($calling=="����ṩ��") echo"selected";?>>-����ṩ��-</OPTION>
                <OPTION value="��������ṩ��" <?if ($calling=="��������ṩ��") echo"selected";?>>-��������ṩ��-</OPTION>
                <OPTION value="�����ṩ��" <?if ($calling=="�����ṩ��") echo"selected";?>>-�����ṩ��-</OPTION>
                <!--�����ҵ���ʿ�ʼ-->
                 <OPTION value="����/����/����"<?if ($calling=="����/����/����") echo"selected";?> >-����/����/���� -</OPTION>
                 <OPTION value="��Դ���/ʯ�ͻ���"<?if ($calling=="��Դ���/ʯ�ͻ���") echo"selected";?> >-��Դ���/ʯ�ͻ��� -</OPTION>
                 <OPTION value="ҽҩ����/ҽ�Ʊ���" <?if ($calling=="ҽҩ����/ҽ�Ʊ���") echo"selected";?>>-ҽҩ����/ҽ�Ʊ��� -</OPTION>
                 <OPTION value="IT/������/ͨ��/����"<?if ($calling=="IT/������/ͨ��/����") echo"selected";?> >-IT/������/ͨ��/���� -</OPTION>
                 <OPTION value="�ӹ�����/�Ǳ��豸" <?if ($calling=="�ӹ�����/�Ǳ��豸") echo"selected";?>>-�ӹ�����/�Ǳ��豸 -</OPTION>
                 <OPTION value="����/��������/��ҵ "<?if ($calling=="����/��������/��ҵ") echo"selected";?> >-����/��������/��ҵ  -</OPTION>
                 <OPTION value="������ѯ/��������/�н����" <?if ($calling=="������ѯ/��������/�н����") echo"selected";?>>-������ѯ/��������/�н���� -</OPTION>
                 <OPTION value="��������/ó��/��ͨ����"<?if ($calling=="��������/ó��/��ͨ����") echo"selected";?> >-��������/ó��/��ͨ���� -</OPTION>
                 <OPTION value="�Ƶ����Ρ�" <?if ($calling=="�Ƶ����Ρ�") echo"selected";?> >-�Ƶ����Ρ� -</OPTION>
                 <OPTION value="���/��ý/ӡˢ����" <?if ($calling=="���/��ý/ӡˢ����") echo"selected";?>>-���/��ý/ӡˢ���� -</OPTION>
                 <OPTION value="������ҵ"<?if ($calling=="������ҵ") echo"selected";?> >-������ҵ -</OPTION>
                <!--�����ҵ���ʽ���-->
              </select> </td>
          </tr>
          <tr id=chinaaddress1> 
            <td   class="crm_td"><font color="#FF0000">*</font>���ڵ�����</td>
            <td   class="crm_input"> <script language=javascript src='../lib07/area.js'></script>
              <SELECT id=chinacomprovince 
      onchange=changeProvince(this,true) name=sheng class="crm_select">
              <OPTION value="" 
        selected>��ѡ��ʡ��</OPTION>
              <OPTION value=Beijing <?if ($sheng=="Beijing") echo"selected";?>>������</OPTION>
              <OPTION 
        value=Tianjin <?if ($sheng=="Tianjin") echo"selected";?>>�����</OPTION>
              <OPTION value=Hebei <?if ($sheng=="Hebei") echo"selected";?>>�ӱ�ʡ</OPTION>
              <OPTION 
        value=Shanxi <?if ($sheng=="Shanxi") echo"selected";?>>ɽ��ʡ</OPTION>
              <OPTION value=InnerMongolia <?if ($sheng=="InnerMongolia") echo"selected";?>>���ɹ�������</OPTION>
              <OPTION value=Liaoning <?if ($sheng=="Liaoning") echo"selected";?>>����ʡ</OPTION>
              <OPTION value=Jilin <?if ($sheng=="Jilin") echo"selected";?>>����ʡ</OPTION>
              <OPTION value=Heilongjiang <?if ($sheng=="Heilongjiang") echo"selected";?>>������ʡ</OPTION>
              <OPTION 
        value=Shanghai <?if ($sheng=="Shanghai") echo"selected";?>>�Ϻ���</OPTION>
              <OPTION value=Jiangsu <?if ($sheng=="Jiangsu") echo"selected";?>>����ʡ</OPTION>
              <OPTION 
        value=Zhejiang <?if ($sheng=="Zhejiang") echo"selected";?>>�㽭ʡ</OPTION>
              <OPTION value=Anhui <?if ($sheng=="Anhui") echo"selected";?>>����ʡ</OPTION>
              <OPTION 
        value=Fujian <?if ($sheng=="Fujian") echo"selected";?>>����ʡ</OPTION>
              <OPTION value=Jiangxi <?if ($sheng=="Jiangxi") echo"selected";?>>����ʡ</OPTION>
              <OPTION 
        value=Shandong <?if ($sheng=="Shandong") echo"selected";?>>ɽ��ʡ</OPTION>
              <OPTION value=Henan <?if ($sheng=="Henan") echo"selected";?>>����ʡ</OPTION>
              <OPTION 
        value=Hubei <?if ($sheng=="Hubei") echo"selected";?>>����ʡ</OPTION>
              <OPTION value=Hunan <?if ($sheng=="Hunan") echo"selected";?>>����ʡ</OPTION>
              <OPTION 
        value=Guangdong <?if ($sheng=="Guangdong") echo"selected";?>>�㶫ʡ</OPTION>
              <OPTION value=Guangxi <?if ($sheng=="Guangxi") echo"selected";?>>����׳��������</OPTION>
              <OPTION value=Hainan <?if ($sheng=="Hainan") echo"selected";?>>����ʡ</OPTION>
              <OPTION value=Chongqing <?if ($sheng=="Chongqing") echo"selected";?>>������</OPTION>
              <OPTION value=Sichuan <?if ($sheng=="Sichuan") echo"selected";?>>�Ĵ�ʡ</OPTION>
              <OPTION value=Guizhou <?if ($sheng=="Guizhou") echo"selected";?>>����ʡ</OPTION>
              <OPTION value=Yunnan <?if ($sheng=="Yunnan") echo"selected";?>>����ʡ</OPTION>
              <OPTION value=Tibet <?if ($sheng=="Tibet") echo"selected";?>>����������</OPTION>
              <OPTION value=Shaanxi <?if ($sheng=="Shaanxi") echo"selected";?>>����ʡ</OPTION>
              <OPTION value=Gansu <?if ($sheng=="Gansu") echo"selected";?>>����ʡ</OPTION>
              <OPTION value=Qinghai <?if ($sheng=="Qinghai") echo"selected";?>>�ຣʡ</OPTION>
              <OPTION 
        value=Ningxia <?if ($sheng=="Ningxia") echo"selected";?>>���Ļ���������</OPTION>
              <OPTION value=Xinjiang <?if ($sheng=="Xinjiang") echo"selected";?>>�½�ά���������</OPTION>
              <OPTION value=Hongkong <?if ($sheng=="Hongkong") echo"selected";?>>����ر�������</OPTION>
              <OPTION 
        value=Macao <?if ($sheng=="Macao") echo"selected";?>>�����ر�������</OPTION>
              <OPTION value=Taiwan <?if ($sheng=="Taiwan") echo"selected";?>>̨��ʡ</OPTION>
            </SELECT> <SELECT id=chinacomcity onchange=changeAreaCodeByCity(this) name=chinacomcity class="crm_select">
                <OPTION value="" selected>��ѡ�����</OPTION>
              </SELECT> </td>
            <td align="right"   class="crm_td"><font color="#FF0000">*</font>Ա��������</td>
            <td   class="crm_input"><SELECT  name=yuangrs size=1 id="yuangrs" class="crm_select">
              <OPTION value=0 >-��ѡ��Ա������-</OPTION>
              <OPTION 
        value=1 <?if ($ygrs==5) echo"selected";?>>&lt; 5</OPTION>
              <OPTION value=50 <?if ($ygrs==50) echo"selected";?>>5 -- 50</OPTION>
              <OPTION 
        value=200 <?if ($ygrs==200) echo"selected";?>>51 -- 200</OPTION>
              <OPTION value=500 <?if ($ygrs==500) echo"selected";?>>201 -- 
              500</OPTION>
              <OPTION 
        value=1000 <?if ($ygrs==1000) echo"selected";?>>501 -- 1000</OPTION>
              <OPTION 
        value=2000 <?if ($ygrs==2000) echo"selected";?>>1001 -- 2000</OPTION>
              <OPTION value=2001 <?if ($ygrs==2001) echo"selected";?>>&gt; 
              2000</OPTION>
            </SELECT> </td>
          </tr>
          <tr> 
            <td   class="crm_td"><font color="#FF0000">*</font>�̶��绰��</td>
            <td  id=areacodetd class="crm_input"><TABLE class=stepIn cellSpacing=0 cellPadding=0 border=0>
                <SPAN 
        class=info></SPAN> 
                <TBODY>
                  <TR> 
                    <TD><INPUT id=telcountrycode maxLength=8 value="<?=$telcountrycode;?>" size=6  
            name=telcountrycode>
                      -</TD>
                    <TD id=areacodetd1><INPUT id=telareacode value="<?=$telareacode;?>" maxLength=40 size=6 
            name=telareacode>
                      -</TD>
                    <TD><INPUT id=tel maxLength=40 value="<?=$tel;?>" size=15 
      name=tel></TD>
                  </TR>
                </TBODY>
              </TABLE></td>
            <td align="right"   class="crm_td">�ͻ���ַ��</td>
            <td   class="crm_tdright"><input name="web" value="<?=$web;?>" type="text"  id="web" size="30" maxlength="80"></td>
          </tr>
          <tr> 
            <td   class="crm_td">���棺</td>
            <td   class="crm_input"><TABLE class=stepIn cellSpacing=0 cellPadding=0 border=0>
                <TBODY>
                  <TR> 
                    <TD><input id=faxcountrycode maxlength=8 value="<?=$faxcountrycode;?>" size=6  
            name=faxcountrycode>
                      -</TD>
                    <TD id=areacodetd2><INPUT id=faxareacode value="<?=$faxareacode;?>" maxLength=8 size=6 
            name=faxareacode>
                      -</TD>
                    <TD><INPUT maxLength=40 size=15 value="<?=$fax;?>" 
  name=fax></TD>
                  </TR>
                </TBODY>
              </TABLE></td>
            <td align="right"   class="crm_td"><font color="#FF0000">*</font>��Ӫҵ�</td>
            <td   class="crm_tdright"><SELECT  name=yye size=1 id="yye" class="crm_select">
              <OPTION value=0>-��ѡ����Ӫҵ��-</OPTION>
              <OPTION value=1 <?if ($yye==1) echo"selected";?>>����1����</OPTION>
              <OPTION value=2 <?if ($yye==2) echo"selected";?>>1���� -- 5����</OPTION>
              <OPTION value=3 <?if ($yye==3) echo"selected";?>>5���� -- 1ǧ��</OPTION>
              <OPTION value=4 <?if ($yye==4) echo"selected";?>>1ǧ�� -- 3ǧ��</OPTION>
              <OPTION value=5 <?if ($yye==5) echo"selected";?>>3ǧ�� -- 5ǧ��</OPTION>
              <OPTION value=6 <?if ($yye==6) echo"selected";?>>5ǧ�� -- 1����</OPTION>
              <OPTION value=7 <?if ($yye==7) echo"selected";?>>1���� -- 5����</OPTION>
              <OPTION value=8 <?if ($yye==8) echo"selected";?>>5���� -- 10����</OPTION>
              <OPTION value=9 <?if ($yye==9) echo"selected";?>>10���� -- 50����</OPTION>
              <OPTION value=10 <?if ($yye==10) echo"selected";?>>100��������</OPTION>
            </SELECT>
              (Ԫ/�����) </td>
          </tr>
          <tr> 
            <td   class="crm_td"><font color="#FF0000">*</font>�ͻ���ϸ��ַ��</td>
            <td   class="crm_input"><input name="address" type="text" id="address" value="<?=$address;?>" size="35" maxlength="40" ></td>
            <td align="right"   class="crm_td">�ʱࣺ</td>
            <td   class="crm_tdright"><input name="postcode"  type="text" value="<?=$postcode;?>" id="postcode" size="10"  maxlength="40"></td>
          </tr>
          <!--��ӵ����ݿ�ʼ-->
           <tr> 
            <td   class="crm_td">����1��</td>
            <td   class="crm_input"><input name="bumen1" type="text" id="bumen1" value="<?=$bumen1;?>" size="35" maxlength="40" ></td>
            <td align="right"   class="crm_td">��ϸ��ַ1��</td>
            <td   class="crm_input"><input name="addr1"  type="text" value="<?=$addr1;?>" id="addr1" size="35"  maxlength="40"></td>
          </tr>
          <!--��ӵ����ݽ���-->
          <tr> 
            <td   class="crm_td">��ע��</td>
            <td colspan="3"   class="crm_input">
<?
		  					$spintr=trim($remark);

					$spintr=str_replace("<br />","", $spintr);

                    	$spintr=str_replace("&nbsp;", " ", $spintr);
		  ?>            	
            	<textarea name="beiz" cols="85" rows="5"  id="beiz" onkeyUp="textLimitCheck(this, 500);"><?=stripslashes($spintr);?></textarea>
              ���500���֣� </td>
          </tr>
          <tr align="center"> 
            <td colspan="5"   class="crm_submit"> 
            	<input type="hidden" name="id" value="<?echo $id;?>">
              <input type="submit" name="Submit" class="submit" value="-ȷ���޸�-"> 
              &nbsp;&nbsp;&nbsp;&nbsp; <input type="reset" name="Submit2" class="submit" value="-����-"> 
              &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" value="-����-" onClick="history.go(-1)" class="buttons"> 
            </td>
          </tr>
        </table>

        </form></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="30" style="padding:3px;line-height:22px;"><strong>˵����</strong><br>
      1��Ϊ��֤�ͻ���Ϣ��Ч�����뾡����ϸ��д <font color="#FF0000">*</font>Ϊ������д��<br>
      2����Ϊ������Ա����ҲӦ�þ�������ϸ���˽���ҵ����Ϣ��</td>
  </tr>
</table>