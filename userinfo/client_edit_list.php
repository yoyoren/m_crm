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
	
	//添加开始
	$bumen1=trim($rs->bumen1);
	$addr1=trim($rs->addr1);
	//添加结束
	if ($clientname=="")
	{
			echo "<script language=javascript>alert('客户数据错误3');document.location.href=('client_manage.php');</script>";
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
    alert("客户名称不能为空！");
    document.myform.clientname.focus();
    return false;
  }
  if (myform.hangy.value=="")
  {
    alert("请选择客户所属行业");
    document.myform.hangy.focus();
    return false;
  }  
 
  if (myform.sheng.value=="")
  {
    alert("请您选择客户所在省！");
    document.myform.sheng.focus();
    return false;
  }  
  
  if (myform.yuangrs.value=="")
  {
    alert("请您选择员工人数！");
    document.myform.yuangrs.focus();
    return false;
  } 
    
  if (myform.tel.value=="")
  {
    alert("请您填写客户固定电话号码！");
    document.myform.tel.focus();
    return false;
  }    

  if (myform.yye.value=="")
  {
    alert("请您填写营业额！");
    document.myform.yye.focus();
    return false;
  } 	
 
  if (myform.address.value=="")
  {
    alert("请您填写客户详细地址！");
    document.myform.address.focus();
    return false;
  }         
 
 
    
  return true;  
}



function textLimitCheck(thisArea, maxLength)
{
    if (thisArea.value.length > maxLength)
	{
      alert(maxLength + ' 个字限制. \r超出的将自动去除.');
      thisArea.value = thisArea.value.substring(0, maxLength);
      thisArea.focus();
    }
    /*回写span的值，当前填写文字的数量*/
   
  }


//-->
</script>

