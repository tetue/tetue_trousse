<?php

// Autoriser les retours a la ligne
// $GLOBALS['spip_pipeline']['pre_propre'] .= '|post_autobr';

// Masquer les numeros de titre
$GLOBALS['table_des_traitements']['TITRE'][] = 'typo(supprimer_numero(%s))';
$table_des_traitements['NOM'][]= 'supprimer_numero(typo(%s))';

// Refuser les styles de la barre typo
// $GLOBALS['BarreTypoEnrichie_Preserve_Header'] = 'Oui';

// Pour commencer la titraille a h2 avec la barre typo
// $GLOBALS['debut_intertitre'] = '<h2 class="spip">';
// $GLOBALS['fin_intertitre'] = '</h2>';
// $GLOBALS['debut_intertitre_2'] = '<h3 class="spip">';
// $GLOBALS['fin_intertitre_2'] = '</h3>';
// $GLOBALS['debut_intertitre_3'] = '<h4>';
// $GLOBALS['fin_intertitre_3'] = '</h4>';
// $GLOBALS['debut_intertitre_4'] = '<h5>';
// $GLOBALS['fin_intertitre_4'] = '</h5>';
// $GLOBALS['debut_intertitre_5'] = '<h6>';
// $GLOBALS['fin_intertitre_5'] = '</h6>';

// Ne pas transformer toutes les urls en lien !
// define('_EXTRAIRE_LIENS',',^$,');

// Limiter la longueur des messages de forum
define('_FORUM_LONGUEUR_MAXI', 1500);

// Limiter la taille des images uploadees
define('_LOGO_MAX_WIDTH',800) ;
define('_LOGO_MAX_HEIGHT',600) ;
define('_IMG_MAX_WIDTH',2000) ;
define('_IMG_MAX_HEIGHT',2000) ;
define('_IMG_MAX_SIZE',2048); /* 1Mo=1024Ko */
// define('_DOC_MAX_SIZE', 0);

// Forcer la langue selon le choix du visiteur
$GLOBALS['forcer_lang']=true;

// Re-ecriture d'URLs Cf.: http://marcimat.magraine.net/URLs-en-minuscules
define('_SPIP_SCRIPT','');
define('_url_minuscules',1);
define('_url_arbo_minuscules',1);
define('_MARQUEUR_URL','');
define('_url_propres_sep_id','-');
define('_URLS_PROPRES_MIN', 2);
define('_URLS_PROPRES_MAX', 80);
define('_URLS_ARBO_MIN', 2);
define('_URLS_ARBO_MAX', 80);

# choix du squelette : tetue.net/?var_skel=toto
# pour revenir au normal : tetue.net/?var_skel=
$liste_skels = array(
'2001',
'2002',
'2003',
'2004',
'2005',
'2006',
'2007',
'2008',
'2009',
'2010',
'2011',
'2012',
'2013',
'2014',
'2015',
'2016',
'test'
);
if (isset($_GET['var_skel'])) {
	if (in_array($_GET['var_skel'],$liste_skels))
		setcookie('skel', $_COOKIE['skel'] = $_GET['var_skel'], NULL, '/');
	else
		setcookie('skel', $_COOKIE['skel'] = '', time()-3600*24, '/');
}
if (isset($_COOKIE['skel']) AND in_array($_COOKIE['skel'],$liste_skels) AND is_dir(_DIR_RACINE.$_COOKIE['skel']))
	$dossier_squelettes = $_COOKIE['skel'];

?>