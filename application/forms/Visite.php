<?php

class Application_Form_Visite extends Zend_Form {

    public function init() {
        $numclient = new Zend_Form_Element_Select('NUM_CLI');
        $numclient->setLabel('Numero Client')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $numappart = new Zend_Form_Element_Select('NUMAPPART');
        $numappart->setLabel('Numero Appart')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $datelibre = new Zend_Form_Element_Text('DATE_VISITE');
        $datelibre->setLabel('date de Visite')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $envoyer = new Zend_Form_Element_Submit('envoyer');
        //$envoyer->setAttrib('NUM_CLI', 'NUMAPPART', 'boutonenvoyer'); // a changer


        $type = new Application_Model_DbTable_Clients();
        $type_clients = $type->fetchAll();
        foreach ($type_clients as $type) {
            $numclient->addMultiOptions(array($type->NUM_CLI => $type->NUM_CLI));
        }

        $type1 = new Application_Model_DbTable_Appartements();
        $type_appart = $type1->fetchAll();
        foreach ($type_appart as $type1) {
            $numappart->addMultiOptions(array($type1->NUMAPPART => $type1->NUMAPPART));
        }
        //unset($type);



        $this->addElements(array( $numclient, $numappart, $datelibre, $envoyer));
    }

}
