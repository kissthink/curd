<?php
namespace Org\Plista\Curd\Query;

/**
 *
 */
class Query {

	/**
	 * @var string
	 */
	private $classname;

	/**
	 * @var array
	 */
	private $_orx;

	/**
	 * @var array
	 */
	private $_in;

	/**
	 * @var array
	 */
	private $_notin;

	/**
	 * @var array
	 */
	private $_where;

	/**
	 * @var array
	 */
	private $_between;

	/**
	 * @var array
	 */
	private $_notbetween;

	/**
	 * @var int
	 */
	private $_limit = 0;

	/**
	 * @var int
	 */
	private $_offset = 0;

	/**
	 * @param string $classname
	 * @throws InvalidArgumentException
	 */
	public function __construct($classname) {
		if (!is_string($classname)) {
			throw new InvalidArgumentException('invalid classname: ' . $classname);
		}
		$this->classname = $classname;
	}

	/**
	 * or condition, accepts other Query objects
	 * @param Query $q
	 * @return Query
	 */
	public function orx(Query $q) {
		$this->_orx[] = $q;
		return $this;
	}

	/**
	 * @param string $field attribute name
	 * @param string $operator  > < = >= <= like
	 * @param string|null|int|float $value
	 * @throws InvalidArgumentException
	 * @return Query
	 */
	public function where($field, $operator, $value) {
		if (!is_string($field)) {
			throw new InvalidArgumentException('invalid field: ' . $field);
		}
		$this->_where[] = array($field, $operator, $value);
		return $this;
	}

	/**
	 * @param string $field
	 * @param array $values
	 * @throws InvalidArgumentException
	 * @return Query
	 */
	public function in($field, array $values) {
		if (!is_string($field)) {
			throw new InvalidArgumentException('invalid field: ' . $field);
		}
		// TODO: especially in sql its not allowed to have a null/empty string within values, where to do validation
		$this->_in[] = array($field, $values);
		return $this;
	}


	/**
	 * @param string $field
	 * @param string|int|float $min
	 * @param string|int|float $max
	 * @throws InvalidArgumentException
	 * @return Query
	 */
	public function between($field, $min, $max) {
		if (!is_string($field)) {
			throw new InvalidArgumentException('invalid field: ' . $field);
		}
		if (is_scalar($min)) {
			throw new InvalidArgumentException('invalid min: ' . $min);
		}
		if (is_scalar($min)) {
			throw new InvalidArgumentException('invalid max: ' . $max);
		}
		$this->_between[] = array($field, $min, $max);
		return $this;
	}

	/**
	 * @param string $field
	 * @param array $values
	 * @throws InvalidArgumentException
	 * @return Query
	 */
	public function notin($field, array $values) {
		if (!is_string($field)) {
			throw new InvalidArgumentException('invalid field: ' . $field);
		}
		// TODO: especially in sql its not allowed to have a null/empty string within values, where to do validation
		$this->_notin[] = array($field, $values);
		return $this;
	}


	/**
	 * @param string $field
	 * @param string|int|float $min
	 * @param string|int|float $max
	 * @throws InvalidArgumentException
	 * @return Query
	 */
	public function notbetween($field, $min, $max) {
		if (!is_string($field)) {
			throw new InvalidArgumentException('invalid field: ' . $field);
		}
		if (is_scalar($min)) {
			throw new InvalidArgumentException('invalid min: ' . $min);
		}
		if (is_scalar($min)) {
			throw new InvalidArgumentException('invalid max: ' . $max);
		}
		$this->_notbetween[] = array($field, $min, $max);
		return $this;
	}


	/**
	 * @param int $limit
	 * @throws InvalidArgumentException
	 * @return Query
	 */
	public function limit($limit) {
		if ($limit != intval($limit)) {
			throw new InvalidArgumentException('invalid limit: ' . $limit);
		}
		$this->_limit = $limit;
		return $this;
	}

	/**
	 * @param int $offset
	 * @throws InvalidArgumentException
	 * @return Query
	 */
	public function offset($offset) {
		if ($offset != intval($offset)) {
			throw new InvalidArgumentException('invalid offset: ' . $offset);
		}
		$this->_offset = $offset;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getOffset() {
		return $this->_offset;
	}

	/**
	 * @return array
	 */
	public function getBetween() {
		return $this->_between;
	}

	/**
	 * @return array
	 */
	public function getNotBetween() {
		return $this->_notbetween;
	}

	/**
	 * @return array
	 */
	public function getWhere() {
		return $this->_where;
	}

	/**
	 * @return array
	 */
	public function getIn() {
		return $this->_in;
	}

	/**
	 * @return array
	 */
	public function getNotIn() {
		return $this->_notin;
	}

	/**
	 * @return array
	 */
	public function getOrx() {
		return $this->_orx;
	}

	/**
	 * @return string
	 */
	public function getClassname() {
		return $this->classname;
	}

	/**
	 * @return \Org\Plista\Curd\Model
	 */
	public function find() {
		$p = new \Org\Plista\Curd\Storage\Pipeline($this);
		return $p->find();
	}

	/**
	 * @return \Org\Plista\Curd\Model[]
	 */
	public function findAll() {
		$p = new \Org\Plista\Curd\Storage\Pipeline($this);
		return $p->findAll();
	}
}
