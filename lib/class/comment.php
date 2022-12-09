<?

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

lib/core/class/comment.php

Displays a comment on a blog article. This can be either part of a list of
comments or, if moderating, a single comment that's being moderated.

*******************************************************************************/

namespace core\lib\class;

class Comment
{
	private int
		$id,
		$article_id,
		$date,
		$content;

	// Null if user is commenting as a guest.
	private ?int $author_id = NULL;

	private string
		$author_name,	// From database if user is logged in, from $_POST if not.
		$contents;

	function __construct($data)
	{
		$this->id			= $data["id"];
		$this->article_id	= $data["article_id"];
	}

	function __destruct()
	{
	}

	public function display() : void
	{
	}
}
