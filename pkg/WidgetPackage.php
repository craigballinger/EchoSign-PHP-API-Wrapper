<?php

    class EchoSignWidgetPackage extends EchoSignPackage{
        
        protected $widget;
        protected $type = 'widget';
        
        function __construct(EchoSignWidget $widget, EchoSignDocument $document){
            parent::__construct($document);
            $this->widget = $widget;
        }      
        
        function BuildCreationInfo(){
            
            $creation_info = array(
                                    'fileInfos' =>  $this->document->getFileInfo(),
                                    'name' => $this->document->getDocumentName(),
                                 );
            
            
            $creation_info = array_merge(
                                            $creation_info, 
                                            $this->options->asArray(),
                                            $this->document->getMergeFields()->asArray(),
                                            $this->widget->asArray()
                                        );
            
            return $creation_info;
            
        }
    }
