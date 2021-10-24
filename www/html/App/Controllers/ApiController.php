<?php

namespace App\Controllers;

use App\Models\DAO\DesenvolvedorDAO;
use App\Models\Entidades\Desenvolvedor;


class ApiController extends Controller
{

    public function get($params)
    {

        $desenvolvedorDAO = new DesenvolvedorDAO();

        if (!empty($_GET['valor'])) {
            $desenvolvedores = $desenvolvedorDAO->buscar($_GET['valor']);
        } else if ($params[0] == "developers" && $params[1] > 0 && count($params) == 2) {
            $desenvolvedores = $desenvolvedorDAO->listar($params[1]);
        } else if ($params[0] == "developers" && count($params) == 1) {
            $desenvolvedores = $desenvolvedorDAO->listar();
        }

        if (!empty($desenvolvedores)) {
            http_response_code(200);
            $this->setViewParam('desenvolvedores', json_encode(array('status' => 'success', 'data' => $desenvolvedores)));
        } else {
            http_response_code(404);
            $this->setViewParam('desenvolvedores', json_encode(array('status' => 'error', 'data' => "Nenhum registro encontrado")));
        }

        $this->render('/api/get');
    }

    public function post($params)
    {
        if ($params[0] == "developers" and count($params) == 1) {

            $desenvolvedor = new Desenvolvedor();

            $desenvolvedor->setNome($_POST['nome']);
            $desenvolvedor->setSexo($_POST['sexo']);
            $desenvolvedor->setIdade($_POST['idade']);
            $desenvolvedor->setHobby($_POST['hobby']);
            $desenvolvedor->setDataNascimento(date('Y/d/m', strtotime($_POST['dataNascimento'])));

            $desenvolvedorDAO = new DesenvolvedorDAO();

            if ($desenvolvedorDAO->salvar($desenvolvedor)) {
                http_response_code(201);
                $this->setViewParam('response', json_encode(array('status' => 'success', 'data' => "Cadastrado com sucesso")));
            } else {
                http_response_code(400);
                $this->setViewParam('response', json_encode(array('status' => 'error', 'data' => "Falha ao cadastrar")));
            }

            $this->render('/api/post');
        }
    }

    public function put($params)
    {
        if ($params[0] == "developers" and $params[1] > 0 and count($params) == 2) {

            $desenvolvedor = new Desenvolvedor();

            $desenvolvedor->setId($params[1]);
            $desenvolvedor->setNome($_POST['nome']);
            $desenvolvedor->setSexo($_POST['sexo']);
            $desenvolvedor->setIdade($_POST['idade']);
            $desenvolvedor->setHobby($_POST['hobby']);
            $desenvolvedor->setDataNascimento(date('Y/d/m', strtotime($_POST['dataNascimento'])));

            $desenvolvedorDAO = new DesenvolvedorDAO();

            if ($desenvolvedorDAO->atualizar($desenvolvedor)) {
                http_response_code(200);
                $this->setViewParam('response', json_encode(array('status' => 'success', 'data' => "Atualizado com sucesso")));
            } else {
                http_response_code(400);
                $this->setViewParam('response', json_encode(array('status' => 'error', 'data' => "Falha ao atualizar")));
            }

            $this->render('/api/put');
        }
    }

    public function delete($params)
    {
        if ($params[0] == "developers" and $params[1] > 0 and count($params) == 2) {

            $desenvolvedor = new Desenvolvedor();

            $desenvolvedor->setId($params[1]);

            $desenvolvedorDAO = new DesenvolvedorDAO();

            if ($desenvolvedorDAO->excluir($desenvolvedor)) {
                http_response_code(204);
                $this->setViewParam('response', json_encode(array('status' => 'success', 'data' => "Excluido com sucesso")));
            } else {
                http_response_code(400);
                $this->setViewParam('response', json_encode(array('status' => 'error', 'data' => "Falha ao excluir")));
            }

            $this->render('/api/delete');
        }
    }
}