<table  border="0" class="daohang" cellspacing="0" cellpadding="0">
  <tr>
          <td>&nbsp;客户资源管理->编辑客户</td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC"  class="bianmamanage" style="padding:0px;">
  <tr> 
    <td bgcolor="#EBEBEB" class="tishi">&nbsp;修改客户(<font color="#FF0000">*必填写</font>)</td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" height="30" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
	<form name="myform" method="post" action="client_editto.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">
	    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr> 
            <td   class="crm_td">sales name：</td>
            <td   class="crm_input"><input name="userid" type="text" value="<?=$_SESSION["userdlname"];?>" id="userid" size="20" maxlength="30" readonly></td>
            <td align="right"   class="crm_td">等级：</td>
            <td   class="crm_tdright"> 
              <select name=dengji size=1 id="dengji" class="crm_select">
                <OPTION value="无" <?if ($clientlevel=="无") echo"selected";?>>-无-</OPTION>
                <OPTION value="已获得" <?if ($clientlevel=="已获得") echo"selected";?>>-已获得-</OPTION>
                <OPTION value="有效的" <?if ($clientlevel=="有效的") echo"selected";?>>-有效的-</OPTION>
                <OPTION value="市场失败" <?if ($clientlevel=="市场失败") echo"selected";?>>-市场失败-</OPTION>
                <OPTION value="项目取消" <?if ($clientlevel=="项目取消") echo"selected";?>>-项目取消-</OPTION>
                <OPTION value="关闭" <?if ($clientlevel=="关闭") echo"selected";?>>-关闭-</OPTION>
              </select></td>
          </tr>
          <tr> 
            <td width="15%"   class="crm_td"> 
              <font color="#FF0000">*</font>客户名称：</td>
            <td width="45%"   class="crm_input"> 
              <input name="clientname" type="text" value="<?=$clientname;?>" id="clientname" size="30" maxlength="40" > 
            </td>
            <td width="40%" align="right"   class="crm_td">客户来源：</td>
            <td width="40%"   class="crm_tdright"> 
              <select name=kehlx size=1 id="kehlx" class="crm_select">
                <OPTION value="无" <?if ($type=="无") echo"selected";?>>-无-</OPTION>
                <OPTION value="转介绍" <?if ($type=="转介绍") echo"selected";?>>-转介绍-</OPTION>
                <OPTION value="cold call" <?if ($type=="cold call") echo"selected";?>>-cold call-</OPTION>
                <OPTION value="陌生拜访" <?if ($type=="陌生拜访") echo"selected";?>>-陌生拜访-</OPTION>
                <OPTION value="市场活动" <?if ($type=="市场活动") echo"selected";?>>-市场活动-</OPTION>
                <OPTION value="网络" <?if ($type=="网络") echo"selected";?>>-网络-</OPTION>
           
                <OPTION value="其他" <?if ($type=="其他") echo"selected";?>>-其他-</OPTION>
              </select> </tr>
          <tr> 
            <td   class="crm_td">所有权：</td>
            <td   class="crm_input"> 
              <select name=suoyq size=1 id="suoyq" class="crm_select">
                <OPTION value="无" <?if ($suoyq=="无") echo"selected";?>>-无-</OPTION>
                <OPTION value="私有" <?if ($suoyq=="私有") echo"selected";?>>-私有-</OPTION>
                <OPTION value="公共" <?if ($suoyq=="公共") echo"selected";?>>-公共-</OPTION>
              </select> </td>
            <td align="right"   class="crm_td"><font color="#FF0000">*</font>行业性质：</td>
            <td   class="crm_tdright"> 
              <select name=hangy size=1 id="hangy" class="crm_select">
                <OPTION value="" selected>-请选择行业-</OPTION>
                <OPTION value="中小企业" <?if ($calling=="中小企业") echo"selected";?>>-中小企业-</OPTION>
                <OPTION value="大企业" <?if ($calling=="大企业") echo"selected";?>>-大企业-</OPTION>
                <OPTION value="应用服务提供商" <?if ($calling=="应用服务提供商") echo"selected";?>>-应用服务提供商-</OPTION>
                <OPTION value="数据电信OEM" <?if ($calling=="数据电信OEM") echo"selected";?>>-数据电信OEM-</OPTION>
                <OPTION value="政府或军队" <?if ($calling=="政府或军队") echo"selected";?>>-政府或军队-</OPTION>
                <OPTION value="软件提供商" <?if ($calling=="软件提供商") echo"selected";?>>-软件提供商-</OPTION>
                <OPTION value="管理服务提供商" <?if ($calling=="管理服务提供商") echo"selected";?>>-管理服务提供商-</OPTION>
                <OPTION value="服务提供商" <?if ($calling=="服务提供商") echo"selected";?>>-服务提供商-</OPTION>
                <!--添加行业性质开始-->
                 <OPTION value="金融/银行/保险"<?if ($calling=="金融/银行/保险") echo"selected";?> >-金融/银行/保险 -</OPTION>
                 <OPTION value="能源矿产/石油化工"<?if ($calling=="能源矿产/石油化工") echo"selected";?> >-能源矿产/石油化工 -</OPTION>
                 <OPTION value="医药生物/医疗保健" <?if ($calling=="医药生物/医疗保健") echo"selected";?>>-医药生物/医疗保健 -</OPTION>
                 <OPTION value="IT/互联网/通信/电子"<?if ($calling=="IT/互联网/通信/电子") echo"selected";?> >-IT/互联网/通信/电子 -</OPTION>
                 <OPTION value="加工制造/仪表设备" <?if ($calling=="加工制造/仪表设备") echo"selected";?>>-加工制造/仪表设备 -</OPTION>
                 <OPTION value="房产/建筑建设/物业 "<?if ($calling=="房产/建筑建设/物业") echo"selected";?> >-房产/建筑建设/物业  -</OPTION>
                 <OPTION value="管理咨询/教育科研/中介服务" <?if ($calling=="管理咨询/教育科研/中介服务") echo"selected";?>>-管理咨询/教育科研/中介服务 -</OPTION>
                 <OPTION value="消费零售/贸易/交通物流"<?if ($calling=="消费零售/贸易/交通物流") echo"selected";?> >-消费零售/贸易/交通物流 -</OPTION>
                 <OPTION value="酒店旅游、" <?if ($calling=="酒店旅游、") echo"selected";?> >-酒店旅游、 -</OPTION>
                 <OPTION value="广告/传媒/印刷出版" <?if ($calling=="广告/传媒/印刷出版") echo"selected";?>>-广告/传媒/印刷出版 -</OPTION>
                 <OPTION value="其它行业"<?if ($calling=="其它行业") echo"selected";?> >-其它行业 -</OPTION>
                <!--添加行业性质结束-->
              </select> </td>
          </tr>
          <tr id=chinaaddress1> 
            <td   class="crm_td"><font color="#FF0000">*</font>所在地区：</td>
            <td   class="crm_input"> <script language=javascript src='../lib07/area.js'></script>
              <SELECT id=chinacomprovince 
      onchange=changeProvince(this,true) name=sheng class="crm_select">
              <OPTION value="" 
        selected>请选择省份</OPTION>
              <OPTION value=Beijing <?if ($sheng=="Beijing") echo"selected";?>>北京市</OPTION>
              <OPTION 
        value=Tianjin <?if ($sheng=="Tianjin") echo"selected";?>>天津市</OPTION>
              <OPTION value=Hebei <?if ($sheng=="Hebei") echo"selected";?>>河北省</OPTION>
              <OPTION 
        value=Shanxi <?if ($sheng=="Shanxi") echo"selected";?>>山西省</OPTION>
              <OPTION value=InnerMongolia <?if ($sheng=="InnerMongolia") echo"selected";?>>内蒙古自治区</OPTION>
              <OPTION value=Liaoning <?if ($sheng=="Liaoning") echo"selected";?>>辽宁省</OPTION>
              <OPTION value=Jilin <?if ($sheng=="Jilin") echo"selected";?>>吉林省</OPTION>
              <OPTION value=Heilongjiang <?if ($sheng=="Heilongjiang") echo"selected";?>>黑龙江省</OPTION>
              <OPTION 
        value=Shanghai <?if ($sheng=="Shanghai") echo"selected";?>>上海市</OPTION>
              <OPTION value=Jiangsu <?if ($sheng=="Jiangsu") echo"selected";?>>江苏省</OPTION>
              <OPTION 
        value=Zhejiang <?if ($sheng=="Zhejiang") echo"selected";?>>浙江省</OPTION>
              <OPTION value=Anhui <?if ($sheng=="Anhui") echo"selected";?>>安徽省</OPTION>
              <OPTION 
        value=Fujian <?if ($sheng=="Fujian") echo"selected";?>>福建省</OPTION>
              <OPTION value=Jiangxi <?if ($sheng=="Jiangxi") echo"selected";?>>江西省</OPTION>
              <OPTION 
        value=Shandong <?if ($sheng=="Shandong") echo"selected";?>>山东省</OPTION>
              <OPTION value=Henan <?if ($sheng=="Henan") echo"selected";?>>河南省</OPTION>
              <OPTION 
        value=Hubei <?if ($sheng=="Hubei") echo"selected";?>>湖北省</OPTION>
              <OPTION value=Hunan <?if ($sheng=="Hunan") echo"selected";?>>湖南省</OPTION>
              <OPTION 
        value=Guangdong <?if ($sheng=="Guangdong") echo"selected";?>>广东省</OPTION>
              <OPTION value=Guangxi <?if ($sheng=="Guangxi") echo"selected";?>>广西壮族自治区</OPTION>
              <OPTION value=Hainan <?if ($sheng=="Hainan") echo"selected";?>>海南省</OPTION>
              <OPTION value=Chongqing <?if ($sheng=="Chongqing") echo"selected";?>>重庆市</OPTION>
              <OPTION value=Sichuan <?if ($sheng=="Sichuan") echo"selected";?>>四川省</OPTION>
              <OPTION value=Guizhou <?if ($sheng=="Guizhou") echo"selected";?>>贵州省</OPTION>
              <OPTION value=Yunnan <?if ($sheng=="Yunnan") echo"selected";?>>云南省</OPTION>
              <OPTION value=Tibet <?if ($sheng=="Tibet") echo"selected";?>>西藏自治区</OPTION>
              <OPTION value=Shaanxi <?if ($sheng=="Shaanxi") echo"selected";?>>陕西省</OPTION>
              <OPTION value=Gansu <?if ($sheng=="Gansu") echo"selected";?>>甘肃省</OPTION>
              <OPTION value=Qinghai <?if ($sheng=="Qinghai") echo"selected";?>>青海省</OPTION>
              <OPTION 
        value=Ningxia <?if ($sheng=="Ningxia") echo"selected";?>>宁夏回族自治区</OPTION>
              <OPTION value=Xinjiang <?if ($sheng=="Xinjiang") echo"selected";?>>新疆维吾尔自治区</OPTION>
              <OPTION value=Hongkong <?if ($sheng=="Hongkong") echo"selected";?>>香港特别行政区</OPTION>
              <OPTION 
        value=Macao <?if ($sheng=="Macao") echo"selected";?>>澳门特别行政区</OPTION>
              <OPTION value=Taiwan <?if ($sheng=="Taiwan") echo"selected";?>>台湾省</OPTION>
            </SELECT> <SELECT id=chinacomcity onchange=changeAreaCodeByCity(this) name=chinacomcity class="crm_select">
                <OPTION value="" selected>请选择城市</OPTION>
              </SELECT> </td>
            <td align="right"   class="crm_td"><font color="#FF0000">*</font>员工人数：</td>
            <td   class="crm_input"><SELECT  name=yuangrs size=1 id="yuangrs" class="crm_select">
              <OPTION value=0 >-请选择员工人数-</OPTION>
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
            <td   class="crm_td"><font color="#FF0000">*</font>固定电话：</td>
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
            <td align="right"   class="crm_td">客户网址：</td>
            <td   class="crm_tdright"><input name="web" value="<?=$web;?>" type="text"  id="web" size="30" maxlength="80"></td>
          </tr>
          <tr> 
            <td   class="crm_td">传真：</td>
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
            <td align="right"   class="crm_td"><font color="#FF0000">*</font>年营业额：</td>
            <td   class="crm_tdright"><SELECT  name=yye size=1 id="yye" class="crm_select">
              <OPTION value=0>-请选择年营业额-</OPTION>
              <OPTION value=1 <?if ($yye==1) echo"selected";?>>少于1百万</OPTION>
              <OPTION value=2 <?if ($yye==2) echo"selected";?>>1百万 -- 5百万</OPTION>
              <OPTION value=3 <?if ($yye==3) echo"selected";?>>5百万 -- 1千万</OPTION>
              <OPTION value=4 <?if ($yye==4) echo"selected";?>>1千万 -- 3千万</OPTION>
              <OPTION value=5 <?if ($yye==5) echo"selected";?>>3千万 -- 5千万</OPTION>
              <OPTION value=6 <?if ($yye==6) echo"selected";?>>5千万 -- 1个亿</OPTION>
              <OPTION value=7 <?if ($yye==7) echo"selected";?>>1个亿 -- 5个亿</OPTION>
              <OPTION value=8 <?if ($yye==8) echo"selected";?>>5个亿 -- 10个亿</OPTION>
              <OPTION value=9 <?if ($yye==9) echo"selected";?>>10个亿 -- 50个亿</OPTION>
              <OPTION value=10 <?if ($yye==10) echo"selected";?>>100个亿以上</OPTION>
            </SELECT>
              (元/人民币) </td>
          </tr>
          <tr> 
            <td   class="crm_td"><font color="#FF0000">*</font>客户详细地址：</td>
            <td   class="crm_input"><input name="address" type="text" id="address" value="<?=$address;?>" size="35" maxlength="40" ></td>
            <td align="right"   class="crm_td">邮编：</td>
            <td   class="crm_tdright"><input name="postcode"  type="text" value="<?=$postcode;?>" id="postcode" size="10"  maxlength="40"></td>
          </tr>
          <!--添加的内容开始-->
           <tr> 
            <td   class="crm_td">部门1：</td>
            <td   class="crm_input"><input name="bumen1" type="text" id="bumen1" value="<?=$bumen1;?>" size="35" maxlength="40" ></td>
            <td align="right"   class="crm_td">详细地址1：</td>
            <td   class="crm_input"><input name="addr1"  type="text" value="<?=$addr1;?>" id="addr1" size="35"  maxlength="40"></td>
          </tr>
          <!--添加的内容结束-->
          <tr> 
            <td   class="crm_td">备注：</td>
            <td colspan="3"   class="crm_input">
<?
		  					$spintr=trim($remark);

					$spintr=str_replace("<br />","", $spintr);

                    	$spintr=str_replace("&nbsp;", " ", $spintr);
		  ?>            	
            	<textarea name="beiz" cols="85" rows="5"  id="beiz" onkeyUp="textLimitCheck(this, 500);"><?=stripslashes($spintr);?></textarea>
              最多500汉字； </td>
          </tr>
          <tr align="center"> 
            <td colspan="5"   class="crm_submit"> 
            	<input type="hidden" name="id" value="<?echo $id;?>">
              <input type="submit" name="Submit" class="submit" value="-确定修改-"> 
              &nbsp;&nbsp;&nbsp;&nbsp; <input type="reset" name="Submit2" class="submit" value="-重填-"> 
              &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" value="-后退-" onClick="history.go(-1)" class="buttons"> 
            </td>
          </tr>
        </table>

        </form></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="30" style="padding:3px;line-height:22px;"><strong>说明：</strong><br>
      1、为保证客户信息有效管理，请尽量详细填写 <font color="#FF0000">*</font>为必须填写。<br>
      2、做为销售人员，您也应该尽可能详细的了解企业的信息。</td>
  </tr>
</table>