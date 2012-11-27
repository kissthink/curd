<?php
namespace Org\Plista\Curd;

/**
 *
 */
class Listener {

	/**
	 * @var Listener[]
	 */
	protected static $instances = array();

	/**
	 * @var \Closure[]
	 */
	private $listeners = array();

	/**
	 * @param string $eventname
	 * @param callable $callback
	 */
	public function add($eventname, \Closure $callback) {

		if (!isset($this->listeners[$eventname])) {
			$this->listeners[$eventname] = array();
		}
		$this->listeners[$eventname][] = $callback;
	}

	/**
	 * @param string $eventname
	 */
	public function fire($eventname) {
		if (!isset($this->listeners[$eventname])) {
			return;
		}

		foreach ($this->listeners[$eventname] as $callback)  {
			$callback($this, $eventname);
		}
	}

	/**
	 * @param string $eventname
	 * @param callable $callback
	 */
	public function remove($eventname, \Closure $callback) {
		if (!isset($this->listeners[$eventname])) {
			return;
		}

		foreach ($this->listeners as $idx => $existingCallback)  {
			if ($callback === $existingCallback) {
				unset($this->listeners[$idx]);
			}
		}
	}

	/**
	 * @param string $key
	 * @return Listener
	 */
	public static function getInstance($key) {
		if (!isset(self::$instances[$key])) {
			self::$instances[$key] = new self();
		}
		return self::$instances[$key];
	}
}

