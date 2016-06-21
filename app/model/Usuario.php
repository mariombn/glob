<?php

class Usuario
{
    /**
     * @var
     */
    private $usua_id;
    /**
     * @var
     */
    private $usua_email;
    /**
     * @var
     */
    private $usua_senha;
    /**
    * @var
    */
    private $usua_senha_c;
    /**
     * @var
     */
    private $usua_nome;
    /**
     * @var
     */
    private $usua_sobrenome;
    /**
     * @var
     */
    private $usua_nickname;
    /**
     * @var
     */
    private $usua_data_cadastro;
    /**
     * @var
     */
    private $usua_data_alteracao;
    /**
     * @var
     */
    private $usua_status;
    /**
     * @var bool
     */
    private $entity = false;

    public function __construct($usua_email = false)
    {
        if ($usua_email) {
            $this->setUsuaEmail($usua_email);
            $this->carregarPorEmail();
        }
    }

    /**
     * Metodo Responsavel por carregar a entidade por ID
     * @throws Exception
     */
    private function carregarPorId()
    {
        if (empty($this->getUsuaId()) || !is_int($this->getUsuaId())) {
            throw new InvalidArgumentException('ID de usuário invalido');
        }

        $sql = "SELECT usua_id
                      ,usua_email
                      ,usua_senha
                      ,usua_nome
                      ,usua_sobrenome
                      ,usua_nickname
                      ,usua_data_cadastro
                      ,usua_data_alteracao
                      ,usua_status
                FROM usuarios
                WHERE usua_id = :usua_id";

        $conexao = Database::getInstance()->prepare($sql);
        $conexao->bindValue(':usua_id', $this->getUsuaId());
        if ($conexao->execute()) {
            $row = $conexao->fetch(PDO::FETCH_ASSOC);

            $this->setUsuaId($row['usua_id']);
            $this->setUsuaEmail($row['usua_email']);
            $this->setUsuaSenha($row['usua_senha']);
            $this->setUsuaNome($row['usua_nome']);
            $this->setUsuaSobrenome($row['usua_sobrenome']);
            $this->setUsuaNickname($row['usua_nickname']);
            $this->setUsuaDataCadastro($row['usua_data_cadastro']);
            $this->setUsuaDataAlteracao($row['usua_data_alteracao']);
            $this->setUsuaStatus($row['usua_status']);
            $this->entity = true;
        } else {
            throw new Exception("Ocorreu um erro -[" . $conexao->errorCode() . "] - " . $conexao->errorInfo());
        }
    }

    /**
     * Metodo Responsavel por carregar a entidade por e-mail
     * @throws Exception
     */
    private function carregarPorEmail()
    {
        if (empty($this->getUsuaEmail())) {
            throw new InvalidArgumentException('E-mail do usuário invalido');
        }

        $sql = "SELECT usua_id
                      ,usua_email
                      ,usua_senha
                      ,usua_nome
                      ,usua_sobrenome
                      ,usua_nickname
                      ,usua_data_cadastro
                      ,usua_data_alteracao
                      ,usua_status
                FROM usuarios
                WHERE usua_email = :usua_email";

        $conexao = Database::getInstance()->prepare($sql);
        $conexao->bindValue(':usua_email', $this->getUsuaEmail());
        if ($conexao->execute()) {
            $row = $conexao->fetch(PDO::FETCH_ASSOC);

            $this->setUsuaId($row['usua_id']);
            $this->setUsuaEmail($row['usua_email']);
            $this->setUsuaSenha($row['usua_senha']);
            $this->setUsuaNome($row['usua_nome']);
            $this->setUsuaSobrenome($row['usua_sobrenome']);
            $this->setUsuaNickname($row['usua_nickname']);
            $this->setUsuaDataCadastro($row['usua_data_cadastro']);
            $this->setUsuaDataAlteracao($row['usua_data_alteracao']);
            $this->setUsuaStatus($row['usua_status']);
            $this->entity = true;
        } else {
            throw new Exception("Ocorreu um erro -[" . $conexao->errorCode() . "] - " . $conexao->errorInfo());
        }
    }

