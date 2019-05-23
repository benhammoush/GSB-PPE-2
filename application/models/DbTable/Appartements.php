<?php

class Application_Model_DbTable_Appartements extends Zend_Db_Table_Abstract {

    protected $_name = 'appartements';
    protected $_primary = 'NUMAPPART';
    protected $_rowClass = 'Application_Model_DbTable_AppartementsRow';
    protected $_referenceMap = array(
            'proprio' => array(
            'columns' => 'NUMEROPROP',
            'refColumns' => 'NUMEROPROP',
            'refTableClass' => 'Application_Model_DbTable_Proprietaires',
    ));

    public function ajouterAppartement($numappart, $typappart, $prixloc, $prixcharge, $rue, $arrondissement, $etage, $ascenseur, $preavis, $datelibre, $numprop, $numloc) {
        $data = array('NUMAPPART' => $numappart,
            'TYPAPPART' => $typappart,
            'PRIX_LOC' => $prixloc,
            'PRIX_CHARG' => $prixcharge,
            'RUE' => $rue,
            'ARRONDISSEMENT' => $arrondissement,
            'ETAGE' => $etage,
            'ASCENSEUR' => $ascenseur,
            'PREAVIS' => $preavis,
            'DATE_LIBRE' => $datelibre,
            'NUMEROPROP' => $numprop,
            'NUMEROLOC' => $numloc
        );



        $this->insert($data);
    }

    public function obtenirAppartements($id) {
        $row = $this->fetchRow("NUMAPPART=" . $id);
       /* if (!$row) {
            throw new Exception("Impossible de troouver l'enregistrement $id");
        }*/
        return $row->toArray();
    }

    public function modifierAppartement($numappart, $typappart, $prixloc, $prixcharge, $rue, $arrondissement, $etage, $ascenseur, $preavis, $datelibre, $numprop, $numloc) {
        $data = array(
            'NUMAPPART' => $numappart,
            'TYPAPPART' => $typappart,
            'PRIX_LOC' => $prixloc,
            'PRIX_CHARG' => $prixcharge,
            'RUE' => $rue,
            'ARRONDISSEMENT' => $arrondissement,
            'ETAGE' => $etage,
            'ASCENSEUR' => $ascenseur,
            'PREAVIS' => $preavis,
            'DATE_LIBRE' => $datelibre,
            'NUMEROPROP' => $numprop,
            'NUMEROLOC' => $numloc
        );
        /* @var $id type */
        $this->update($data, "NUMAPPART='" . $numappart . "'");
    }

    public function supprimerAppartement($numappart) {
        $this->delete("NUMAPPART=" . $numappart);
    }
    
    public function getDetailLocataire($locataire){
        
        $db = Zend_Db_Table::getDefaultAdapter();
        $query = "select * from locataires where NUMEROLOC =".$locataire."" ;
        
        //$leLocataire = $db->fetchAll($query);
        $this->view->locataire = $db->exec($query);
        var_dump(leLocataire); // A corriger
        
        
        return $leLocataire ;
        
    }
}
