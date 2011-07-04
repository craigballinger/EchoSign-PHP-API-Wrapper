<?php

    class EchoSignSenderInfo{
        
        protected $user_key;
        
        function __construct($user_key){
            $this->user_key = $user_key;
        }
        
        function asArray(){
            
            $options = array('userKey' => $this->user_key);
            
            return array('senderInfo' => $options);
            
        }
        
    }