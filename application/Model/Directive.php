<?php

namespace Model;

/**
 * @Entity(repositoryClass="Model\Repositories\DirectiveRepository")
 * @Table(name="Directive")
 */
class Directive extends Person {

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
     * @Column(type="string")
     * @var string
     */
    private $birthplace;

    /**
     * @Column(type="string")
     * @var string
     */
    private $city;

    /**
     * @Column(type="string")
     * @var string
     */
    private $nameMother;

    /**
     * @Column(type="string")
     * @var string
     */
    private $nameFather;

    /**
     * @Column(type="string")
     * @var string
     */
    private $gradeSchool;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $year;

    /**
     * @Column(type="string")
     * @var string
     */
    private $bloodGroup;

    /**
     * @Column(type="string")
     * @var string
     */
    private $allergies;

    /**
     * @Column(type="string")
     * @var string
     */
    private $disease;

    /**
     * @Column(type="string")
     * @var string
     */
    private $treatment;

    /**
     * @Column(type="string")
     * @var string
     */
    private $positions;

    /**
     * @Column(type="string")
     * @var string
     */
    private $ranks;

    /**
     * @Column(type="string")
     * @var string
     */
    private $departments;

    /**
     * @Column(type="string")
     * @var string
     */
    private $clubs;

    /**
     * @Column(type="string")
     * @var string
     */
    private $churchs;

    /**
     * @Column(type="string")
     * @var string
     */
    private $districts;

    /**
     * @Column(type="string")
     * @var string
     */
    private $regions;

    /**
     * @Column(type="string")
     * @var string
     */
    private $missions;

	/**
	 * Id of the Position this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $positionId;

	/**
	 * Position this model is associated with.
	 * @ManyToOne(targetEntity="Position")
	 * @JoinColumn(name="positionId", referencedColumnName="id")
	 * @var Position
	 */
	private $position;

	/**
	 * Id of the Rank this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $rankId;

	/**
	 * Rank this model is associated with.
	 * @ManyToOne(targetEntity="Rank")
	 * @JoinColumn(name="rankId", referencedColumnName="id")
	 * @var Rank
	 */
	private $rank;

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
	 * Id of the Club this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $clubId;

	/**
	 * Club this model is associated with.
	 * @ManyToOne(targetEntity="Club")
	 * @JoinColumn(name="clubId", referencedColumnName="id")
	 * @var Club
	 */
	private $club;

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
	 * Id of the Region this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $regionId;

	/**
	 * Region this model is associated with.
	 * @ManyToOne(targetEntity="Region")
	 * @JoinColumn(name="regionId", referencedColumnName="id")
	 * @var Region
	 */
	private $region;

	/**
	 * @return datetime
	 */
	public function getDateChristening() {
		return $this->dateChristening;
	}

	/**
	 * @param datetime $dateChristening
	 * @return Directive
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
	 * @return Directive
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
	 * @return Directive
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
	 * @return Directive
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
	 * @return Directive
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
	 * @return Directive
	 */
	public function setIsActivo($isActivo) {
		$this->isActivo = $isActivo;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBirthplace() {
		return $this->birthplace;
	}

	/**
	 * @param string $birthplace
	 * @return Directive
	 */
	public function setBirthplace($birthplace) {
		$this->birthplace = $birthplace;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * @param string $city
	 * @return Directive
	 */
	public function setCity($city) {
		$this->city = $city;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getNameMother() {
		return $this->nameMother;
	}

	/**
	 * @param string $nameMother
	 * @return Directive
	 */
	public function setNameMother($nameMother) {
		$this->nameMother = $nameMother;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getNameFather() {
		return $this->nameFather;
	}

	/**
	 * @param string $nameFather
	 * @return Directive
	 */
	public function setNameFather($nameFather) {
		$this->nameFather = $nameFather;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getGradeSchool() {
		return $this->gradeSchool;
	}

	/**
	 * @param string $gradeSchool
	 * @return Directive
	 */
	public function setGradeSchool($gradeSchool) {
		$this->gradeSchool = $gradeSchool;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * @param int $year
	 * @return Directive
	 */
	public function setYear($year) {
		$this->year = $year;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBloodGroup() {
		return $this->bloodGroup;
	}

	/**
	 * @param string $bloodGroup
	 * @return Directive
	 */
	public function setBloodGroup($bloodGroup) {
		$this->bloodGroup = $bloodGroup;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAllergies() {
		return $this->allergies;
	}

	/**
	 * @param string $allergies
	 * @return Directive
	 */
	public function setAllergies($allergies) {
		$this->allergies = $allergies;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDisease() {
		return $this->disease;
	}

	/**
	 * @param string $disease
	 * @return Directive
	 */
	public function setDisease($disease) {
		$this->disease = $disease;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTreatment() {
		return $this->treatment;
	}

	/**
	 * @param string $treatment
	 * @return Directive
	 */
	public function setTreatment($treatment) {
		$this->treatment = $treatment;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPositions() {
		return $this->positions;
	}

	/**
	 * @param string $positions
	 * @return Directive
	 */
	public function setPositions($positions) {
		$this->positions = $positions;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getRanks() {
		return $this->ranks;
	}

	/**
	 * @param string $ranks
	 * @return Directive
	 */
	public function setRanks($ranks) {
		$this->ranks = $ranks;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDepartments() {
		return $this->departments;
	}

	/**
	 * @param string $departments
	 * @return Directive
	 */
	public function setDepartments($departments) {
		$this->departments = $departments;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getClubs() {
		return $this->clubs;
	}

	/**
	 * @param string $clubs
	 * @return Directive
	 */
	public function setClubs($clubs) {
		$this->clubs = $clubs;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getChurchs() {
		return $this->churchs;
	}

	/**
	 * @param string $churchs
	 * @return Directive
	 */
	public function setChurchs($churchs) {
		$this->churchs = $churchs;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDistricts() {
		return $this->districts;
	}

	/**
	 * @param string $districts
	 * @return Directive
	 */
	public function setDistricts($districts) {
		$this->districts = $districts;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getRegions() {
		return $this->regions;
	}

	/**
	 * @param string $regions
	 * @return Directive
	 */
	public function setRegions($regions) {
		$this->regions = $regions;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMissions() {
		return $this->missions;
	}

	/**
	 * @param string $missions
	 * @return Directive
	 */
	public function setMissions($missions) {
		$this->missions = $missions;
		return $this;
	}

	/**
	 * @return Position
	 */
	public function getPosition() {
		return $this->position;
	}

	/**
	 * @param Position $position
	 * @return Directive
	 */
	public function setPosition($position) {
		$this->position = $position;
		return $this;
	}

	/**
	 * @return Rank
	 */
	public function getRank() {
		return $this->rank;
	}

	/**
	 * @param Rank $rank
	 * @return Directive
	 */
	public function setRank($rank) {
		$this->rank = $rank;
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
	 * @return Directive
	 */
	public function setDepartment($department) {
		$this->department = $department;
		return $this;
	}

	/**
	 * @return Club
	 */
	public function getClub() {
		return $this->club;
	}

	/**
	 * @param Club $club
	 * @return Directive
	 */
	public function setClub($club) {
		$this->club = $club;
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
	 * @return Directive
	 */
	public function setDistrict($district) {
		$this->district = $district;
		return $this;
	}

	/**
	 * @return Region
	 */
	public function getRegion() {
		return $this->region;
	}

	/**
	 * @param Region $region
	 * @return Directive
	 */
	public function setRegion($region) {
		$this->region = $region;
		return $this;
	}
}