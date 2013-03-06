<?php

if(env('HTTP_HOST') == 'www.padule.me' || env('HTTP_HOST') == 'padule.me') {
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
} else {
    define('DB_USER', 'mokyu');
    define('DB_PASSWORD', '');
}