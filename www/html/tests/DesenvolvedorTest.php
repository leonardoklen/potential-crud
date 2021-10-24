<?php

use PHPUnit\Framework\TestCase;
use App\Models\DAO\DesenvolvedorDAO;
use App\Models\Entidades\Desenvolvedor;

class DesenvolvedorTest extends TestCase{

    public function testSalvar(){

        $desenvolvedor = new Desenvolvedor();

            $desenvolvedor->setNome('Daniel');
            $desenvolvedor->setSexo($_POST['M']);
            $desenvolvedor->setIdade($_POST[18]);
            $desenvolvedor->setHobby($_POST['Passear com os amigos']);
            $desenvolvedor->setDataNascimento('2000-01-10');

            $desenvolvedorDAO = new DesenvolvedorDAO();

            $this->assertEquals($desenvolvedorDAO->salvar($desenvolvedor), true);
            
    }
}
?>