<?php



require __DIR__ . "/vendor/autoload.php";

use App\CarrinhoCompra;



$c1 = new CarrinhoCompra();

print_r($c1->exibirItens());
echo "valor total: ".$c1->exibirValorTotal();

echo "<hr>";

$c1->adicionarItem('bicicleta',1.034);
$c1->adicionarItem('geladeira',3.046);
$c1->adicionarItem('televisão',5.098);

print_r($c1->exibirItens());
echo "<br>";
echo "valor total: ".$c1->exibirValorTotal();
echo "<br>";
echo "Status: ".$c1->exibirStatus();

echo "<hr>";
if($c1->confirmarPedido()){
    echo "Pedido relaizado com sucesso";
}else{
    echo "Erro na confirmação do pedido. Carrinho vazio";
}
echo "<br>";
echo "Status: ".$c1->exibirStatus();
