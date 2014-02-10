<?php
use Model\Directive;
/**
 * Controller for DIST 2.
 *
 * @category Dist
 * @author Victor Villca <victor.villca@people-trust.com>
 * @copyright Copyright (c) 2012 Gisof A/S
 * @license Proprietary
 */

class RegistrationController extends Dis_Controller_Action {

    /**
	 * (non-PHPdoc)
	 * @see App_Controller_Action::init()
	 */
	public function init() {
		parent::init();
	}

	/**
	 *
	 * In case no action redirects the action read will be executed
	 * @access public
	 */
	public function indexAction() {
	    $formFilter = new Admin_Form_SearchFilter();
	    $formFilter->getElement('nameFilter')->setLabel(_("Firstname Directive"));
	    $this->view->formFilter = $formFilter;
	}

// 	/**
// 	 *
// 	 * This action shows a paginated list of directives
// 	 */
// 	public function readAction() {
// 		$formFilter = new Admin_Form_SearchFilter();
// 		$formFilter->getElement('nameFilter')->setLabel(_("Firstname Directive"));
// 		$this->view->formFilter = $formFilter;
// 	}

	/**
	 * This action shows a form to save the directive
	 * @access public
	 */
	public function addAction() {
		$form = new Admin_Form_Directive();
		if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                $directive = new Directive();
                $directive
                    ->setTreatment('super mal')
                    ->setRanks('Guia mayor')
                    ->setPositions('Director')
                    ->setYear($formData['year'])
                    ->setIsActivo(TRUE)
                    ->setState(TRUE)
                    ->setCreated(new DateTime('now'))
                    ->setSex(1)
                    ->setPhonemobil($formData['phonemobil'])
                    ->setPhonework('45646')
                    ->setPhone($formData['phone'])
                    ->setDateOfBirth(new DateTime('now'))
                    ->setIdentityCard($formData['ci'])
                    ->setLastName($formData['lastName'])
                    ->setFirstName($formData['firstName'])
                ;

                $this->_entityManager->persist($directive);
                $this->_entityManager->flush();

                $this->_helper->flashMessenger(array('success' => _('Directivo Guardado')));
                $this->_helper->redirector('index', 'Registration', array('type'=>'information'));
            }
        } else {

        }

// 		$form->getElement('sex')->setMultiOptions($this->getGenders());
// 		$form->getElement('club')->setMultiOptions($this->getClubPathfinders());
// 		$form->getElement('position')->setMultiOptions($this->getPositions());
// 		$form->setAction($this->_helper->url('save'));

		$src = '/image/profile/female_or_male_default.jpg';
		$form->setSource($src);

		$this->view->form = $form;
	}

	/**
	 *
	 * Creates a new Directive
	 * @access public
	 */
// 	public function saveAction() {
// 		if ($this->_request->isPost()) {
// 			$form = new Admin_Form_Directive();
// 			$form->getElement('sex')->setMultiOptions($this->getGenders());
// 			$form->getElement('club')->setMultiOptions($this->getClubPathfinders());
// 			$form->getElement('position')->setMultiOptions($this->getPositions());

// 			$formData = $this->getRequest()->getPost();

// 			if ($form->isValid($formData)) {
// 				$club = $this->_entityManager->find('Model\ClubPathfinder', (int)$formData['club']);
// 				$position = $this->_entityManager->find('Model\Position', (int)$formData['position']);

// 				$directive = new Model\Directive();
// 				$directive->setIdentityCard(3)
// 					->setFirstName($formData['firstName'])
// 					->setLastName($formData['lastName'])
// 					->setEmail($formData['email'])
// 					->setPhone($formData['phone'])
// 					->setPhonemobil($formData['phonemobil'])
// 					->setSex((int)$formData['sex'])
// 					->setClub($club)
// 					->setPosition($position)
// 					->setCreated(new \DateTime('now'));

// 				if ($_FILES['file']['error'] !== UPLOAD_ERR_NO_FILE) {
// 					if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
// 						$fh = fopen($_FILES['file']['tmp_name'], 'r');
// 						$binary = fread($fh, filesize($_FILES['file']['tmp_name']));
// 						fclose($fh);

