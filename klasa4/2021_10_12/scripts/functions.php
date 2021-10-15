<?php
function NameFormatter($name, $chars)
{
    return substr(ucwords(strtolower(trim($name))), 0, ($chars ? $chars : 10));
}
