<?php

require_once __DIR__ . '/KeyChecker.php';

if (!KeyChecker::isValid()) {
    header('Location: setupview.php');
    exit;
}

header('Location: ../mylaravelproject/public/index.php');
exit;

