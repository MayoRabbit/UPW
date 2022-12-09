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

*******************************************************************************/

namespace lib\class;

use \lib\interface\Displayable;

//	Error types.
enum ErrorType : string
{
	case ACCESS		= "You do not have permission to access this page!";
	case NO_DATA	= "No %s given!";
	case INV_DATA	= "%s not found!";
	case CUSTOM		= "%s";
}

class Error extends \Exception implements Displayable 
{
	function __construct(ErrorType $type, string $data)
	{
		parent::__construct(str_replace("%s", $data, $type->value));
		$html->set_items("message", $message);
	}

	public function display() : void
	{
		$html->display();
	}
}
