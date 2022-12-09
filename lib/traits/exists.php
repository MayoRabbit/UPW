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

lib/core/traits/exists.php

For objects that need a specific table and row in the databse to exist, checks
that it does. This is called statically, as the row needs to exist before the
object does, naturally.

*******************************************************************************/

namespace lib\traits;

trait Exists
{
	public static function exists(string $table, string $column, int $value) : bool
	{
		global $mysqli;

		$result = $mysqli->query("SELECT {$column} FROM {$table} WHERE {$column}={$value};") or die($mysqli->error);

		return $result->num_rows ? true : false;
	}
}