// 						$mimeType = $_FILES['file']['type'];
// 						$fileName = $_FILES['file']['name'];

// 						$dataVaultMapper = new Model_DataVaultMapper();
// 						$dataVault = new Model_DataVault();
// 						$dataVault->setFilename($fileName)->setMimeType($mimeType)->setBinary($binary);
// 						$dataVaultMapper->save($dataVault);

// 						$directive->setProfilePictureId($dataVault->getId());
// 					}
// 				}

// 				$this->_entityManager->persist($directive);
// 				$this->_entityManager->flush();

// 				$this->_helper->flashMessenger(array('success' => _("Directive created")));
// 				$this->_helper->redirector('read', 'Directive', 'admin', array('type'=>'pathfinder'));
// 			} else {
// 				$this->_helper->redirector('read', 'Directive', 'admin', array('type'=>'pathfinder'));
// 			}
// 		} else {
// 			$this->_helper->redirector('read', 'Directive', 'admin', array('type'=>'pathfinder'));
// 		}
// 	}

	/**
	 *
	 * This action shows the form in update mode for Directive.
	 * @access public
	 */
	public function editAction() {
        $form = new Admin_Form_Directive();

// 	    $categoryRepo = $this->_entityManager->getRepository('Model\Category');
// 	    $form->getElement('categoryId')->setMultiOptions($categoryRepo->findAllArray());
	    $form->getElement('saveButton')->setLabel(_('Editar'));

	    if ($this->_request->isPost()) {
	    	$formData = $this->_request->getPost();
	    	if ($form->isValid($formData)) {
	    		$id = $this->_getParam('id', 0);
	    		$directivo = $this->_entityManager->find('Model\Directivo', $id);
	    		if ($directivo != NULL) {//security
	    			// 					if (!$newsMapper->verifyExistTitle($formData['title']) || $newsMapper->verifyExistIdAndTitle($id, $formData['title'])) {




	    			$this->_helper->flashMessenger(array('success' => _("News updated")));
	    			$this->_helper->redirector('index', 'news', 'admin', array('type'=>'information'));
	    			// 					} else {
	    			// 						$this->_helper->flashMessenger(array('error' => _("The News already exists")));
	    			// 					}
	    			} else {
	    				$this->_helper->flashMessenger(array('error' => _("The News does not exists")));
	    			}
	    		} else {
	    			$this->_helper->flashMessenger(array('error' => _("The form contains error and is not updated")));
	    		}
        } else {
            $id = $this->_getParam('id', 0);
            $directivo = $this->_entityManager->find('Model\Directive', $id);

            if ($directivo != NULL) {//security
                $form->getElement('id')->setValue($id);
                $form->getElement('firstName')->setValue($directivo->getFirstName());
                $form->getElement('lastName')->setValue($directivo->getLastName());
                $form->getElement('ci')->setValue($directivo->getIdentityCard());
                $form->getElement('year')->setValue($directivo->getYear());
                $form->getElement('address')->setValue($directivo->getAddress());
            }
        }

        $this->view->form = $form;
	}

// 	/**
// 	 * Updates a Directive of the club pathfinders
// 	 * @access public
// 	 */
// 	public function editAction() {
// 		if ($this->_request->isPost()) {
// 			$form = new Admin_Form_Directive();
// 			$form->getElement('sex')->setMultiOptions($this->getGenders());
// 			$form->getElement('club')->setMultiOptions($this->getClubPathfinders());
// 			$form->getElement('position')->setMultiOptions($this->getPositions());

// 			$formData = $this->getRequest()->getPost();

// 			if ($form->isValid($formData)) {
// 				$id = $this->_getParam('id', 0);
// 				$directive = $this->_entityManager->find('Model\Directive', $id);
// 				if ($directive != NULL) {
// 					$club = $this->_entityManager->find('Model\ClubPathfinder', (int)$formData['club']);
// 					$position = $this->_entityManager->find('Model\Position', (int)$formData['position']);

// 					$directive->setIdentityCard(3)
// 						->setFirstName($formData['firstName'])
// 						->setLastName($formData['lastName'])
// 						->setEmail($formData['email'])
// 						->setPhone($formData['phone'])
// 						->setPhonemobil($formData['phonemobil'])
// 						->setSex((int)$formData['sex'])
// 						->setClub($club)
// 						->setPosition($position)
// 						->setChanged(new \DateTime('now'));

