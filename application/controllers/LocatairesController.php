<?php

class LocatairesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $leslocataires= new Application_Model_DbTable_Locataires();
      $this->view->leslocataires=$leslocataires->fetchAll();
    }

    public function ajouterAction()
    {
        
        $form = new Application_Form_Locataire();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if($form->isValid($formData)) {

                $numeroloc = $form->getValue('NUMEROLOC'); 
                        $nomloc = $form->getValue('NOM_LOC');
                        $prenomloc= $form->getValue('PRENOM_LOC');
                        $datenaiss= $form->getValue('DATENAISS');
                        $telloc = $form->getValue('TEL_LOC'); 
                        $rib = $form->getValue('R_I_B');
                        $banque = $form->getValue('BANQUE');
                        $ruebanque = $form->getValue('RUE_BANQUE');
                        $codeville = $form->getValue('CODEVILLE_BANQUE');
                        $telbanque = $form->getValue('TEL_BANQUE');
                        
                        $leslocataires = new Application_Model_DbTable_Locataires();
                        $leslocataires->ajouterLocataire($numeroloc, $nomloc, $prenomloc, $datenaiss, $telloc, $rib, $banque, $ruebanque, $codeville, $telbanque);
                        $this->_helper->redirector('index');
                        
            }
            else {
                $form->populate($formData);
            }
        }
    }

    public function modifierAction()
    {
        $form = new Application_Form_Locataire();
        $form->envoyer->setLabel('Sauvegarder');
        $this->view->form = $form;
        if($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if($form->isValid($formData)) {

                $numeroloc  = $form->getValue('NUMEROLOC'); 
                $nomloc     = $form->getValue('NOM_LOC');
                $prenomloc  = $form->getValue('PRENOM_LOC');
                $datenaiss  = $form->getValue('DATENAISS');
                $telloc     = $form->getValue('TEL_LOC'); 
                $rib        = $form->getValue('R_I_B');
                $banque     = $form->getValue('BANQUE');
                $ruebanque  = $form->getValue('RUE_BANQUE');
                $codeville  = $form->getValue('CODEVILLE_BANQUE');
                $telbanque  = $form->getValue('TEL_BANQUE');

                $leslocataires = new Application_Model_DbTable_Locataires();
                $leslocataires->modifierLocataire($numeroloc, $nomloc, $prenomloc, $datenaiss, $telloc, $rib, $banque, $ruebanque, $codeville, $telbanque);
                $this->_helper->redirector('index');       
            }else{
                $form->populate($formData);
            }
        }else{
                $numeroloc = $this->_getParam('NUMEROLOC',0);
                $locataires = new Application_Model_DbTable_Locataires();
                $form->populate($locataires->obtenirLocataire($numeroloc));
        }
        
    }

    public function supprimerAction()
    {
        if ($this->getRequest()->isPost()){
            $supprimer = $this->getRequest()->getPost('supprimer');//on recu la valeur du bouton supprimer ( NUMAPPART ) 
            if ($supprimer == 'Oui'){
                $numeroloc = $this->getRequest()->getPost('NUMEROLOC'); 
                               
                $locataires = new Application_Model_DbTable_Locataires();
                $locataires->supprimerLocataire($numeroloc);
            }
            
            $this->_redirect('/locataires');
        }
        else {
            $numeroloc = $this->_getParam('NUMEROLOC',0);
            $locataires = new Application_Model_DbTable_Locataires();
            $this->view->leslocataires = $locataires->obtenirLocataire($numeroloc);
        }
    }

   


}









