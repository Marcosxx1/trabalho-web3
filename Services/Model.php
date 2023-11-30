<?php
abstract class Model
{
  protected $conexao;
  protected $tabela = "";
  protected $query = "";
  protected $ordem = "id";
  // construtor
  public function __construct()
  {
    try {
      $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
      $this->conexao = new PDO('pgsql:host=localhost;dbname=TrabalhoWeb3;port=5432', "postgres", "postgres", $opcoes);
      if ($this->conexao === null) {
        throw new Exception('Database connection is not set up');
    }
    } catch (PDOException $e) {
      $this->conexao = null;
    }
  }

  public function create($dados)
  {
    if (!isset($dados['id'])) {
      unset($dados['id']);
    }
    if ($this->conexao === null) {
      throw new Exception('Database connection is not set up');
  }
    $chaves = array_keys($dados);
    $campos = implode(", ", $chaves);
    $valores = ":" . implode(", :", $chaves);
    $sql = "INSERT INTO $this->tabela ($campos) VALUES($valores)";
    $sentenca = $this->conexao->prepare($sql);
    foreach ($chaves as $chave) {
      $sentenca->bindParam(":$chave", $dados[$chave]);
    }
    $sentenca->execute();
  }
  public function read()
  {
      if ($this->query == "") {
          $this->query = "SELECT * FROM $this->tabela ORDER BY $this->ordem";
      }
      if ($this->conexao === null) {
          throw new Exception('Database connection is not set up');
      }
      $sentenca = $this->conexao->query($this->query);
      $sentenca->setFetchMode(PDO::FETCH_ASSOC);
      $consulta = $sentenca->fetchAll();
      return $consulta;
      
  }
  

  public function update($dados)
  {
    $chaves = array_keys($dados);
    $campos = "";
    foreach ($chaves as $chave) {
      if ($chave != "id") {
        if ($campos != "") {
          $campos .= ", $chave= :$chave";
        } else {
          $campos .= "$chave= :$chave";
        }
      }
    }
    if ($this->conexao === null) {
      throw new Exception('Database connection is not set up');
  }
    $sql = "UPDATE $this->tabela SET $campos WHERE id=:id ";
    $sentenca = $this->conexao->prepare($sql);
    foreach ($chaves as $chave) {
      $sentenca->bindParam(":$chave", $dados[$chave]);
    }
    $sentenca->execute();

  }

  public function delete($id)
  {
    if ($this->conexao === null) {
      throw new Exception('Database connection is not set up');
  }
    $sql = "DELETE FROM $this->tabela WHERE id = :id";
    $sentenca = $this->conexao->prepare($sql);
    $sentenca->bindParam(":id", $id);
    $sentenca->execute();
  }

  public function getById($id)
  {
    if ($this->conexao === null) {
      throw new Exception('Database connection is not set up');
  }
    $sql = "SELECT * FROM $this->tabela WHERE id = :id"; //2
    $sentenca = $this->conexao->prepare($sql);
    $sentenca->bindParam(":id", $id);
    $sentenca->execute();
    $dados = $sentenca->fetch();
    return $dados;
  }

  function search()
  {
    if ($this->conexao === null) {
      throw new Exception('Database connection is not set up');
  }
    $sql = "SELECT * FROM $this->tabela where nome ilike '%'";

    $sentenca = $this->conexao->prepare($sql);
    $sentenca->execute();
    $dados = $sentenca->fetch();
    return $dados;
  }
}
?>