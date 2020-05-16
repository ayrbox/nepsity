<?php

function ns_date() {
    return date('Y-m-d H:i:s');
}


function ns_string_format($string, $args) {
    
    $__index = 0;
    foreach($args as $value) {
        
        
        $string = str_replace( '{'.$__index.'}', $value, $string );         
        $__index++;
    }
    
    return $string;
}


function ns_date_format($date, $datestring = NULL) {
    
    $datestring || $datestring = 'Y-m-d';
    
    $__date = new DateTime($date);
    return $__date->format($datestring);
    
}


function ns_string_left($string, $length = NULL) {
    
    $length || $length = 100;
    
    return substr($string, 0, $length);
}


function ns_array_contents($array, $value) {    
    if($array) {
        return in_array($value, $array);                   
    } 
    return FALSE;    
}


function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }    
    return false;
}
