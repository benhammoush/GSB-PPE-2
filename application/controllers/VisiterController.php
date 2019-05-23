<?php

class VisiterController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $lesvisites = new Application_Model_DbTable_Visiter();
        $this->view->lesvisites = $lesvisites->fetchAll();
    }

    public function ajouterAction() {
        $form = new Application_Form_Visite();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {

                $numclient = $form->getValue('NUM_CLI');
                $numappart = $form->getValue('NUMAPPART');
                $datelibre = $form->getValue('DATE_VISITE');

                $unevisite = new Application_Model_DbTable_Visiter();
                $unevisite->ajouterVisite($numclient, $numappart, $datelibre);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function modifierAction() {
        $form = new Application_Form_Visite();
        $form->envoyer->setLabel('modifier');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {


                $numcli = $form->getValue('NUM_CLI');
                $numappart = $form->getValue('NUMAPPART');
                $datevisite = $form->getValue('DATE_VISITE');
                
                $lesvisites = new Application_Model_DbTable_Visiter();
                $lesvisites->modifierVisite($numcli, $numappart, $datevisite);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('NUM_CLI', 0); //attention, valeur 0 invalide 
            $lesvisites = new Application_Model_DbTable_Visiter();
            $form->populate($lesvisites->obtenirVisite($id));
        }
    }

    public function supprimerAction() {
        // action body
    }

}
