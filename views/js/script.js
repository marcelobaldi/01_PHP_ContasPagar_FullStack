function pegarDados() {
    
    var categP          = document.getElementById('cxCateg').value;
    var subCategP       = document.getElementById('cxSubCat').value;
    var descP           = document.getElementById('cxDesc').value;
    var valorP          = document.getElementById('cxValor').value;
    var funcionarioP    = document.getElementById('cxFuncionario').value;
    var quantP          = document.getElementById('cxQuant').value;
    var uMedP           = document.getElementById('cxUMed').value;
    var dataVencP       = document.getElementById('cxDataVenc').value;
    var pagoP           = document.getElementById('cxPago').value;
    var dataPagP        = document.getElementById('cxDatPag').value;
    var meioPagP        = document.getElementById('cxMeioPag').value;
    var forneceP        = document.getElementById('cxFornec').value;
    var observP         = document.getElementById('cxObserv').value;
   
    var msg = "Por Favor, Preencha:" + "\n";

    //Manipular Dados - Diversos
    if (categP == "Escolher Categoria ...") {
        msg = msg + "- Categoria" + "\n";
    }
    if (subCategP == "Escolher SubCategoria ..." || subCategP == "" ) {
        msg = msg + "- SubCategoria" + "\n";
    }
    if(valorP == "") {
        msg = msg + "- Valor" + "\n";
    }
    if(dataVencP == "") {
        msg = msg + "- Data Vencimento" + "\n";
    }
    if (msg != "Por Favor, Preencha:" + "\n") {
        alert(msg);
    }


    //Manipular Dados - Pagamento
    if(pagoP == "SIM") {
        if (dataPagP == "") {
            msg = msg + "- Data Pagamento" + "\n";
            alert(msg);
            return false;
        }
    }

    if (dataPagP != "") {
        if (pagoP == "NAO") {
            var mensagem = confirm("Foi Pago?");
            if (mensagem == true) {
                alert("O Campo Pagamento Foi Redefinido para SIM");
                document.getElementById('cxPago').value = "SIM";
                return false;
                
            } else {
                alert("A Data de Pagamento Foi Resetada !");
                document.getElementById('cxDatPag').value = "";
                return false;
            }
        }
    }


    //Manipular Dados - RH
    if (categP == "RH-Freelances" && funcionarioP == "-- Escolher Funcionario --") {
        alert("O Funcionário Deve Ser Selecionado !!!")
        return false;
    }
    if (categP == "RH-Motoqueiros" && funcionarioP == "-- Escolher Funcionario --") {
        alert("O Funcionário Deve Ser Selecionado !!!")
        return false;
    }
    if (categP == "RH-PauTrabalhista" && funcionarioP == "-- Escolher Funcionario --") {
        alert("O Funcionário Deve Ser Selecionado !!!")
        return false;
    }
    
    if (categP == "RH-Funcionarios") {
        if (funcionarioP == "-- Escolher Funcionario --") { 
            if (subCategP != "7-FolhaPagamento" && subCategP != "9-Diversos") {
                alert("O Funcionário Deve Ser Selecionado !!!")
                return false;
            }
        }
        
        if (funcionarioP != "-- Escolher Funcionario --") {
            if (subCategP == "7-FolhaPagamento") {
                alert("O Funcionário Não Deve Ser Selecionado !!!")
                return false;
            }
        }
    }


    //Manipular Dados - Nome do Funcionário
    if (funcionarioP != "-- Escolher Funcionario --") {
        if (categP != "RH-Freelances" && categP != "RH-Motoqueiros" &&
            categP != "RH-PauTrabalhista" && categP != "RH-Funcionarios"){
        
            alert("O Funcionário Não Deve Ser Selecionado !!!")
            return false;
        }
    }

}


//Formatação Moeda
function moeda(a, e, r, t) {
    let n = "",
        h = j = 0,
        u = tamanho2 = 0,
        l = ajd2 = "",
        o = window.Event ? t.which : t.keyCode;
    a.value = a.value.replace('R$ ', '');
    if (n = String.fromCharCode(o),
        -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.replace('R$ ', '').length,
        h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -
            1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
        0 == (u = l.length) && (a.value = ""),
        1 == u && (a.value = "R$ 0" + r + "0" + l),
        2 == u && (a.value = "R$ 0" + r + l),
        u > 2) {
        for (ajd2 = "",
            j = 0,
            h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
                j = 0),
                ajd2 += l.charAt(h),
                j++;
        for (a.value = "R$ ",
            tamanho2 = ajd2.length,
            h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}



