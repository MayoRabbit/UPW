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

lib/class/htmlelement.php

Handles HTML elements that can be created dynamically outside of predefined
templates. This class is abstract. Each element supported by this class can be
found in the ./HTML directory.

*******************************************************************************/

namespace lib\class;

abstract class HTMLElement
{
	private string
		$tag,
		$id,
		$class,
		$name;

	private ?array $attributes = NULL;

	abstract static public function create() : HTMLElement;

	function __construct(string $tag, string $id, string $class, string $name, ?string ...$data = NULL)
	{
		$this->tag		= $tag;
		$this->id		= $id;
		$this->class	= $class;
		$this->name		= $name;
	}

	final public function get_attribute(string $name) : string
	{
		if($this->has_attribute)
			return $this->attributes[$name];
	}

	final public function has_attribute(string $name) : bool
	{
		if(!is_null($this->attribute) && array_key_exists($name, $this->attributes)
			return true;

		return false;
	}

	final public function parse() : string
	{
		return "<{$tag} id=\"{$id}\" class=\"{$class}\" name=\"{$name}>\"";
	}
}
