<?php

namespace Respect\Validation;

require_once __DIR__ .'/../../bootstrap.php';

/**
 * basic "does it run?" test t osee if autoloaders work etc
 */
class ValidatorTest extends \PHPUnit_Framework_TestCase {

	public function testString() {
		$this->assertTrue(Validator::create()->string()->validate('moo'), 'string validation works');
	}
}
