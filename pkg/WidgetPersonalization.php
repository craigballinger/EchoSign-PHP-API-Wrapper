<?php

    class EchoSignWidgetPersonalization{
        
        protected $email;
        protected $comment;
        protected $expiration;
        protected $reusable;
        
        function __construct($email){
            $this->email = $email;
        }
        
        function getEmail(){
            return $this->email;
        }
        
        function setComment($comment){
            $this->comment = $comment;
        }
        
        function getComment(){
            return $this->comment;
        }
        
        function setExpiration($expiration){
            $this->expiration = $expiration;
        }
        
        function getExpiration(){
            return $this->expiration;
        }
        
        function setReusable($reusable){
            $this->reusable = $reusable;
        }
        
        function getReusable(){
            return $this->reusable;
        }
        
        function asArray(){
            
            $options = array(
                                'email' => $this->getEmail(),
                                'comment' => $this->getComment(),
                                'expiration' => $this->getExpiration(),
                                'reusable' => $this->getReusable(),
                            );
            
            foreach($options as $k => $v){
                if(empty($v)){
                    unset($options[$k]);
                }
            }
            
            return array('personalizationInfo' => $options);
            
        }
        
    }
    