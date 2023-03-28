@extends('layouts.site.index')
@section('conteudo')
  <!--================Home Banner Area =================-->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
            <h2>Carros</h2>
            <p>Very us move be blessed multiply night</p>
          </div>
          <div class="page_link">
            <a href="index.html">Home</a>
            <a href="category.html">Carros</a>
            <a href="category.html">Women Fashion</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!--================Category Product Area =================-->
  <section class="cat_product_area section_gap">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-9">
          <div class="product_top_bar">
            <div class="left_dorp">
             <form action="">
              @csrf
              <div class="row">
           <div class="col-6">
            <select name="" id="">
              <option value="" class="form-control">Selecione uma Categoria</option>
             </select>
           </div>
            
           <div class="col-6">
           <select name="" id="">
            <option value="">Selecione uma subcategoria</option>
           </select>
           </div>
          </div>
             </form>
            </div>
          </div>
          
          <div class="latest_product_inner">
            <div class="row">
              @foreach ($carros as $carro)
                  
              
              <div class="col-lg-4 col-md-6">
                <div class="single-product">
                  <div class="product-img">
                    <img
                      class="card-img"
                      src="{{$carro->vc_path}}"
                      alt=""
                    />
                    
                  </div>
                  <div class="product-btm">
                    <a href="#" class="d-block">
                      <h4>{{ $carro->name }}</h4>
                    </a>
                    <div class="mt-3">
                      <span class="mr-4">{{ $carro->preco }}kz/m</span>
                     
                    </div>
                    <div  style="color:black" > <a class="btn btn-success">Alugar</a>  <a class="btn btn-primary">Detalhes</a></div>
                  </div>
                </div>
              </div>
              @endforeach

             </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</section>
                   <!--================End Category Product Area =================-->


@endsection
