<h1>La formation TIIR en quelques mots</h1>

<p>
L'objectif de la spécialité TIIR (Technologies pour les Infrastructures de l'Internet et pour leur Robustesse)
est de former des ingénieurs en informatique réactifs, autonomes et capables de maîtriser la complexité 
grandissante des infrastructures matérielles et logicielles qui constituent le socle des applications, 
de l'internet et des réseaux.
</p>

<p>
La formation dispensée en TIIR a pour ambition de produire des spécialistes des réseaux et des systèmes en
enrichissant les bases solides acquises durant les années précédentes dans ces domaines. Les enseignements 
de la spécialité TIIR développent aussi des compétences de pointe sur les technologies actuellement déployées 
dans l'entreprise (savoir faire) ainsi que les qualités humaines des apprentis ingénieurs (savoir être), 
indispensables pour la gestion des infrastructures et des réseaux.
</p>
<?php

include('classes/news.php');

$news = new News();

/* Displays news */
foreach ($news->get_news(0) AS $single_news)
{
		printf("<h2>%s (par %s)</h2>\n", $single_news['title'], $user->get_name_from_id($single_news['id_user']));
		printf("<p>%s</p>\n", $single_news['content']);
}

?>