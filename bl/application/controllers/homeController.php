<?php
namespace application\controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        require_once 'application/views/board/index.php';
    }
}