<?php
    
    spl_autoload_register('echoSignLoader');
    
    function echoSignLoader($class){
        require 'app/libraries/echosign/pkg/'.str_replace('EchoSign', '', $class).'.php';
    }
    
    