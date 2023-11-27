<?php

use Carbon\Carbon;

function getCurrentTimeFormatted()
{
    $currentTime = Carbon::now();
    $formattedTime = $currentTime->format('g.iA');

    return $formattedTime;
}
