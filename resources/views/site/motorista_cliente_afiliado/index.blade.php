@extends('layouts.admin.index')
@section('conteudo')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Perfil </h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<div class="col-xl-12">
    <div class="card">
        <div class="card-header " style="display: flex;justify-content: space-between">
            <div>
                <h4>Seus dados</h4>
            </div>
            <div>
                <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather icon-plus"></i>
                </button>
            </div>
        </div>
        <div>

        </div>
        <div>


        </div>
        <div class="card-body table-border-style">
            <div class="">
                <table class="table table-striped col-md-12 col-sm-12">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            {{-- <th>Pagamento</th> --}}
                            <th>Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>{{Auth::user()->id}}</td>
                            <td>
                                {{Auth::user()->name}}
                            </td>
                            <td>{{Auth::user()->email}}</td>
                            <td>
                               Telefone
                            </td>
                            {{-- <td>
                                @if (Auth::user()->pagamento==0)
                                Pendente
                                @elseif (Auth::user()->pagamento==1)
                                    Realizado
                                @else
                                    Não Realizado
                                @endif
                            </td> --}}

                            <td><div class="btn-group card-option">
                                <button type="button" class="btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">

                                     <li class="dropdown-item -"><a data-toggle="modal" data-target="#exampleModal{{Auth::user()->id ?? ''}}" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Editar</a></li>
                                    <li class="dropdown-item "><a href="{{route('site.user.delete', Auth::user()->id ?? '')}}"><i class="feather icon-trash"></i> Eliminar</a></li>
                                </ul>
                            </div></td>
                        </tr>
                        <div class="modal fade" id="exampleModal{{Auth::user()->id ?? ''}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{Auth::user()->marca}} {{Auth::user()->modelo}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('site.user.update', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @include('Perfil_Motorista_Afiliado_Cliente.user.form')
                                            <div class="modal-footer">
                                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Fechar</button>
                                                <button  class="btn  btn-primary" id="ajaxSubmit" >Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                 


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

{{-- Cadastrar user --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('site.user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('Perfil_Motorista_Afiliado_Cliente.user.form')

                    <div class="modal-footer">
                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                        <button  class="btn  btn-primary" id="ajaxSubmit" >Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Editar user --}}
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

@if (session('eliminada'))
    <script>
        Swal.fire(
            'Sub-Categoria Eliminado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('editada'))
<script>
    Swal.fire(
        'Sub-Categoria editado com sucesso!',
        '',
        'success'
    )
</script>
@endif
@if (session('editada_f'))
<script>
Swal.fire(
    'ERro ao editar Sub-Categoria!',
    '',
    'error'
)
</script>
@endif

@if (session('status'))
<script>
    Swal.fire(
        'Sub-Categoria cadastrada Com Sucesso!',
        '',
        'success'
    )
</script>
@endif
@if (session('status_f'))
<script>
Swal.fire(
    'Erro ao cadastrar Sub-Categoria!',
    '',
    'error'
)
</script>
@endif



@endsection