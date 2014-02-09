<?php
use Model\Position;
use Model\Mission;
use Model\Region;
use Model\District;
use Model\Church;
use Model\Directive;
/**
 * Controller for DIST 2.
 *
 * @category Dist 2
 * @author Victor Villca <victor.villca@swissbytes.ch>
 * @copyright Copyright (c) 2012 Gisof A/S
 * @license Proprietary
 */

class Admin_IndexController extends Dis_Controller_Action {

	/**
	 * (non-PHPdoc)
	 * @see App_Controller_Action::init()
	 */
 	public function init() {
 		parent::init();
		$uri = $this->_request->getPathInfo();
    }

	public function indexAction() {
        $position = new Position();
        $position->setName('name')->setDescription('des')->setCreated(new DateTime('now'))->setState(TRUE);

        $this->_entityManager->persist($position);
        $this->_entityManager->flush();


        $mission = new Mission();
        $mission->setName('name')->setAbreviation('MOB')->setDescription('des')->setCreated(new DateTime('now'))->setState(TRUE);

        $this->_entityManager->persist($mission);
        $this->_entityManager->flush();


        $region = new Region();
        $region->setName('name')->setAbreviation('MOB')->setDescription('des')->setMission($mission)->setCreated(new DateTime('now'))->setState(TRUE);

        $this->_entityManager->persist($region);
        $this->_entityManager->flush();


        $district = new District();
        $district->setName('Nuevo Palmar')->setDescription('')->setRegion($region)->setCreated(new DateTime('now'))->setState(TRUE);

        $this->_entityManager->persist($district);
        $this->_entityManager->flush();

        $church = new Church();
        $church->setName('Nuevo Palmar')->setDescription('')->setDistrict($district)->setCreated(new DateTime('now'))->setState(TRUE);

        $this->_entityManager->persist($church);
        $this->_entityManager->flush();

        $directive = new Directive();
        $directive->setIsActivo(TRUE)->setState(TRUE)->setCreated(new DateTime('now'))->setSex(1)->setPhonemobil(465456)->setPhonework('45646') ->setPhone('45645') ->setDateOfBirth(new DateTime('now')) ->setIdentityCard(59387823)->setLastName('Villca')->setFirstName('Victor');

        $this->_entityManager->persist($directive);
        $this->_entityManager->flush();
	}
}