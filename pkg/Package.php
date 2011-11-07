<?php

    abstract class EchoSignPackage{
        
        protected $document;
        protected $options;
        protected $type;
        protected $sender_info;
        protected $callback_info;
        
        function __construct(EchoSignDocument $document, EchoSignOptions $options = null){
            $this->document = $document;
            $this->options = new EchoSignOptions;
        } 
        
        function setCallbackInfo($notify_url){
            $this->callback_info = array('signedDocumentUrl' => $notify_url);
        }
        
        function getCallbackInfo(){
            return $this->callback_info;
        }
        
        function setSenderInfo(EchoSignSenderInfo $sender_info){
            $this->sender_info = $sender_info;
        }
        
        function getType(){
            return $this->type;
        }
        
        abstract function buildCreationInfo();
        
        function asArray(){
            
            $creation_info = $this->buildCreationInfo();
            
            $creation_info_type = $this->getType().'Info';
            
            $package = array($creation_info_type => $creation_info);
            
            if(!empty($this->sender_info)){
                $package = array_merge($package, $this->sender_info->asArray());
            }
            
            return $package;
            
        }
        
    }
