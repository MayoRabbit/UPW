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

lib/class/article.php

Blog article. If the article is archived, and thus does not have or allow
comments, this is the class used. Otherwise one of the classes in the /article/
subfolder is used.

*******************************************************************************/

namespace BHU;

// Interfaces.
use \core\Displayable;
use \core\Retrievable as SRR;

// Traits.
use \core\Exists;

// Article type.
enum ArticleType
{
	case Archive;	// Base article type. No comments, comments not allowed.
	case Active;	// Allows comments. User may be able to comment depending on status.
	case Admin;		// Includes admin features, also applies to non-site admins who made the article.
}

// For articles that allow comments, sets whether the user may comment.
// For archived articles, this is always "0".
enum CommentsType : int
{
	case NOTALLOWED	= 0;
	case ALLOWED	= 1;
}

/**
 * Article class. These are displayed as HTML.
 */

readonly class Article implements SRR, Displayable
{
	use Exists;

	// Class constants.
	const DB_TABLE	= "articles";
	const DB_COLUMN	= "id";
	const DB_QUERY	= "SELECT
				articles.*,
				article_categories.id as cat_id,
				article_categories.name as cat_name,
				active_articles.id as active
			FROM articles
			LEFT JOIN article_categories ON article_categories.id = articles.category_id
			LEFT JOIN active_articles ON active_articles.id = articles.id
			WHERE articles.id = ?";

	private string
		$category,
		$title;

	// If viewing the front page, this is used to get the id number of the
	// latest article posted. This should not return zero for any reason.
	public static function get_latest_id() : int
	{
		global $mysqli;

		$result	= $mysqli->query("SELECT id FROM articles ORDER BY id DESC LIMIT 0,1") or die ($mysqli->error);

		return $result->num_rows
				? $result->fetch_column()
				: 0;
	}

	// Gets the article type.
	public static function get_article_type() : ArticleType
	{
		global $user;

		// Article is admin type if either the user is an admin, or is not admin
		// but created the article.
		if($user->get_type())
		{}
		
		
		
		// Default.
		return ArticleType::Archive;
	}

	function __construct(int $id)
	{
		global $mysqli;

		$stmt = $mysqli->prepare(DB_QUERY);

		// Attempt to get article data from the database.
		$result = $mysqli->query
		(
			"SELECT
				articles.*,
				article_categories.id as cat_id,
				article_categories.name as cat_name,
				active_articles.id as active,
				(SELECT COUNT(*) from article_comments WHERE article_id = {$_GET["id"]}) as num_comments
			FROM articles
			LEFT JOIN article_categories ON article_categories.id = articles.category_id
			LEFT JOIN active_articles ON active_articles.id = articles.id
			WHERE articles.id = {$_GET["id"]}"
		) or die($mysqli->error);

		$data = $result->fetch_assoc();
		$this->id		= $data["id"];
		$this->category = $data["category"];
		$this->date		= $data["date"];	// FIX This
		$this->title	= htmlspecialchars($data["title"]);

		if(array_key_exists("content", $data))
			$this->content = htmlspecialchars($data["content"]);
	}

	//
	function __destruct()
	{

	}

	public function display() : void
	{

	}
}
