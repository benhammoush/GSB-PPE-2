<?php

class VisiteurController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $lesVisiteurs = new Application_Model_DbTable_Visiteur();
        $this->view->lesVisiteurs = $lesVisiteurs->fetchAll(); 

    }

    public function ajouterAction()
    {
        // action body
    }

    public function modifierAction()
    {
        // action body
    }

    public function supprimerAction()
    {
        // action body
    }


}







