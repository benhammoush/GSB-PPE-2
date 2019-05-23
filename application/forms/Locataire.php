<?php
class Application_Form_Locataire extends Zend_Form {
    
    public function init(){
        $this->setName('Locataire');
        
          $numeroloc = new Zend_Form_Element_Text('NUMEROLOC');
          $numeroloc ->setLabel('Numero Locataire')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          $nomloc = new Zend_Form_Element_Text('NOM_LOC');
          $nomloc ->setLabel('Nom')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          $prenomloc = new Zend_Form_Element_Text('PRENOM_LOC');
          $prenomloc ->setLabel('Prenom')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          $datenaiss = new Zend_Form_Element_Text('DATENAISS');
          $datenaiss ->setLabel('Date de naissance')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          $telloc = new Zend_Form_Element_Text('TEL_LOC');
          $telloc ->setLabel('Numero de tel')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          $rib = new Zend_Form_Element_Text('R_I_B');
          $rib ->setLabel('R I B ')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          $banque = new Zend_Form_Element_Text('BANQUE');
          $banque ->setLabel('Nom de la banque')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          $ruebanque = new Zend_Form_Element_Text('RUE_BANQUE');
          $ruebanque ->setLabel('Rue de la banque')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          $codevilleb = new Zend_Form_Element_Text('CODEVILLE_BANQUE');
          $codevilleb ->setLabel('Code ville de la banque')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          $telbanque = new Zend_Form_Element_Text('TEL_BANQUE');
          $telbanque ->setLabel('Tel de la banque')
                  ->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty');
          
          $envoyer = new Zend_Form_Element_Submit('envoyer');
          $envoyer->setAttrib('id', 'boutonenvoyer');
          
          $this->addElements(array($numeroloc, $nomloc, $prenomloc, $datenaiss, $telloc, $rib, $banque, $ruebanque, $codevilleb, $telbanque, $envoyer));  
    }
}

