@extends('templates.auth.layout')
@section('headTitle','Fazer login')
@section('content')


<div id="seciont_main">
	
	<div class="container-fluid">	

		<div class="row">
			
			<div class="col-md-6" id="content-left">
				<div class=" px-5" id="login-info">	
					<h1>TS</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit. </p>
				</div>
			</div>
			<div class="col-md-6" id="content-right">
				<div id="">
					<div class="col-md-12 p-3" id="content-right-header-top">
						<a href="">Tech Solutions</a>
					</div>
					<!-----TITLE----->
					<div class="col-md-12 px-5">
						<div class="" id="box-img-right">
							<!-- <i class="bi bi-stack"></i> -->
							<img src="{{asset('assets/img/logo.png')}}" alt="logo" class="img-fluid" id="logo">
						</div>
					</div>
					<!-----TITLE----->
					<div class="col-md-12 px-5">
						<div class="" id="box-title-right">
							<h2>Tech Solutions</h2>
							<h3>Lorem ipsum dolor sit amet <a href="">create a acount</a></h3>
						</div>
					</div>

					<!---SECTION FORM------>

					<div class="col-md-12 px-5">
						@if($errors->any())
							<div class="alert alert-danger error-login">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }} </li>
									@endforeach
								</ul>
							</div>
						@endif
						@if(session('danger'))
							<div class="alert alert-danger error-login" >
								<ul>
									<li>{{ session('danger') }}</li>
								</ul>
							</div>
						@endif
						<form action="{{route('login.sign-in')}}" method="post" class="needs-validation" novalidate id="form_main">
							@csrf
							<div class="mb-3">
								<label for="email" class="form-label">E-mail <span class="required">*</span></label>
								<input type="text" name="email" class="form-control" id="email"required >
				                <div class="invalid-feedback">
				                    E-mail é obrigatório.
				                 </div>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Palavra-passe <span class="required">*</span></label>
								<input type="password" name="password" class="form-control" id="password" required>
				                <div class="invalid-feedback">
				                    E-mail é obrigatório.
				                 </div>
							</div>

							<div class="mb-3">
								 <div class="d-flex" id="boxLembraMe">	
								 	<div class="form-check">
					                    <input class="form-check-input" type="checkbox" value="" id="lembra-me">
					                    <label class="form-check-label" for="lembra-me">
					                    Faz-me lembrar
					                    </label>
					                </div>
				                 	 <div class="text-end">
				                 	 	<a href="" class=" text-end">Esqueceu a palavra-passe?</a>
				                 	 </div>
								 </div>
							</div>

							<!------BUTTON SUBMIT------>
							<div class="mb-3 d-grid gap-2" id="">
								<button type="submit" class="btn btn-primary" id="btnLogin">Entrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection