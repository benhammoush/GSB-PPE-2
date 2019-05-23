<?php

class Application_Form_Client extends Zend_Form
{

    public function init()
    {
        $this->setName('Clients');
        
        $numcli = new Zend_Form_Element_Text('NUM_CLI');
        $numcli->setLabel('Numero client')
//                ->setAttrib('readonly', 'readonly')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $nomcli = new Zend_Form_Element_Text('NOM_CLI');
        $nomcli->setLabel('Nom du client')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        
        $prenomcli = new Zend_Form_Element_Text('PRENOM_CLI');
        $prenomcli->setLabel('Prénom du client ')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $adressecli = new Zend_Form_Element_Text('ADRESSE_CLI');
        $adressecli->setLabel('Adresse du client')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $codevillecli = new Zend_Form_Element_Text('CODEVILLE_CLI');
        $codevillecli->setLabel('Code postal du client')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $telcli = new Zend_Form_Element_Text('TEL_CLI');
        $telcli->setLabel('arrondissement')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        
        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $envoyer->setAttrib('NUM_CLI', 'boutonenvoyer');
        
          $this->addElements(array($numcli, $nomcli, $prenomcli, $adressecli, $codevillecli, $telcli, $envoyer));
        
            }
}

        
     
        
       
        
  




