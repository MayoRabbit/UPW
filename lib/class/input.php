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

lib/class/form/input.php

Abstract class for INPUT elements for a form. Contains common attributes for
various input elements.

*******************************************************************************/

namespace lib\class\form;

class Input
{
	private string
		$id,
		$name,
		$value;

	public __construct(string $id, string $name, ?string value = NULL)
	{
		$this->id	= $id;
		$this->name	= $name;

		if($value)
			$this->value = $value;
	}

	public __destruct()
	{
	}
}
