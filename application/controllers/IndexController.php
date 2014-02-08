<?php

class IndexController extends Dis_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $pictureRepo = $this->_entityManager->getRepository('Model\Picture');
        $pictures = $pictureRepo->findAll();

        $this->view->pictures = $pictures;
    }
}