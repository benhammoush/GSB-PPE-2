<?php

class DemandesController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $lesdemandes = new Application_Model_DbTable_Demandes();
        $this->view->lesdemandes = $lesdemandes->fetchAll();
    }

    public function ajouterAction() {
        $form = new Application_Form_Demandes();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {

                $numcli = $form->getValue('NUM_CLI');
                $typedem = $form->getValue('TYPE_DEM');
                $datelimite = $form->getValue('DATE_LIMITE');


                $lesdemandes = new Application_Model_DbTable_Demandes();
                $lesdemandes->ajouterDemandes($numcli, $typedem, $datelimite);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function modifierAction() {

        $form = new Application_Form_Demandes();
        $form->envoyer->setLabel('Sauvegarder');
        $this->view->form = $form;
        $id = $this->_getParam('NUM_DEM', 0);
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {

                $numcli = $form->getValue('NUM_CLI');
                $typedem = $form->getValue('TYPE_DEM');
                $datelimite = $form->getValue('DATE_LIMITE');

                $lesdemandes = new Application_Model_DbTable_Demandes();
                $lesdemandes->modifierDemande($id, $numcli, $typedem, $datelimite);
                $this->_helper->redirector('index');
                var_dump($id);
            } else {
                $form->populate($formData);
            }
        } else {
            //attention, valeur 0 invalide 
            $lesdemandes = new Application_Model_DbTable_Demandes();
            $form->populate($lesdemandes->obtenirDemandes($id));
            var_dump($id);
        }
    }

    public function supprimerAction() {

        if ($this->getRequest()->isPost()) {
            $supprimer = $this->getRequest()->getPost('supprimer');
            if ($supprimer == 'oui') {    // Dans la vue Supprimer de Demande, on verifie si la valeur oui est Ok //
                $numdemande = $this->getRequest()->getPost('NUM_DEM');
                $lesdemandes = new Application_Model_DbTable_Demandes();
                $lesdemandes->supprimerDemande($numdemande);
            }
            $this->_redirect('/demandes');
        } else {
            $numdemande = $this->_getParam('NUM_DEM', 0);
            $lesdemandes = new Application_Model_DbTable_Appartements();
            $this->view->numdemande = $numdemande;
        }
    }

}
