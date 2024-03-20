<?php

namespace partials;

use lib\Auth;
use lib\Msg;

function header()
{
    function generateRandomString($length = 5)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    $rand_str = generateRandomString(5);
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>単語学習</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="<?php echo BASE_CSS_PATH; ?>style.css" />
    </head>

    <body>
        <div id="container">
            <header class="header">
                <nav class="nav">
                    <li><a href="<?php the_url('') ?>">Homeへ</a></li>
                    <li><a href="<?php the_url('about') ?>">Aboutへ</a></li>
                    <li><a href="<?php the_url($rand_str) ?>">404へ</a></li>
                </nav>
            </header>
            <main class="main">

            <?php

            Msg::flush();
        }
            ?>