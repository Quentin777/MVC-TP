<?php
define('ROOT', dirname(__DIR__));
require ROOT.'/app/App.php';
App::load();

if (isset($_GET['p'])) {
	$page = $_GET['p'];
}else{
	$page = "home";
}


ob_start(); // démarre la temporisation de sortie. Tant qu'elle est enclenchée, aucune //donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en //tampon(cache).
if ($page==='home') {
	require ROOT.'/pages/posts/home.php';
}if ($page==='posts.category') {
	require ROOT.'/pages/posts/category.php';
}if ($page==='posts.single') {
	require ROOT.'/pages/posts/single.php';
}if ($page==='posts.exo1') {
	require ROOT.'/pages/posts/exo1.php'; // crée la page
}
$content = ob_get_clean();
require ROOT.'/pages/templates/default.php'; 


?>


<?php /*
Créer 4 pages php pour le tp 2 :

Creation client : permettant de créer un client
Ajout credit : permettant d'ajouter un crédit
Liste client : permettant de lister les clients
Détail client : permettant d'afficher les infos clients (info perso, crédits)*/
?>