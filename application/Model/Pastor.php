<?php

namespace Model;

/**
 * @Entity(repositoryClass="Model\Repositories\PastorRepository")
 * @Table(name="Pastor")
 */
class Pastor extends Person {

    /**
	 * @Column(type="datetime")
	 * @var datetime
	 */
    private $dateChristening;

    /**
     * @Column(type="string")
     * @var string
     */
    private $address;

    /**
     * @Column(type="string")
     * @var string
     */
    private $note;

    /**
     * @Column(type="string")
     * @var string
     */
    private $email;

    /**
     * @Column(type="integer")
     * @var int
     */
    protected $yearService;

    /**
     * @Column(type="integer")
     * @var int
     */
    protected $isActivo;

	/**
	 * Id of the Department this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $departmentId;

	/**
	 * Department this model is associated with.
	 * @ManyToOne(targetEntity="Department")
	 * @JoinColumn(name="departmentId", referencedColumnName="id")
	 * @var Department
	 */
	private $department;

	/**
	 * Id of the District this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $districtId;

	/**
	 * District this model is associated with.
	 * @ManyToOne(targetEntity="District")
	 * @JoinColumn(name="districtId", referencedColumnName="id")
	 * @var District
	 */
	private $district;

	/**
	 * @return datetime
	 */
	public function getDateChristening() {
		return $this->dateChristening;
	}

	/**
	 * @param datetime $dateChristening
	 * @return Pastor
	 */
	public function setDateChristening($dateChristening) {
		$this->dateChristening = $dateChristening;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @param string $address
	 * @return Pastor
	 */
	public function setAddress($address) {
		$this->address = $address;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getNote() {
		return $this->note;
	}

	/**
	 * @param string $note
	 * @return Pastor
	 */
	public function setNote($note) {
		$this->note = $note;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $email
	 * @return Pastor
	 */
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getYearService() {
		return $this->yearService;
	}

	/**
	 * @param int $yearService
	 * @return Pastor
	 */
	public function setYearService($yearService) {
		$this->yearService = $yearService;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function getIsActivo() {
		return $this->isActivo;
	}

	/**
	 * @param boolean $isActivo
	 * @return Pastor
	 */
	public function setIsActivo($isActivo) {
		$this->isActivo = $isActivo;
		return $this;
	}

	/**
	 * @return Department
	 */
	public function getDepartment() {
		return $this->department;
	}

	/**
	 * @param Department $department
	 * @return Pastor
	 */
	public function setDepartment($department) {
		$this->department = $department;
		return $this;
	}

	/**
	 * @return District
	 */
	public function getDistrict() {
		return $this->district;
	}

	/**
	 * @param District $district
	 * @return Pastor
	 */
	public function setDistrict($district) {
		$this->district = $district;
		return $this;
	}
}