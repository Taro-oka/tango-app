<?php

namespace model;

use lib\Msg;

class WordModel extends Abstract_model
{
    public int $id;
    public string $title;
    public string $phonetics;
    public int $remembered;
    public string $en_definition;
    public string $ja_definition;
    public string $user_id;
    public int $del_flg;

    protected static $SESSION_NAME = '_word';

    public static function sortByTitleMatch($array, $searchTerm)
    {
        usort($array, function ($a, $b) use ($searchTerm) {
            $similarityA = 0;
            $similarityB = 0;

            // similar_text関数を使用して、$a->titleと$searchTerm、そして$b->titleと$searchTerm間の類似度をパーセントで計算します。この類似度はそれぞれ$similarityAと$similarityBに格納されます。
            // $a->title と $searchTerm 間の類似度を計算します。
            similar_text($a->title, $searchTerm, $similarityA);

            // $b->title と $searchTerm 間の類似度を計算します。
            similar_text($b->title, $searchTerm, $similarityB);

            // 類似度が高い順にソートするため、$similarityB - $similarityA を返します。
            // 比較関数は、$similarityB <=> $similarityAを使用して比較結果を返します。これはスペースシップ演算子と呼ばれ、PHP 7.0以降で使用できます。この演算子は、左辺が右辺より小さい場合は-1、等しい場合は0、大きい場合は1を返します。この例では、類似度が高い要素が前に来るように、類似度の降順でソートします。
            return $similarityB <=> $similarityA;
        });

        return $array;
    }

    // public static function validateId($val)
    // {
    //     $res = true;
    //     if (empty($val)) {
    //         Msg::push(Msg::ERROR, 'ユーザーIDを入力してください。');
    //         $res = false;
    //     } else {
    //         if (strlen($val) > 10) {
    //             Msg::push(Msg::ERROR, 'ユーザーIDは10桁以下で入力してください。');
    //             $res = false;
    //         }

    //         if (!is_alnum($val)) {
    //             Msg::push(Msg::ERROR, 'ユーザーIDは半角英数字で入力してください。');
    //             $res = false;
    //         }
    //     }
    //     return $res;
    // }

    // public function isValidId()
    // {
    //     return static::validateId($this->id);
    // }

    // public static function validatePwd($val)
    // {
    //     $res = true;

    //     if (empty($val)) {

    //         Msg::push(Msg::ERROR, 'パスワードを入力してください。');
    //         $res = false;
    //     } else {

    //         if (strlen($val) < 4) {

    //             Msg::push(Msg::ERROR, 'パスワードは４桁以上で入力してください。');
    //             $res = false;
    //         }

    //         if (!is_alnum($val)) {

    //             Msg::push(Msg::ERROR, 'パスワードは半角英数字で入力してください。');
    //             $res = false;
    //         }
    //     }

    //     return $res;
    // }

    // public function isValidPwd()
    // {
    //     return static::validatePwd($this->pwd);
    // }

    // public static function validateNickname($val)
    // {

    //     $res = true;

    //     if (empty($val)) {

    //         Msg::push(Msg::ERROR, 'ニックネームを入力してください。');
    //         $res = false;
    //     } else {

    //         // 学習用：mb_strlenは、全角、半角のいずれでも、１文字を１文字とカウントする！
    //         if (mb_strlen($val) > 10) {

    //             Msg::push(Msg::ERROR, 'ニックネームは１０桁以下で入力してください。');
    //             $res = false;
    //         }
    //     }

    //     return $res;
    // }

    // public function isValidNickname()
    // {
    //     return static::validateNickname($this->nickname);
    // }
}
