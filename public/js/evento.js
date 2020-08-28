$(document).ready(function(){

    $("#cep").keyup(function() {
        $("#cep").mask('99.999-999');
    });

    $("#cep").keyup(function() {
        var cep = $("#cep").val().replace(".", "");
        cep = cep.replace("-", "").trim();
        $.get("https://serviceweb.aix.com.br/aixapi/api/cep/" + cep, function(resposta) {
            var json = JSON.parse(JSON.stringify(resposta));
            var logradouro = json.logradouro;
            var bairro = json.bairro;
            var cidade = json.cidade;
            var estado = json.estado;
            var endereco = logradouro + " - " + bairro + " - " + cidade + " - " + estado;
            $("#endereco").val(endereco);
        });
    });

    $('#alterar').click(function () {
        if (!confirm('Deseja realmente alterar os dados do aluno ?')) {
            return false;
        }
        return true;
    });

    $('#remover').click(function () {
        if (!confirm('Deseja realmente remover esse aluno ?')) {
            return false;
        }
        return true;
    });

});