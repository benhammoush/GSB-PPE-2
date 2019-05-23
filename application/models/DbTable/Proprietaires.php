<?php

class Application_Model_DbTable_Proprietaires extends Zend_Db_Table_Abstract
{

    protected $_name = 'proprietaires';
    protected $_primary = 'NUMEROPROP';
    
public function ajouterProprietaire($numprop, $nomprop, $prenomprop, $adresseprop, $codevilleprop, $telprop) {
    
        /*$db = Zend_Db_Table::getDefaultAdapter();
        $query = "select max(NUMEROPROP) from proprietaires" ;
        $numprop1 = $db->fetchAll($query);
        //$numprop1 += 1 ;
        var_dump($numprop1[0]);*/
        
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

