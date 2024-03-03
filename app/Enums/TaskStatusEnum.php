<?php

namespace App\Enums;

enum TaskStatusEnum: string
{
    case SCHEDULED = 'scheduled';
    case ACCEPTED = 'accepted';
    case CANCELED = 'canceled';
    case DONE = 'done';

}
