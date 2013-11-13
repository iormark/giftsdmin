<?php

/**
 * The content of this project is licensed under the 
 * Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0) 
 * http://creativecommons.org/licenses/by-nc/3.0/
 * 
 * @author mark
 */
final class Utils {

    private function __construct() {
        
    }

    /**
     * stdClass to Array.
     * @param type $d
     * @return type
     */
    public static function objectToArray($d) {
        if (is_object($d)) {
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            return array_map('self::objectToArray', $d);
        } else {
            return $d;
        }
    }

    /**
     * Format date.
     * @param DateTime $date
     * @return string
     */
    public static function formatDate(DateTime $date = null) {
        if ($date === null) {
            return '';
        }
        return $date->format('m/d/Y');
    }

    /**
     * Format date and time.
     * @param DateTime $date
     * @return string
     */
    public static function formatDateTime(DateTime $date = null) {
        if ($date === null) {
            return '';
        }
        return $date->format('m/d/Y H:i');
    }

}

?>
