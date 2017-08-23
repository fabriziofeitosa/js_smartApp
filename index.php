<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include("Gerenciamento/connect.php");
$SiteAtual->conecta();
$cont=0;
echo "<meta name=\"keywords\" content=\"sitezinho, projeto sitezinho";
$busca =  mysql_query("SELECT * FROM palavra_chave order by id") or die(mysql_error());
$total = mysql_num_rows($busca);
while ($linha = mysql_fetch_array($busca)){
      $cont++;
      echo ", ";
      echo $linha['palavra'];
}
echo "\"/>";
  $ip = getenv("REMOTE_ADDR");
  $data = date("Y-m-d");
  $hora = date("H:i:s");
  $pagina = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  $pagina = str_replace('.php','',$pagina);
  $busca =  mysql_query("SELECT * FROM clientes_ip WHERE ip='$ip' AND data='$data'");
  if (mysql_num_rows($busca)==0){
     $result = mysql_query ("INSERT INTO clientes_ip (ip,data,hora) VALUES ('$ip','$data','$hora')") or die(mysql_error());
  }
  $busca =  mysql_query("SELECT * FROM pagina_ip WHERE ip='$ip' AND data='$data' AND pagina='$pagina'");
  if (mysql_num_rows($busca)==0){
     $result = mysql_query ("INSERT INTO pagina_ip (ip,data,pagina) VALUES ('$ip','$data','$pagina')") or die(mysql_error());
  }
?>
<link rel="stylesheet" type="text/css" href="css/basic.css" />
<link rel="stylesheet" type="text/css" href="css/shadowbox.css">

<link href="css/style.css" rel="stylesheet">

<script type="text/javascript" src="js/shadowbox.js"></script>
<script type="text/javascript">Shadowbox.init({skipSetup: true});</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/fadeInfadeOut.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<title>Pastéis e Pastéis</title>
</head>
<?
  $busca =  mysql_query("SELECT * FROM noticias WHERE destaque='s'") or die(mysql_error());
  $linha = mysql_fetch_array($busca);
  if (mysql_num_rows($busca)>0){
?>
<body onload="popPromo();">
<? }else{ ?>
<body>
<? } ?>

<!-- INICIO DO CÓDIGO DO BANNER -->
<div class="smart-banner" style="display: none;">
  <!-- ICONE PADRÃO ABAIXO -->
  <img class="icon" src="http://www.freeiconspng.com/uploads/windows-8-start-button-icon-6.png">
  <div class="meta">
    <span class="name">Workana App</span>
    <small class="author">Fabrizio Feitosa</small>
  </div>
  <!-- LINK DA LOJA E TEXTO DO BOTAO PADRÃO-->
  <a class="btn" href="#LinkPadraoApp" target="itunes_store">Free</a>
  <a class="close" href="#close">&times;</a>
</div>
<!-- FIM DO CÓDIGO -->

<div id="container">
  <div id="topo">
    <? include('topo.php'); ?>
  </div>
  <div id="content">&nbsp;</div>
  <div id="rodape">
    <? include('rodape.php'); ?>
  </div>
</div>

<!-- jQuery (JavaScript plugins) | CHAME TUDO DAQUI PRA BAIXO! --> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!-- Script SmartApp -->
<script type="text/javascript" src="js/smartApp.js"></script>

</body>
</html>
