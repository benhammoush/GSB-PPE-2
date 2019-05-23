<?php

class Application_Model_DbTable_Visiter extends Zend_Db_Table_Abstract {

    protected $_name = 'visiter';
    protected $_primary = array('NUM_CLI', 'NUMAPART');

    public function indexAction() {
        
    }

    public function ajouterVisite($numclient, $numappart, $datelibre) {
        $data = array('NUM_CLI' => $numclient,
            'NUMAPPART' => $numappart,
            'DATE_VISITE' => $datelibre);

        $this->insert($data);
    }
    
    public function obtenirVisite($num) {
        return $this->fetchRow("NUM_CLI=" . $num);
    }
    
    public function modifierVisite($numcli, $numappart, $datevisite) {
        $data = array(
            
            'NUM_CLI' => $numcli,
            'NUMAPPART' => $numappart,
            'DATE_VISITE' => $datevisite,
            
        );
        /* @var $id type */
        $this->update($data, "NUM_CLI='" . $numcli . "'");
    }

}
