    	<div id="leftmenu">
    		<ul id="leftmenuul">
    			<li class="leftmenuli">���۹���</li>
          <li class="leftmenuli_2"><a href="chance_add.php" target="_self">�½�����</a></li>
          <li class="leftmenuli_2"><a href="chance_manage.php" target="_self">��������</a></li>
      <!--<?php if (checkuserceo(trim($_SESSION["isfuze"]))) echo "<li class='leftmenuli_2'><a href='chance_manage_ceo.php' target='_self'>�쵼��ѯ�̻�</a></li>";?>-->
	  		<?php if (trim($_SESSION["parentid"])==-1) echo "<li class='leftmenuli_2'><a href='chance_manage_ceo.php' target='_self'>�쵼��ѯ�̻�</a></li>";?>
			<?php if (trim($_SESSION["parentid"])==0) echo "<li class='leftmenuli_2'><a href='chance_manage_ceo.php' target='_self'>�����˲�ѯ�̻�</a></li>";?>
    		</ul>
    	</div> 