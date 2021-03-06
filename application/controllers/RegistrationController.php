<?php
use Model\Directive;
use Model\Person;
/**
 * Controller for DIST 2.
 *
 * @category Dist
 * @author Victor Villca <victor.villca@people-trust.com>
 * @copyright Copyright (c) 2012 Gisof A/S
 * @license Proprietary
 */

class RegistrationController extends Dis_Controller_Action {

    const NO_SELECTED = -1;

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
        $this->view->navigation()->getContainer()->findOneBy('id', 'guest.registration')->setActive(TRUE);

	    $formFilter = new Admin_Form_SearchFilter();
	    $formFilter->getElement('nameFilter')->setLabel(_('Nombre Directivo'));
	    $this->view->formFilter = $formFilter;
	}

	/**
	 * This action shows a form to save the directive
	 * @access public
	 */
	public function addAction() {
        $this->view->navigation()->getContainer()->findOneBy('id', 'guest.registration')->setActive(TRUE);

		$form = new Admin_Form_Directive();

		$positionRepo = $this->_entityManager->getRepository('Model\Position');
		$missionRepo = $this->_entityManager->getRepository('Model\Mission');
		$regionRepo = $this->_entityManager->getRepository('Model\Region');
		$districtRepo = $this->_entityManager->getRepository('Model\District');
		$churchRepo = $this->_entityManager->getRepository('Model\Church');
		$clubRepo = $this->_entityManager->getRepository('Model\Club');
		$classConquerorRepo = $this->_entityManager->getRepository('Model\ClassConqueror');
		$areaRepo = $this->_entityManager->getRepository('Model\Area');
		$rankRepo = $this->_entityManager->getRepository('Model\Rank');
		$departmentRepo = $this->_entityManager->getRepository('Model\Department');

		$form->getElement('position')->setMultiOptions($positionRepo->findAllArray(TRUE));
		$form->getElement('mission')->setMultiOptions($missionRepo->findAllArray());
		$form->getElement('region')->setMultiOptions($regionRepo->findAllArray());
		$form->getElement('district')->setMultiOptions($districtRepo->findAllArray());
		$form->getElement('church')->setMultiOptions($churchRepo->findAllArray());
		$form->getElement('club')->setMultiOptions($clubRepo->findAllArray());
		$form->getElement('classConqueror')->setMultiOptions($classConquerorRepo->findAllArray());
		$form->getElement('area')->setMultiOptions($areaRepo->findAllArray(TRUE));
		$form->getElement('rank')->setMultiOptions($rankRepo->findAllArray(TRUE));
		$form->getElement('department')->setMultiOptions($departmentRepo->findAllArray(TRUE));

		if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                if (($formData['department'] > 0 && $formData['position'] > 0) && ($formData['area'] > 0 && $formData['rank'] > 0)) {
                    $mission = $this->_entityManager->find('Model\Mission', (int)$formData['mission']);
                    $region = $this->_entityManager->find('Model\Region', (int)$formData['region']);
                    $district = $this->_entityManager->find('Model\District', (int)$formData['district']);
                    $church = $this->_entityManager->find('Model\Church', (int)$formData['church']);
                    $club = $this->_entityManager->find('Model\Club', (int)$formData['club']);
                    $position = $this->_entityManager->find('Model\Position', (int)$formData['position']);
                    $area = $this->_entityManager->find('Model\Area', (int)$formData['area']);
                    $rank = $this->_entityManager->find('Model\Rank', (int)$formData['rank']);
                    $department = $this->_entityManager->find('Model\Department', (int)$formData['department']);

                    $directive = new Directive();
                    $directive
                        ->setRegion($region)
                        ->setDistrict($district)
                        ->setChurch($church)
                        ->setClub($club)
                        ->setPosition($position)
                        ->setArea($area)
                        ->setRank($rank)
                        ->setDepartment($department)
                        ->setEmail($formData['email'])
                        ->setAddress($formData['address'])
                        ->setGradeSchool($formData['gradeSchool'])
                        ->setBloodGroup($formData['bloodGroup'])
                        ->setAllergies($formData['allergies'])
                        ->setDisease($formData['disease'])
                        ->setTreatment($formData['treatment'])
                        ->setIsActivo(TRUE)
                        ->setState(TRUE)
                        ->setCreated(new DateTime('now'))
                        ->setSex((int)$formData['sex'])
                        ->setPhonemobil($formData['phonemobil'])
                        ->setPhone($formData['phone'])
                        ->setDateOfBirth(new DateTime($formData['dateOfBirth']))
                        ->setIdentityCard($formData['ci'])
                        ->setLastName($formData['lastName'])
                        ->setFirstName($formData['firstName'])
                    ;

                    if ($_FILES['file']['error'] !== UPLOAD_ERR_NO_FILE) {
                    	if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
                            $fh = fopen($_FILES['file']['tmp_name'], 'r');
                            $binary = fread($fh, filesize($_FILES['file']['tmp_name']));
                    		fclose($fh);

                    		$mimeType = $_FILES['file']['type'];
                    		$fileName = $_FILES['file']['name'];

                    		$dataVaultMapper = new Dis_Model_DataVaultMapper();
                    		$dataVault = new Dis_Model_DataVault();
                    		$dataVault->setFilename($fileName)->setMimeType($mimeType)->setBinary($binary);
                    		$dataVaultMapper->save($dataVault);

                    		$directive->setProfilePictureId($dataVault->getId());
                    	}
                    }

                    //saves the relationship many to many
                    $classConquerorIds = $formData['classConqueror'];
                    if (!empty($classConquerorIds)) {
                    	foreach ($classConquerorIds as $classConquerorId) {
                    		$classConqueror = $this->_entityManager->find('Model\ClassConqueror', $classConquerorId);
                    		$directive->addClassConqueror($classConqueror);
                    	}
                    }

                    $this->_entityManager->persist($directive);
                    $this->_entityManager->flush();

                    $this->_helper->flashMessenger(array('success' => _('Directivo Guardado')));
                    $this->_helper->redirector('index', 'Registration', array('type'=>'information'));
                } else {
                    if ($formData['area'] == self::NO_SELECTED) {
                    	$form->getElement('department')->setRequired(TRUE);
                    }
                    $this->_helper->flashMessenger(array('error' => _('El formulario tiene errores')));
                }
            }
        }

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
        $this->view->navigation()->getContainer()->findOneBy('id', 'guest.registration')->setActive(TRUE);

        $form = new Admin_Form_Directive();
        $form->getElement('saveButton')->setLabel(_('Editar'));

        $positionRepo = $this->_entityManager->getRepository('Model\Position');
        $missionRepo = $this->_entityManager->getRepository('Model\Mission');
        $regionRepo = $this->_entityManager->getRepository('Model\Region');
        $districtRepo = $this->_entityManager->getRepository('Model\District');
        $churchRepo = $this->_entityManager->getRepository('Model\Church');
        $clubRepo = $this->_entityManager->getRepository('Model\Club');
        $classConquerorRepo = $this->_entityManager->getRepository('Model\ClassConqueror');
        $areaRepo = $this->_entityManager->getRepository('Model\Area');
        $rankRepo = $this->_entityManager->getRepository('Model\Rank');
        $departmentRepo = $this->_entityManager->getRepository('Model\Department');

        $form->getElement('position')->setMultiOptions($positionRepo->findAllArray());
        $form->getElement('mission')->setMultiOptions($missionRepo->findAllArray());
        $form->getElement('region')->setMultiOptions($regionRepo->findAllArray());
        $form->getElement('district')->setMultiOptions($districtRepo->findAllArray());
        $form->getElement('church')->setMultiOptions($churchRepo->findAllArray());
        $form->getElement('club')->setMultiOptions($clubRepo->findAllArray());
        $form->getElement('classConqueror')->setMultiOptions($classConquerorRepo->findAllArray());
        $form->getElement('area')->setMultiOptions($areaRepo->findAllArray());
        $form->getElement('rank')->setMultiOptions($rankRepo->findAllArray());
        $form->getElement('department')->setMultiOptions($departmentRepo->findAllArray());

	    if ($this->_request->isPost()) {
	    	$formData = $this->_request->getPost();
	    	if ($form->isValid($formData)) {
	    		$id = $this->_getParam('id', 0);
	    		$directive = $this->_entityManager->find('Model\Directive', $id);

	    		if ($directive != NULL) {//security
	    		    $mission = $this->_entityManager->find('Model\Mission', (int)$formData['mission']);
	    		    $region = $this->_entityManager->find('Model\Region', (int)$formData['region']);
	    		    $district = $this->_entityManager->find('Model\District', (int)$formData['district']);
	    		    $church = $this->_entityManager->find('Model\Church', (int)$formData['church']);
	    		    $club = $this->_entityManager->find('Model\Club', (int)$formData['club']);
	    		    $position = $this->_entityManager->find('Model\Position', (int)$formData['position']);
	    		    $area = $this->_entityManager->find('Model\Area', (int)$formData['area']);
	    		    $rank = $this->_entityManager->find('Model\Rank', (int)$formData['rank']);
	    		    $department = $this->_entityManager->find('Model\Department', (int)$formData['department']);

	    		    $directive
    	    		    ->setRegion($region)
    	    		    ->setDistrict($district)
    	    		    ->setChurch($church)
    	    		    ->setClub($club)
    	    		    ->setPosition($position)
    	    		    ->setArea($area)
    	    		    ->setRank($rank)
    	    		    ->setDepartment($department)
    	    		    ->setEmail($formData['email'])
    	    		    ->setAddress($formData['address'])
    	    		    ->setGradeSchool($formData['gradeSchool'])
    	    		    ->setBloodGroup($formData['bloodGroup'])
    	    		    ->setAllergies($formData['allergies'])
    	    		    ->setDisease($formData['disease'])
    	    		    ->setTreatment($formData['treatment'])
    	    		    ->setIsActivo(TRUE)
    	    		    ->setChanged(new DateTime('now'))
                        ->setSex((int)$formData['sex'])
    	    		    ->setPhonemobil($formData['phonemobil'])
    	    		    ->setPhone($formData['phone'])
    	    		    ->setDateOfBirth(new DateTime($formData['dateOfBirth']))
    	    		    ->setIdentityCard($formData['ci'])
    	    		    ->setLastName($formData['lastName'])
    	    		    ->setFirstName($formData['firstName'])
	    		    ;

	    		    if ($_FILES['file']['error'] !== UPLOAD_ERR_NO_FILE) {
	    		    	if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
	    		    		$fh = fopen($_FILES['file']['tmp_name'], 'r');
	    		    		$binary = fread($fh, filesize($_FILES['file']['tmp_name']));
	    		    		fclose($fh);

	    		    		$mimeType = $_FILES['file']['type'];
	    		    		$fileName = $_FILES['file']['name'];

	    		    		$dataVaultMapper = new Dis_Model_DataVaultMapper();

	    		    		if ($directive->getProfilePictureId() != NULL) {// if it has image profile update
	    		    			$dataVault = $dataVaultMapper->find($directive->getProfilePictureId(), FALSE);
	    		    			$dataVault->setFilename($fileName)->setMimeType($mimeType)->setBinary($binary);
	    		    			$dataVaultMapper->update($directive->getProfilePictureId(), $dataVault);
	    		    		} elseif ($directive->getProfilePictureId() == NULL) {// if it don't have image profile create
	    		    			$dataVault = new Dis_Model_DataVault();
	    		    			$dataVault->setFilename($fileName)->setMimeType($mimeType)->setBinary($binary);
	    		    			$dataVaultMapper->save($dataVault);

	    		    			$directive->setProfilePictureId($dataVault->getId());
	    		    		}
	    		    	}
	    		    }

	    		    //saves the relationship many to many
                    $classConquerorIds = $formData['classConqueror'];
                    if (!empty($classConquerorIds)) {
                        $directive->removeAllClassConqueror();
                        foreach ($classConquerorIds as $classConquerorId) {
                            $classConqueror = $this->_entityManager->find('Model\ClassConqueror', $classConquerorId);
                            $directive->addClassConqueror($classConqueror);
                        }
                    }

                    $this->_entityManager->persist($directive);
                    $this->_entityManager->flush();

	    			$this->_helper->flashMessenger(array('success' => _('Directivo Editado correctamente')));
                    $this->_helper->redirector('index', 'Registration', array('type'=>'information'));
    			} else {
    				$this->_helper->flashMessenger(array('error' => _('Directivo no existente')));
    			}
    		} else {
    			$this->_helper->flashMessenger(array('error' => _('El Formulario contiene Errores al Editar el Directivo')));
    		}
        } else {
            $id = $this->_getParam('id', 0);
            $directive = $this->_entityManager->find('Model\Directive', $id);

            if ($directive != NULL) {//security
                $form->getElement('id')->setValue($id);
                $form->getElement('firstName')->setValue($directive->getFirstName());
                $form->getElement('lastName')->setValue($directive->getLastName());
                $form->getElement('ci')->setValue($directive->getIdentityCard());
                $form->getElement('dateOfBirth')->setValue($directive->getDateOfBirth()->format('d-m-Y'));

                $form->getElement('year')->setValue($directive->getYear());
                $form->getElement('address')->setValue($directive->getAddress());

                $form->getElement('position')->setValue($directive->getPosition()->getId());
                $form->getElement('rank')->setValue($directive->getRank()->getId());
                $form->getElement('area')->setValue($directive->getArea()->getId());

                $form->getElement('phone')->setValue($directive->getPhone());
                $form->getElement('phonemobil')->setValue($directive->getPhonemobil());
                $form->getElement('email')->setValue($directive->getEmail());
                $form->getElement('yearService')->setValue($directive->getYearService());

                $church = $directive->getChurch();
                $district = $church->getDistrict();
                $region = $district->getRegion();
                $mission = $region->getMission();

                $form->getElement('club')->setValue($directive->getClub()->getId());
                $form->getElement('church')->setValue($church->getId());
                $form->getElement('district')->setValue($district->getId());
                $form->getElement('region')->setValue($region->getId());

                $form->getElement('gradeSchool')->setValue($directive->getGradeSchool());
                $form->getElement('bloodGroup')->setValue($directive->getBloodGroup());
                $form->getElement('allergies')->setValue($directive->getAllergies());
                $form->getElement('disease')->setValue($directive->getDisease());
                $form->getElement('treatment')->setValue($directive->getTreatment());

                if ($directive->getSex() == Person::SEX_MALE) {
                    $form->setGenderMaleChecked(TRUE);
                } elseif ($directive->getSex() == Person::SEX_FEMALE) {
                    $form->setGenderFemaleChecked(TRUE);
                }

                $classConquerorIds = array();
                $classConquerors = $directive->getClassConquerors();
                foreach ($classConquerors as $classConqueror) {
                	$classConquerorIds[] = $classConqueror->getId();
                }
                $form->getElement('classConqueror')->setValue($classConquerorIds);

                $dataVaultMapper = new Dis_Model_DataVaultMapper();
                $dataVault = $dataVaultMapper->find($directive->getProfilePictureId());
                if ($dataVault != NULL && $dataVault->getBinary()) {
                	$src = $this->_helper->url('profile-picture', 'Administrator', 'admin', array('id' => $dataVault->getId(), 'timestamp' => time()));
                } else {
                	if ($directive->getSex() == Model\Person::SEX_MALE) {
                		$src = '/image/profile/male_default.jpg';
                	} elseif ($directive->getSex() == Model\Person::SEX_FEMALE) {
                		$src = '/image/profile/female_default.jpg';
                	}
                }
                $form->setSource($src);
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
			$message = sprintf(ngettext('%d directivo eliminado', '%d directivos eliminados', $removeCount), $removeCount);

			$this->stdResponse->success = TRUE;
			$this->stdResponse->message = _($message);
		} else {
			$this->stdResponse->success = FALSE;
			$this->stdResponse->message = _('Datos llegados estan vacios');
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

			$church = $directive->getChurch();
			$district = $church->getDistrict();
			$region = $district->getRegion();
			$mission = $region->getMission();

			$row = array();
			$row[] = $directive->getId();
			$row[] = $directive->getName();
			$row[] = $directive->getPhonemobil();
			$row[] = $directive->getPosition()->getName();
			$row[] = $directive->getRank()->getName();
			$row[] = $directive->getClub()->getName();
			$row[] = $directive->getArea()->getName();
			$row[] = $church->getName();
			$row[] = $district->getName();
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
	 * Return the regions
	 * @access public
	 * @return Json array
	 */
	public function dsRegionAction() {
		$this->_helper->viewRenderer->setNoRender(TRUE);

		$regionRepo = $this->_entityManager->getRepository('Model\Region');
		$missionId = (int)$this->_getParam('missionId', 0);
		$regions = $regionRepo->findByArray(array('missionId' => $missionId));

		$this->stdResponse->regionsArray = $regions;
		$this->_helper->json($this->stdResponse);
	}

	/**
	 * Return the districts
	 * @access public
	 * @return Json array
	 */
	public function dsDistrictAction() {
		$this->_helper->viewRenderer->setNoRender(TRUE);

		$districtRepo = $this->_entityManager->getRepository('Model\District');
		$regionId = (int)$this->_getParam('regionId', 0);
		$districts = $districtRepo->findByArray(array('regionId' => $regionId));

		$this->stdResponse->districtsArray = $districts;
		$this->_helper->json($this->stdResponse);
	}

	/**
	 * Return the churches
	 * @access public
	 * @return Json array
	 */
	public function dsChurchAction() {
		$this->_helper->viewRenderer->setNoRender(TRUE);

		$churchRepo = $this->_entityManager->getRepository('Model\Church');
		$districtId = (int)$this->_getParam('districtId', 0);
		$churches = $churchRepo->findByArray(array('districtId' => $districtId));

		$this->stdResponse->churchesArray = $churches;
		$this->_helper->json($this->stdResponse);
	}

	/**
	 * Return the club
	 * @access public
	 * @return Json array
	 */
	public function dsClubAction() {
		$this->_helper->viewRenderer->setNoRender(TRUE);

		$clubRepo = $this->_entityManager->getRepository('Model\Club');
		$churchId = (int)$this->_getParam('churchId', 0);
		$clubes = $clubRepo->findByArray(array('churchId' => $churchId));

		$this->stdResponse->clubesArray = $clubes;
		$this->_helper->json($this->stdResponse);
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
		return array(Person::SEX_MALE => _('Masculino'), Person::SEX_FEMALE => _('Femenino'));
	}
}