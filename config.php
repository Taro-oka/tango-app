<?php
define('CURRENT_URI', $_SERVER['REQUEST_URI']);
define('BASE_CONTEXT_PATH', '/tango/');
define('BASE_IMAGE_PATH', BASE_CONTEXT_PATH . 'images/');
define('BASE_JS_PATH', BASE_CONTEXT_PATH . 'js/');
define('BASE_CSS_PATH', BASE_CONTEXT_PATH . 'css/');
define('SOUECE_BASE', __DIR__ . '/php/');
define('GO_HOME', 'home');
define('GO_REFERER', 'referer');
// 学習用：デバッグメッセージを使えるようにするか、しないかを決めるフラグをここに定義しておく。これで、開発環境だけ、デバッグメッセージを有効にする、などの対応が可能となる！
define('DEBUG', true);
