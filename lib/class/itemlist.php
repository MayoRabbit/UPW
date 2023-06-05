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

lib/class/itemlist.php

Handles a list of items.

*******************************************************************************/

namespace core;

// Header shows the list options. Can be placed at the top and / or bottom of
// the list.
enum HeaderPlacement : int
{
	case HeaderTop		= 0x1;
	case HeaderBottom	= 0x2;
	case HeaderBoth		= 0x3;
}

// List options. These are common option for all lists. List-specific options
// are set by either extended classes or by the script for the page being
// viewed.
enum SortDirection : int
{
	case Ascending		= 0x4;
	case Descending		= 0x8;
}

enum ItemsPerPage : int
{
	case XSmall	= 10;
	case Small	= 20;
	case Med	= 30;
	case Large	= 50;
	case XLarge	= 100;
}

/**
 * Itemlist class.
 */

class ItemList
{
	/*
	// THIS IS STUPID!
	static private int
		$per_page = $mysqli->query("SELECT FROM WHERE)->fetch_assoc()[""];
	*/

	// A list may have no items to display (either none exist or the page number
	// is beyond the number available), so these can end up NULL.
	private ?int	$num_items	= NULL;
	private ?array	$items		= NULL;
	
	// Supplied by user's display settings. Common for any and all item lists
	// shown on a page.
	static private int				$per_page = ItemsPerPage::XSmall;
	static private SortDirection	$sort_dir = SortDirection::Ascending;

	// Constructor.
	function __construct(HeaderOptions $ho)
	{
		// Get list options.
		$flags = HeaderOptions::tryFrom($ho)
	}
}
