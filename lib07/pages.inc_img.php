<?
function getpage($sumrows,$page,$link,$pagelistnum)
{
if (empty($page))
  $nowpage=1;
else
  $nowpage=$page;//��ǰҳ

if ($sumrows % $pagelistnum==0) $sumpage=$sumrows/$pagelistnum;
else $sumpage=floor($sumrows/$pagelistnum)+1;//��ҳ��
$tmphead="<a href=".$link."&page=";
if ($nowpage<2)
  $showdown='<table ><form name="selform" method="post" action=""><tr><td valign=bottom><img src=/myimages/1/page_first.gif>&nbsp;&nbsp;<img src=/myimages/1/page_front.gif>&nbsp;&nbsp;';
else
  $showdown='<table ><form name="selform" method="post" action=""><tr><td valign=bottom>'.$tmphead."1><img src=/myimages/1/page_first.gif></a>&nbsp;&nbsp;".$tmphead.($nowpage-1)."><img src=/myimages/1/page_front.gif></a>&nbsp;&nbsp;";
if ($nowpage<$sumpage)
   $showdown=$showdown.$tmphead.($nowpage+1)."><img src=/myimages/1/page_next.gif></a>&nbsp;&nbsp;".$tmphead.$sumpage."><img src=/myimages/1/page_last.gif></a>&nbsp;&nbsp;";
else
  $showdown=$showdown."<img src=/myimages/1/page_next.gif>&nbsp;&nbsp;<img src=/myimages/1/page_last.gif>&nbsp;&nbsp;";
//��ȡ������ת�����
$selectcode='<script language="javascript">
<!--
function gopagenav(page)
{
  location="'.$link.'&page="+page;
}
//-->
</script><select name="selpage" id="selpage" onChange="javascript:gopagenav(this.value);">';
for ($i=1;$i<=$sumpage;$i++)
{
  $selectcode.='<option value="'.$i.'" ';
  if ($i==$nowpage) $selectcode.="selected";
  $selectcode=$selectcode.'>- '.$i.' -</option>';
}
$selectcode.='</select>';

$showdown.="��</td><td>".$selectcode."</td><td>ҳ����".$sumpage."ҳ&nbsp;&nbsp;�ܼ�¼��:$sumrows</td></tr></form></table>";
return $showdown;
}

?>