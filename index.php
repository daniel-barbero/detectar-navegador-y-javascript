<?php
include('prog/browser.php');

$navegador = getBrowser();

$mensaje = segun_navegador($navegador['name'], $navegador['version']);

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content=""/>
    <meta name="keywords" content="" />
        
    <meta name="copyright" content=""/> 

    <meta name="author" content="Daniel Barbero <daniel.barbero.perez@gmail.com>"/>
    <meta name="robots" content="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<title>detector navegador y javascript</title>
    
    <link href="css/browser.css" rel="stylesheet" />
</head>

<body>
<noscript><div class="button_continuar"><a href="index2.php?config=ko" target="_top">Continuar sin Javascript</a></div></noscript>

	<p class="error red" id="html5">
    Debido a la utilización de los estándares y funcionalidades de HTML5 y CSS3, para una adecuada visualización de este portfolio se recomienda la   	utilización de los navegadores <span class="blue">Chrome v.26+</span> (PREFERENTEMENTE) o <span class="blue">Firefox v.20+</span>. 
    <br/>
    Así como tener habilitadas las funcionalidades <span class="blue">Javascript</span> del navegador.
    </p>
    
    <p class="error red" id="verificacion">
    <strong>Navegador:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="sprite <?php echo $navegador['name']; ?>"></span>
    <em><span id="navegador" class="red"><?php echo $mensaje[0];?></span></em>
    <span class="sprite <?php echo $mensaje[1]; ?>"></span>
    <br/>
    Puede comprobar la compatibilidad de su navegador
    <span class="blue"><?php echo $navegador['name'] . ' versión ' . $navegador['version'];?></span> en 
    <a href="http://html5test.com/">	http://html5test.com/</a>.
    <br/><br/>
    <strong>Javascript:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em>
    <span id="javascript1">Deshabilitado</span></em><span class="sprite ko" id="javascript2"></span>
    </p>
    
    
<script type="text/javascript">	
var doc1 = document.getElementById('javascript1');
var doc2 = document.getElementById('javascript2');
var doc3 = document.getElementById('navegador');

if(navigator.javaEnabled() ){
	doc1.innerHTML="Habilitado";
	doc2.className = "sprite ok";
	}
if(doc1.innerHTML == "Habilitado" && doc3.innerHTML == "OK"){
	setTimeout(function(){
		// window.open('index2.php' , '_self');
  		alert('Funciona!!!');
	  },5000);
	}

</script>


<?php if($mensaje[0] != 'OK'){ echo '<div class="button_continuar"><a href="index2.php?config=ko" target="_top">Continuar de todas formas</a></div>'; } ?> 
     
</body>



</html>
