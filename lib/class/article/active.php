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

lib/class/article/active.php

Active blog article. These allow comments to be posted. Note that this does not
mean the user may post one, as the article may be locked, or the user may be
banned from posting (either by IP address or account, if logged in).

*******************************************************************************/

namespace BHU;

readonly class ActiveArticle extends Article
{
	private int $num_comments;

	function __construct()
	{
		parent::__construct();
	}
}
