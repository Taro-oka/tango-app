<?php

namespace view\about;

function index()
{
    // 学習用：array_shiftを使うと、一番目を取り出し、且つ、引数に渡す配列から先頭を削除してくれる！！！！JavaScriptのshiftと同じである。
    $var = "aboutの変数です";
?>

    <div>Aboutだよ</div>
    <div><?php echo $var; ?></div>

<?php
}
?>