// 					if ($_FILES['file']['error'] !== UPLOAD_ERR_NO_FILE) {
// 						if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
// 							$fh = fopen($_FILES['file']['tmp_name'], 'r');
// 							$binary = fread($fh, filesize($_FILES['file']['tmp_name']));
// 							fclose($fh);

// 							$mimeType = $_FILES['file']['type'];
// 							$fileName = $_FILES['file']['name'];

// 							$dataVaultMapper = new Model_DataVaultMapper();

// 							if ($directive->getProfilePictureId() != NULL) {// if it has image profile update
// 								$dataVault = $dataVaultMapper->find($directive->getProfilePictureId(), FALSE);
// 								$dataVault->setFilename($fileName)->setMimeType($mimeType)->setBinary($binary);
// 								$dataVaultMapper->update($directive->getProfilePictureId(), $dataVault);
// 							} elseif ($directive->getProfilePictureId() == NULL) {// if it don't have image profile create
// 								$dataVault = new Model_DataVault();
// 								$dataVault->setFilename($fileName)->setMimeType($mimeType)->setBinary($binary);
// 								$dataVaultMapper->save($dataVault);

// 								$directive->setProfilePictureId($dataVault->getId());
// 							}
// 						}
// 					}

// 					$this->_entityManager->persist($directive);
// 					$this->_entityManager->flush();

// 					$this->_helper->flashMessenger(array('success' => _("Directive updated")));
// 					$this->_helper->redirector('read', 'Directive', 'admin', array('type'=>'pathfinder'));
// 				} else {
// 					$this->_helper->flashMessenger(array('error' => _("Directive don't found")));
// 					$this->_helper->redirector('read', 'Directive', 'admin', array('type'=>'pathfinder'));
// 				}
// 			} else {
// 				$this->_helper->redirector('read', 'Directive', 'admin', array('type'=>'pathfinder'));
// 			}
// 		} else {
// 			$this->_helper->redirector('read', 'Directive', 'admin', array('type'=>'pathfinder'));
// 		}
// 	}

	/**
	 * Deletes directives
	 * @access public
	 * @internal
	 * 1) Gets the model directive
	 * 2) Validates the existance of dependencies
	 * 3) Changes the state field or records to delete
	 */
	public function deleteAction() {
		$this->_helper->viewRenderer->setNoRender(TRUE);

		$itemIds = $this->_getParam('itemIds', array());
		if (!empty($itemIds) ) {
			$removeCount = 0;
			foreach ($itemIds as $id) {
				$directive = $this->_entityManager->find('Model\Directive', $id);
				$directive->setState(FALSE);

				$this->_entityManager->persist($directive);
				$this->_entityManager->flush();
				$removeCount++;
			}
			$message = sprintf(ngettext('%d directive removed.', '%d directives removed.', $removeCount), $removeCount);

			$this->stdResponse->success = TRUE;
			$this->stdResponse->message = _($message);
		} else {
			$this->stdResponse->success = FALSE;
			$this->stdResponse->message = _("Data submitted is empty.");
		}
		// sends response to client
		$this->_helper->json($this->stdResponse);
	}

	/**
	 * Sends the binary file vault to the user agent.
	 * @return void
	 */
// 	public function profilePictureAction() {
// 		$this->_helper->layout()->disableLayout();
// 		$this->_helper->viewRenderer->setNoRender(TRUE);

// 		$id = (int)$this->_getParam('id', 0);

// 		$dataVaultMapper = new Model_DataVaultMapper();
// 		$dataVault = $dataVaultMapper->find($id);

// 		if ($dataVault->getBinary()) {
// 			$this->_response
// 			//No caching
// 				->setHeader('Pragma', 'public')
// 				->setHeader('Expires', '0')
// 				->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0')
// 				->setHeader('Cache-Control', 'private')
// 				->setHeader('Content-type', $dataVault->getMimeType())
// 				->setHeader('Content-Transfer-Encoding', 'binary')
// 				->setHeader('Content-Length', strlen($dataVault->getBinary()));

