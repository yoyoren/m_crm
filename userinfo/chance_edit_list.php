<?
require_once('../lib07/auto_load.php');
require_once('../lib07/pages.inc.php');
if(!defined('dbzz_net')) {
	exit('Access Denied');
}
require_once('../lib07/islogin.php');
$id=addslashes(trim($_GET['id']));

	$sql="select * from chance where id='".$id."'";
//	echo $sql;
	$rs=$obj->fetchrow($sql);
	$id=trim($rs->id);
	$clientname=trim($rs->clientname);
	$clientid=trim($rs->clientid);
  $itemmoney=trim($rs->itemmoney);
  $phase=trim($rs->phase);
  $itemname=trim($rs->itemname);
  $nextcontent=trim($rs->nextcontent);
  $expectationmoney=trim($rs->expectationmoney);
  $intendingday=trim($rs->intendingday);
  $shic=trim($rs->shic);
  $shicid=trim($rs->shicid);
  $possibility=trim($rs->possibility);
  $clew=trim($rs->clew);
  $linkname=trim($rs->linkname);
  $linknameid=trim($rs->linknameid);
  $remark=trim($rs->remark);
  //我添加的
  $signDate=trim($rs->signDate);
  $payDate=trim($rs->payDate);
  $directly=trim($rs->directly);
  $content=trim($rs->content);
  $discount=trim($rs->discount);
  $contract=trim($rs->contract);
  //$chancename=trim($rs->chancename);
	if ($clientname=="")
	{
			echo "<script language=javascript>alert('销售记录数据错误3');document.location.href=('chance_manage.php');</script>";
			exit;			
		}
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/inputstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/lefttoggler.js"></script>
<script language="javascript">
<!--
function FormCheck() 
{

  if (myform.chancename.value=="")
  {
    alert("销售名称不能为空！");
    document.myform.chancename.focus();
    return false;
  }
  if (myform.chengjrq.value=="")
  {
    alert("请选择预计成交日期");
    document.myform.chengjrq.focus();
    return false;
  }  
   if (myform.linkname.value=="")
  {
    alert("请您选择联系人名！");
    document.myform.linkname.focus();
    return false;
  } 
  if (myform.clientname.value=="")
  {
    alert("请您选择客户名称！");
    document.myform.clientname.focus();
    return false;
  }  
  
  if (myform.jied.value=="")
  {
    alert("请您选择阶段！");
    document.myform.jied.focus();
    return false;
  } 
    
   

         
    
  return true;  
}

  
  function   select_linkmans(){   
    window.open("chance_select_linkman.php","mywin",   "menubar=no,width=410,height=480,resizeable=yes");   
  } 
  function   select_markets(){   
    window.open("chance_select_market.php","mywin",   "menubar=no,width=410,height=480,resizeable=yes");   
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
          <td>&nbsp;客户资源管理->编辑销售记录</td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC"  class="bianmamanage" style="padding:0px;">
  <tr> 
          <td bgcolor="#EBEBEB" class="tishi">&nbsp;编辑销售记录(<font color="#FF0000">*</font>必填写)</td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" height="30" style="padding:0px;border-bottom:1px solid #C6CBEE;"> 
	<form name="myform" method="post" action="chance_editto.php" onsubmit="return FormCheck();" style="padding:0px;margin:0px 0px 0px 0px;">
	          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                <tr> 
                  <td   class="crm_td">sales name：</td>
                  <td   class="crm_input"><input name="userid" type="text" value="<?=$_SESSION["userdlname"];?>" id="userid" size="20" maxlength="30" readonly></td>
                  <td align="right"   class="crm_td">预计成交金额：</td>
                  <td   class="crm_tdright"> <input name="gujje"  type="text" value="<?=$itemmoney;?>" id="gujje" size="20"  maxlength="20">
                    <font color="#FF0000">元/人民币</font></td>
                </tr>
                <tr> 
                  <td width="15%"   class="crm_td"> <font color="#FF0000">*</font>缔结交易方式：</td>
                  <!--<td width="45%"   class="crm_input"> <input name="chancename" type="text" id="chancename"  value="<?=$itemname;?>" size="30" maxlength="40" > 
                  </td>-->
                  <td   class="crm_tdright">
                 
                    <select name="itemname" size=1 id="itemname" class="crm_select">
                    
                      <!--添加开始-->
                      <option value="预付款合同" <?if ($itemname=="预付款合同") {echo "selected";}?> >-预付款合同-</option>
                      <option value="代金卡购销合同" <?if ($itemname=="代金卡购销合同") {echo "selected";}?> >-代金卡购销合同-</option>
                      <option value="蛋糕定购合同" <?if ($itemname=="蛋糕定购合同") {echo "selected";}?> >-蛋糕定购合同-</option>
                      <option value="不签合同直接购卡" <?if ($itemname=="不签合同直接购卡") {echo "selected";}?> >-不签合同直接购卡-</option>
                      <option value="蛋糕定购协议" <?if ($itemname=="蛋糕定购协议") {echo "selected";}?> >-蛋糕定购协议-</option>
                      <option value="其它" <?if ($itemname=="其它") {echo "selected";}?> >-其它-</option>
                      <!--添加结束-->
                    </select>
                  
                  </td>
                  
                  <td width="40%" align="right"   class="crm_td"><font color="#FF0000">*</font>预计签约日期：</td>
                  <td width="40%"   class="crm_tdright"><script type="text/javascript" src="../js/date_select.js"></script> <input name="signDate" onClick="return Calendar('signDate');" type="text"  id="signDate" value="<?=$signDate;?>"  size="20"  maxlength="20"> 
                </tr>
                <tr> 
                  <td   class="crm_td"><font color="#FF0000">*</font>联系人：</td>
                  <td   class="crm_input"> <input name="linkname" type="text" id="linkname" value="<?=$linkname;?>"  readonly size="10" maxlength="20" > 
                    <input type="hidden" name="linknameid"  id="linknameid" value="<?=$linknameid;?>"> 
                    <INPUT name="select_linkman" TYPE="button"   class="submit" id="select_linkman"   onclick="select_linkmans();"   value="选择" title="选择联系人时，客户名也自动填写">
                  </td>
                  <!---->
                  <td width="40%" align="right"   class="crm_td"><font color="#FF0000">*</font>预计付款日期：</td>
                  <td width="40%"   class="crm_tdright"><script type="text/javascript" src="../js/date_select.js"></script> <input name="payDate" onClick="return Calendar('payDate');" type="text"  id="payDate" value="<?=$payDate;?>"  size="20"  maxlength="20"> 
                </tr>
                <tr > 
                  <td   class="crm_td"><font color="#FF0000">*</font>客户名称：</td>
                  <td   class="crm_input"><input name="clientname" type="text" id="clientname" value="<?=$clientname;?>" size="30" maxlength="40" readonly> 
                    <input type="hidden" name="clientid"  id="clientid"  value="<?=$clientid;?>"> </td>
                  <td align="right"   class="crm_td"><font color="#FF0000">*</font>销售可能性：</td>
                  <td   class="crm_tdright"> <select name="jied" size=1 id="jied" class="crm_select">
                      <OPTION value="" selected>-请选择-</OPTION>
                      <OPTION value="10% 种子期" <?if ($phase=="10% 种子期") echo "selected";?>>-10% 种子期-</OPTION>
                      <OPTION value="25% 萌芽期" <?if ($phase=="25% 萌芽期") echo "selected";?>>-25% 萌芽期-</OPTION>
                      <OPTION value="50% 催熟期" <?if ($phase=="50% 催熟期") echo "selected";?>>-50% 催熟期-</OPTION>
                      <OPTION value="75% 成熟期" <?if ($phase=="75% 成熟期") echo "selected";?>>-75% 成熟期-</OPTION>
                      <OPTION value="90% 摘果期" <?if ($phase=="90% 摘果期") echo "selected";?>>-90% 摘果期-</OPTION>
                      <OPTION value="100% 深耕期" <?if ($phase=="100% 深耕期") echo "selected";?>>-100% 深耕期-</OPTION>
             </select> </td>
                </tr>
                <!---->
                <tr id=chinaaddress1> 
                  
                    <td align="right"   class="crm_td">客户级别：</td>
                   
                  <td   class="crm_input"><SELECT 
      name=possibility size=1 id="possibility" class="crm_select">
                      <OPTION value="" selected>-请选择级别-</OPTION>
                    <OPTION value="A" <?if ($possibility=="A") echo "selected";?> >A</OPTION>
                    <OPTION value="B" <?if ($possibility=="B") echo "selected";?> >B</OPTION>
                    <OPTION value="C" <?if ($possibility=="C") echo "selected";?> >C</OPTION>
                    <OPTION value="D" <?if ($possibility=="D") echo "selected";?> >D</OPTION>
                 
                    </SELECT> </td>
                  
                    <td width="40%" align="right"   class="crm_td">结算日期：</td>
                <td width="40%"   class="crm_tdright"><script type="text/javascript" src="../js/date_select.js"></script> <input name="chengjrq"  onClick="return Calendar('chengjrq');" type="text"  id="chengjrq"  value="<?=$intendingday;?>" size="20"  maxlength="20">                </tr>
                <!--测试添加-->
                 <tr id=chinaaddress2> 
                 <td align="right"   class="crm_td">购买目的：</td>
                  <td   class="crm_input">
                  <SELECT name="directly" size=1 id="directly" class="crm_select">
                    <OPTION value="" >-请选择购买目的-</OPTION>
                    <OPTION value="福利"  <?if ($directly=="福利") echo "selected";?> >福利</OPTION>
                    <OPTION value="礼品" <?if ($directly=="礼品") echo "selected";?> >礼品</OPTION>
                    <OPTION value="个人团购" <?if ($directly=="个人团购") echo "selected";?> >个人团购</OPTION>
                    <OPTION value="其它团购" <?if ($directly=="其它团购") echo "selected";?> >其它团购</OPTION>
                    <OPTION value="其它" <?if ($directly=="其它") echo "selected";?>>其它</OPTION>
                    </SELECT> </td>
                  <td align="right"   class="crm_td">产品形式：</td>
                  <td   class="crm_input">
                  <SELECT name="content" size=1 id="content" class="crm_select">
                   
                    <OPTION value="纸质代金券" <?if ($content=="纸质代金券") echo "selected";?> >纸质代金券</OPTION>
                    <OPTION value="蛋糕" <?if ($content=="蛋糕") echo "selected";?> >蛋糕</OPTION>
                    <OPTION value="储值卡" <?if ($content=="储值卡") echo "selected";?> >储值卡</OPTION>
                    <OPTION value="电子券" <?if ($content=="电子券") echo "selected";?> >电子券</OPTION>
                    <OPTION value="组合" <?if ($content=="组合") echo "selected";?> >组合</OPTION>
                    <OPTION value="其它" <?if ($content=="其它") echo "selected";?> >其它</OPTION>
                    </SELECT> </td>
                </tr>
                 <!--添加购买目的购买内容结束-->
                 <!--折扣和契约方式-->
                  <tr id=chinaaddress3> 
                  <td   class="crm_td">折扣：</td>
                  <td   class="crm_input"><input name="discount" type="text" id="discount"  value="<?=$discount;?>" size="30" maxlength="40" > 
                    <input type="hidden" name="disId"  id="disId"> </td>
                  <td align="right"   class="crm_td">销售产品名称：</td>
                  <td   class="crm_input">
                  <SELECT  name="contract" size=1 id="contract" class="crm_select">
                      
                    <OPTION value="蛋糕卡" <?if ($contract=="蛋糕卡") echo "selected";?> >蛋糕卡</OPTION>
                    <OPTION value="蛋糕卡套餐组合" <?if ($contract=="蛋糕卡套餐组合") echo "selected";?> >蛋糕卡套餐组合</OPTION>
                 
                    </SELECT> </td>
                </tr>
                <!--折扣和契约方式-->
               
                <!---->
                <tr> 
                  <td   class="crm_td">  下一步： </td>
                  <td  id=areacodetd class="crm_input"><input name="next" type="text" id="next" value="<?=$nextcontent;?>" size="30" maxlength="50" > 
                  </td>
                  <td align="right"   class="crm_td">期望收益：</td>
                  <td   class="crm_tdright"><input name="qiwsy" type="text"  id="qiwsy" size="30" value="<?=$expectationmoney;?>" maxlength="50"></td>
                </tr>
                <tr> 
                  <td   class="crm_td">线索来源：</td>
                  <td   class="crm_input"><select name=xiansuo size=1 id="xiansuo" class="crm_select">
                      <OPTION value="无" selected>-无-</OPTION>
                      <OPTION value="广告" <?if ($clew=="广告") echo "selected";?>>-广告-</OPTION>
                      <OPTION value="推销电话" <?if ($clew=="推销电话") echo "selected";?>>-推销电话-</OPTION>
                      <OPTION value="交易会" <?if ($clew=="交易会") echo "selected";?>>-交易会-</OPTION>
                      <OPTION value="合作伙伴" <?if ($clew=="合作伙伴") echo "selected";?>>-合作伙伴-</OPTION>
                      <OPTION value="外部介绍" <?if ($clew=="外部介绍") echo "selected";?>>-外部介绍-</OPTION>
                      <OPTION value="公开媒体" <?if ($clew=="公开媒体") echo "selected";?>>-公开媒体-</OPTION>
                      <OPTION value="销售邮件" <?if ($clew=="销售邮件") echo "selected";?>>-销售邮件-</OPTION>
                      <OPTION value="网络宣传" <?if ($clew=="网络宣传") echo "selected";?>>-网络宣传-</OPTION>
                      <OPTION value="其他" <?if ($clew=="其他") echo "selected";?>>-其他-</OPTION>
                    </select> </td>
                  <td align="right"   class="crm_td">市场活动源：</td>
                  <td   class="crm_tdright"><input name="shic" type="text"  value="<?=$shic;?>" id="shic" size="30" readonly maxlength="80">
                    <input type="hidden" name="shicid"  id="shicid"  value="<?=$shicid;?>">
                    <INPUT name="select_market" TYPE="button"   class="submit"   onclick="select_markets();"   value="选择"> 
                  </td>
                </tr>
                <tr> 
                  <td   class="crm_td">备注：</td>
                  <td colspan="3"   class="crm_input">
			<?
		  					$spintr=trim($remark);
								$spintr=str_replace("<br />","", $spintr);
                $spintr=str_replace("&nbsp;", " ", $spintr);
		  ?>                  	
                  	<textarea name="beiz" cols="85" rows="5"  id="beiz" onkeyUp="textLimitCheck(this, 500);"><?=stripslashes($spintr);?></textarea>
                    最多500汉字； 
 </td>
                </tr>
                <tr align="center"> 
                  <td colspan="5"   class="crm_submit"> 
                  	<input type="hidden" name="id"  id="clientid"  value="<?=$id;?>">
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
            1、<font color="#000000">商机信息请仔细填写</font><font color="#FF0000"> *</font>为必须填写。<br>
            2、选择联系人名时，客户名也会自动填写。</td>
  </tr>
</table>