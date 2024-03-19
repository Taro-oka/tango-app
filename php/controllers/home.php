<?php

namespace controller\home;

use db\UserQuery;
use db\WordQuery;

function get()
{
    // $user = UserQuery::fetchById('testさん');

    $word = WordQuery::fetchById(9820);

    // var_dump($word);

    echo $word['title'];
    echo '<br/>';
    echo $word['ja_definition'];

    \view\home\index();
}
