<?php


namespace App\Controllers\Admin;

use App\Controllers\Admin\AppController;

class IndexController extends AppController
{

    public function indexAction()
    {
        $tabPosts = ['name' => 'undeundeu'];

        $this->render('index.dashboard', $tabPosts);
    }

    public function user_listAction()
    {
        $tabPosts1 = ['name' => 'undeundeu'];

        $this->render('index.user_list', $tabPosts1);
    }

    public function property_listAction()
    {
        $tabPosts1 = ['name' => 'undeundeu'];

        $this->render('index.property_list', $tabPosts1);
    }

    public function message_listAction()
    {
        $tabPosts1 = ['name' => 'undeundeu'];

        $this->render('index.message_list', $tabPosts1);
    }

    public function import_exportAction()
    {
        $tabPosts1 = ['name' => 'undeundeu'];

        $this->render('index.import_export', $tabPosts1);
    }
    
}
