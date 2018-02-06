<?php

function hr()
{
    echo '<hr>';
}

function h($content, $level = 1)
{
    echo "<h$level>$content</h$level>";
}

function getHost()
{
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
}

function a($content, $link = '')
{
    $link = getHost() . '/' . $link;
    echo "<a href=\"$link\">$content</a>";
}

toRoute('product/view', ['id' => 10]);
// http://shop.local/index.html?r=product/view&id=10
// http://shop.local/product/view/10