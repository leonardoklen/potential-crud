<?php

namespace App\Models\DAO;

use App\Models\Entidades\Desenvolvedor;

class DesenvolvedorDAO extends BaseDAO
{
    public function listar($id = null)
    {
        if ($id) {
            $resultado = $this->select(
                "SELECT * FROM desenvolvedores WHERE id = $id"
            );

            return $resultado->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $resultado = $this->select(
                'SELECT * FROM desenvolvedores'
            );
            return $resultado->fetchAll(\PDO::FETCH_ASSOC);
        }
    }


    public function salvar(Desenvolvedor $desenvolvedor)
    {
        try {

            $nome = $desenvolvedor->getNome();
            $sexo = $desenvolvedor->getSexo();
            $idade = $desenvolvedor->getIdade();
            $hobby = $desenvolvedor->getHobby();
            $dataNascimento = $desenvolvedor->getDataNascimento();

            return $this->insert(
                'desenvolvedores',
                ":nome, :sexo, :idade, :hobby, :dataNascimento",
                [
                    ':nome' => $nome,
                    ':sexo' => $sexo,
                    ':idade' => $idade,
                    ':hobby' => $hobby,
                    ':dataNascimento' => $dataNascimento,
                ]
            );
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(array('status' => 'error', 'data' => $e->getMessage()));
        }
    }


    public function atualizar(Desenvolvedor $desenvolvedor)
    {
        try {

            $id = $desenvolvedor->getId();
            $nome = $desenvolvedor->getNome();
            $sexo = $desenvolvedor->getSexo();
            $idade = $desenvolvedor->getIdade();
            $hobby = $desenvolvedor->getHobby();
            $dataNascimento = $desenvolvedor->getDataNascimento();

            return $this->update(
                'desenvolvedores',
                "nome = :nome, sexo = :sexo, idade = :idade, hobby = :hobby, dataNascimento = :dataNascimento",
                [
                    ':id' => $id,
                    ':nome' => $nome,
                    ':sexo' => $sexo,
                    ':idade' => $idade,
                    ':hobby' => $hobby,
                    ':dataNascimento' => $dataNascimento,
                ],
                "id = :id"
            );
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(array('status' => 'error', 'data' => $e->getMessage()));
        }
    }


    public function excluir(Desenvolvedor $desenvolvedor)
    {
        try {
            $id = $desenvolvedor->getId();

            return $this->delete('desenvolvedores', 'id', $id);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(array('status' => 'error', 'data' => $e->getMessage()));
        }
    }

    public function buscar($valores)
    {
        try {

            $query = "select 
                            * 
                      from  desenvolvedores 
                      where id like '%" . $valores . "%' 
                        or nome like '%" . $valores . "%' 
                        or sexo like '%" . $valores . "%' 
                        or idade like '%" . $valores . "%' 
                        or hobby like '%" . $valores . "%' 
                        or dataNascimento like '%" . $valores . "%'";
            $resultado = $this->select($query);

            return $resultado->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            http_response_code(404);
            echo json_encode(array('status' => 'error', 'data' => $e->getMessage()));
        }
    }
}
