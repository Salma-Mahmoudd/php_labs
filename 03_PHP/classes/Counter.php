<?php

class Counter
{
    private $file;

    public function __construct($filePath)
    {
        $this->file = $filePath;

        if (!file_exists($this->file)) {
            file_put_contents($this->file, 0);
        }
    }

    public function increment()
    {
        $count = file_get_contents($this->file) + 1;
        file_put_contents($this->file, $count);
    }

    public function getCount()
    {
        return file_get_contents($this->file);
    }
}
