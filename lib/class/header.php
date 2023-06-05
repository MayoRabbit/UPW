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

lib/class/header.php

Information related to the user viewing the site that is displayed in the
HTML header portion of the page. The information displayed is 

*******************************************************************************/

namespace core;

class Header implements Displayable
{
	// Can be NULL if the user is guest or has no Avatar. Default image is used
	// in this case.
	private ?Avatar $avatar;

	public function __construct()
	{
	}

	public function display() : void {}
}