// 			echo $dataVault->getBinary();
// 		} else {
// 			$this->_response->setHttpResponseCode(404);
// 		}
// 	}

	/**
	 *
	 * Outputs an XHR response containing all entries in directives.
	 * This action serves as a datasource for the read/index view
	 * @xhrParam int filter_name
	 * @xhrParam int iDisplayStart
	 * @xhrParam int iDisplayLength
	 */
	public function readItemsAction() {
		$sortCol = $this->_getParam('iSortCol_0', 1);
		$sortDirection = $this->_getParam('sSortDir_0', 'asc');

		$filterParams['name'] = $this->_getParam('filter_name', NULL);
		$filters = $this->getFilters($filterParams);

		$start = $this->_getParam('iDisplayStart', 0);
		$limit = $this->_getParam('iDisplayLength', 10);
		$page = ($start + $limit) / $limit;

		$directiveRepo = $this->_entityManager->getRepository('Model\Directive');
		$directives = $directiveRepo->findByCriteria($filters, $limit, $start, $sortCol, $sortDirection);
		$total = $directiveRepo->getTotalCount($filters);

		$posRecord = $start+1;
		$data = array();
		foreach ($directives as $directive) {
			$changed = $directive->getChanged();
			if ($changed != NULL) {
				$changed = $changed->format('d.m.Y');
			}

			$row = array();
			$row[] = $directive->getId();
			$row[] = $directive->getName();
			$row[] = $directive->getPositions();
			$row[] = $directive->getPhonemobil();
			$row[] = $directive->getPhone();
			$row[] = $directive->getEmail();
			$row[] = $directive->getClubs();
			$row[] = $directive->getCreated()->format('d.m.Y');
			$row[] = $changed;
			$row[] = '[]';
			$data[] = $row;
			$posRecord++;
		}
		// response
		$this->stdResponse->iTotalRecords = $total;
		$this->stdResponse->iTotalDisplayRecords = $total;
		$this->stdResponse->aaData = $data;
		$this->_helper->json($this->stdResponse);
	}

	/**
	 * Outputs an XHR response, loads the first names of the directives.
	 */
	public function autocompleteAction() {
		$filterParams['name'] = $this->_getParam('name_auto', NULL);
		$filters = $this->getFilters($filterParams);

		$directiveRepo = $this->_entityManager->getRepository('Model\Directive');
		$directives = $directiveRepo->findByCriteria($filters);

		$data = array();
		foreach ($directives as $directive) {
			$data[] = $directive->getFirstName();
		}

		$this->stdResponse->items = $data;
		$this->_helper->json($this->stdResponse);
	}

	/**
	 *
	 * Returns an associative array where:
	 * field: name of the table field
	 * filter: value to match
	 * operator: the sql operator.
	 * @param array $filterParams contains the values selected by the user.
	 * @return array(field, filter, operator)
	 */
	private function getFilters($filterParams) {
		$filters = array ();

		if (empty($filterParams)) {
			return $filters;
		}

		if (!empty($filterParams['name'])) {
			$filters[] = array('field' => 'firstName', 'filter' => '%'.$filterParams['name'].'%', 'operator' => 'LIKE');
		}

		return $filters;
	}

	/**
	 * Returns the ids and names of all positions
	 * @return array
	 */
	private function getPositions() {
		$positionRepo = $this->_entityManager->getRepository('Model\Position');
		$positions = $positionRepo->findAll();

		$positionArray = array();
		foreach ($positions as $position) {
			$positionArray[$position->getId()] = $position->getName();
		}

		return $positionArray;
	}

	/**
	 * Returns the ids and names of all club pathfinders
	 * @return array
	 */
	private function getClubPathfinders() {
		$clubRepo = $this->_entityManager->getRepository('Model\ClubPathfinder');
		$clubs = $clubRepo->findAll();

		$clubPathfinderArray = array();
		foreach ($clubs as $club) {
			$clubPathfinderArray[$club->getId()] = $club->getName();
		}

		return $clubPathfinderArray;
	}

	/**
	 * Returns the genders of a person
	 * @return array
	 */
	private function getGenders() {
		return array(Model_Person::SEX_MALE => _("Male"), Model_Person::SEX_FEMALE => _("Female"));
	}
}