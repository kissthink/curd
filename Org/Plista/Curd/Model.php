<?php
namespace Org\Plista\Curd;

/**
 *
 */
abstract class Model {
	const ON_POST_LOAD = 1;

	const ON_PRE_SAVE = 2;
	const ON_POST_SAVE = 3;

	const ON_PRE_REMOVE = 4;
	const ON_POST_REMOVE = 5;

	const ON_PRE_UPDATE = 6;
	const ON_POST_UPDATE = 7;

	/**
	 * @throws Exception\ModelException
	 */
	public function save() {
		self::listener()->fire(self::ON_PRE_SAVE);

		if (false) {
			throw new Exception\ModelException();
		}

		self::listener()->fire(self::ON_POST_SAVE);
	}

	/**
	 * @throws Exception\ModelException
	 */
	public function delete() {
		self::listener()->fire(self::ON_PRE_REMOVE);

		if (false) {
			throw new Exception\ModelException();
		}

		self::listener()->fire(self::ON_POST_REMOVE);
	}

	/**
	 * @param $id
	 * @throws Exception\ModelException
	 * @return self
	 */
	public static function find($id) {

		$pks = self::getPrimaryKey();
		if( !is_array( $id ) ) {
			if( count($pks) > 1 ) {
				throw new \Org\Plista\Curd\Exception\ModelException("This model has more than just one primary key.");
			} else {
				$id = array( $pks[0] => $id );
			}
		}

		if( $pks != array_keys($id) ) {
			throw new \Org\Plista\Curd\Exception\ModelException("Please ensure that you passed all primary keys for this model.");
		}

		$query = self::query();
		foreach( $id as $key => $value ) {
			$query = $query->where($key, $value);
		}
		return $query->find();
	}

	/**
	 * @return Query\Query
	 */
	public static function query() {
		return new \Org\Plista\Curd\Query\Query(get_called_class());
	}

	/**
	 * @return Listener
	 */
	public static function listener() {
		$classname = get_called_class();
		return Listener::getInstance($classname);
	}

	/**
	 * @return array
	 */
	public static function getPrimaryKey() {
		return array("id");
	}
}
