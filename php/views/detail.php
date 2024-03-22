<?php

namespace view\detail;

function index($word, $searched_text)
{
?>
    <div class="ml-4">
        <div class="my-4">
            <h2 class="text-2xl mb-2">単語: <span class="font-bold"><?php echo $word->title; ?></span></h2>
            <h2 class="text-lg mb-4">発音記号: <?php echo $word->phonetics; ?></h2>
            <h2 class="text-2xl mb-8">意味: <span class="font-bold"><?php echo $word->ja_definition; ?></span></h2>
        </div>
        <form action="<?php the_url('home') ?>" method="POST">
            <input type="hidden" name="search_text" value="<?php echo $searched_text; ?>">
            <input type="submit" value="戻る" class="block w-fit mt-6 cursor-pointer py-2 px-4 bg-slate-200 font-bold">
        </form>
    </div>
<?php
}