    /**
     * Valida se todos os campos obrigatórios estão na entidade e validados
     * @return array|bool
     */
    public function validaEntidade()
    {
        $arrRetorno = array();
        $usua_email = $this->getUsuaEmail();
        $usua_senha = $this->getUsuaSenha();
        $usua_senha_c = $this->getUsuaSenhaC();
        $usua_nome = $this->getUsuaNome();
        $usua_nickname = $this->getUsuaNickname();

        if (empty($usua_email)) {
            $arrRetorno[] = 'O campo de e-mail é obrigatório';
        } else {
            if (!Valida::email($usua_email)) {
                $arrRetorno[] = 'O e-mail digitado é inválido';
            }
        }

        if (empty($usua_senha)) {
            $arrRetorno[] = 'O campo de senha é obrigatório';
        } else {
            if (empty($usua_senha)) {
                $arrRetorno[] = 'O campo de senha é obrigatório';
            } else {
                if ($usua_senha != $usua_senha_c) {
                    $arrRetorno[] = 'Os campos de senha e confirmação de senha precisão ser iguais';
                }
            }
        }

        if (empty($usua_nome)) {
            $arrRetorno[] = 'O campo do nome é obrigatório';
        }

        if (empty($usua_nickname)) {
            $arrRetorno[] = 'O campo do nickname é obrigatório';
        }

        if (count($arrRetorno) > 0) {
            return $arrRetorno;
        } else {
            return true;
        }
    }

    /**
     * @return mixed
     */
    public function getUsuaId()
    {
        return $this->usua_id;
    }

    /**
     * @param mixed $usua_id
     */
    public function setUsuaId($usua_id)
    {
        $this->usua_id = $usua_id;
    }

    /**
     * @return mixed
     */
    public function getUsuaEmail()
    {
        return $this->usua_email;
    }

    /**
     * @param mixed $usua_email
     */
    public function setUsuaEmail($usua_email)
    {
        $this->usua_email = $usua_email;
    }

    /**
     * @return mixed
     */
    public function getUsuaNome()
    {
        return $this->usua_nome;
    }

    /**
     * @param mixed $usua_nome
     */
    public function setUsuaNome($usua_nome)
    {
        $this->usua_nome = $usua_nome;
    }

    /**
     * @return mixed
     */
    public function getUsuaSobrenome()
    {
        return $this->usua_sobrenome;
    }

    /**
     * @param mixed $usua_sobrenome
     */
    public function setUsuaSobrenome($usua_sobrenome)
    {
        $this->usua_sobrenome = $usua_sobrenome;
    }

    /**
     * @return mixed
     */
    public function getUsuaNickname()
    {
        return $this->usua_nickname;
    }

    /**
     * @param mixed $usua_nickname
     */
    public function setUsuaNickname($usua_nickname)
    {
        $this->usua_nickname = $usua_nickname;
    }

    /**
     * @return mixed
     */
    public function getUsuaDataCadastro()
    {
        return $this->usua_data_cadastro;
    }

    /**
     * @param mixed $usua_data_cadastro
     */
    public function setUsuaDataCadastro($usua_data_cadastro)
    {
        $this->usua_data_cadastro = $usua_data_cadastro;
    }

    /**
     * @return mixed
     */
    public function getUsuaDataAlteracao()
    {
        return $this->usua_data_alteracao;
    }

    /**
     * @param mixed $usua_data_alteracao
     */
    public function setUsuaDataAlteracao($usua_data_alteracao)
    {
        $this->usua_data_alteracao = $usua_data_alteracao;
    }

    /**
     * @return mixed
     */
    public function getUsuaStatus()
    {
        return $this->usua_status;
    }

    /**
     * @param mixed $usua_status
     */
    public function setUsuaStatus($usua_status)
    {
        $this->usua_status = $usua_status;
    }

    /**
     * @return mixed
     */
    public function getUsuaSenha()
    {
        return $this->usua_senha;
    }

    /**
     * @param mixed $usua_senha
     */
    public function setUsuaSenha($usua_senha)
    {
        $this->usua_senha = $usua_senha;
    }

    /**
     * @return mixed
     */
    public function getUsuaSenhaC()
    {
        return $this->usua_senha_c;
    }

    /**
     * @param mixed $usua_senha_c
     */
    public function setUsuaSenhaC($usua_senha_c)
    {
        $this->usua_senha_c = $usua_senha_c;
    }



    /**
     * @return boolean
     */
    public function isEntity()
    {
        return $this->entity;
    }


}