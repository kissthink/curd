Curd
====
Create, update, read and delete for PHP. ORM, DAO, Active Record, Different Database Layers, ...

Curd is still in development and not meant for usage yet.
There are still some open issues for the version 1 release: https://github.com/plista/curd/issues?milestone=1&state=open

Storage Engine Pipeline
-----------------------
Curd has a storage engine pipeline. You can have many caching layers and a primary storage at the end.
Currently Curd supports APC, Redis and MySQL, but we are pleased to accept any pull request
if you want Curd to become the favorite ORM for MongoDB, Cassandra or else.

High Performance
----------------
Curd was built for high performance read throughput. Either on the database or on the php client side.
We use profilers for passion so we decided
 * NO magic method calls
 * PSR-0 Autoloader

Usability
---------
We focus on a good development lifecycle. We try to ensure that Curd will be compatible with https://github.com/facebook/hiphop-php
 * IDE Support
 * type safety for more consistenty

Testing
-------
We split into small, medium and large tests.
 * small: test covers single class without dependencies, everything else needs to be mocked.
 * medium: test covers the interaction between different classes, db access is allowed
 * large: integration test, db access, browser stack, etc

Concurrency
-----------
With the flexible architecture of different storage engines we need to take care for concurrency issues.
An updated cache version should not overwrite the latest version in the primary storage.
We use versioning for this.


License
-------
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License as
published by the Free Software Foundation; either version 3 of 
the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
