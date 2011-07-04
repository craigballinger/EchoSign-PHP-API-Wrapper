<?php
    
    class EchoSignOptions{
        
        protected $signature_type = 'ESIGN';
        protected $signature_flow = 'SENDER_SIGNATURE_NOT_REQUIRED';
        protected $security_options;
        protected $reminder_frequency;
        protected $callback_url;
        protected $signing_deadline;
        protected $locale;
        
        function setSignatureType($type){
            $this->signature_type = $type;
        }
        
        function getSignatureType(){
            return $this->signature_type;
        }
        
        function setSignatureFlow($flow){
            $this->signature_flow = $flow;
        }
        
        function getSignatureFlow(){
            return $this->signature_flow;
        }
        
        function setSecurityOptions(EchoSignSecurityOptions $options){
            $this->securityOptions = $options;
        }
        
        function getSecurityOptions(){
            return $this->security_options;
        }
        
        function setReminderFrequency($frequency){
            $this->reminder_frequency = $frequency;
        }
        
        function getReminderFrequency(){
            return $this->reminder_frequency;
        }
        
        function setCallbackUrl($url){
            $this->callback_url = $url;
        }
        
        function getCallbackUrl(){
            return $this->callback_url;
        }
        
        function setSigningDeadline($days){
            $this->signing_deadline = $days;
        }
        
        function getSigningDeadline(){
            return $this->signing_deadline;
        }
        
        function setLocale($locale){
            $this->locale = $locale;
        }
        
        function getLocale(){
            return $this->locale;
        }
        
        function asArray(){
            
            $options = array(
                                'signatureType' => $this->getSignatureType(),
                                'signatureFlow' => $this->getSignatureFlow(),
                                'securityOptions' => $this->getSecurityOptions(),
                                'reminderFrequency' => $this->getReminderFrequency(),
                                'callbackInfo' => $this->getcallbackUrl(),
                                'daysUntilSigningDeadline' => $this->getSigningDeadline(),
                                'locale' => $this->getLocale()
                            );
            
            foreach($options as $k => $v){
                if(empty($v)){
                    unset($options[$k]);
                }
            }
            
            return $options;
            
        }
        
    }
    