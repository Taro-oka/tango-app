<?php

namespace view\edit;

function index($word, $is_first, $searched_text)
{
?>
    <div class="mx-4 mt-6">
        <div class="text-2xl mb-8 font-bold">データを編集 <br />
            <span class="text-lg">※編集したデータを編集前の状態に戻すことはできませんのでご注意ください。
            </span>
        </div>
        <form action="<?php echo CURRENT_URI; ?>" method="POST" class="edit-form">
            <input type="hidden" name="id" value="<?php echo $word->id; ?>">
            <input type="hidden" name="is_first" value="<?php echo $is_first; ?>">
            <input type="hidden" name="srch_txt" value="<?php echo $searched_text; ?>">
            <span class="block text-2xl mb-2 font-bold">単語： <?php echo $word->title; ?></span>
            <span class="block text-lg mb-4">発音記号： <?php echo $word->phonetics; ?></span>
            <div class="flex flex-row items-center mb-2">
                <span>意味（日）： </span>
                <textarea rows="2" cols="33" name="meaning_ja" class="text-area border-2 border-black p-1 min-w-32"><?php echo $word->ja_definition; ?></textarea>
            </div>
            <div class="flex flex-row items-center mb-2">
                <span>意味（英）： </span>
                <textarea rows="2" cols="33" name="meaning_en" class="text-area border-2 border-black p-1 min-w-32"><?php echo $word->en_definition; ?></textarea>
            </div>
            <input type="submit" value="編集決定" class="block w-fit mt-6 cursor-pointer py-2 px-4 bg-slate-200 font-bold">
        </form>
        <?php if ($is_first) : ?>
            <form action="<?php the_url('home') ?>" method="POST">
                <input type="hidden" name="search_text" value="<?php echo $searched_text; ?>">
                <input type="submit" value="戻る" class="block w-fit mt-6 cursor-pointer py-2 px-4 bg-slate-200 font-bold">
            </form>
        <?php else : ?>
            <form action="<?php the_url('detail') ?>" method="GET">
                <input type="hidden" name="id" value="<?php echo $word->id; ?>">
                <input type="hidden" name="srch_txt" value="<?php echo $searched_text; ?>">
                <input type="hidden" name="is_first" value="<?php echo $is_first; ?>">
                <input type="submit" value="戻る" class="block w-fit mt-6 cursor-pointer py-2 px-4 bg-slate-200 font-bold">
            </form>
        <?php endif; ?>
    </div>
<?php
}
