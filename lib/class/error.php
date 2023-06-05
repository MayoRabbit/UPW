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

lib/class/error.php

Displays an error message as the page's content. This is used for a few cases:

- If the user is attempting to access a page for which they do not have
  permission, displays an error.
- If the page requires an ID of some kind to retrieve data from the database to
  display content with, shows an error if no ID is given or if the ID given
  results in no data being found.
- Otherwise, a custom error message may be provided.

*******************************************************************************/

namespace core;

use \core\Displayable;

//	Error types.
enum ErrorType : string
{
	case ACCESS		= "You do not have permission to access this page!";
	case NO_DATA	= "No %s given!";
	case INV_DATA	= "%s not found!";
	case CUSTOM		= "%s";
}

class Error implements Displayable 
{
	function __construct(ErrorType $type, string $data)
	{
		echo str_replace("%s", $data, $type->value);
	}

	public function display() : void
	{
		echo "NO";
	}
}
