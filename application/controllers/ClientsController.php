<?php

class ClientsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $clients = new Application_Model_DbTable_Clients();
        $this->view->Lesclients = $clients->fetchAll();
    }

    public function ajouterAction()
    {
        $form = new Application_Form_Client();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                
                $numcli = $form->getValue('NUM_CLI');
                $nomcli = $form->getValue('NOM_CLI');
                $prenomcli = $form->getValue('PRENOM_CLI');
                $adressecli = $form->getValue('ADRESSE_CLI');
                $codevillecli = $form->getValue('CODEVILLE_CLI');
                $telcli = $form->getValue('TEL_CLI');
                
                $lesclients = new Application_Model_DbTable_Clients();
                $lesclients->ajouterClient($numcli, $nomcli, $prenomcli, $adressecli, $codevillecli, $telcli);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
                    }
                }    
            
    }

    public function modifierAction()
    {
        $form = new Application_Form_Client();
        $form->envoyer->setLabel('Sauvegarder');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $numcli = $form->getValue('NUM_CLI');
                $nomcli = $form->getValue('NOM_CLI');
                $prenomcli = $form->getValue('PRENOM_CLI');
                $adressecli = $form->getValue('ADRESSE_CLI');
                $codevillecli = $form->getValue('CODEVILLE_CLI');
                $telcli = $form->getValue('TEL_CLI');

               

                $lesclients = new Application_Model_DbTable_Clients();
                $lesclients->modifierclients($numcli, $nomcli, $prenomcli, $adressecli, $codevillecli, $telcli);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function supprimerAction()
    {
         if ($this->getRequest()->isPost()) {
            $supprimer = $this->getRequest()->getPost('supprimer');
            if ($supprimer == 'oui') {  
                $numcli = $this->getRequest()->getPost('NUM_CLI');
                
                $lesclients = new Application_Model_DbTable_Clients();
                $lesclients->supprimerClients($numcli);
            }
            $this->_redirect('/clients');
            
         }
           
       
    }


}







