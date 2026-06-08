<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    /**
     * Format a date in French format
     * 
     * @param Carbon $date
     * @param string $format
     * @return string
     */
    public static function formatFrench(Carbon $date, $format = 'd F Y, H:i')
    {
        $months = [
            'January' => 'janvier',
            'February' => 'février',
            'March' => 'mars',
            'April' => 'avril',
            'May' => 'mai',
            'June' => 'juin',
            'July' => 'juillet',
            'August' => 'août',
            'September' => 'septembre',
            'October' => 'octobre',
            'November' => 'novembre',
            'December' => 'décembre',
        ];

        $formatted = $date->format($format);
        
        foreach ($months as $en => $fr) {
            $formatted = str_replace($en, $fr, $formatted);
        }
        
        return $formatted;
    }
}
