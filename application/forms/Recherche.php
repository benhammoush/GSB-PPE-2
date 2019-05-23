<?php

class Application_Form_Recherche extends Zend_Form {

    public function init() {
        $this->setName('Appartements');

        $arrondissement = new Zend_Form_Element_Text('ARRONDISSEMENT');
        $arrondissement->setLabel('arrondissement')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');


        $typappart = new Zend_Form_Element_Text('TYPAPPART');
        $typappart->setLabel('Type appart')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');


        $loyermin = new Zend_Form_Element_Text('LOYERMIN');
        $loyermin->setLabel('Loyer Min')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');


        $loyermax = new Zend_Form_Element_Text('LOYERMAX');
        $loyermax->setLabel('Loyer Max')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');


        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $this->addElements(array($arrondissement, $typappart, $loyermin, $loyermax, $envoyer));
    }

}
