$(function(){
// var dominio = window.location.hostname;

    var protocolo = window.location.protocol;

    var dominio = "localhost:8000";
    var caminho = window.location.pathname;

    var url = window.location.protocol + "//" + dominio+caminho;

     
    $("#mainSelectPagination").on('click','option',function(){
            console.log(200);
            size = $(this).val();
            window.location.href = url+'?size='+size
    });
})