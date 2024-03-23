<?php

namespace view\detail;

function index($word, $searched_text, $is_first)
{
?>
    <div class="ml-4 mt-6">
        <div class="flex flex-row gap-4 items-end">
            <div class="w-fit">
                <h2 class="text-2xl mb-2">単語: <span class="font-bold"><?php echo $word->title; ?></span></h2>
                <h2 class="text-lg mb-4">発音記号: <?php echo $word->phonetics; ?></h2>
                <h2 class="text-2xl mb-8">意味: <span class="font-bold"><?php echo $word->ja_definition; ?></span></h2>
            </div>
            <a href="<?php the_url('edit?id=' . $word->id . '&srch_txt=' . $searched_text . '&is_first=' . $is_first); ?>" class="block w-fit mb-8 cursor-pointer py-2 px-4 bg-slate-200 font-bold"><button>編集</button></a>
        </div>
        <form action="<?php the_url('home') ?>" method="POST">
            <input type="hidden" name="search_text" value="<?php echo $searched_text; ?>">
            <input type="submit" value="戻る" class="block w-fit mt-6 cursor-pointer py-2 px-4 bg-slate-200 font-bold">
        </form>
    </div>
<?php
}
