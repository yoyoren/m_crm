 

<table width="100%" height="13%" border="0" class="allhead" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="74%" height="50%" class="websitename">&nbsp;&nbsp;<?=$global_websitename;?></td>
    <td width="26%" align="center" valign="top" ><table class="topdh"   border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="247" align="center" style="color:#ff0;">&nbsp;
          	<?
          	if ($_SESSION["userdlname"]<>"") echo "��ǰ�û���".$_SESSION["username"];
          	?>
          	
          	</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="50%" valign="bottom" >
    	<div id="topmenu">
    		<ul id="topmenuul">
    			
    			<li class="topmenuli"  style="color:#FBF8D5;"><a href="/userinfo/client_manage.php" style="color:#FBF8D5;" title="�ͻ����Ϲ���">�ͻ�����</a></li>
    			<li class="topmenuli"><a href="/userinfo/linkman_manage.php" style="color:#FBF8D5;" title="������ؿͻ�����ϵ����Ϣ">��ϵ�˹���</a></li>
    			<li class="topmenuli"><a href="/userinfo/market_manage.php" style="color:#FBF8D5;" title="�����г����Ϣ">�г��</a></li>
    			<li class="topmenuli"><a href="/userinfo/chance_manage.php" style="color:#FBF8D5;" title="�̻�����Ŀ����">�̻�����</a> </li>
    			<li class="topmenuli"><a href="/userinfo/user_manage.php" style="color:#FBF8D5;" title="�����ż������û�">��������</a></li>
    			<li class="topmenuli156"><a href="/userinfo/client_manage.php" style="color:#FBF8D5;" title="רҵMEDDIS��ҵ���ᡢ��Ŀ�ɹ��ʷ���">רҵMEDDIC���۷���</a></li>
    		</ul>
   	  </div>
    	</td>
    <td align="center" class="out"><a href="#" style="color:#ff8;">����</a> | <a href="#" style="color:#ff8;">����</a> | <a href="/userinfo/user_exit.php" style="color:#ff8;">�˳�</a>
</td>
  </tr>
</table>

