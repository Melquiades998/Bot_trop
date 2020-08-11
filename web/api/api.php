<?php namespace api;

class api {
    //Atributos
    
    //Metodos
    public function sendMessage(
        $chat_Id,
        $text,
        string $parse_mode = null,
        string $reply_markup = null,
        int $reply_to_message_id = null,
        bool $disable_web_page_preview = null,
        bool $disable_notification = null
        ){
        $inf = [];
        $type="sendMessage";
        $inf['chat_id']=$chat_Id;
        $inf['text']=$text;

        if ($parse_mode !== null) {
            $inf['parse_mode']=$parse_mode;
        }
        if ($reply_markup !== null) {
            $inf['reply_markup']=$reply_markup;
        }
        if ($reply_to_message_id !== null) {
            $inf['reply_to_message_id']=$reply_to_message_id;
        }
        if ($disable_web_page_preview !== null) {
            $inf['disable_web_page_preview']=$disable_web_page_preview;
        }
        if ($disable_notification !== null) {
            $inf['disable_notification']=$disable_notification;
        }
        return $this->json_send($type,$inf);
    }

    public function answerQuery(
        $CallbackQuery_Id,
        $text
    ){
        $inf = [];
        $type = "answerCallbackQuery";
        $inf['text'] = $text;
        $inf['AnswerCallbackQuery_Id'] = $CallbackQuery_Id; 
        return $this->json_send($type,$inf);
    }

    public function editMessage(
        $chat_Id,
        $message_Id,
        $text,
        string $parse_mode = null,
        string $reply_markup = null,
        int $reply_to_message_id = null,
        bool $disable_web_page_preview = null,
        bool $disable_notification = null
    ){
        $inf = [];
        $type = "editMessageText";
        $inf['chat_id']=$chat_Id;
        $inf['message_Id'] = $message_Id;
        $inf['text']=$text;

        if ($parse_mode !== null) {
            $inf['parse_mode']=$parse_mode;
        }
        if ($reply_markup !== null) {
            $inf['reply_markup']=$reply_markup;
        }
        if ($reply_to_message_id !== null) {
            $inf['reply_to_message_id']=$reply_to_message_id;
        }
        if ($disable_web_page_preview !== null) {
            $inf['disable_web_page_preview']=$disable_web_page_preview;
        }
        if ($disable_notification !== null) {
            $inf['disable_notification']=$disable_notification;
        }
        return $this->json_send($type,$inf);
    }
}
?>