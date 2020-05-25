<h1>Detalhes do Pedido</h1>

<table border="0" width="100%">
    <tr>
        <th>Nº do Pedido</th>
        <th>Valor Pago</th>
        <th>Forma de Pgto</th>
        <th>Status do Pgto</th>
        <th>Ações</th>
    </tr>

    <?php foreach($pedidos as $pedido): ?>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    <?php endforeach; ?>
</table>