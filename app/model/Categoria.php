<?php

class Categoria
{
    private $cate_id;
    private $cate_nome;
    private $cate_descricao;
    private $cate_status;
    private $entity = false;

    public function validaEntidade()
    {
        $arrRetorno = array();
        $cate_nome = $this->getCateNome();
        if (empty($cate_nome)) {
            $arrRetorno[] = 'O nome da categoria é obrigatório';
        }

        if (count($arrRetorno) > 0) {
            return $arrRetorno;
        } else {
            return true;
        }
    }

    public function insert()
    {
        $sql = "INSERT INTO categorias (cate_nome, cate_descricao, cate_status)
                VALUES (:cate_nome, :cate_descricao, :cate_status)";
        $conexao = Database::getInstance()->prepare($sql);
        $conexao->bindValue(':cate_nome', $this->getCateNome());
        $conexao->bindValue(':cate_descricao', $this->getCateDescricao());
        $conexao->bindValue(':cate_status', $this->getCateStatus());
        if ($conexao->execute()) {
            return true;
        } else {
            throw new Exception("Ocorreu um erro -[" . $conexao->errorCode() . "] - " . $conexao->errorInfo());
        }
    }
    
    public static function listar()
    {
        $sql = "SELECT
                    cate_id,
                    cate_nome,
                    cate_descricao,
                    cate_status
                FROM categorias
                    ORDER BY cate_nome";

        $conexao = Database::getInstance()->prepare($sql);
        if ($conexao->execute()) {
            $retorno = array();
            $row = $conexao->fetch(PDO::FETCH_ASSOC);
            while ($row) {
                $retorno[] = $row;
                $row = $conexao->fetch(PDO::FETCH_ASSOC);
            }
            return $retorno;
        } else {
            throw new Exception("Ocorreu um erro -[" . $conexao->errorCode() . "] - " . $conexao->errorInfo());
        }
    }

    /**
     * @return mixed
     */
    public function getCateId()
    {
        return $this->cate_id;
    }

    /**
     * @param mixed $cate_id
     */
    public function setCateId($cate_id)
    {
        $this->cate_id = $cate_id;
    }

    /**
     * @return mixed
     */
    public function getCateNome()
    {
        return $this->cate_nome;
    }

    /**
     * @param mixed $cate_nome
     */
    public function setCateNome($cate_nome)
    {
        $this->cate_nome = $cate_nome;
    }

    /**
     * @return mixed
     */
    public function getCateDescricao()
    {
        return $this->cate_descricao;
    }

    /**
     * @param mixed $cate_descricao
     */
    public function setCateDescricao($cate_descricao)
    {
        $this->cate_descricao = $cate_descricao;
    }

    /**
     * @return mixed
     */
    public function getCateStatus()
    {
        return $this->cate_status;
    }

    /**
     * @param mixed $cate_status
     */
    public function setCateStatus($cate_status)
    {
        $this->cate_status = $cate_status;
    }

    /**
     * @return boolean
     */
    public function isEntity()
    {
        return $this->entity;
    }

    /**
     * @param boolean $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }
    
    
}