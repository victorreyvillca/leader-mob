<?php

namespace Model\Repositories;

use Doctrine\ORM\EntityRepository;

/**
 * NewsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NewsRepository extends EntityRepository {

    /**
     *
     * Alias of the table
     * @var string
     */
    private $_alias = 'news';

    /**
     *
     * Returns models according the filters
     * @param array $filters
     * @param int $limit
     * @param int $offset
     * @param int $sortColumn
     * @param string $sortDirection
     * @return Array Objects
     */
    public function findByCriteria($filters = array(), $limit = NULL, $offset = NULL, $sortColumn = NULL, $sortDirection = NULL) {
    	$query = $this->_em->createQueryBuilder();

    	$condName = "";
    	foreach ($filters as $filter) {
    		$condName = "$this->_alias.title LIKE :title AND ";
    		$query->setParameter($filter['field'], $filter['filter']);
    	}

    	$query->select($this->_alias)
    	->from($this->_entityName, $this->_alias)
    	->where("$condName $this->_alias.state = TRUE")
    	->setFirstResult($offset)
    	->setMaxResults($limit);

    	$sort = '';
    	switch ($sortColumn) {
    		case 1:
    			$sort = 'title';
    			break;

    		case 2:
    			$sort = 'summary';
    			break;

    		case 3:
    			$sort = 'categoryId';
    			break;

    		case 4:
    			$sort = 'imagename';
    			break;

    		case 5:
    			$sort = 'newsdate';
    			break;

    		case 6:
    			$sort = 'fount';
    			break;

    		case 7:
    			$sort = 'created';
    			break;

    		case 8:
    			$sort = 'changed';
    			break;

    		default: $sort = 'id'; $sortDirection = 'desc';
    	}

    	$query->orderBy("$this->_alias.$sort", $sortDirection);

    	return $query->getQuery()->getResult();
    }

    /**
     * Finds total count of models according the filters
     * @param array $filters
     * @return int
     */
    public function getTotalCount($filters = array()) {
    	$query = $this->_em->createQueryBuilder();

    	$condName = "";
    	foreach ($filters as $filter) {
    		$condName = "$this->_alias.title LIKE :title AND ";
    		$query->setParameter($filter['field'], $filter['filter']);
    	}

    	$query->select("count($this->_alias.id)")
    	->from($this->_entityName, $this->_alias)
    	->where("$condName $this->_alias.state = TRUE");

    	return (int)$query->getQuery()->getSingleScalarResult();
    }
}