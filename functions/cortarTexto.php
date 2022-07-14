<?php

function cortarTitulo ($str = null) {
    if (strlen($str) > 30) { 
        $str = substr($str, 0, 30) . ' [+]'; 
    } 
    return $str;
}

function cortarTexto ($str = null) {
    if (strlen($str) > 70) { 
        $str = substr($str, 0, 70) . ' [+]'; 
    } 
    return $str;
}

function cortarTexto2 ($str = null) {
    if (strlen($str) > 255) { 
        $str = substr($str, 0, 255) . ' [+]'; 
    } 
    return $str;
}