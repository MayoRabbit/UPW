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

lib/class/user.php

This is you. The user viewing the site. Your hopes, your dreams, everything
about you.

The base class is abstract. You will be assiged one of the derived classes from
the /lib/core/class/user directory. And you will like it.

*******************************************************************************/

namespace core;

// One of the various user types. Ordered from least to most powerful. The value
// is determined by a MySQL function in the database.
enum UserType
{
	case Banned;
	case Guest;
	case Disabled;
	case Member;
	case Subscriber;
	case Moderator;
	case Administrator;
	case Owner;	// This is me.
}

/**
 * User class.
 */

abstract class User //implemets 
{
	private int $id = 0;
	
	protected Header $header;

	/**
	 * Attempts to log user into the website. Returns the specific user class
	 * based on the result.
	 */

	static public function login() : User
	{
		global $mysqli;

		// User has either no cookies or is missing required cookie items.
		// In which case, delete any invalid cookies and the user is guest.
		if
		(
			!array_key_exists("bhu", $_COOKIE) ||
			!array_key_exists("id", $_COOKIE["bhu"]) ||
			!array_key_exists("pass", $_COOKIE["bhu"])
		)
		{
			setcookie("bhu", "", time() - 1);
			return new user\Guest;
		}

		// Check that cookies match an account in the database. If they don't,
		// delete invalid cookies and user is guest.
		$id		=&	$_COOKIE["bhu"]["id"];
		$pass	=&	$_COOKIE["bhu"]["pass"];
		$result =	$mysqli->query("SELECT get_user_type($id, $pass)");

		if(!$result)
		{
			setcookie($_COOKIE["bhu"], "", time() - 1);
			return new user\Guest;
		}

		// User is assumed logged in, get their info from the database.
		$data = $result->fetch_assoc();
		$type = UserType::from($data);
	}

	// Constructor.
	function __construct()
	{
	}

	public function get_id() : int
	{
		return $this->id;
	}
}
