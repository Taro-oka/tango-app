<?php

namespace db;

use db\DataSource;
use model\WordModel;

// use model\UserModel;

class WordQuery
{
    public static function fetchById($id)
    {
        $db = new DataSource;
        $sql = 'select * from words where id = :id';
        $result = $db->selectOne($sql, [
            ':id' => $id
        ], DataSource::CLS, WordModel::class);

        return $result;
    }
    public static function fetchByTitle($title, $allowFuzzyMatching = false)
    {
        $db = new DataSource;
        $sql = $allowFuzzyMatching ?
            'select * from words where title like :title' :
            'select * from words where title = :title';
        $title = $allowFuzzyMatching ? "%{$title}%" : $title;
        $result = $db->select($sql, [
            ':title' => $title
        ], DataSource::CLS, WordModel::class);

        return $result;
    }

    public static function updateById($id, $en, $ja)
    {

        if (!($en * $ja)) {
            return false;
        }

        $db = new DataSource;
        $sql = '
        update words set en_definition = :en_definition, ja_definition = :ja_definition
        where id = :id
        ';
        $result = $db->execute($sql, [
            ':en_definition' => $en,
            ':ja_definition' => $ja,
            ':id' => $id,
        ]);

        return $result;
    }

    // public static function insert($user)
    // {
    //     $db = new DataSource;
    //     $sql = "INSERT INTO users (id, pwd, nickname) VALUES (:id, :pwd, :nickname)";

    //     // ここでハッシュ化を行う！！デフォルトではbcrypt。
    //     $pwd = password_hash($user->pwd, PASSWORD_DEFAULT);

    //     return $db->execute($sql, [
    //         ':id' => $user->id,
    //         ':pwd' => $pwd,
    //         ':nickname' => $user->nickname
    //     ]);
    // }
}
