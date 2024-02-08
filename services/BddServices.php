<?php

interface BddService {
    // Définir la signature des méthode que requiert l'interface
    public function connect():PDO;
}