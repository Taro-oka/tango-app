<?php

namespace view\edit;

function index($word, $is_first, $searched_text)
{
    echo "$word->title を編集します";
?>
    <div class="ml-4">
        <div class="">編集です</div>
        <?php if ($is_first) : ?>
            <form action="<?php the_url('home') ?>" method="POST">
                <input type="hidden" name="search_text" value="<?php echo $searched_text; ?>">
                <input type="submit" value="戻る" class="block w-fit mt-6 cursor-pointer py-2 px-4 bg-slate-200 font-bold">
            </form>
        <?php else : ?>
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="block w-fit mb-8 cursor-pointer py-2 px-4 bg-slate-200">
                <button>戻る</button>
            </a>
        <?php endif; ?>
    </div>
<?php
}
