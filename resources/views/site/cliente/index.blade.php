@extends('layouts.site.body')
@section('conteudo')
<main class="container mt-5">
    <section class="gradient-custom-2">
        <div class="">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row"
                            style="background-color: #000; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="assets/images/user/avatar-2.jpg"
                                    alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                    style="width: 150px; z-index: 1">

                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5>{{Auth::user()->name}}</h5>

                            </div>
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">

                            <!-- Anúncios criados -->
                            <div class="card-body p-4 text-black mt-5">
                                <div class="d-flex  justify-content-center mb-4">
                                    <p class="lead fw-normal mb-0 text-center" style="text-align: center">Anúncios criados</p>
                                </div>
                                <div class="col-10 col-md-3  col-lg-3 post-transport">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-rent" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Postar um transporte
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Postar um transporte</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('site.carro.store')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @include('admin.carros.form')
                                                        <div class="modal-footer">
                                                           <input type="submit" name="" id="" value="Postar">
                                                        </div>

                                            </form>
                                        </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Transportes -->
                                <section id="transport-list" class="d-flex container mt-3">

                                    <div class="row">
                                        @foreach ($carros as $carro)
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <img src="assets/images/carro.png" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{$carro->marca}} {{$carro->modelo}}</h4>
                                                        <p class="card-text">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="carac">
                                                                Combustível: <span class="gas">{{$carro->combustivel}}</span>
                                                            </span>

                                                            <span class="carac">
                                                                Km: <span class="km">34 000</span>
                                                            </span>
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                            <span class="carac">
                                                                Transmissão: <span class="transmission">{{$carro->tipo}}</span>
                                                            </span>

                                                            <span class="carac">
                                                                Região: <span class="region">{{$carro->provincia}}</span>
                                                            </span>
                                                        </div>
                                                        </p>
                                                        <div class="d-flex justify-content-between price-btn">
                                                            <h5 class="my-auto">{{$carro->preco}}</h5>

                                                            <button href="#" class="btn btn-rent">Alugar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach





                                    </div>


                                    </div>
                                </section>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

@if (session('eliminada'))
    <script>
        Swal.fire(
            'Movel Eliminado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('editada'))
<script>
    Swal.fire(
        'Movel editado com sucesso!',
        '',
        'success'
    )
</script>
@endif
@if (session('editada_f'))
<script>
Swal.fire(
    'ERro ao editar Movel!',
    '',
    'error'
)
</script>
@endif

@if (session('status'))
<script>
    Swal.fire(
        'Movel Cadastrado Com Sucesso!',
        '',
        'success'
    )
</script>
@endif
@if (session('status_f'))
<script>
Swal.fire(
    'Erro ao cadastrar Movel!',
    '',
    'success'
)
</script>
@endif
@endsection
