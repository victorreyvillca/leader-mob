<?php
/**
 * Controller for DIST 2.
 *
 * @category Dist
 * @author Victor Villca <victor.villca@swissbytes.ch>
 * @copyright Copyright (c) 2012 Gisof A/S
 * @license Proprietary
 */

class WhoWeController extends Dis_Controller_Action {

	/**
	 * (non-PHPdoc)
	 * @see App_Controller_Action::init()
	 */
	public function init() {
		parent::init();
		$response = $this->getResponse();
		$response->insert("sidebar", $this->view->render("sidebar.phtml"));
	}

    public function indexAction() {
		$this->_helper->redirector("history");
    }

	public function historyAction() {

    }

	public function visionmissionAction() {

	}

	public function logoAction() {

	}

	public function beliefAction() {

	}
}