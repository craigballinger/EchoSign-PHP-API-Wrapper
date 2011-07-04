<?php

    class EchoSignWidget{
        
        protected $redirect_url;
        protected $deframe;
        protected $delay;
        
        function __construct($url){
            $this->redirect_url = $url;
        }
        
        function getUrl(){
            return $this->redirect_url;
        }
        
        function setDeframe($deframe){
            $this->deframe = $deframe;
        }
        
        function getDeframe(){
            return $this->deframe;
        }
        
        function setDelay($delay){
            $this->delay = $delay;
        }
        
        function getDelay(){
            return $this->delay;
        }       
                
        function asArray(){
            
            $options = array(
                                'url' => $this->getUrl(),
                                'deframe' => $this->getDeframe(),
                                'delay' => $this->getDelay()
                            );
            
            foreach($options as $k => $v){
                if(empty($v)){
                    unset($options[$k]);
                }
            }
            
            return array('widgetCompletionInfo' => $options);
            
        }
        
    }
    