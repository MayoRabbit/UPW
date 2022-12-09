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

arcile/create.php

Dispalays a form to create a blog article. Drafts can be saved to post later.

*******************************************************************************/

namespace article;

//use lib\core\class\
//use lib\core\class\Article;
use lib\class\Form;
use lib\class\HTML;
use lib\class\Itemlist;
use lib\class\URL;

require_once("../lib/startup.php");

// Administrators and those deemed worthy to create articles may do so. Make
// sure user is one of them. Chastize them if they're not.
if(!$user->is_administrator())
{
	
	return;
}


// If an ID number is given for an article, check that it exists in the drafts
// table in the database. If it doesn't, display an error.
if($_GET["id"])
{
	$article = new Article();
	if(!$article->exists())
	{
		
	}
}

if($article->has_comments())
{
	$comment_list = new itemlist();
}



// Create form for posting an article. If editing a draft, use the article data
// to fill in the form.
$form = new Form();

