<?php

namespace Org\Plista\Curd\Storage;

interface StorageInterface {

	public function __construct(\Org\Plista\Curd\Query\Query $query);

	/**
	 * @return \Org\Plista\Curd\Model
	 */
	public function find();


	/**
	 * @return \Org\Plista\Curd\Model[]
	 */
	public function findAll();

	/**
	 * @return null
	 */
	public function delete();

	/**
	 * @param \Org\Plista\Curd\Model $model
	 */
	public function save(\Org\Plista\Curd\Model $model);

}
