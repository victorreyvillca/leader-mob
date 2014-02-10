<?php
/**
 * Form for DIST 3.
 *
 * @category Dist
 * @author Victor Villca <victor.villca@people-trust.com>
 * @copyright Copyright (c) 2014 Gisof A/S
 * @license Proprietary
 */

class Admin_Form_Directive extends Zend_Form {

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
				'label' => _('Nombres'),
				'required' => TRUE,
				'filters' => array(
					array('StringTrim')
				)
			))

			->addElement('Text', 'lastName', array(
				'label' => _('Apellidos'),
				'required' => TRUE,
				'filters' => array(
					array('StringTrim')
				)
			))

			->addElement('Text', 'lastName', array(
				'label' => _('Apellidos'),
				'required' => TRUE,
				'filters' => array(
					array('StringTrim')
				)
			))

			->addElement('Select', 'position', array(
				'label' => _('Cargo')
			))

			->addElement('Text', 'ci', array(
				'label' => _('Documento de Identidad'),
				'required' => TRUE
			))

			->addElement('Text', 'year', array(
				'label' => _('Edad')
			))

			->addElement('Radio', 'sex', array(
				'label' => _('Sex')
			))

			->addElement('Text', 'dateOfBirth', array(
				'label' => _('Fecha de Nacimiento')
			))

			->addElement('Text', 'birthplace', array(
				'label' => _('Lugar de Nacimiento')
			))

			->addElement('TextArea', 'address', array(
				'label' => _('Direccion'),
			    'attribs' => array('cols' => 16, 'rows' => 3)
			))

			->addElement('Text', 'city', array(
				'label' => _('Ciudad')
			))

			->addElement('Text', 'department', array(
				'label' => _('Departamento'),
                'filters' => array(
                    array('StringTrim')
                )
			))

			->addElement('Text', 'phone', array(
				'label' => _('Telefono'),
				'filters' => array(
                    array('StringTrim')
				)
			))

			->addElement('Text', 'phonemobil', array(
				'label' => _('Telefono Celular'),
				'required' => TRUE,
				'filters' => array(
                    array('StringTrim')
				),
				'validators' => array(
                    array('Digits', false)
				)
			))

			->addElement('Text', 'email', array(
				'label' => _('Correo'),
				'filters' => array(
					array('StringTrim')
				),
				'validators' => array(
					'EmailAddress'
				)
			))
			->addElement('Select', 'club', array(
				'label' => _('Club')
			))
			->addElement('Submit', 'saveButton', array(
                'label' => _('Guardar')
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
		$this->getDecorator('ViewScript')->setOption('viewScript', '/Registration/template/DirectiveForm.phtml');
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