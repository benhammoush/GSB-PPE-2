<?php

class Application_Model_DbTable_Recherche extends Zend_Db_Table_Abstract {

   /* public function getRechercheAppart($arrondissement, $typappart, $loyermin, $loyermax) {
        //SELECT * from appartements where PRIX_LOC + PRIX_CHARG BETWEEN 1700 AND 1800
        $db = Zend_Db_Table::getDefaultAdapter();
        $query = "select * from appartements where ARRONDISSEMENT =" . $arrondissement . " AND TYPAPPART = '" . $typappart . "' AND PRIX_LOC + PRIX_CHARG BETWEEN " . $loyermin . " AND " . $loyermax;
        $lesapparts = $db->fetchAll($query);
        //$leLocataire = $db->fetchAll($query);
        //$this->view->appart = $db->exec($query);
        //var_dump($lesapparts);
        return $lesapparts;
    }*/

    public function getRechercheAppart($arrondissement, $typappart, $loyermin, $loyermax) {



        //Les 8 requettes permettant de repondre aux besoin précis de l'utilisateur.
        //Peut pas utiise de switch car dans la condition il faudrai rajouter des ligne de code pour savoir quand placer le AND donc erreur SQL.
        $db = Zend_Db_Table::getDefaultAdapter();
        if ($loyermin == NULL) {                //Si $loyermin est a NULL alors on lui affectera le plus petit loyer
            $query1 = "SELECT MIN(PRIX_CHARG + PRIX_LOC) from appartements";
            $tabLeLoyerMin = $db->FetchAll($query1);
            foreach ($tabLeLoyerMin as $leLoyerMin) {
                $loyermin = $leLoyerMin['MIN(PRIX_CHARG + PRIX_LOC)']; // On recupere le loyer MIN des appartements
            }
        }

        if ($loyermax == NULL) {            //Si $loyermax est a NULL alors on lui affectera le plus gros loyer
            $query2 = "SELECT MAX(PRIX_CHARG + PRIX_LOC) from appartements";
            $tabLeLoyerMax = $db->FetchAll($query2);
            foreach ($tabLeLoyerMax as $leLoyerMax) {
                $loyermax = $leLoyerMax['MAX(PRIX_CHARG + PRIX_LOC)']; // On recupere le loyer MAX des appartements
            }
        }

        if ($arrondissement == NULL) {
            $reqArrondissemet = "";
        } else {
            $reqArrondissemet = " AND ARRONDISSEMENT =" . $arrondissement;
        }if ($typappart == NULL) {
            $reqTypeAppart = "";
        } else {
            $reqTypeAppart = " AND TYPAPPART = '" . $typappart."'";
        }
        $query = "select * from appartements where PRIX_LOC + PRIX_CHARG BETWEEN " . $loyermin . " AND " . $loyermax . " " . $reqArrondissemet . " " . $reqTypeAppart;
        $lesapparts = $db->fetchAll($query);

        return $lesapparts;
    }

}
