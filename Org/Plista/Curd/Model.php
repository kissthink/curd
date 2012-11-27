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
	 * @return self
	 */
	public static function find() {

	}

	/**
	 * @return self[]
	 */
	public static function findAll() {

	}

	/**
	 * @return Listener
	 */
	public static function listener() {
		$classname = get_called_class();
		return Listener::getInstance($classname);
	}
}
