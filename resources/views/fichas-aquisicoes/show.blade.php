@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <div class="align-baseline">
            <a href="{{url('usuarios/'.$usuario->id.'/fichas-aquisicoes')}}" class="btn btn-circle"><i class="fas fa-chevron-circle-left"></i></a>
            <h4 class="card-title">
                {{$usuario->nome}} - Ficha de Aquisição
                <span class="badge badge-pill badge-danger">Ficha Inativa</span>
            </h4>
        </div>
        
    </div>
    <div class="card-body">
        
        <form action="">
        <input type="hidden" name="ficha" value="{{$ficha->id}}">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Data de Criação</label>
                <input class="form-control" type="date" disabled value="{{ $ficha->data_criacao }}">
            </div>
            <div class="form-group col-md-6">
                <label for="">Valido Até</label>
                <input class="form-control" type="date" disabled value="{{ $ficha->valido_ate }}">
            </div>
        </div>
        <h5 class="mb-2 font-weight-bold text-primary">Indicadores do Usuário</h5>
            @foreach($ficha->getItensIndicadoresUsuarios() as $item)            
            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" id="item{{$item->getAquisicao()->id}}" 
                    name="item{{$item->getAquisicao()->id}}" disabled {{ $item->atende ? 'checked' : '' }}>
                <label class="custom-control-label" for="item{{$item->getAquisicao()->id}}">{{$item->getAquisicao()->nome}}</label>
            </div>
            @endforeach

        <h5 class="mb-2 mt-3 font-weight-bold text-primary">Indicadores da Família</h5>
            @foreach($ficha->getItensIndicadoresFamiliares() as $item)            
            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" id="item{{$item->getAquisicao()->id}}" 
                    name="item{{$item->getAquisicao()->id}}" disabled {{ $item->atende ? 'checked' : '' }}>
                <label class="custom-control-label" for="item{{$item->getAquisicao()->id}}">{{$item->getAquisicao()->nome}}</label>
            </div>
            @endforeach
            <div class="row mt-5">
                <div class="col">
                    <a href="{{url('usuarios/'.$usuario->id.'/fichas-aquisicoes/')}}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection