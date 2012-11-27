<?php
namespace Org\Plista\Curd;

/**
 *
 */
abstract class Model {
	const ON_POST_LOAD = 1;
	const ON_POST_PERSIST = 2;
	const ON_POST_REMOVE  = 3;
	const ON_POST_UPDATE = 4;
	const ON_PRE_PERSIST = 5;
	const ON_PRE_REMOVE = 6;
	const ON_PRE_UPDATE = 7;

	public function save() {
		self::listener()->fire(self::ON_PRE_PERSIST);

		self::listener()->fire(self::ON_POST_PERSIST);
	}

	public function delete() {
		self::listener()->fire(self::ON_PRE_REMOVE);
		CURD::delete($this);
		self::listener()->fire(self::ON_POST_REMOVE);
	}

	/**
	 * @return self
	 */
	public static function find() {

	}

	/**
	 * @return self[]
	 */
	public static function findAll() {

	}

	public static function listener() {
		$classname = get_called_class();
		return Listener::getInstance($classname);
	}
}



