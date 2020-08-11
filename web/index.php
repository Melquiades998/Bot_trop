<?php
/* Requerido para que funcione*/
require_once "api/autoload.php";
$bot_toKen = "1168680043:AAHk2PV6zspha1Sxt_5csH2qOvbNSjj5RKY";
$client = new api\client($bot_toKen);
$upDate_info = $client->getUpdate();

//Informacion obtenida del chat
$chat_Id = $client->getUpdate_full->chat_Id;
$message = $client->getUpdate_full->message;
$message_Id = $client->getUpdate_full->message_Id;

//Informacion obtenida del CallbackQuery
$query_Id = $client->getUpdate_full->query_Id;
$query_user_Id = $client->getUpdate_full->query_user_Id;
$query_Data = $client->getUpdate_full->query_Data;
$query_message_Id = $client->getUpdate_full->query_message_Id;

/** --------- Contenido del bot --------- */

//Traducción:
$Lenguage = null;
if ($query_Data == "es_es") {
    $E_Lang = "es_es";
} if ($query_Data == "us_us") {
    $E_Lang = "us_us";
}
switch ($E_Lang) {
    case 'es_es':
        require_once "lang/es_es.php";
        $Lenguage = 'es_es';
        break;
    case 'us_us':
        require_once "lang/us_us.php";
        $Lenguage = 'us_us';
        break;
    
    default:
        require_once "lang/es_es.php";
        break;
}
//Al inicio
if (!isset($Lenguage)) {
    switch ($message) {
        case '/start':
            $Esus = $client->buttons('[{"text":"🇺🇸English","callback_data":"us_us"},{"text":"🇪🇸Spanish","callback_data":"es_es"}]',2,true);
            $client->sendMessage($chat_Id,$traduc['Inicio'],'html',$Esus); //sendphoto es lo que va aqui
            break;
    }
} else {
    switch ($message) {
        case '/start':
            $traduc['MainP1_1'] = $traduc['Status'].$Status.$traduc['Main'];
            $Main = $client->buttons('[{"text":"'.$traduc["button-stand"].'","callback_data":"Stand"},{"text":"'.$traduc["button-openshop"].'","callback_data":"OpenShop"}]',2,true);
            $client->sendMessage($chat_Id,$traduc['MainP1_1'],'html',$Main);
            break;
    }
}
$Status_Shop = true;
if ($Status_Shop == true) {
    $Status = $traduc['Open'];
} else {
    $Status = $traduc['Closet'];
}
$traduc['MainP1'] = $traduc['Status'].$Status.$traduc['Main'];
$Main = $client->buttons('[{"text":"'.$traduc["button-stand"].'","callback_data":"Stand"},{"text":"'.$traduc["button-openshop"].'","callback_data":"OpenShop"}]',2,true);

if ($query_Data == "es_es" or $query_Data == "us_us") {
    $client->editMessage($query_user_Id,$query_message_Id,$traduc['MainP1'],'html',$Main);
}

if ($query_Data == "Stand") {
    $client->editMessage($query_user_Id,$query_message_Id,$traduc['MainP1'],'html',$Main);
}


















/*
$menus = $client->buttons('[{"text":"Cubadebate","url":"https://www.cubadebate.cu/"},{"text":"OpenShop","callback_data":"tresdedos"}]',2,true);
switch ($message) {
    case '/comenzar':
        $mensaje = "Bienvenido a la tienda de ensueños donde vas a encontrar todo tipo de posiones"; // lo puse de prueba
        $client->sendMessage($chat_Id,$mensaje,null,$menus);
       echo "<br><br>"; //pruebaaaaaaaaaaaaaaaaaaaaaaa
       echo "<br><br>"; //pruebaaaaaaaaaaaaaaaaaaaaaaa
        break;
    }
    switch ($query_Data) {
        case 'tresdedos':
            $client->answerQuery($query_Id,"¡ La tienda ya esta abierta !");// tambien es una prueba: Responde tipo notificacion
           echo "<br><br>"; //pruebaaaaaaaaaaaaaaaaaaaaaaa
            echo "<br><br>"; //pruebaaaaaaaaaaaaaaaaaaaaaaa
            $client->editMessage($query_user_Id,$query_message_Id,"Esto deberia cambiar para aca",null,$menus);// tambien es una prueba
            break;
    }

    $ilonha = "<br><br>😁<i>Bienvenido - Welcome</i>🤗<br>
    <b>✨Oblivion shop✨</b>, un lugar donde vas a encontrar numerosas pociones que te ayudaran en el desarrollo de tu player, pociones creadas con los mejores ingredientes de los 7 reinos...
    <br> Escoge el idioma que hablas:<br>
    <b>✨Oblivion shop✨</b>, a place where you will find numerous potions that will help you in the development of your player, potions created with the best ingredients of the 7 kingdoms...
    <br> Choose the language you speak:<br>
    🇺🇸English - 🇪🇸Español<br><br>
    ";
    echo $ilonha;
    echo "<b>hola</b> hola<strong>-tres-</strong><i>-yulaa-</i><em>-casa-</em>-<u>underline</u>-<s>strikethrough</s>-<del>strikethrough</del> <b>bold <i>italic bold <s>italic bold strikethrough</s> <u>underline italic bold</u></i> bold</b><code>inline fixed-width code</code>
    <pre>pre-formatted fixed-width code block</pre>";
    echo $query_Data." == ".$query_user_Id." == ".$query_Id." == ".$message_Id." == ".$message." == ".$chat_Id; */
?>
