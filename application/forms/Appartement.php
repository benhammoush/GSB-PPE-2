<?php

class Application_Form_Appartement extends Zend_Form
{

    public function init()
    {
        $this->setName('Appartements');
        
        $numappart = new Zend_Form_Element_Text('NUMAPPART');
        $numappart->setLabel('Numero appart')
//                ->setAttrib('readonly', 'readonly')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $typappart = new Zend_Form_Element_Select('TYPAPPART');
        $typappart->setLabel('Type appart')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        
        $prixloc = new Zend_Form_Element_Text('PRIX_LOC');
        $prixloc->setLabel('Prix loc ')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $prixcharge = new Zend_Form_Element_Text('PRIX_CHARG');
        $prixcharge->setLabel('Prix de charge')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $rue = new Zend_Form_Element_Text('RUE');
        $rue->setLabel('rue')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $arrondissement = new Zend_Form_Element_Text('ARRONDISSEMENT');
        $arrondissement->setLabel('arrondissement')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $etage = new Zend_Form_Element_Text('ETAGE');
        $etage->setLabel('etage')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $ascenseur = new Zend_Form_Element_Text('ASCENSEUR');
        $ascenseur->setLabel('ascenseur')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $preavis = new Zend_Form_Element_Text('PREAVIS');
        $preavis->setLabel('preavis')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $datelibre = new Zend_Form_Element_Text('DATE_LIBRE');
        $datelibre->setLabel('date libre')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $numprop = new Zend_Form_Element_select('NUMEROPROP');
        $numprop->setLabel('numero prop')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $numloc = new Zend_Form_Element_Text('NUMEROLOC');
        $numloc->setLabel('numero loc')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $envoyer->setAttrib('NUMAPPART', 'boutonenvoyer');
        
        $type = new Application_Model_DbTable_Appartements();
        $type_appart = $type->fetchAll();
        foreach ($type_appart as $type){
            $typappart->addMultiOptions(array($type->TYPAPPART =>$type->TYPAPPART));
        } 
        //unset($type);
        
        $type1 = new Application_Model_DbTable_Proprietaires();
        $type_prop1 = $type1->fetchAll();
        foreach ($type_prop1 as $type1){
            $numprop->addMultiOptions(array($type1->NUMEROPROP =>$type1->NUMEROPROP));
        }
        
        $this->addElements(array($numappart, $typappart, $prixloc, $prixcharge, $rue, $arrondissement, $etage, $ascenseur, $preavis, $datelibre, $numprop, $numloc, $envoyer));
    }


}

