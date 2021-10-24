<?php

namespace App\Controllers;

class DesenvolvedorController extends Controller
{
    public function index()
    {

        $this->render('/desenvolvedor/index');
    }

    public function consultar()
    {

        $url = 'http://' . REMOTE_ADDR . ':8000/api/get/developers?valor=' . $_POST['valor'];


        if ($this->file_contents_exist($url)) {
            $desenvolvedores = file_get_contents($url);
        }

        $this->setViewParam('desenvolvedores', json_decode($desenvolvedores, true));

        $this->render('/desenvolvedor/consultar');
    }
}
