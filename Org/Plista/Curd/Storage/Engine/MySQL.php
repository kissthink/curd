<?php

namespace Org\Plista\Curd\Storage\Engine;

class MySQL implements \Org\Plista\Curd\Storage\StorageInterface {

	public function setPDO(\PDO $pdo) {
		// validate: $pdo->getAttribute(\PDO::MYSQL_ATTR_FOUND_ROWS)
	}
}
