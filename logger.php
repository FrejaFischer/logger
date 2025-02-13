<?php

/**
 * Function for logging. Saves params in todays log file (and creates directory and file if needed)
 * @param $content is a numeroues amount of params in any data type, that we want to log
 * @return void
 * 
 */
function logFile(...$content): void
{
    // check if directory exist, and create it if not
    if(!is_dir("log")){
        mkdir("log");
    }

    $output = '';
    
    // for each paramter add linebreaks and add them to the output
    foreach ($content as $param) {
        if (is_string($param)) {
            $output .= '<br>' . $param;  // For strings, just append with <br>
        } elseif (is_array($param)) {
            $output .= '<br>' . print_r($param, true);  // For arrays, use print_r() to print it as-is
        } elseif (is_object($param)) {
            $output .= '<br>' . json_encode($param);  // For objects, use json_encode to print in JSON format
        } else {
            $output .= '<br>' . strval($param);  // For any other type (int, float, etc.), convert to string
        }
    }

    $timestamp = date("Y-m-d H:i:s A"); // current timestamp
    
    $output = '<pre>' . '<br>' . '--- ' . $timestamp . ' --- ' . $output; //connecting the whole log string

    define('FILE_NAME', 'log/log_' . date("Ymd") . '.htm'); // defining file name
    
    file_put_contents(FILE_NAME, $output, FILE_APPEND); // Adding to the files content
}

logFile('Message 1', 'Hello there', 'Further messages', ['One message', 'Another message', 'A further message']);


/* first solution for making the right formatting of parameters */
// $content = array_map(function($param) {
//     if(is_string($param)){
//         return '<br>' . $param;
//     }

//     if(is_array($param)){
//         //return '<br>' . implode($param);
//         return '<br>'. print_r($param, true);
//     }

//     if(is_object($param)){
//         return '<br>' . json_encode($param);
//     }

//     return '<br>' . strval($param);
// }, $content);
// convert array to string
//$content = implode($content);