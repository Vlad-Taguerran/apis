<?php


namespace App\Controller;


class AdminController extends \Core\Controller\Controller
{
    public function index()
    {
        return $this->render('dashboard','dashboard');
    }
}