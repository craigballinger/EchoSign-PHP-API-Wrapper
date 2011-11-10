<?php

    class EchoSignDocumentPackage extends EchoSignPackage{
        
        protected $recipients;
        protected $type = 'documentCreation';
        
        function __construct(EchoSignDocument $document, EchoSignRecipients $recipients){
            parent::__construct($document);
            $this->recipients = $recipients;
        }
        
        function BuildCreationInfo(){
            
            $creation_info = array(
                                    'fileInfos' =>  $this->getFileInfos(),
                                    'name' => $this->name,
                                    'callbackInfo' => $this->getCallbackInfo()
                                 );
            
            
            $creation_info = array_merge(
                                            $creation_info, 
                                            $this->options->asArray(), 
                                            $this->getMergeFields(),
                                            $this->recipients->asArray()
                                        );
            
            return $creation_info;
            
        }
        
    }
    