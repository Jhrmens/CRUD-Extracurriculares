@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
        @if(session()->get('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}  
            </div><br />
        @endif
            <div class="card bg-transparent border-transparent">
                <div class="card-header text-white bg-success border-transparent">Resultado da pesquisa</div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Aluno</th>
                        <th scope="col">Série</th>
                        <th scope="col">Integral</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cadastro as $cadastro)                    
                    <tr>
                                <td>{{ $cadastro->dependente }}</td>
                                <td>{{ $cadastro->serie }}</td>
                                <td>@if($cadastro->integral == 1) Sim @else Nao @endif</td>
                                <td><a href="{{ route('cadastro.edit',$cadastro->id)}}" class="btn btn-primary">Editar</a></td>                                
                                <td><a href="{{ route('cadastro.show',$cadastro->id)}}" class="btn btn-danger">Requisição</a></td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection