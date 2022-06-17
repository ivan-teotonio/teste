<?php 

namespace App;

class CarrinhoCompra
{
   private $itens;
   private $status;
   private $vAlorTotal;

   public function __construct()
   {
       $this->itens = [];
       $this->status = "aberto";
       $this->vAlorTotal = 0;
   }

   public function exibirItens()
   {
       return $this->itens;
   }

   public function adicionarItem(string $item, float $valor)
   {
       array_push($this->itens,["item" => $item, "valor" => $valor]);
       $this->vAlorTotal += $valor;
       return true;
   }

   public function exibirValorTotal()
   {
       return $this->vAlorTotal;
   }

   public function exibirStatus()
   {
     return $this->status;
   }

   public function confirmarPedido()
   {
       if($this->validarCarrinho()){
            $this->status ="Confirmado";
            $this->enviarEmail();
            return true;
       }
       return false;
   }

   public function enviarEmail()
   {
    echo "<br>";
    echo "Envia email";
    echo "<br>";
   }

   public function validarCarrinho()
   {
       return count($this->itens) > 0;
   }
}