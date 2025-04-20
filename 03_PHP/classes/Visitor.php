<?php

class Visitor
{
    public function isNewVisitor()
    {
        return !isset($_SESSION['visited']);
    }

    public function setVisited()
    {
        $_SESSION['visited'] = true;
    }
}
