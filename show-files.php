<?php

$directory = '/Volumes/photo/2004';

$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

$it->rewind();
while ($it->valid()) {
    if (!$it->isDot()) {
        echo $it->key() . "<br>";
    }

    $it->next();
}
