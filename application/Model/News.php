<?php
/**
 * Model Doctrine 2 for Dist 3
 *
 * @category Dist
 * @package Model
 * @author Victor Villca <victor.villca@people-trust.com>
 * @copyright Copyright (c) 2013 Emini A/S
 * @license Proprietary
 */

namespace Model;

/**
 * @Entity(repositoryClass="Model\Repositories\NewsRepository")
 * @Table(name="News")
 */
class News extends DomainObject {

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $title;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $summary;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $contain;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $fount;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $imagename;

	/**
	 * @Column(type="datetime")
	 * @var datetime
	 */
	protected $newsdate;

	/**
	 * Id of the Category this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $categoryId;

	/**
	 * Category this model is associated with.
	 * @ManyToOne(targetEntity="Category")
	 * @JoinColumn(name="categoryId", referencedColumnName="id")
	 * @var Category
	 */
	private $category;

	/**
	 * Id of the Administrator this model is associated with.
	 * @Column(type="integer")
	 * @var int
	 */
	private $administratorId;

	/**
	 * Administrator this model is associated with.
	 * @ManyToOne(targetEntity="Administrator")
	 * @JoinColumn(name="administratorId", referencedColumnName="id")
	 * @var Administrator
	 */
	private $administrator;

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return News
	 */
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSummary() {
		return $this->summary;
	}

	/**
	 * @param string $summary
	 * @return News
	 */
	public function setSummary($summary) {
		$this->summary = $summary;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getContain() {
		return $this->contain;
	}

	/**
	 * @param string $contain
	 * @return News
	 */
	public function setContain($contain) {
		$this->contain = $contain;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getFount() {
		return $this->fount;
	}

	/**
	 * @param string $fount
	 */
	public function setFount($fount) {
		$this->fount = $fount;
		return  $this;
	}

	/**
	 * @return string
	 */
	public function getImagename() {
		return $this->imagename;
	}

	/**
	 * @param string $imagename
	 * @return News
	 */
	public function setImagename($imagename) {
		$this->imagename = $imagename;
		return $this;
	}

	/**
	 * @return datetime
	 */
	public function getNewsdate() {
		return $this->newsdate;
	}

	/**
	 * @param datetime $newsdate
	 * @return News
	 */
	public function setNewsdate($newsdate) {
		$this->newsdate = $newsdate;
		return $this;
	}

	/**
	 * @return Category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @param Category $category
	 * @return News
	 */
	public function setCategory($category) {
		$this->category = $category;
		return $this;
	}

	/**
	 * @return Administrator
	 */
	public function getAdministrator() {
		return $this->administrator;
	}

	/**
	 * @param Administrator $administrator
	 * @return News
	 */
	public function setAdministrator($administrator) {
		$this->administrator = $administrator;
		return $this;
	}
}