<?php
require_once __DIR__ . '/../../../bootstrap.php';

use Org\Plista\Curd\Model;
use Org\Plista\Curd\Association;
use Org\Plista\Curd\ModelOption;

/**
 *
 */
class CampaignTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 */
	public function testAutoloader() {
		$x = new Campaign();
	}

}

/**
 * @method static Campaign find
 * @method static Campaign[] findAll
 */
class Campaign extends Model {

	protected static $storage_settings = array();

	/**
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	public $id;

	/**
	 * @ORM\Column(type="varchar",length=255)
	 * @var string
	 */
	public $name;

	/**
	 * @return Domain
	 */
	public function domain() {
		return Association::factory($this, 'domain');
	}

	public function stats() {
		return CampaignStats::factory($this);
	}

	public function options() {
		return ModelOption::factory($this);
	}
}

Campaign::listener()->add(Model::ON_POST_SAVE, function (Campaign $c) {
	// some example
});
