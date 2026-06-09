<?php

if (!function_exists('translatePriority')) {
    function translatePriority($priority)
    {
        return \App\Helpers\TicketHelper::translatePriority($priority);
    }
}

if (!function_exists('translateStatus')) {
    function translateStatus($status)
    {
        return \App\Helpers\TicketHelper::translateStatus($status);
    }
}
