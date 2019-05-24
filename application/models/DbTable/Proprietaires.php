<?php

class Application_Model_DbTable_Proprietaires extends Zend_Db_Table_Abstract
{

    protected $_name = 'proprietaires';
    protected $_primary = 'NUMEROPROP';
    
public function ajouterProprietaire($numprop, $nomprop, $prenomprop, $adresseprop, $codevilleprop, $telprop) {
    
        
        $data = array('NUMEROPROP' => $numprop,
            'NOM' => $nomprop,
            'PRENOM' => $prenomprop,
            'ADRESSE' => $adresseprop,
            'CODE_VILLE' => $codevilleprop,
            'TEL' => $telprop
        ); 
        $this->insert($data);
    }
}

