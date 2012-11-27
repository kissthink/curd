<?php
namespace Org\Plista\Curd;

/**
 *
 */
class ModelOption {

	/**
	 * @param string $name
	 * @return string
	 */
	public function get($name) {
		return '';
	}

	/**
	 * @param string $name
	 */
	public function delete($name) {
	}

	/**
	 * @param string $name
	 * @param string $value TODO @ORM\Column
	 */
	public function set($name, $value) {
	}

	public static function factory() {
		return new self();
	}
}
