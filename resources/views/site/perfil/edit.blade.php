
@extends('layouts.site.index')
<link rel="stylesheet" href="{{ asset('tamplate/style.css') }}">

@section('conteudo')

    <div class="page-wraper">
        <!--- <div id="loading-area" class="preloader-wrapper-1">
            <div class="preloader-inner">
                <div class="preloader-shade"></div>
                <div class="preloader-wrap"></div>
                <div class="preloader-wrap wrap2"></div>
                <div class="preloader-wrap wrap3"></div>
                <div class="preloader-wrap wrap4"></div>
                <div class="preloader-wrap wrap5"></div>
            </div>
        </div>-->


	<!-- Header End -->
    <!-- Content -->
    <div class="page-content bg-white">
		<!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<section class="content-inner bg-white">
				<div class="container">
					<div class="row">
						<div class="col-xl-3 col-lg-4 m-b30">
							<div class="sticky-top">
								<div class="shop-account">
									<div class="account-detail text-center">
										<div class="my-image" >
											<a href="javascript:void(0);" >
												<img alt="" src="{{Auth::user()->vc_path}}" style="max-width: 	170px; max-height:145">
											</a>
										</div>
										<div class="account-title">
											<div class="">
												<h4 class="m-b5"><a href="javascript:void(0);">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a></h4>
												<p class="m-b0"><a href="javascript:void(0);">@_{{ Auth::user()->username }}</a></p>
											</div>
										</div>
									</div>
									<ul class="account-list">
										<li>
											<a href="{{route('user.perfil')}}" class="active"><i class="far fa-user" aria-hidden="true"></i> 
											<span>Perfil</span></a>
										</li>
										<li>
											<a href="#"><i class="flaticon-shopping-cart-1"></i>
											<span>Meus aluguéis</span></a>
										</li>
										fc
								<form  action="{{ route('admin.user.update', Auth::user()->id ) }}">
									@csrf
									<div class="row m-b30">
										<div class="col-lg-6 col-md-6">
											<div class="mb-3">
												<label for="formcontrolinput1" class="form-label">Primeiro Nome:</label>
												<input type="text" name="name" class="form-control" id="formcontrolinput1" placeholder="{{ Auth::user()->name }}">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="mb-3">
												<label for="formcontrolinput2" class="form-label"> Último Nome :</label>
												<input type="text" class="form-control" id="formcontrolinput2" name="lastname" value="{{ Auth::user()->lastname }}">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="mb-3">
												<label for="formcontrolinput3" class="form-label">Nome de Usuário</label>
												<input type="text" class="form-control" id="formcontrolinput3" name="username" value="{{ Auth::user()->username }}">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="mb-3">
												<label for="formcontrolinput4" class="form-label">Foto de perfil</label>
												<input type="file" class="form-control" name="vc_path" id="formcontrolinput4" placeholder="Foto de perfil">
											</div>
										</div>
										<div class="col-lg-12 col-md-12">
											
											
										</div>
									</div>
									<div class="shop-bx-title clearfix">
										<h5 class="text-uppercase">Informações de contacto</h5>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-6">
											<div class="mb-3">
												<label for="formcontrolinput5" class="form-label">Contactos:</label>
												<input type="text" class="form-control" id="formcontrolinput5" value="+244 931 145 430">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="mb-3">
												<label for="formcontrolinput6" class="form-label">Endereço de email:</label>
												<input type="email" class="form-control" id="formcontrolinput6" name="email" value="{{ Auth::user()->email }}">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="mb-3">
												<label for="formcontrolinput7" class="form-label">Província:</label>
												<input type="text" class="form-control" id="formcontrolinput7" value="Luanda">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="mb-3">
												<label for="formcontrolinput8" class="form-label">Monicípio:</label>
												<input type="text" class="form-control" id="formcontrolinput8" value="Cazenga">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="mb-3">
												<label for="formcontrolinput9" class="form-label">Cidade:</label>
												<input type="text" class="form-control" id="formcontrolinput9" value="Luanda">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="mb-4">
												<label for="formcontrolinput10" class="form-label">Endereço Completo:</label>
												<input type="text" class="form-control" id="formcontrolinput10" value="Rangel, Km CTT">
											</div>
										</div>
									</div>
									<button class="btn btn-primary btnhover">Salvar configurações</button>
								</form>
							</div>    
						</div>
					</div>
				</div>
			</section>
            <!-- Browse Jobs END -->
		</div>
    </div>
    <!-- Content END-->

	
	
		
						
 



@endsection
