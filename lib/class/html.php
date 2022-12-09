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

lib/core/class/html.php

HTML class.

*******************************************************************************/

namespace lib\core\class;

enum HTMLType
{
	case OUTPUT; // Compiled as string.
	case PARSED; // Created from single-use template(s).
	case CACHED; // Created from stored template(s).
}

class HTML implements Displayable
{
	// List of files currently loaded and how many objects are using them.
	// This allows for files to be used across multiple objects without having
	// to load them each time.
	private static array $cache = [];

	private
		$file,
		$text;

	// Constructor.
	function __construct(string $filename)
	{
		if(!array_key_exists($filename, $cache))
			$cache[$file] =
			[
				"contents"	=> @file_get_contents($filename, TRUE);
				"count"		=> 1
			];
		else
			$cache[$file]["count"]++;
	}

	// Destructor.
	// Decrease reference count for files used by object instance.
	// Delete file from cache if no references remain.
	function __destruct()
	{
		$count =& $cache[$file]["count"];
		$count--;

		if(!$count)
			unset $cache[$file];
	}

	function display()
	{
		
	}
}
