  @if(session('success'))

   @if(session('success')['success'] == true)

    <div class="alert alert-success alert-dismissible fade show" role="alert"
     id="alert">
        <i class="bi bi-check-circle-fill me-1"></i>
         {!! session('success')['messages'] !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
         aria-label="Close"></button>
    </div>
    @elseif(session('success')['success'] == false)
      <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
          <i class="bi bi-x-circle-fill me-1"></i>
              {!! session('success')['messages'] !!}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
   @endif
@endif