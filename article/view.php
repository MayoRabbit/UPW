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

article/view.php

Displays a blog article and any related items, namely the list of comments and
a form to comment, if applicable, acceptable, and ascertainable.

*******************************************************************************/

namespace article;

require_once("../lib/startup.php");

use \lib\class\article;

// If viewing the front page, get the id of the most recently posted article.
if($_GET["id"] == -1)
	$_GET["id"] = article::get_latest_id();

//Check that article exists in the databse. If it doesn't, that's bad.
if(!article::exists("articles", "id", $_GET["id"]))
{
	$error = new \lib\class\Error(\lib\class\ErrorType::INV_DATA, "article");
	return;
}

// Get article.
$article = new Article($_GET["id"]);

$displayables[] = $article;

// List of comments, if article has any. Does not apply to archived articles, as
// comments for those are purged upon archiving.
if($article->has_comments())
{
	$comments = new itemlist();
}

// Create form to add a comment if user is allowed to. User may comment if:
// - They are not banned from the website (either by IP or account).
if($article->can_comment())
{
	$comment_form = new form();
}

SHUT_IT_DOWN();