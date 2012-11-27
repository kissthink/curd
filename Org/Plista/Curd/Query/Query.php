<?php

namespace Org\Plista\Curd\Query;

class Query {

	/**
	 * @param string $classname
	 */
	public function __construct($classname) {

	}

	/**
	 * @param Query $q
	 * @return Query
	 */
	public function orx(Query $q) {}

	/**
	 * @param string $field attribute name
	 * @param string $operator  > < = >= <= like
	 * @param string|null|int|float $value
	 * @return Query
	 */
	public function where($field, $operator, $value) {}

	/**
	 * @param string $field
	 * @param array $values
	 * @return Query
	 */
	public function in($field, array $values) {}


	/**
	 * @param string $field
	 * @param string|int|float $min
	 * @param string|int|float $max
	 * @return Query
	 */
	public function between($field, $min, $max) {}


	/**
	 * @param $int
	 * @return Query
	 */
	public function limit($int) {}

	/**
	 * @param $int
	 * @return Query
	 */
	public function offset($int) {}

	/**
	 * @return int
	 */
	public function getOffset() {}

	/**
	 * @return array
	 */
	public function getBetween() {}

	/**
	 * @return array
	 */
	public function getWhere() {}

	/**
	 * @return array
	 */
	public function getIn() {}

	/**
	 * @return array
	 */
	public function getOrx() {}

	/**
	 * @return string
	 */
	public function getClassname() {

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
