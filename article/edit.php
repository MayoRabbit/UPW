<?php

/*******************************************************************************

<one line to give the program's name and a brief idea of what it does.>
Copyright (C) 2022-2023 <name of author>

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

arcile/edit.php

Dispalays a form to edit a blog article. User must be either an administrator or
the user who posted the article to use this feature.

*******************************************************************************/

namespace BHU;

use lib\class\Article;
use lib\class\Form;
use lib\class\HTML;
use lib\class\Itemlist;
use lib\class\URL;

require_once("../lib/core/startup.php");

// Administrators and those deemed worthy to create articles may do so. Make
// sure user is one of them. Chastize them if they're not.
if()

// If no article id number given, assume creating a new article. Otherwise, get
// a stored draft from the database.

// Create form for editing an article.
$article_form = new Form();