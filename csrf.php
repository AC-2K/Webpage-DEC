<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function generateCsrfTokenCreate() {
    if (!isset($_SESSION['csrf_tokenCreate'])) {
        $_SESSION['csrf_tokenCreate'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenCreate'];
}

function generateCsrfTokenCreateImage() {
    if (!isset($_SESSION['csrf_tokenCreateImage'])) {
        $_SESSION['csrf_tokenCreateImage'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenCreateImage'];
}


function generateCsrfTokenUpdate() {
    if (!isset($_SESSION['csrf_tokenUpdate'])) {
        $_SESSION['csrf_tokenUpdate'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenUpdate'];
}

function generateCsrfTokenDelete() {
    if (!isset($_SESSION['csrf_tokenDelete'])) {
        $_SESSION['csrf_tokenDelete'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenDelete'];
}
function generateCsrfTokenDeleteImage() {
    if (!isset($_SESSION['csrf_tokenDeleteImage'])) {
        $_SESSION['csrf_tokenDeleteImage'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenDeleteImage'];
}
//----------------------------------------------------------------------------------------------------
function verifyCsrfTokenCreate($token) {
    return isset($_SESSION['csrf_tokenCreate']) && hash_equals($_SESSION['csrf_tokenCreate'], $token);
}
function verifyCsrfTokenCreateImage($token) {
    return isset($_SESSION['csrf_tokenCreateImage']) && hash_equals($_SESSION['csrf_tokenCreateImage'], $token);
}

function verifyCsrfTokenUpdate($token) {
    return isset($_SESSION['csrf_tokenUpdate']) && hash_equals($_SESSION['csrf_tokenUpdate'], $token);
}

function verifyCsrfTokenDelete($token) {
    return isset($_SESSION['csrf_tokenDelete']) && hash_equals($_SESSION['csrf_tokenDelete'], $token);
}
function verifyCsrfTokenDeleteImage($token) {
    return isset($_SESSION['csrf_tokenDeleteImage']) && hash_equals($_SESSION['csrf_tokenDeleteImage'], $token);
}