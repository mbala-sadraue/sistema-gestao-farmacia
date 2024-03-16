
 <div class="modal fade modalConfirmDelete" id="verticalycentered" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <i class="bx bx-error"></i>
          <h5 class="modal-title" >Remover <span class="modalTitle"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Tens certeza que pretende eliminar este/a <span class="modalTitle"></span>?</p>
          <p>Essa acção não pode ser desfeita, e todos os dados relacionada, serão eliminados.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="btn-cancel" data-bs-dismiss="modal">Cancelar</button>
            <form method="post" action="" id="formDeleteTrue">
              @csrf
              @method("DELETE")
               <button type="submit" class="btn btn-primary" id="btn-delete" >Eliminar</button>
            </form>
         
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

  <script type="text/javascript">

    $(function(){
        $('.BtnDeleteTrue').click(function(){

          var title = $(this).attr("data-dt-titte");
          $(".modalTitle").text(title);
          var id = $(this).attr('value');
          var actionUrl = $(this).attr("data-dt-url")+id;

        $("#formDeleteTrue").attr("action",actionUrl);
          $("#formDeleteTrue").on("submit", function(){
            return true;
          })

        })
    })
  </script>
  