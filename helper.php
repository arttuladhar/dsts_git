<?php

// Function for basic field validation (present and neither empty nor only white space
function IsNullOrEmptyString($var){
    return (!isset($var) || trim($var)==='');
}

?>