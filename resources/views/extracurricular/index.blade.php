@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-transparent border-transparent">
                <div class="card-header text-white bg-dark border-transparent">Listagem extracurriculares</div>
<table class="table table-dark">  
    <thead>
                            <tr>
                            <td class="bg-success">Aula</td>
                            <td class="bg-success">Vagas totais</td>
                            <td class="bg-success">cadastrados</td>
                            <td class="bg-success">#</td>
                            <td class="bg-success"></td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($extracurriculares->sortBy('aula') as $extracurricular)
                            <tr>
                            <td >{{$extracurricular->aula}}</td>
                            <td >{{$extracurricular->vagas}}</td>
                            <td>{{ $extracurricular->cadastros_count }}</td>
                            <td><a href="{{ route('extracurricular.show',$extracurricular->id)}}" class="btn btn-success">Alunos</a></td>
                            <td><a href="{{ route('extracurricular.edit',$extracurricular->id)}}" class="btn btn-secondary">Editar</a></td>
                            </tr>
                        @endforeach
                        </tbody>
 </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection