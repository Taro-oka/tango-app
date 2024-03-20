<?php

require_once 'config.php';

// Library
require_once SOUECE_BASE . 'libs/helper.php';
require_once SOUECE_BASE . 'libs/router.php';

// Model
require_once SOUECE_BASE . 'models/abstract.model.php';
require_once SOUECE_BASE . 'models/user.model.php';
require_once SOUECE_BASE . 'models/word.model.php';

// Message
require_once SOUECE_BASE . 'libs/message.php';

// DB
require_once SOUECE_BASE . 'db/datasource.php';
require_once SOUECE_BASE . 'db/user.query.php';
require_once SOUECE_BASE . 'db/word.query.php';

// Partials
require_once SOUECE_BASE . 'partials/header.php';
require_once SOUECE_BASE . 'partials/footer.php';


// View
require_once SOUECE_BASE . 'views/home.php';
require_once SOUECE_BASE . 'views/about.php';

// 学習用：PHPのuseは、use 名前空間\XXXX と書くと、勝手にXXXXをクラスだと認識する。なので、名前空間内の関数をuseしたい場合は、use function 名前空間\関数名
// というように、関数であることを明示する必要がある！！
use function lib\route;

// 学習用：sessionスタートは、Modelを読みこんだ後にしないといけない！
session_start();

try {
    \partials\header();

    // 学習用：？以降のクエリーは取り除いてリクエストを送る必要がある！コントローラーの中身は、あくまでクエリまでの部分でファイルを取得するので。
    $url = parse_url(CURRENT_URI);
    // 学習用：root pathという意味合いでよく用いられる変数名である。
    $rpath = str_replace(BASE_CONTEXT_PATH, '', $url['path']);
    // 学習用：デフォルトではGETが返ってくる。サイトのリロードなどのリクエストも基本GET
    $method = strtolower($_SERVER['REQUEST_METHOD']);

    route($rpath, $method);

    \partials\footer();
} catch (Throwable $e) {
    die('<h1>何かがすごくおかしいようです。</h1>');
}
