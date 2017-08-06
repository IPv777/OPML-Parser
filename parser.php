<?php
$fichier='fichier.opml.xml';
$lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lignes as $i => $ligne) {
    // ignorer les lignes ne contenant pas "<outline" ET (type="rss" OU type='rss')
    if ((stristr($ligne, '<outline') != false) and ((stristr($ligne, 'type="rss"') != false) or (stristr($ligne, 'type=\'rss\'') != false))) {
        // trouver xmlUrl et récupérer son contenu 
        $rechercher = 'xmlUrl="';
        $debut  = stripos($ligne, $rechercher);
        if ($debut > 0) {
            $debut = $debut + strlen($rechercher);
        }
        $fin    = stripos($ligne, '"', $debut);
        $xmlurl = substr($ligne, $debut, $fin - $debut);
        //sortir la valeur de xmlUrl, en tant que lien HTML
        echo '<a href="' . $xmlurl . '">' . $xmlurl . '</a><br>';
    }
}
?>
