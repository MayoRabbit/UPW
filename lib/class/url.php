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

lib/class/url.php

Handles URLs. Can be used to generate new URLs or handle existing ones.

*******************************************************************************/

namespace core;

enum URLProtocol : string
{
	case HTTP	= "http";
	case FTP	= "ftp";
}

enum URLQueryItem
{
	case USER;
	case PASS;
	case PATH;
	case QUERY;
	case FRAGMENT;
}

enum URLQueryItemRequired : int
{
	case NOT_REQUIRED	= 0x0;
	case REQUIRED		= 0x1;
}

enum URLQueryItemType : int
{
	case INT		= 0x2;
	case STRING		= 0x4;
}

class URL 
{
	// Required portions of URL.
	private URLProtocol $scheme = URLProtocol::HTTP;
	private string $host;

	// Optional portions of URL.
	private ?int $port = NULL;

	private ?string
		$user		= NULL,
		$pass		= NULL,
		$path		= NULL,
		$fragment	= NULL;	// Part after the #.

	private ?array
		$query = NULL;

	// Constructor.
	// Pass an existing URL, or pass nothing to create a new one.
	function __construct(?string $url = NULL)
	{
		if($url)
		{
			$components = parse_url($url);

			foreach($components as $component => $value)
				$this->$component = $value;
		}
		else
		{
		}
	}

	/**
	 * Gets a query item.
	 */
	
	public function get_query_item(URLQueryItem $key)
	{
		switch($key)
		{
			case URLQueryItem::USER: return $this->user;
			case URLQueryItem::PASS: return $this->pass;
		}
		
		return;
	}

	/*
	// Validates a query item in the URL. Can check for both that a required
	// item is given, and that it is of a specific type.
	// Currently supports only checking for integer or string types.

	public function item_is_string(string $key, bool $required = false)
	{
		return is_string($_GET[$key]);
	}

	public function item_is_int(string $key, bool $required = false)
	{
		return is_int($_GET[$key]);
	}
	*/

	public function validate_query_item(string $key, URLQueryItemType $type) : bool
	{
		// Validation.
		if
		(
			// Check for required item.
			(($flags & URL::QUERY_ITEM_FLAGS["REQUIRED"]) && !array_key_exists($key, $_GET))

			// Check for integer type.
			|| (($flags & URL::QUERY_ITEM_FLAGS["TYPE_INT"]) && !is_numeric($_GET[$key]))

			// Check for string type.
			|| (($flags & URL::QUERY_ITEM_FLAGS["TYPE_STRING"]) && !is_string($_GET[$key]))
		)
			return false;

		// Item is valid, apparently.
		return true;
	}

	// Sets query item value.
	// Creates item if it doesn't exist.
	public function setQueryItem(string $item, string $value) : void
	{
		$this->query[$item] = $value;
	}

	// Compile URL.
	public function compile() : string
	{
		if(!empty($this->query))
			$query = http_build_query($this->query, "");

		$url = "{$this->scheme}://{$this->host}";
		if($this->port)		$url .= ":{$this->port}";
		if($this->path)		$url .= "/{$this->path}";
		if($this->query)	$url .= "?{$query}";
		if($this->fragment)	$url .= "#{$this->fragment}";

		return rawurlencode($url);
	}
}
