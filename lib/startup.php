<?php

/*******************************************************************************

<one line to give the program's name and a brief idea of what it does.>
Copyright (C) 2022 <name of author>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.

********************************************************************************

lib/startup.php

Startup. Initializtion. Common stuff.

*******************************************************************************/

namespace lib;

use lib\interface\Displayable;
use lib\class\URL;
use lib\class\User;

// PHP include path. Anything needed should be one or two parent directories up
// from the source script.
set_include_path
(
	implode(PATH_SEPARATOR, ["./", "../"])
);

// PHP class autoload thing.
spl_autoload_register
(
	function($name)
	{
		$name = strtolower($name);

		// Attempts to include the file using PHP's set include path.
		// Should be no problem as long as the file is found somewhere.
		require_once("{$name}.php");
	}
);

// URL.
define("BROWSER_URL", new URL($_SERVER["REQUEST_URI"]));

// MySQL database connection.
// Replace these values with your own.
$mysqli = new \mysqli("<host>", "<name>", "<password>", "<database>");
if($mysqli->connect_error)
    die("Connect Error ({$mysqli->connect_errno}){$mysqli->connect_error}!");

// If user has valid cookies that match an account in the database, creates a
// new user object. Otherwise, sets to NULL, which indicates a guest user.
$user = user::login();

$displayables = array();

// Closes program.
function SHUT_IT_DOWN() : void
{
	echo "HERE";
	print_r($displayables);
	foreach($displayables as $displayable)
		$displayable->display();

	clearstatcache();
}
