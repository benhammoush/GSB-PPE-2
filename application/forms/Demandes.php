<?php

class Application_Form_Demandes extends Zend_Form {
    
    public function init(){
        $this->setName('Demande');
          
          $numcli = new Zend_Form_Element_Select('NUM_CLI');
          $numcli ->setLabel('Numero client')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          $typedem = new Zend_Form_Element_Text('TYPE_DEM');
          $typedem ->setLabel('Type demande')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          $datelimite = new Zend_Form_Element_Text('DATE_LIMITE');
          $datelimite ->setLabel('Date limite')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          
        $type = new Application_Model_DbTable_Clients();
        $type_clients = $type->fetchAll();
        foreach ($type_clients as $type){
            $numcli->addMultiOptions(array($type->NUM_CLI =>$type->NUM_CLI));
        } 
         
          
          $envoyer = new Zend_Form_Element_Submit('envoyer');
          $envoyer->setAttrib('id', 'boutonenvoyer');
          
          $this->addElements(array($numcli, $typedem, $datelimite, $envoyer));  
    }
}

