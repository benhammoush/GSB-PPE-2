<?php

class Application_Model_DbTable_Demandes extends Zend_Db_Table_Abstract {

    protected $_name = 'demandes';
    protected $_primary = 'NUM_DEM';

    public function ajouterDemandes($numcli, $typedem, $datelimite) {

        $db = Zend_Db_Table::getDefaultAdapter();
        $query = "SELECT MAX(NUM_DEM) FROM demandes";
        $arraynumdem = $db->fetchAll($query);
        foreach ($arraynumdem as $lenumdem) {
            $numdem = $lenumdem['MAX(NUM_DEM)']; // On recupere le loyer MIN des appartements
        }
        $numdem = $numdem + 1;

        $data = array(
            'NUM_DEM' => $numdem,
            'NUM_CLI' => $numcli,
            'TYPE_DEM' => $typedem,
            'DATE_LIMITE' => $datelimite);
        $this->insert($data);

        var_dump($numdem);
    }

    public function obtenirDemandes($id) {
        $row = $this->fetchRow("NUM_DEM=" . $id);
        /* if (!$row) {
          throw new Exception("Impossible de troouver l'enregistrement $id");
          } */
        return $row->toArray();
    }

    public function modifierDemande($numdem, $numcli, $typedem, $datelimite) {
        $data = array(
            'NUM_DEM' => $numdem,
            'NUM_CLI' => $numcli,
            'TYPE_DEM' => $typedem,
            'DATE_LIMITE' => $datelimite);
        $this->update($data, "NUM_DEM='" . $numdem . "'");
    }
    
    public function supprimerDemande($numdemande) {
        $this->delete("NUM_DEM =".$numdemande);
        
        
    }

    public function supprimerLocataire($numeroloc) {

        $db = Zend_Db_Table::getDefaultAdapter();
        $query = "UPDATE appartements SET NUMEROLOC = '0' WHERE NUMEROLOC =" . $numeroloc;
        $db->exec($query); // on transforme le locataire a 0 dans la BDD + dans la vue appartement

        $this->delete("NUMEROLOC='" . $numeroloc . "'");
    }

}
