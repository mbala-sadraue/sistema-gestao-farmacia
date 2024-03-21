  @if(session('status'))

  @if (session('status')['status'] == true)
      <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
          <i class="bi bi-check-circle-fill me-1"></i>
          {!! session('status')['messages'] !!}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @elseif(session('status')['status'] == false)
      <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
          <i class="bi bi-x-circle-fill me-1"></i>
          {!! session('status')['messages'] !!}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
@endif