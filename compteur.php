<?php
// Démarre la session
session_start();

// Créer une variable de session pour le compteur et initialise le compteur
if(!isset($_SESSION['compteur'])) {
    $_SESSION['compteur'] = 0;
}

// Incrémente le compteur
$_SESSION['compteur']++;

// Affiche le compteur
echo $_SESSION['compteur'];
