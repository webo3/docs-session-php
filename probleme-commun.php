<?php 
// Init some script
// include('config.php');

// Remarquer l'espace
?>

<?php 
// L'erreur aura lieu seulement si le output_buffering n'est pas utiliser.
// Ici on émule cette effet
ob_end_flush();

include('compteur.php'); 
?>

