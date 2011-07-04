<?php

    require '../bootstrap.php';
    $echosign = new EchoSignAPI('Your API KEY Here');
    
    $result = $echosign->ping();
    print_r($result);
    