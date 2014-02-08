<?php
/**
 * Model Doctrine 2 for Dist 3
 *
 * @category Dist
 * @package Models
 * @author Victor Villca <victor.villca@people-trust.com>
 * @copyright Copyright (c) 2013 Emini A/S
 * @license Proprietary
 */

namespace Model;

/**
 * @Entity(repositoryClass="Model\Repositories\PictureRepository")
 * @Table(name="Picture")
 */
class Picture extends DomainObject {

    const TYPE_PATHFINDER    = 1;
    const TYPE_AVENTURIER    = 2;
    const CLUB_ORION         = 3;
    const CLUB_NUEVO_ORIENTE = 4;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $title;

	/**
	 * @Column(type="text")
	 * @var string
	 */
	private $description;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $filename;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $mimeType;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $src;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $filenameCrop;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $mimeTypeCrop;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $srcCrop;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $ownerId;

	/**
	 * @Column(type="integer")
	 * @var int
	 */
	private $ownerType;
	/**
	 * Id of the PictureCategory this model is associated with.
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
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return Picture
	 */
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return Picture
	 */
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getFilename() {
		return $this->filename;
	}

	/**
	 * @param string $filename
	 * @return Picture
	 */
	public function setFilename($filename) {
		$this->filename = $filename;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMimeType() {
		return $this->mimeType;
	}

	/**
	 * @param string $mimeType
	 * @return Picture
	 */
	public function setMimeType($mimeType) {
		$this->mimeType = $mimeType;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSrc() {
		return $this->src;
	}

	/**
	 * @param string $src
	 * @return Picture
	 */
	public function setSrc($src) {
		$this->src = $src;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getFilenameCrop() {
		return $this->filenameCrop;
	}

	/**
	 * @param string $filenameCrop
	 * @return Picture
	 */
	public function setFilenameCrop($filenameCrop) {
		$this->filenameCrop = $filenameCrop;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMimeTypeCrop() {
		return $this->mimeTypeCrop;
	}

	/**
	 * @param string $mimeTypeCrop
	 * @return Picture
	 */
	public function setMimeTypeCrop($mimeTypeCrop) {
		$this->mimeTypeCrop = $mimeTypeCrop;
		return  $this;
	}

	/**
	 * @return string
	 */
	public function getSrcCrop() {
		return $this->srcCrop;
	}

	/**
	 * @param string $srcCrop
	 * @return Picture
	 */
	public function setSrcCrop($srcCrop) {
		$this->srcCrop = $srcCrop;
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
	 * @return Picture
	 */
	public function setCategory($category) {
		$this->category = $category;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * @param int $ownerId
	 * @return Picture
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getOwnerType() {
		return $this->ownerType;
	}

	/**
	 * @param int $ownerType
	 * @return Picture
	 */
	public function setOwnerType($ownerType) {
		$this->ownerType = $ownerType;
		return $this;
	}
}