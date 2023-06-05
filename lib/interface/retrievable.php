<?php

/*******************************************************************************

lib/interface/retrievable

Interface for objects that get their data from the database. This can be for
objects that require just a single row, or those that use multiple rows.

*******************************************************************************/

namespace core;

interface Retrievable
{
	public static function exists(string $table, string $column, int $value) : bool;
	public function get_data(string $fields, string $table, string $column, string $value) : array;
}

