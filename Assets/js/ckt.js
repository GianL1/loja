window.onload = function() {
    PagSeguroDirectPayment.SessionId(sessionId);
}

function selectPg() {
    var pgCode = document.getElementById("pg_form").value();
    
    if (pgCode == "CREDIT_cARD") {
        
        PagSeguroDirectPayment.getPaymentMethods({
            amount:valor,
            success:function(json){
                var cartoes = json.paymentMethods.CREDIT_CARD.options;
                var cDisponiveis = ['VISA', 'MASTERCARD', 'AMEX', 'HIPERCARD'];
                var html = '';

                for(var i in cDisponiveis) {
                    if (cartoes[cDisponiveis[i]].status == "AVAILABLE") {
                        html += '<img onclick="selecionarBandeira(this)" data-bandeira="'+cartoes[cDisponiveis[i]].name +'" src="https://stc.pagseguro.uol.com.br'+cartoes[cDisponiveis[i]].images.MEDIUM.path+'" border="0"/>'
                    }
                }

                document.getElementById("bandeiras").innerHTML = html;
                document.getElementById("cc").style.display = "block";

            },
            error:function(e){console.log(e)}
        });
    }
}

function selecionarBandeira(object) {
    var bandeira = object.getAttribute("data-bandeira");
    document.getElementById("bandeira").value = bandeira.toLowerCase();
    document.getElementById ("bandeiras").innerHTML = object.outerHTML;

    PagSeguroDirectPayment.getInstallments({
        amount:valor,
        brand:bandeira.toLowerCase(),
        success:function (json) {

            var p = json.installments[bandeira.toLowerCase()];
            var options = '';

            for (var i in p) {
                if (p[i].interestFree == true) {
                   var juros = "Juros" 
                }else{
                    var juros = "Com Juros";
                }
                var frase = p[i].quantity+"x de R$ ".p[i].installmentAmout+" ("+juros+")";
                options += '<option value="'+p[i].quantity+';'+p.installmentAmout+';'+p[i].interestFree+'">'+frase+'</option>'
            }
            document.getElementById("parc").innerHTML = options;
            document.getElementById("cardInfo").style.display = "block";
        }
    })
}

function pagar() {
    
    if(formOk == false) {
        var pgCode = document.getElementById("pg_form").value;
        document.getElementById("shash").value = PagSeguroDirectPayment.getSenderHash();
        
        if (pgCode == "CREDIT_CARD") {
            var cartao = document.getElementById("cartao").value;
            var bandeira = document.getElementById("bandeira").value;
            var svv = document.getElementById("svv").value;
            var validade = document.getElementById("validade").value.split('/');
            
            PagSeguroDirectPayment.createCardToken({
                cardNumber:cartao,
                brand:brand,
                cvv:cvv,
                expirationMonth:validade[0],
                expirationYear:validade[1],
                success:function(json) {
                    var token = json.card.token;
                    document.getElementById("ctoken").value = token;
                    formOk = true
                    document.getElementById("form").submit();
                },
                error:function(e){console.log(e)}
            });

            return false;
        }
    }

    return true;
}