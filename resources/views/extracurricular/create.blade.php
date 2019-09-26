@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card bg-transparent border-transparent">
                <div class="card-header text-white bg-dark border-transparent">Cadastrar nova extracurricular</div>
                    <div class="card-body">
                    @if(session()->get('error'))
                    <div class="alert alert-danger">
                    {{ session()->get('error') }}  
                    </div><br />
                    @endif
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}  
                    </div><br />
                    @endif
                    <form action="{{ route('extracurricular.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="dependente">Aula *</label>
                        <input type="text" class="form-control" name="aula" id="aula" placeholder="Computação 10h">
                    </div>
                    <div class="form-group">
                        <label for="dependente">Vagas *</label>
                        <input type="number" class="form-control" name="vagas" id="vagas" placeholder="Quantidade de vagas">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                                Cadastrar
                        </button>
                    </div>
                    </form>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection