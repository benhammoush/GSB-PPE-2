<?php
class Application_Form_Proprietaire extends Zend_Form {

    public function init() {
        $this->setName('Proprietaire');

        $nomprop = new Zend_Form_Element_Text('NOM');
        $nomprop->setLabel('Nom')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $prenomprop = new Zend_Form_Element_Text('PRENOM');
        $prenomprop->setLabel('Prenom')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $adresseprop = new Zend_Form_Element_Text('ADRESSE');
        $adresseprop->setLabel('Adresse')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $codevilleprop = new Zend_Form_Element_Text('CODE_VILLE');
        $codevilleprop->setLabel('Code postale')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $telprop = new Zend_Form_Element_Text('TEL');
        $telprop->setLabel('Téléphone')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim') 
                ->addValidator('NotEmpty');
        
        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $envoyer->setAttrib('id', 'boutonenvoyer');
        
        $this->addElements(array($nomprop, $prenomprop, $adresseprop, $codevilleprop, $telprop, $envoyer ));
    }

}
