<?php

class AppartementsController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $lesappartements = new Application_Model_DbTable_Appartements();
        $this->view->lesappartements = $lesappartements->fetchAll();
    }

    public function ajouterAction() {

        $form = new Application_Form_Appartement();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {

                $numappart = $form->getValue('NUMAPPART');
                $typappart = $form->getValue('TYPAPPART');
                $prixloc = $form->getValue('PRIX_LOC');
                $prixcharge = $form->getValue('PRIX_CHARG');
                $rue = $form->getValue('RUE');
                $arrondissement = $form->getValue('ARRONDISSEMENT');
                $etage = $form->getValue('ETAGE');
                $ascenseur = $form->getValue('ASCENSEUR');
                $preavis = $form->getValue('PREAVIS');
                $datelibre = $form->getValue('DATE_LIBRE');
                $numprop = $form->getValue('NUMEROPROP');
                $numloc = $form->getValue('NUMEROLOC');

                $lesappartements = new Application_Model_DbTable_Appartements();
                $lesappartements->ajouterAppartement($numappart, $typappart, $prixloc, $prixcharge, $rue, $arrondissement, $etage, $ascenseur, $preavis, $datelibre, $numprop, $numloc);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function modifierAction() {

        $form = new Application_Form_Appartement();
        $form->envoyer->setLabel('Sauvegarder');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {


                $numappart = $form->getValue('NUMAPPART');
                $typappart = $form->getValue('TYPAPPART');
                $prixloc = $form->getValue('PRIX_LOC');
                $prixcharge = $form->getValue('PRIX_CHARG');
                $rue = $form->getValue('RUE');
                $arrondissement = $form->getValue('ARRONDISSEMENT');
                $etage = $form->getValue('ETAGE');
                $ascenseur = $form->getValue('ASCENSEUR');
                $preavis = $form->getValue('PREAVIS');
                $datelibre = $form->getValue('DATE_LIBRE');
                $numprop = $form->getValue('NUMEROPROP');
                $numloc = $form->getValue('NUMEROLOC');

                $lesappartements = new Application_Model_DbTable_Appartements();
                $lesappartements->modifierAppartement($numappart, $typappart, $prixloc, $prixcharge, $rue, $arrondissement, $etage, $ascenseur, $preavis, $datelibre, $numprop, $numloc);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('NUMAPPART', 0); //attention, valeur 0 invalide 
            $lesappartements = new Application_Model_DbTable_Appartements();
            $form->populate($lesappartements->obtenirAppartements($id));
        }
    }

    public function supprimerAction() {
        if ($this->getRequest()->isPost()) {
            $supprimer = $this->getRequest()->getPost('supprimer');
            if ($supprimer == 'oui') {    // Dans la vue Supprimer de appartement, on verifie si la valeur oui est Ok //
                $numappart = $this->getRequest()->getPost('NUMAPPART');
                $lesappartements = new Application_Model_DbTable_Appartements();
                $lesappartements->supprimerAppartement($numappart);
            }
            $this->_redirect('/appartements');
        } else {
            $numappart = $this->_getParam('NUMAPPART', 0);
            $lesappartements = new Application_Model_DbTable_Appartements();
            $this->view->numappart = $numappart;
        }
    }

    public function proprietaireAction() {
        $id = $this->_getParam('NUMAPPART');
        $lAppart = new Application_Model_DbTable_Appartements();
        $appartement = $lAppart->fetchRow('NUMAPPART=' . $id);
        $this->view->proprio = $appartement->getProprietaires(); // On alimente la variable $proprio de la vue proprietaire la valeur de $appartement->getProprietaires()
    }

    public function locataireAction() {

        $id = $this->_getParam('NUMEROLOC');
        $db = Zend_Db_Table::getDefaultAdapter();
        $query = "select * from locataires where NUMEROLOC =" . $id;
        $leLoc = $db->query($query);
        $lelocataire = $leLoc->fetchAll();
        $this->view->lelocataire = $lelocataire;
    }

}
