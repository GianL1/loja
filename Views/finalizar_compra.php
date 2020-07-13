<h1> Finalizar Compra </h1>

<form action="" method="post" id="form">
    <fieldset>
        <legend>
            Informações do Usuário
        </legend>

        Nome: <br>
        <input type="text" name="nome"><br><br>

        E-mail: <br>
        <input type="email" name="email"><br><br>

        Telefone: <br>
        <input type="text" name="ddd"> <input type="tel" name="telefone">
    </fieldset>
    <br>
    <fieldset>
        <legend>Informações de Endereço </legend>

        CEP: <br>
        <input type="text" name="endereco[cep]"><br><br>

        CEP: <br>
        <input type="text" name="endereco[rua]"><br><br>

        Número: <br>
        <input type="text" name="endereco[numero]"><br><br>

        Complemento: <br>
        <input type="text" name="endereco[complemento]"><br><br>

        Bairro: <br>
        <input type="text" name="endereco[bairro]"><br><br>

        Cidade: <br>
        <input type="text" name="endereco[cidade]"><br><br>

        Estado: <br>
        <input type="text" name="endereco[estado]"><br><br>

    </fieldset>
    <br>
    <fieldset>
        <legend>Resumo da Compra</legend>
        Total a Pagar: R$ <?php echo $total; ?>
    </fieldset><br>
    <fieldset>
        <legend>Informações de Pagamento</legend>

        <select name="pg_form" id="pg_form" onchange="selectPg()">
            <option value=""></option>
            <option value="CREDIT_CARD">Cartão de Crédito</option>
            <option value="BOLETO">Boleto</option>
            <option value="BALANCE">Saldo PagSeguro</option>
        </select>
        <div style="display:none" id="cc">
            Qual a bandeira do seu cartão ?
            <div id="bandeira">

            </div>
            <br>
            <div id="cardinfo" style="display:none">[
                Parcelamento: <br>
                <select name="" id=""></select><br><br>

                Titular do cartão: <br>
                <input type="text" name="c_titular"><br><br>

                CPF do Titular:
                <input type="text" name="cpf"><br><br>

                Número do Cartão: <br>
                <input type="text" name="cartao" id="cartao"><br><br>

                Digito: <br>
                <input type="text" name="cvv" id="cvv" maxlength="4"><br><br>

                Validade: <br>
                <input type="text" name="validade" id="validade">
            </div>
        </div>

    </fieldset>
    <br>
    <button type="submit"> Efetuar Pagamento </button>

    <input type="hidden" name="bandeira" id="bandeira">
    <input type="hidden" name="ctoken" id="ctoken">
    <input type="hidden" name="shash" id="shash">
    <input type="hidden" name="sessionId" value="<?php echo $sessionId?>">

</form>

<script type="text/javascript"
  src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
</script>
<script type="text/javascript">
    var sessionId = "<?php echo $sessionId?>";
    var valor = "<?php echo $total; ?>";
    var formOk = false;
</script>

<script src="<?php echo BASE_URL?>Assets/js/ckt.js"></script>