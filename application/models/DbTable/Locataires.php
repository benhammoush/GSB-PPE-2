<?php

class Application_Model_DbTable_Locataires extends Zend_Db_Table_Abstract {

    protected $_name= "locataires" ; 
    protected $_primary="NUMEROLOC";
    
    
    //protected $_rowClass="Application_Model_DbTable_AppartementsRow";
    protected $_referenceMap= array('meslocataires'=>array(
        "refColumns"=>"NUMEROPROP", 
        "refTableClass"=>"Application_Model_DbTable_Appartements",
        "columns"=>"NUMEROPROP"
        
    ),
        array(
        "refColumns"=>"NUMEROLOC", 
        "refTableClass"=>"Application_Model_DbTable_Locataire",
        "columns"=>"NUMEROLOC"
        )
    );
    
    public function ajouterLocataire($numeroloc, $nomloc, $prenomloc, $datenaiss, $telloc, $rib, $banque, $ruebanque, $codevilleb, $telbanque){
            $data = array(
            'NUMEROLOC' => $numeroloc,
            'NOM_LOC' =>$nomloc,
            'PRENOM_LOC' => $prenomloc,
            'DATENAISS' => $datenaiss,
            'TEL_LOC' => $telloc,
            'R_I_B' => $rib, 
            'BANQUE' => $banque,
            'RUE_BANQUE' => $ruebanque,
            'CODEVILLE_BANQUE' => $codevilleb, 
            'TEL_BANQUE' => $telbanque);
            $this->insert($data);
    }
    public function obtenirLocataire($numeroloc){
        $row = $this->fetchRow("NUMEROLOC='" .$numeroloc. "'");
        if(!$row){
            throw new Exception("impossible de trouver l'enregistrement $numeroloc");
        }
        return $row->toArray();
    }
    public function modifierLocataire($numeroloc, $nomloc, $prenomloc, $datenaiss, $telloc, $rib, $banque, $ruebanque, $codevilleb, $telbanque){
        $data = array(
            'NUMEROLOC' => $numeroloc,
            'NOM_LOC' =>$nomloc,
            'PRENOM_LOC' => $prenomloc,
            'DATENAISS' => $datenaiss,
            'TEL_LOC' => $telloc,
            'R_I_B' => $rib, 
            'BANQUE' => $banque,
            'RUE_BANQUE' => $ruebanque,
            'CODEVILLE_BANQUE' => $codevilleb, 
            'TEL_BANQUE' => $telbanque);
            $this->update($data, "NUMEROLOC='" . $numeroloc . "'");         
    }
    
    public function supprimerLocataire($numeroloc){
        
        $db = Zend_Db_Table::getDefaultAdapter();
        $query = "UPDATE appartements SET NUMEROLOC = '0' WHERE NUMEROLOC =".$numeroloc ;
        $db->exec($query); // on transforme le locataire a 0 dans la BDD + dans la vue appartement
        
        $this->delete("NUMEROLOC='". $numeroloc ."'");
    }
}