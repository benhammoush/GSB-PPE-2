<?php

class RechercheController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }
    
    //Retourne l'ensemble des appartements suivant les critères de selection valider dans le Form
    public function rechercheappartAction() {

        $form = new Application_Form_Recherche();//Permet de veri
        $form->envoyer->setLabel('Appartements');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $arrondissement = $form->getValue('ARRONDISSEMENT');
                $typappart = $form->getValue('TYPAPPART');
                $loyermin = $form->getValue('LOYERMIN');
                $loyermax = $form->getValue('LOYERMAX');
            }
            $lesappartements = new Application_Model_DbTable_Recherche();
            $lesapparts = $lesappartements->getRechercheAppart($arrondissement, $typappart, $loyermin, $loyermax);
            $this->view->lesapparts = $lesapparts;
            //$this->_helper->redirector('index'); */
        }
    }


}
