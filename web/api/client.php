<?php namespace api;

class client extends api {
    //Atributos
    public $siTe_web;
    public $getUpdate_full;

    //Metodos
    public function __construct($toKen_bot){
        $this->siTe_web = 'https://api.telegram.org/bot'.$toKen_bot.'/';

    }
    public function buttons(
        string $info_buttons,
        int $query_buttons_option = 1,
        bool $resize_keyboard_option = false
    ){
        switch ($query_buttons_option) {
            case '1':
                $query_buttons = "keyboard";
                break;
            case '2':
                $query_buttons = "inline_keyboard";
                break;
        }
        if (!$resize_keyboard_option) {
            $resize_keyboard = "false";
        } else {
            $resize_keyboard = "true";
        }
        $buttoms_full = '{"'.$query_buttons.'":['.$info_buttons.'],"resize_keyboard":'.$resize_keyboard.'}';
        return $buttoms_full;
    }
    
    public function getUpdate(){
        $upDate_info = file_get_contents("php://input"); // tambien hay que cambiar aqui
        $upDate_info = json_decode($upDate_info,true);
        $this->getUpdate_full = new getupdateinfo($upDate_info);
        return $upDate_info;
    }

    public function json_send(string $type,array $inf){
        $response = '&text='.urlencode($inf['text']);
        
        if (isset($inf['chat_id'])) {
            $Answer_Id = '?chat_id='.$inf['chat_id'];
        } else {
            $Answer_Id = '?callback_query_id='.$inf["AnswerCallbackQuery_Id"];
        }
        if (isset($inf['message_Id'])) {
            $message_Id = '&message_id='.$inf['message_Id'];
        }
        if (isset($inf['parse_mode'])) {
            $parseMode = '&parse_mode='.$inf['parse_mode'];
        }
        if (isset($inf['reply_markup'])) {
            $reply_markup = '&reply_markup='.$inf['reply_markup'];
        }
        $inf_send_bot = $this->siTe_web.$type.$Answer_Id.$message_Id.$parseMode.$response.$reply_markup;
     //echo $inf_send_bot."<br><br>"; // maldita prueba tambien por dios
       file_get_contents($inf_send_bot); /* envio de mensaje respuesta */
    }
}
?>