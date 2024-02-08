<?php

class Functions {
    // static Permet d'appeller des methode sans avoir a instancier dees objets functiuns
    public static function sanitize(?string $data):string{
        return htmlentities(strip_tags(stripslashes(trim($data))));

    }
}