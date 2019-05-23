<?php

class Application_Model_DbTable_AppartementsRow extends Zend_Db_Table_Row_Abstract {

    public function getProprietaires(){
       return $this->findParentRow('Application_Model_DbTable_Proprietaires','proprio');
       
    }
    
}

