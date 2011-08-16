<?php
    
    spl_autoload_register('echoSignLoader');
    
    function echoSignLoader($class){
        require 'pkg/'.str_replace('EchoSign', '', $class).'.php';
    }
    
    