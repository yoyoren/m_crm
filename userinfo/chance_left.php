    	<div id="leftmenu">
    		<ul id="leftmenuul">
    			<li class="leftmenuli">销售管理</li>
          <li class="leftmenuli_2"><a href="chance_add.php" target="_self">新建销售</a></li>
          <li class="leftmenuli_2"><a href="chance_manage.php" target="_self">管理销售</a></li>
      <!--<?php if (checkuserceo(trim($_SESSION["isfuze"]))) echo "<li class='leftmenuli_2'><a href='chance_manage_ceo.php' target='_self'>领导查询商机</a></li>";?>-->
	  		<?php if (trim($_SESSION["parentid"])==-1) echo "<li class='leftmenuli_2'><a href='chance_manage_ceo.php' target='_self'>领导查询商机</a></li>";?>
			<?php if (trim($_SESSION["parentid"])==0) echo "<li class='leftmenuli_2'><a href='chance_manage_ceo.php' target='_self'>负责人查询商机</a></li>";?>
    		</ul>
    	</div> 