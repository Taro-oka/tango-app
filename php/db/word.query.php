<?php

namespace db;

use db\DataSource;
// use model\UserModel;

class WordQuery
{
    public static function fetchById($id)
    {
        $db = new DataSource;
        $sql = 'select * from words where id = :id';
        $result = $db->selectOne($sql, [
            ':id' => $id
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
