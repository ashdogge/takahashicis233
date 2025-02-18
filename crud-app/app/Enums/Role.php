<?php

namespace App\Enums;
// Define enum with names VIEWER/ADMINISTRATOR to strings 'viewer' and 'administrator for use with sqlite
enum Role: string
{
    case VIEWER = 'viewer';
    case ADMINISTRATOR = 'administrator';
}