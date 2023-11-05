<?php

namespace Helper {
    class InputHelper {
        static function input($info)
        {
            echo "$info : ";
            $result = fgets(STDIN);

            return trim($result);
        }
    }
}