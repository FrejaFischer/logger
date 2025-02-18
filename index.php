<?php

require_once 'src/logger.php';

// Sample usage
logText(
    'Message 1', 
    'Hello there', 
    'Further messages', 
    [
        'One message', 
        'Another message', 
        'A further message'
    ]
);
//logText('SERVER INFO', $_SERVER);