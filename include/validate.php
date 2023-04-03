<?php  
 

 function ValidCountString($str)
 {
    return strlen(trim($str))<3?false:true;  
 }