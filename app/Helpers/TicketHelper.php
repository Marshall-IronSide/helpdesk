<?php

namespace App\Helpers;

class TicketHelper
{
    /**
     * Traduit les priorités en français
     */
    public static function translatePriority($priority)
    {
        $translations = [
            'low' => 'Basse',
            'medium' => 'Moyenne',
            'high' => 'Haute',
        ];
        
        return $translations[$priority] ?? ucfirst($priority);
    }

    /**
     * Traduit les statuts en français
     */
    public static function translateStatus($status)
    {
        $translations = [
            'open' => 'Ouvert',
            'resolved' => 'Résolu',
        ];
        
        return $translations[$status] ?? ucfirst($status);
    }
}
