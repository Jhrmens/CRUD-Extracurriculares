@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card bg-transparent border-transparent">
                <div class="card-header text-white bg-dark border-transparent">Inscrição Extracurricular Educativa</div>
                    <div class="card-body">
                    @if(session()->get('error'))
                    <div class="alert alert-danger">
                    {{ session()->get('error') }}  
                    </div><br />
                @endif
                    <form action="{{ route('cadastro.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                        <label for="cooperado">Cooperado</label>
                        <input type="hidden" name="cooperado_id" value="{{ $cooperado->id }}">
                        <input type="text" class="form-control" value="{{ $cooperado->nome }}" readonly>
                        </div>
                        <div class="col">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" value="{{ $cooperado->cpf }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dependente">Dependente *</label>
                        <input type="text" class="form-control" name="dependente" id="dependente" placeholder="Nome do estudante">
                    </div>
                    <div class="form-group">
                        <label for="extracurricular">Extracurriculares *</label>
                        <select class="form-control" id="extracurricular" name="extracurricular_id">
                        <option value="0" selected>------</option>
                        @foreach($extracurricular->sortBy('aula') AS $extra)
                            @if($extra->cadastros_count >= $extra->vagas)
                            <option value="{{ $extra->id }}" disabled>{{ $extra->aula }} (LISTA DE ESPERA)</span></option>
                            @else
                            <option value="{{ $extra->id }}">{{ $extra->aula }}</span></option>
                            @endif 
                        @endforeach
                        </select>
                        <select class="form-control" id="extracurricular2" name="extracurricular_id2">
                        <option value="0" selected>------</option>
                        @foreach($extracurricular->sortBy('aula') AS $extracurricular2)
                            @if($extracurricular2->cadastros_count >= $extracurricular2->vagas)
                            <option value="{{ $extracurricular2->id }}" disabled>{{ $extracurricular2->aula }} (LISTA DE ESPERA)</span></option>
                            @else
                            <option value="{{ $extracurricular2->id }}">{{ $extracurricular2->aula }}</span></option>
                            @endif 
                        @endforeach
                        </select>
                        <select class="form-control" id="extracurricular3" name="extracurricular_id3">
                        <option value="0" selected>------</option>
                        @foreach($extracurricular->sortBy('aula') AS $extracurricular3)
                            @if($extracurricular3->cadastros_count >= $extracurricular3->vagas)
                            <option value="{{ $extracurricular3->id }}" disabled>{{ $extracurricular3->aula }}</span></option>
                            @else
                            <option value="{{ $extracurricular3->id }}">{{ $extracurricular3->aula }}</span></option>
                            @endif 
                        @endforeach
                        </select>
                        <select class="form-control" id="extracurricular4" name="extracurricular_id4">
                        <option value="0" selected>------</option>
                        @foreach($extracurricular->sortBy('aula') AS $extracurricular4)
                            @if($extracurricular4->cadastros_count >= $extracurricular4->vagas)
                            <option value="{{ $extracurricular4->id }}" disabled>{{ $extracurricular4->aula }}</span></option>
                            @else
                            <option value="{{ $extracurricular4->id }}">{{ $extracurricular4->aula }}</span></option>
                            @endif 
                        @endforeach
                        </select>
                        <select class="form-control" id="extracurricular5" name="extracurricular_id5">
                        <option value="0" selected>------</option>
                        @foreach($extracurricular->sortBy('aula') AS $extracurricular5)
                            @if($extracurricular5->cadastros_count >= $extracurricular5->vagas)
                            <option value="{{ $extracurricular5->id }}" disabled>{{ $extracurricular5->aula }}</span></option>
                            @else
                            <option value="{{ $extracurricular5->id }}">{{ $extracurricular5->aula }}</span></option>
                            @endif 
                        @endforeach
                        </select>
                    </div>                   
                    <div class="form-group">
                        <label for="serie">Série *</label>
                        <input type="text" class="form-control" name="serie" id="serie" placeholder="Exemplo: 3 Serie D">
                    </div>
                    <div class="form-group form-check">
                        <input type="radio" name="integral" value="1"> Aluno faz integral<br>
                        <input type="radio" name="integral" value="0"> Aluno não faz integral
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
<br><br>
@endsection