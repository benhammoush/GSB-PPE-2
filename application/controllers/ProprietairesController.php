<?php

class ProprietairesController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $lesproprietaires = new Application_Model_DbTable_Proprietaires();
        $this->view->lesproprietaires = $lesproprietaires->fetchAll();
    }

    public function ajouterAction() {

        $form = new Application_Form_Proprietaire();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $nomprop = $form->getValue('NOM');
                $prenomprop = $form->getValue('PRENOM');
                $adresseprop = $form->getValue('ADRESSE');
                $codevilleprop = $form->getValue('CODE_VILLE');
                $telprop = $form->getValue('TEL');

                $db = Zend_Db_Table::getDefaultAdapter();  // Script Pour avoir la valeur Max 
                $query = "select max(NUMEROPROP) from proprietaires"; // Et Pouvoir l'Auto-Incrémment
                $numPropMax = $db->fetchAll($query);
                foreach ($numPropMax as $leNumPropMax) {
                    $numprop = $leNumPropMax['max(NUMEROPROP)'];
                }
                $numprop += 1;

                $leProprietaire = new Application_Model_DbTable_Proprietaires ();
                $leProprietaire->ajouterProprietaire($numprop, $nomprop, $prenomprop, $adresseprop, $codevilleprop, $telprop); //completer avec les $var en param
                $this->_helper->redirector('index');
            }
        }
    }

    public function cotisationAction() {
        $db = Zend_Db_Table::getDefaultAdapter();
        $query = "SELECT PROPRIETAIRES.numeroprop as NUMEROPROP, "
                . "PROPRIETAIRES.nom as NOM, "
                . "PROPRIETAIRES.prenom as PRENOM, "
                . "PROPRIETAIRES.adresse as ADRESSE, "
                . "PROPRIETAIRES.code_ville as CODE_VILLE, "
                . "PROPRIETAIRES.tel as TEL, "
                . "ROUND(SUM(prix_loc + prix_charg)* 0.07, 2) AS COTISATIONS "
                . "FROM APPARTEMENTS, PROPRIETAIRES "
                . "WHERE APPARTEMENTS.numeroprop = PROPRIETAIRES.numeroprop AND APPARTEMENTS.numeroloc !=500 "
                . "GROUP BY PROPRIETAIRES.numeroprop";
        $cotisers = $db->fetchAll($query);
        $this->view->cotisers = $cotisers;
    }

    public function detailscotisationsAction() {
        $NUMEROPROP = $this->_getParam('NUMEROPROP');
        $db = Zend_Db_Table::getDefaultAdapter();
        $query = "SELECT APPARTEMENTS.numappart as NUMAPPART, "
                . "ROUND(SUM(prix_loc + prix_charg), 2) as LOYER, "
                . "ROUND(SUM(prix_loc + prix_charg) * 0.07, 2) AS COTISATIONS "
                . "FROM APPARTEMENTS WHERE APPARTEMENTS.numeroprop = '$NUMEROPROP' AND APPARTEMENTS.numeroloc !=500 "
                . "GROUP BY APPARTEMENTS.numappart";
        $detailsCotisers = $db->fetchAll($query);

        $query2 = "SELECT ROUND(SUM(prix_charg + prix_loc) * 0.07,2) AS TOTALCOTISATIONS "
                . "FROM APPARTEMENTS "
                . " WHERE APPARTEMENTS.numeroprop = '$NUMEROPROP' AND APPARTEMENTS.numeroloc !=500 ";
        $totalDetailsCotisers = $db->fetchAll($query2);
        $this->view->detailsCotisers = $detailsCotisers;
        $this->view->totalDetailsCotisers = $totalDetailsCotisers;
        $this->view->NUMEROPROP = $NUMEROPROP;
    }

}
