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

lib/core/class/avatar.php

Image used as a user's profile picture. Displayed in various places.

*******************************************************************************/

namespace lib\core\class;

class Avatar
{
	enum SourceType
	{
		case URL,
		case Upload
	};

	// These are NULL if the user has no avatar image attached to their
	// account. In which case, a default one is used.
	private ?array	dimensions	= NULL;
	private ?int	size		= NULL;
	private ?bool	is_animated	= NULL;

	function __construct(SourceType $type, URL $url)
	{
		if($type == SourceType::URL)
		{
			
		}

		elseif($type == SourceType::Upload)
		{

		}
		else

		// Validate image type. Must be either one of:
		// JPG / PNG / GIF
		// If image is none of these, it is invalid.
		$info = new finfo();
		$this->dimensions =
		$this->size = ;
		$this->is_animated =
	}

	function __destruct()
	{
	}
}
