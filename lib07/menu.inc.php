<?php
//==========================================

//==========================================



class dbzzsql
{
	var $host     = "localhost";			//mssql������
	var $user     = "sa";			//mssql�û���
	var $pwd      = "";			//mssql����
	var $dbname   = "xtcapp_dyl";			//mssql���ݿ�����
	var $linkid   = 0;			//������������id
	var $queryid  = 0;			//���������ѯid
	var $fetchmode= mssql_ASSOC;//ȡ��¼ʱ��ģʽ
	var $querytimes = 0;		//�����ѯ�Ĵ���
	var $errno    = 0;			//mssql�������
	var $error    = "";			//mssql������Ϣ
	var $record   = array();	//һ����¼����
//	
	//======================================
	// ����: mssql()
	// ����: ���캯��
	// ����: ������ı�������
	// ˵��: ���캯�����Զ��������ݿ�
	//      ������ֶ�����ȥ�����Ӻ���
	//======================================
	function mssql($host,$user,$pwd,$dbname)
	{	if(empty($host) || empty($user) || empty($dbname))
			$this->halt("���ݿ�������ַ,�û��������ݿ����Ʋ���ȫ,����!");
		$this->host    = $host;
		$this->user    = $user;
		$this->pwd     = $pwd;
		$this->dbname  = $dbname;
		$this->connect();//����Ϊ�Զ�����
	}
	//======================================
	// ����: connect($host,$user,$pwd,$dbname)
	// ����: �������ݿ�
	// ����: $host ������, $user �û���
	// ����: $pwd ����, $dbname ���ݿ�����
	// ����: 0:ʧ��
	// ˵��: Ĭ��ʹ�����б����ĳ�ʼֵ
	//======================================
	function connect($host = "", $user = "", $pwd = "", $dbname = "")
	{
		if ("" == $host)
			$host = $this->host;
		if ("" == $user)
			$user = $this->user;
		if ("" == $pwd)
			$pwd = $this->pwd;
		if ("" == $dbname)
			$dbname = $this->dbname;
		//now connect to the database
		$this->linkid = mssql_connect($host, $user, $pwd);
//		echo $this->linkid."---";
//		$conn=mssql_pconnect ($host, $user, $pwd) or die("�޷����ӵ����ݿ������");//����mssql���ݿ������
//		mssql_query("SET NAMES 'gb2312'");
		if (!$this->linkid)
		{
			$this->halt();
			return 0;
		}
		if (!mssql_select_db($dbname, $this->linkid))
		{
			$this->halt();
			return 0;
		}
		return $this->linkid;			
	}
	//=====================================
	// ����: query($sql)
	// ����: ���ݲ�ѯ
	// ����: $sql Ҫ��ѯ��SQL���
	// ����: 0:ʧ��
	//======================================
	function query($sql)
	{
		$this->querytimes++;
		$this->queryid = mssql_query($sql, $this->linkid);
		if (!$this->queryid)
		{	
			$this->halt();
			return 0;
		}
//		else
//		{
//			echo "ִ�д���";
//			exit;
//			}
		return $this->queryid;
	}
	//======================================
	// ����: setfetchmode($mode)
	// ����: ����ȡ�ü�¼��ģʽ
	// ����: $mode ģʽ mssql_ASSOC, mssql_NUM, mssql_BOTH
	// ����: 0:ʧ��
	//======================================
	function setfetchmode($mode)
	{
		if ($mode == mssql_ASSOC || $mode == mssql_NUM || $mode == mssql_BOTH) 
		{
			$this->fetchmode = $mode;
			return 1;
		}
		else
		{
			$this->halt("�����ģʽ.");
			return 0;
		}
		
	}
	//======================================
	// ����: fetchrow()
	// ����: �Ӽ�¼����ȡ��һ����¼
	// ����: 0: ���� record: һ����¼
	//======================================
	function fetchrow()
	{
		$this->record = mssql_fetch_array($this->queryid,$this->fetchmode);
		return $this->record;
	}
	//======================================
	// ����: fetchAll()
	// ����: �Ӽ�¼����ȡ�����м�¼
	// ����: ��¼������
	//======================================
	function fetchAll()
	{
		$arr = array();
		while($this->record = mssql_fetch_array($this->queryid,$this->fetchmode))
		{
			echo $this->queryid."<br>".$this->fetchmode;
			$arr[] = $this->record;
			
		}
		mssql_free_result($this->queryid);
		return $arr;
	}
	//======================================
	// ����: getvalue()
	// ����: ���ؼ�¼��ָ���ֶε�����
	// ����: $field �ֶ������ֶ�����
	// ����: ָ���ֶε�ֵ
	//======================================
	function getvalue($field)
	{
		return $this->record[$field];
	}
	//======================================
	// ����: querytimes()
	// ����: ����Ӱ��ļ�¼��
	//======================================
	function querytimes()
	{
		return mssql_affected_rows($this->linkid);
	}
	//======================================
	// ����: recordcount()
	// ����: ���ز�ѯ��¼������
	// ����: ��
	// ����: ��¼����
	//======================================
	function recordcount()
	{
		return mssql_num_rows($this->queryid);
	}
	//======================================
	// ����: getquerytimes()
	// ����: ���ز�ѯ�Ĵ���
	// ����: ��
	// ����: ��ѯ�Ĵ���
	//======================================
	function getquerytimes()
	{
		return $this->querytimes;
	}
	//======================================
	// ����: getversion()
	// ����: ����mssql�İ汾
	// ����: ��
	//======================================
	function getversion() 
	{
		$this->query("select version() as ver");
		$this->fetchrow();
		return $this->getvalue("ver");
	}
	//======================================
	// ����: getdbsize($dbname, $tblPrefix=null)
	// ����: �������ݿ�ռ�ÿռ��С
	// ����: $dbname ���ݿ���
	// ����: $tblPrefix ���ǰ׺,��ѡ
	//======================================
	function getdbsize($dbname, $tblPrefix=null) 
	{
		$sql = "SHOW TABLE STATUS FROM " . $dbname;
		if($tblPrefix != null) {
			$sql .= " LIKE '$tblPrefix%'";
		}
		$this->query($sql);
		$size = 0;
		while($this->fetchrow())
			$size += $this->getvalue("Data_length") + $this->getvalue("Index_length");
		return $size;
	}
	//======================================
	// ����: insertid()
	// ����: �������һ�β��������id
	// ����: ��
	//======================================
	function insertid() {
		return mssql_insert_id();
	}
	//====================================== 
	// ����: halt($err_msg)
	// ����: �������г�����Ϣ
	// ����: $err_msg �Զ���ĳ�����Ϣ
	//=====================================
	function halt($err_msg="")
	{
		if ("" == $err_msg)
		{
			$this->errno = mssql_errno();
			$this->error = mssql_error();
			echo "<b>mssql error:<b><br>";
			echo $this->errno.":".$this->error."<br>";
//			echo "<script language=javascript>alert('���ִ���,�뼰ʱ��վ������,лл!');document.location.href=('/index.php');</script>";
			exit;
		}
		else
		{
			echo "<b>ִ�д���:<b><br>";
			echo $err_msg."<br>";
			exit;
		}
	}
//	mssql_close($this->linkid);
}
?>