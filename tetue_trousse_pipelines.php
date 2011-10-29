<?php

function tetue_trousse_insert_head_css($flux) {
	$flux .= '<link rel="stylesheet" type="text/css" href="'.find_in_path('css/tetue_trousse.css').'" media="all" />'."\n";
	return $flux;
}

// Belles Puces ameliorees
function tetue_trousse_pre_typo($texte) {
	$texte = preg_replace('/^-\s+/m','-* ',$texte);
	$texte = preg_replace('/^[*]\s+/m','- ',$texte);
	return $texte;
}


/**
 * Previsualisation pour les redacteurs
 * (c) 2008 Cedric MORIN
 * Licence GPL 3
 *
 */

function tetue_trousse_pre_boucle(&$boucle){
	$id_table = $boucle->id_table;
	$mstatut = $id_table .'.statut';
	if (!isset($boucle->modificateur['criteres']['statut'])){
		switch ($boucle->type_requete){
			case 'articles':
				if (!$GLOBALS['var_preview']) {
					if ($GLOBALS['meta']["post_dates"] == 'non')
						array_unshift($boucle->where,array("'<'", "'$id_table" . ".date'", "sql_quote(quete_date_postdates())"));
					array_unshift($boucle->where,array("'='", "'$mstatut'", "'\\'publie\\''"));
				} else
					array_unshift($boucle->where,array("'IN'", "'$mstatut'", "'(\\'publie\\',\\'prop\\',\\'prepa\\')'"));
				$boucle->modificateur['criteres']['statut'] = true;
				break;
		}
	}
	return $boucle;
}

function tetue_trousse_boite_infos(&$flux){
	if ($flux['args']['type']=='article'
	  AND $id_article=intval($flux['args']['id'])
	  AND $statut = $flux['args']['row']['statut']
	  AND $statut == 'prepa'
	  AND autoriser('previsualiser')){
		$message = _T('previsualiser');
		$h = generer_url_action('redirect', "type=article&id=$id_article&var_mode=preview");
		$previsu = 
		//icone_inline($message, $h, $image, "rien.gif", $GLOBALS['spip_lang_left'])
		icone_horizontale($message, $h, "racine-24.gif", "rien.gif",false);
		if ($p = strpos($flux['data'],'</ul>')){
			while($q = strpos($flux['data'],'</ul>',$p+5)) $p=$q;
			$flux['data'] = substr($flux['data'],0,$p+5).$previsu.substr($flux['data'],$p+5);
		}
		else
			$flux['data'].= $previsu;
	}
	return $flux;
}

?>