$(function(){
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : 'Anterior',
            next : 'Proximo',
            finish : 'Adicionar',
            current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex) {

           /***
             *
             * PESSOAS
             * */

            var nome                 =  $('#nome').val();
            var email = $('#email').val();
            var telefone = $('#telefone').val();
            var data_nascimento      =  $("#data_nascimento").val();
            var tipo_identificao     =  $("#tipo_identificao").val();
            var numero_identificacao =  $("#numero_identificacao").val();
            var portador_deficiencia =  $('form input[name=portador_deficiencia]:checked').val()
            var sexo                 =  $('form input[name=sexo]:checked').val();
            var estado_civil         =  $('form input[name=estado_civil]:checked').val();
            var tipo_banco           =  $("#tipo_banco").val();
            var iban                 =  $("form #iban").val();

            $('#nome-detail').text(nome);
            $('#email-detail').text(email);
            $('#telefone-detail').text(telefone)
            $("#tipo_identificao-detail").text(tipo_identificao);
            $("#numero_identificacao-detail").text(numero_identificacao);
            $("#data_nascimento-detail").text(data_nascimento);
            $('#portador_deficiencia-detail').text(portador_deficiencia)
            $('#sexo-detail').text(sexo);
            $('#estado_civil-detail').text(estado_civil);
            $('#tipo_banco-detail').text(tipo_banco);
            $('#iban-detail').text(iban);

            /***
             *
             * FUNCIONARIOS
             * */

            var instituicao =  $("#instituicao").val();
            var curso       =  $("#curso").val();
            var obs         =  $("#obs").val();

            $("#instituicao-detail").text(instituicao);
            $("#curso-detail").text(curso);
            $("#obs-detail").text(obs);


            /***
             *
             * INSCRIÇÃO ALUNO
             * */


             var classe_anterior =  $("#ano_escolar_anterior").val();
             var escola_anterior =  $("#escola_anterior").val();
             var obs              =  $("#obs").val();

             $("#ano_escolar_anterior-detail").text(classe_anterior);
             $("#escola_anterior-detail").text(escola_anterior);
             $("#obs-detail").text(obs);
            return true;
        }
    });
    $("#date").datepicker({
        dateFormat: "MM - DD - yy",
        showOn: "both",
        buttonText : '<i class="zmdi zmdi-chevron-down"></i>',
    });

    $('#form-total > div.actions.clearfix > ul > li:nth-child(3) > a').click(function(){
    $("form.form-register").submit()
})
});
