@extends('layouts.site.index')
@section('conteudo')

<div
class="hero page-inner overlay"
style="background-image: url('tamplate/images/hero_bg_1.jpg')"
>
<div class="container">
  <div class="row justify-content-center align-items-center">
	<div class="col-lg-9 text-center mt-5">
	  <h1 class="heading" data-aos="fade-up">Serviços</h1>

	  <nav
		aria-label="breadcrumb"
		data-aos="fade-up"
		data-aos-delay="200"
	  >
		<ol class="breadcrumb text-center justify-content-center">
		  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
		  <li
			class="breadcrumb-item active text-white-50"
			aria-current="page"
		  >
			Serviços
		  </li>
		</ol>
	  </nav>
	</div>
  </div>
</div>
</div>

<div class="section bg-light">
<div class="container">
  <div class="row">
	<div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
	  <div class="box-feature mb-4">
		<span class="flaticon-house mb-4 d-block"></span>
		<h3 class="text-black mb-3 font-weight-bold">
		  Quality Properties
		</h3>
		<p class="text-black-50">
		  Far far away, behind the word mountains, far from the countries
		  Vokalia and Consonantia, there live the blind texts.
		</p>
		<p><a href="#" class="learn-more">Read more</a></p>
	  </div>
	</div>
	<div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
	  <div class="box-feature mb-4">
		<span class="flaticon-house-2 mb-4 d-block-3"></span>
		<h3 class="text-black mb-3 font-weight-bold">Top Rated Agent</h3>
		<p class="text-black-50">
		  Far far away, behind the word mountains, far from the countries
		  Vokalia and Consonantia, there live the blind texts.
		</p>
		<p><a href="#" class="learn-more">Read more</a></p>
	  </div>
	</div>
	<div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
	  <div class="box-feature mb-4">
		<span class="flaticon-building mb-4 d-block"></span>
		<h3 class="text-black mb-3 font-weight-bold">
		  Property for Sale
		</h3>
		<p class="text-black-50">
		  Far far away, behind the word mountains, far from the countries
		  Vokalia and Consonantia, there live the blind texts.
		</p>
		<p><a href="#" class="learn-more">Read more</a></p>
	  </div>
	</div>
	<div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
	  <div class="box-feature mb-4">
		<span class="flaticon-house-3 mb-4 d-block-1"></span>
		<h3 class="text-black mb-3 font-weight-bold">House for Sale</h3>
		<p class="text-black-50">
		  Far far away, behind the word mountains, far from the countries
		  Vokalia and Consonantia, there live the blind texts.
		</p>
		<p><a href="#" class="learn-more">Read more</a></p>
	  </div>
	</div>

	<div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
	  <div class="box-feature mb-4">
		<span class="flaticon-house-4 mb-4 d-block"></span>
		<h3 class="text-black mb-3 font-weight-bold">
		  Quality Properties
		</h3>
		<p class="text-black-50">
		  Far far away, behind the word mountains, far from the countries
		  Vokalia and Consonantia, there live the blind texts.
		</p>
		<p><a href="#" class="learn-more">Read more</a></p>
	  </div>
	</div>
	<div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
	  <div class="box-feature mb-4">
		<span class="flaticon-building mb-4 d-block-3"></span>
		<h3 class="text-black mb-3 font-weight-bold">Top Rated Agent</h3>
		<p class="text-black-50">
		  Far far away, behind the word mountains, far from the countries
		  Vokalia and Consonantia, there live the blind texts.
		</p>
		<p><a href="#" class="learn-more">Read more</a></p>
	  </div>
	</div>
	<div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
	  <div class="box-feature mb-4">
		<span class="flaticon-house mb-4 d-block"></span>
		<h3 class="text-black mb-3 font-weight-bold">
		  Property for Sale
		</h3>
		<p class="text-black-50">
		  Far far away, behind the word mountains, far from the countries
		  Vokalia and Consonantia, there live the blind texts.
		</p>
		<p><a href="#" class="learn-more">Read more</a></p>
	  </div>
	</div>
	<div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
	  <div class="box-feature mb-4">
		<span class="flaticon-house-1 mb-4 d-block-1"></span>
		<h3 class="text-black mb-3 font-weight-bold">House for Sale</h3>
		<p class="text-black-50">
		  Far far away, behind the word mountains, far from the countries
		  Vokalia and Consonantia, there live the blind texts.
		</p>
		<p><a href="#" class="learn-more">Read more</a></p>
	  </div>
	</div>
  </div>
</div>
</div>

<div class="section sec-testimonials">
	<div class="container">
	  <div class="row mb-5 align-items-center">
		<div class="col-md-6">
		  <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
			Veja o que nossos clientes dizem
		  </h2>
		</div>
		<div class="col-md-6 text-md-end">
		  <div id="testimonial-nav">
			<span class="prev" data-controls="prev">Anterior</span>

			<span class="next" data-controls="next">Próximo</span>
		  </div>
		</div>
	  </div>

	  <div class="row">
		<div class="col-lg-4"></div>
	  </div>
	  <div class="testimonial-slider-wrap">
		<div class="testimonial-slider">
		  @foreach($comentarios as $comment)
		  <div class="item">
			<div class="testimonial">
			  <img
				src="{{ $comment->foto_user }}"
				alt="Image"
				class="img-fluid rounded-circle w-25 mb-4"
			  />
			  <div class="rate">
				@for($i=0; $i<$comment->estrelas; $i++)
				<span class="icon-star text-warning"></span>
				
				@endfor
			  </div>
			  <h3 class="h5 text-primary mb-4">{{ $comment->name_user }} {{ $comment->lastname_user }}</h3>
			  <blockquote>
				<p>
				  &ldquo;{{ $comment->conteudo }}&rdquo;
				</p>
			  </blockquote>
			  <p class="text-black-50">
				@if($comment->tipo==6)
				Cliente
				@endif
				@if($comment->tipo==5)
				Senhorio
				@endif
			  </p>
			</div>
		  </div>
		  @endforeach

		</div>
	  </div>
	</div>
  </div>
@endsection
