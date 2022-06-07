<?php

namespace Source\View;


class Presentation
{

    public function __construct($content)
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($content);
    }
}
