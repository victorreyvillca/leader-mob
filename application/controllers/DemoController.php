<?php

class DemoController extends Dis_Controller_Action {

    public function indexAction() {
        $rol = new Model\Rol();
        $rol
            ->setNombre('name')
            ->setDescripcion('DEscri')
            ->setCreated(new DateTime('now'))
            ->setCreatedBy(1)
            ->setState(TRUE);

        $this->_entityManager->persist($rol);
        $this->_entityManager->flush();
        echo "save";

        $rolRepo = $this->_entityManager->getRepository('Model\Rol');
        $roles = $rolRepo->findAll();

        var_dump($roles);
    }
}