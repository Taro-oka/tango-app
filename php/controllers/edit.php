<?php

namespace controller\edit;

use db\UserQuery;
use db\WordQuery;
use model\WordModel;

function get()
{
    $word_id = get_param("id", null, false);
    $srch_txt = get_param("srch_txt", null, false);
    $is_first = get_param("is_first", null, false);
    $word = WordQuery::fetchById($word_id);

    \view\edit\index($word, $is_first, $srch_txt);
}
