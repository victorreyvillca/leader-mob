<?php
/**
 * Form for DIST 3.
 *
 * @category Dist
 * @author Victor Villca <victor.villca@people-trust.com>
 * @copyright Copyright (c) 2013 Gisof A/S
 * @license Proprietary
 */

class Admin_Form_Administrator extends Zend_Form {

	/**
	 * @var string
	 */
	private $source;

	public function init() {
		$this
			->setAttrib('id', 'formId')
			->setMethod('post')
			->setAttrib('enctype', 'multipart/form-data')

			->addElement('Hidden', 'id')

			->addElement('Text', 'firstName', array(
				'label' => _('Firstname'),
				'required' => TRUE,
				'filters' => array(
					array('StringTrim')
				)
			))

			->addElement('Text', 'lastName', array(
				'label' => _('Lastname'),
				'required' => TRUE,
				'filters' => array(
					array('StringTrim')
				)
			))

			->addElement('Radio', 'sex', array(
				'label' => _('Sex'),
				'required' => TRUE
			))

			->addElement('Text', 'username', array(
				'label' => _('Username'),
				'required' => TRUE,
				'filters' => array(
					array('StringTrim')
				)
			))

			->addElement('Password', 'password', array(
				'label' => _('Password'),
				'required' => TRUE,
				'filters' => array(
					array('StringTrim')
				)
			))

			->addElement('Password', 'passwordConfirm', array(
                'label' => _('Confirm Password'),
				'required' => TRUE,
				'filters' => array(
						array('StringTrim')
				)
			))

			->addElement('Text', 'email', array(
				'label' => _('Email'),
				'filters' => array(
					array('StringTrim')
				),
				'validators' => array(
					'EmailAddress'
				)
			))

			->addElement('Text', 'phonemobil', array(
				'label' => _('Phone mobil'),
				'required' => TRUE,
				'filters' => array(
					array('StringTrim')
				),
				'validators' => array(
					array('Digits', false)
				)
			))

			->addElement('Text', 'phone', array(
				'label' => _('Phone'),
				'filters' => array(
					array('StringTrim')
				)
			))

			->addElement('Select', 'role', array(
				'label' => _('Role'),
				'required' => TRUE
			))
		;
	}

	public function loadDefaultDecorators() {
		$this->setDecorators(
			array(
				new \Zend_Form_Decorator_PrepareElements(),
				'ViewScript'
			)
		);
		$this->getDecorator('ViewScript')->setOption('viewScript', '/Administrator/template/AdministratorForm.phtml');
	}

	/**
	 * @return string
	 */
	public function getSource() {
		return $this->source;
	}

	/**
	 * @param string $source
	 * @return Zend_Form
	 */
	public function setSource($source) {
		$this->source = $source;
		return $this;
	}
}