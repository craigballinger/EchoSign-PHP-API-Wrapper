<?php

    abstract class EchoSignPackage{
        
        protected $name;
        protected $documents;
        protected $options;
        protected $type;
        protected $sender_info;
        protected $callback_info;
        
        function __construct(EchoSignDocument $document, EchoSignOptions $options = null){
            $this->documents[] = $document;
            $this->name = $document->getDocumentName();
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
        
        function setName($name){
            $this->name = $name;
        }
        
        function getType(){
            return $this->type;
        }
        
        function addDocument(EchosignDocument $document){
            $this->documents[] = $document;
        }
        
        protected function getFileInfos(){
            
            $file_infos = array();
            
            foreach($this->documents as $document){
                $file_infos[] = $document->getFileInfo();
            }
            
            return $file_infos;
            
        }
        
        protected function getMergeFields(){
            
            $merge_fields = array();
            
            foreach($this->documents as $document){
                $merge_fields = array_merge($merge_fields, $document->getMergeFields()->asArray());
            }
            
            $merge_fields = array('mergeFields' => $merge_fields);
            
            return array('mergeFieldInfo' => $merge_fields);
            
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
