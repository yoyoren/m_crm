    	<div id="leftmenu">
    		<ul id="leftmenuul">
    			<li class="leftmenuli">�����̻�����</li>
          <li class="leftmenuli_2"><a href="meddic_add.php" target="_self">�½�����</a></li>
          <li class="leftmenuli_2"><a href="meddic_manage.php" target="_self">�������</a></li>
      <? if (checkuserceo(trim($_SESSION["isfuze"]))) echo "<li class='leftmenuli_2'><a href='meddic_manage_ceo.php' target='_self' title='�쵼����������۷�������'>�쵼�������</a></li>";?>
          
		
    		</ul>
    	</div> 