<?php

function getVersion() {
    $versionFile = __DIR__ . '/../VERSION';

    if (file_exists($versionFile)) {
        return trim(file_get_contents($versionFile));
    }

    return "0.0.0"; 
}