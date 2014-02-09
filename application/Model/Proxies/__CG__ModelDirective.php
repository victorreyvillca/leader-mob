<?php

namespace Model\Proxies\__CG__\Model;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Directive extends \Model\Directive implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'dateChristening', 'address', 'note', 'isActivo', 'positions', 'ranks', 'departments', 'clubs', 'churchs', 'districts', 'regions', 'missions', 'positionId', 'position', 'rankId', 'rank', 'departmentId', 'department', 'clubId', 'club', 'districtId', 'district', 'regionId', 'region', 'id', 'created', 'changed', 'createdBy', 'changedBy', 'state');
        }

        return array('__isInitialized__', 'dateChristening', 'address', 'note', 'isActivo', 'positions', 'ranks', 'departments', 'clubs', 'churchs', 'districts', 'regions', 'missions', 'positionId', 'position', 'rankId', 'rank', 'departmentId', 'department', 'clubId', 'club', 'districtId', 'district', 'regionId', 'region', 'id', 'created', 'changed', 'createdBy', 'changedBy', 'state');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Directive $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getDateChristening()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateChristening', array());

        return parent::getDateChristening();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateChristening($dateChristening)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateChristening', array($dateChristening));

        return parent::setDateChristening($dateChristening);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress', array());

        return parent::getAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress($address)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress', array($address));

        return parent::setAddress($address);
    }

    /**
     * {@inheritDoc}
     */
    public function getNote()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNote', array());

        return parent::getNote();
    }

    /**
     * {@inheritDoc}
     */
    public function setNote($note)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNote', array($note));

        return parent::setNote($note);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsActivo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsActivo', array());

        return parent::getIsActivo();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsActivo($isActivo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsActivo', array($isActivo));

        return parent::setIsActivo($isActivo);
    }

    /**
     * {@inheritDoc}
     */
    public function getPositions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPositions', array());

        return parent::getPositions();
    }

    /**
     * {@inheritDoc}
     */
    public function setPositions($positions)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPositions', array($positions));

        return parent::setPositions($positions);
    }

    /**
     * {@inheritDoc}
     */
    public function getRanks()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRanks', array());

        return parent::getRanks();
    }

    /**
     * {@inheritDoc}
     */
    public function setRanks($ranks)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRanks', array($ranks));

        return parent::setRanks($ranks);
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartments()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDepartments', array());

        return parent::getDepartments();
    }

    /**
     * {@inheritDoc}
     */
    public function setDepartments($departments)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDepartments', array($departments));

        return parent::setDepartments($departments);
    }

    /**
     * {@inheritDoc}
     */
    public function getClubs()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClubs', array());

        return parent::getClubs();
    }

    /**
     * {@inheritDoc}
     */
    public function setClubs($clubs)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClubs', array($clubs));

        return parent::setClubs($clubs);
    }

    /**
     * {@inheritDoc}
     */
    public function getChurchs()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChurchs', array());

        return parent::getChurchs();
    }

    /**
     * {@inheritDoc}
     */
    public function setChurchs($churchs)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChurchs', array($churchs));

        return parent::setChurchs($churchs);
    }

    /**
     * {@inheritDoc}
     */
    public function getDistricts()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDistricts', array());

        return parent::getDistricts();
    }

    /**
     * {@inheritDoc}
     */
    public function setDistricts($districts)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDistricts', array($districts));

        return parent::setDistricts($districts);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegions', array());

        return parent::getRegions();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegions($regions)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegions', array($regions));

        return parent::setRegions($regions);
    }

    /**
     * {@inheritDoc}
     */
    public function getMissions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMissions', array());

        return parent::getMissions();
    }

    /**
     * {@inheritDoc}
     */
    public function setMissions($missions)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMissions', array($missions));

        return parent::setMissions($missions);
    }

    /**
     * {@inheritDoc}
     */
    public function getPosition()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPosition', array());

        return parent::getPosition();
    }

    /**
     * {@inheritDoc}
     */
    public function setPosition($position)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPosition', array($position));

        return parent::setPosition($position);
    }

    /**
     * {@inheritDoc}
     */
    public function getRank()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRank', array());

        return parent::getRank();
    }

    /**
     * {@inheritDoc}
     */
    public function setRank($rank)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRank', array($rank));

        return parent::setRank($rank);
    }

    /**
     * {@inheritDoc}
     */
    public function getDepartment()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDepartment', array());

        return parent::getDepartment();
    }

    /**
     * {@inheritDoc}
     */
    public function setDepartment($department)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDepartment', array($department));

        return parent::setDepartment($department);
    }

    /**
     * {@inheritDoc}
     */
    public function getClub()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClub', array());

        return parent::getClub();
    }

    /**
     * {@inheritDoc}
     */
    public function setClub($club)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClub', array($club));

        return parent::setClub($club);
    }

    /**
     * {@inheritDoc}
     */
    public function getDistrict()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDistrict', array());

        return parent::getDistrict();
    }

    /**
     * {@inheritDoc}
     */
    public function setDistrict($district)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDistrict', array($district));

        return parent::setDistrict($district);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegion', array());

        return parent::getRegion();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegion($region)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegion', array($region));

        return parent::setRegion($region);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdentityCard()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdentityCard', array());

        return parent::getIdentityCard();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdentityCard($identityCard)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdentityCard', array($identityCard));

        return parent::setIdentityCard($identityCard);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirstName', array());

        return parent::getFirstName();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstName($firstName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstName', array($firstName));

        return parent::setFirstName($firstName);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastName', array());

        return parent::getLastName();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastName($lastName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastName', array($lastName));

        return parent::setLastName($lastName);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateOfBirth()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateOfBirth', array());

        return parent::getDateOfBirth();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateOfBirth($dateOfBirth)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateOfBirth', array($dateOfBirth));

        return parent::setDateOfBirth($dateOfBirth);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone', array());

        return parent::getPhone();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone($phone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone', array($phone));

        return parent::setPhone($phone);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhonework()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhonework', array());

        return parent::getPhonework();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhonework($phonework)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhonework', array($phonework));

        return parent::setPhonework($phonework);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhonemobil()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhonemobil', array());

        return parent::getPhonemobil();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhonemobil($phonemobil)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhonemobil', array($phonemobil));

        return parent::setPhonemobil($phonemobil);
    }

    /**
     * {@inheritDoc}
     */
    public function getSex()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSex', array());

        return parent::getSex();
    }

    /**
     * {@inheritDoc}
     */
    public function setSex($sex)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSex', array($sex));

        return parent::setSex($sex);
    }

    /**
     * {@inheritDoc}
     */
    public function getProfilePictureId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProfilePictureId', array());

        return parent::getProfilePictureId();
    }

    /**
     * {@inheritDoc}
     */
    public function setProfilePictureId($profilePictureId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProfilePictureId', array($profilePictureId));

        return parent::setProfilePictureId($profilePictureId);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreated', array());

        return parent::getCreated();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreated($created)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreated', array($created));

        return parent::setCreated($created);
    }

    /**
     * {@inheritDoc}
     */
    public function getChanged()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChanged', array());

        return parent::getChanged();
    }

    /**
     * {@inheritDoc}
     */
    public function setChanged($changed)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChanged', array($changed));

        return parent::setChanged($changed);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedBy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedBy', array());

        return parent::getCreatedBy();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedBy($createdBy)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedBy', array($createdBy));

        return parent::setCreatedBy($createdBy);
    }

    /**
     * {@inheritDoc}
     */
    public function getChangedBy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChangedBy', array());

        return parent::getChangedBy();
    }

    /**
     * {@inheritDoc}
     */
    public function setChangedBy($changedBy)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChangedBy', array($changedBy));

        return parent::setChangedBy($changedBy);
    }

    /**
     * {@inheritDoc}
     */
    public function getState()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getState', array());

        return parent::getState();
    }

    /**
     * {@inheritDoc}
     */
    public function setState($state)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setState', array($state));

        return parent::setState($state);
    }

}
