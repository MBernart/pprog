<?php

function set_readonly(bool $is_readonly)
{
    if ($is_readonly)
    echo "readonly";
}

function set_plaintext(bool $is_plaintext)
{
    if ($is_plaintext)
    echo "-plaintext";
}

function shuffled(Array $arr)
{
    shuffle($arr);
    return $arr;
}