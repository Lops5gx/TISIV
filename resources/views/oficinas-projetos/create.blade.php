@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header">
        <div class="align-baseline">   
            <a href="{{url('oficinas-projetos/')}}" class="btn btn-circle"><i class="fas fa-chevron-circle-left"></i></a> 
            <h4 class="card-title">Nova Oficina de Projeto</h4>
        </div>
        
    </div>
    <div class="card-body">
        <form action="{{url('oficinas-projetos')}}" method="post" onsubmit="return validaForm(this);">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" onfocusout="validaInputNome(this)" placeholder="Nome da Oficina">
                </div>
                <div class="form-group col-md-4">
                    <label for="projeto">Projeto</label>
                    <select class="form-control" name="projeto" onfocusout="validaSelectProjeto(this)" >
                        <option value="">-- Selecione o Projeto --</option>
                        @foreach($projetos as $projeto)
                            <option value="{{$projeto->id}}">{{$projeto->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="local">Local</label>
                    <input type="text" class="form-control" name="local" onfocusout="validaInputLocal(this)" placeholder="Local">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cargaHoraria">Carga Horária</label>
                            <input type="number" class="form-control" name="cargaHoraria">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="percentualMinimoFrequencia">Frequência Mínima %</label>
                            <input type="number" class="form-control" name="percentualMinimoFrequencia">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inicio">Início</label>
                            <input type="date" class="form-control" name="inicio" onfocusout="validaInputDataInicio(this)" value="{{date('Y-m-d')}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fim">Fim</label>
                            <input type="date" class="form-control" name="fim" onfocusout="validaInputDataFim(this)" value="{{date('Y-m-d', strtotime('+3 month'))}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="ementa">Ementa da Oficina</label>
                    <textarea name="ementa" class="form-control" cols="30" rows="10"></textarea>
                </div>
            </div>
            
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ url('oficinas-projetos')}}" class="btn btn-primary">Voltar</a>            
        </form>
    </div>
</div>

@endsection

@section('script')
<script>
    const invalid = 'is-invalid';

    function validaInputNome (input) {
        if (input.value <= 0) {
            input.classList.add(invalid);     
            return false;       
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaInputLocal (input) {
        if (input.value <= 0) {
            input.classList.add(invalid);     
            return false;       
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaSelectProjeto (select) {
        if (select.value == "") {
            select.classList.add(invalid);
            return false;
        }
        else {
            select.classList.remove(invalid);
            return true;
        }
    }

    function validaInputDataInicio (input) {
        if (input.value == "") {
            input.classList.add(invalid);
            return false;
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaInputDataFim (input) {
        let inputInicio = document.getElementById('inputDataInicio');
        if ( input.value == "" ) {
            input.classList.add(invalid);
            return false;
        }
        else if ( !validaData(inputInicio.value, input.value)) {
            input.classList.add(invalid);
            return false;
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaData(inicio, fim){
        let dInicio = new Date(inicio);
        let dFim = new Date(fim);
        return dInicio <= dFim;
    }

    function validaForm(form){
        let nomeOK = validaInputNome( form.elements.namedItem('nome') );
        let programaOk = validaSelectPrograma(form.elements.namedItem('programa'));
        let dataInicioOK = validaInputDataInicio(form.elements.namedItem('inicio'));
        let dataFimOK = validaInputDataFim(form.elements.namedItem('fim'));
        console.log('Nomeok: ' + nomeOK);
        console.log('programaOk: ' + programaOk);
        console.log('dataInicioOK: ' + dataInicioOK);
        console.log('dataFimOK: ' + dataFimOK);

        if ( nomeOK && programaOk && dataInicioOK && dataFimOK ){
            return true;
        }
        else {
            alert("Exitem campos inválidos. Verifique por favor!");
            return false;
        };
        
    }
</script>
@endsection