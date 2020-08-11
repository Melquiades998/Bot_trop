<?php namespace api;

class getupdateinfo{
    //atributos

    //Informacion obtenida del chat
    public $chat_Id;
    public $message;
    public $message_Id;

    //Informacion obtenida del CallbackQuery
    public $query_Id;
    public $query_user_Id;
    public $query_Data;
    public $query_message_Id;

    //Metodos
    public function __construct(
        $upDate_info
    ){
        //Informacion obtenida del chat
        $this->chat_Id = $upDate_info["message"]["chat"]["id"];
        $this->message = $upDate_info["message"]["text"];
        $this->message_Id = $upDate_info["message"]["message_id"];

        //Informacion obtenida del CallbackQuery
        $this->query_Id = $upDate_info["callback_query"]["id"];
        $this->query_user_Id = $upDate_info["callback_query"]["from"]["id"];
        $this->query_Data = $upDate_info["callback_query"]["data"];
        $this->query_message_Id = $upDate_info["callback_query"]["message"]["message_id"];
    }
}

?>