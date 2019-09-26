@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
        @if(session()->get('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}  
            </div>
        @endif
            <div class="card bg-transparent border-transparent">
                <div class="card-header text-white bg-success border-transparent">Cadastrados</div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Aluno</th>
                        <th scope="col">Série</th>
                        <th scope="col">Integral</th>
                        </tr>
                    </thead>
                    <tbody>
                    @dd(get_defined_vars())
                    @foreach($cadastros as $cadastro)
                        @if($cadastro->extracurricular_id == $extracurriculares->id || $cadastro->extracurricular_id2 == $extracurriculares->id || $cadastro->extracurricular_id3 == $extracurriculares->id || $cadastro->extracurricular_id4 == $extracurriculares->id || $cadastro->extracurricular_id5 == $extracurriculares->id)
                        <tr>
                                    <td>{{ $cadastro->dependente }}</td>
                                    <td>{{ $cadastro->serie }}</td>
                                    <td>@if($cadastro->integral == 1) Sim @else Nao @endif</td>
                                    <td><a href="{{ route('cadastro.edit',$cadastro->id)}}" class="btn btn-primary">Editar</a></td>                                
                                    <td><a href="{{ route('cadastro.show',$cadastro->id)}}" class="btn btn-danger">Requisição</a></td>                                
                        </td>
                        </tr>
                        @endif
                    @endforeach                    
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection