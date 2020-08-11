<?php

spl_autoload_register(function($Rut){
    $Ruta = str_replace("\\","/",$Rut).".php";
    require_once $Ruta;
});
?>