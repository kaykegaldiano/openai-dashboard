<?php

namespace App\Enums;

enum Status: string
{
    case Pending = 'P';
    case Approved = 'A';
    case Canceled = 'C';
}
