<?php

namespace controller\edit;

use db\UserQuery;
use db\WordQuery;
use lib\Msg;
use model\WordModel;

function get()
{
    $word_id = get_param("id", null, false);
    $srch_txt = get_param("srch_txt", null, false);
    $is_first = get_param("is_first", null, false);
    $word = WordQuery::fetchById($word_id);

    \view\edit\index($word, $is_first, $srch_txt);
}

function post()
{
    $word_id = get_param("id", null);
    $srch_txt = get_param("srch_txt", null);
    $is_first = get_param("is_first", null);
    $edited_ja_definition = get_param("meaning_ja", null);
    $edited_en_definition = get_param("meaning_en", null);

    // ここで、データを更新する
    $result = WordQuery::updateById($word_id, $edited_en_definition, $edited_ja_definition);

    if (!$result) {
        $word = WordQuery::fetchById($word_id);
        echo "<div class='alert-danger'>更新に失敗しました</div>";
        \view\edit\index($word, $is_first, $srch_txt);
        return;
    }

    echo "<div class='alert-info'>更新に成功しました</div>";
    $word = WordQuery::fetchById($word_id);

    \view\edit\index($word, $is_first, $srch_txt);
}
