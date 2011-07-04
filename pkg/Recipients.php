<?php

    class EchoSignRecipients{
        protected $recipients = array();
        protected $ccs = array();
        
        function add($recipient){
            $this->recipients[] = $recipient;
        }
        
        function addCC($recipient){
            $this->ccs[] = $recipient;
        }
        
        function asArray(){
            return array(
                            'tos' => $this->recipients, 
                            'ccs' => $this->ccs
                        );
        }
        
    }