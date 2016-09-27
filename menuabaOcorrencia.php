<style type="text/css">
.link{
font-family:tahoma;
font-weight:bold;
font-size:9pt;
color:#fff;
text-decoration:none;
}
.aba{
padding:3px 3px 3px 3px;
border-left:1px solid #cccccc;
border-right:1px solid #cccccc;
border-top:1px solid #cccccc;
}
</style>
<table cellpading="0" cellspacing="0" width="800">
<tr>
<td class="aba" bgcolor="<?php echo "".($_GET['a1']=='' ? "#666" : "#0254a6").""; ?>"><a class="link" href="sysOcorrencia.php?a1=0">Incluir Ocorrência</a></td>
<td>&nbsp;</td>
<td class="aba" bgcolor="<?php echo "".($_GET['a2']=='' ? "#666" : "#0254a6").""; ?>"><a class="link" href="chamadasAbertas.php?a2=0">Acompanhamento de ocorrências</a></td>
<td>&nbsp;</td>
<td class="aba" bgcolor="<?php echo "".($_GET['a3']=='' ? "#666" : "#0254a6").""; ?>"><a class="link" href="chamadasFinalizadas.php?a3=0">Consulta de ocorrências</a></td>
</tr>
</table>
