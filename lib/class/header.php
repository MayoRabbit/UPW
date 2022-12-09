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

lib/core/class/header.php

Handles the HTML header. This is generally constructed of the following:

- A header image (or banner, if you insist).
- The user information panel

*******************************************************************************/

namespace lib\class;

use lib\class\avatar;
use lib\class\html;
use lib\interface\displayable as iDisp;

class Header impliments iDisp
{
	private HTML $html;

	$avatar = new Avatar;

	public function display()
	{
		
	}
}
