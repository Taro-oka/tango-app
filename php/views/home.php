<?php

namespace view\home;

function index()
{
?>
    <div class="pl-4 mt-4">
        <div class="text-2xl font-bold mb-4">↓に英単語を入力して、検索！</div>
        <form action="<?php echo CURRENT_URI; ?>" method="POST" class="flex flex-col">
            <input type="text" name="search_text" class="w-60 h-10 pl-2 border-2 border-black mb-4" autofocus>
            <input type="submit" value="検索" class="w-24 bg-slate-200 font-bold raduis-md py-2 cursor-pointer">
        </form>
    </div>
<?php
}

function search_result($text, $words)
{
    $cnt = count($words);
    $first_word = array_shift($words);
?>
    <div class="pl-4">
        <h1 class="text-2xl font-bold my-6">検索結果：</h1>
        <?php if (!$text) : ?>
            <?php echo '<div class="text-2xl font-bold text-rose-600">値が入力されていません！</div>' ?>
        <?php else : ?>
            <?php
            if ($cnt > 0) {
                result_main($first_word);
                if (!empty($words)) {
                    result_rests($words);
                }
            } else {
                echo "<h3>$text に一致する検索結果はありません。</h3>";
            }
            ?>
        <?php endif; ?>
        <a href="<?php the_url('home') ?>" class="block w-fit mt-6 cursor-pointer py-2 px-4 bg-slate-200"><button class="font-bold">戻る</button></a>
    </div>
<?php
}

function result_main($word)
{
?>
    <h2 class="text-2xl mb-2">単語: <span class="font-bold"><?php echo $word->title; ?></span></h2>
    <h2 class="text-lg mb-4">発音記号: <?php echo $word->phonetics; ?></h2>
    <h2 class="text-2xl mb-8">意味: <span class="font-bold"><?php echo $word->ja_definition; ?></span></h2>
<?php
}

function result_rests($words)
{
?>
    <h2 class="font-bold text-lg mb-2">もしかしてDid you also mean...?</h2>
    <ul>
        <?php foreach ($words as $word) {
            result_rest($word);
        } ?>
    </ul>
<?php
}

function result_rest($word)
{
?>
    <li class="hover:font-bold w-fit"><a href="<?php the_url('home') ?>" class="confirm-link"><?php echo $word->title; ?></a></li>
<?php
}
?>