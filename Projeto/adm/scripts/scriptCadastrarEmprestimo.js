$(document).ready(function() {
    $('#calendar').hide();
    $('#btn').hide();            
    $('.radio').on('change', function() {
        var selectValor = $(this).val();
        if (selectValor == 1) {
            $('#calendar').show();                    
        }else{
            $('#calendar').hide();
        }
        var campoNome = $('#campoNome').val();
        var campoLivros = $('#campoLivros').val();
        if (campoLivros && campoNome && selectValor) {
            $('#btn').show();
        }
    });
});

$('#pesquisaAluno').keyup(function(){
    var busca = $(this).val();
    if(busca != ''){
        dados = {
            palavra : busca
        }
    }
    $.post('../controller/C_buscaAluno.php',{busca: busca}, function(data){
        $('#livro').html(data);
    });
});

function enche(valor) {
    alert(valor);
 }