<?php

namespace controller\home;

use db\UserQuery;
use db\WordQuery;
use model\WordModel;

function get()
{
    \view\home\index();
}

function post()
{

    $search_text = get_param('search_text', null, true);

    if (!$search_text) {
        $words = [];
        \view\home\search_result($search_text, $words);
        return;
    }

    $words = WordQuery::fetchByTitle($search_text, true);
    $words = WordModel::sortByTitleMatch($words, $search_text);

    \view\home\search_result($search_text, $words);
}
