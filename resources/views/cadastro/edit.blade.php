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
                    </div><br/>
                @endif
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}  
                    </div><br/>
                @endif
                    <form action="{{ route('cadastro.update', $cadastro->id) }}" method="POST">
                    @method('PATCH')
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
                        <input type="text" class="form-control" value="{{   $cadastro->dependente    }}" name="dependente" id="dependente" placeholder="Nome do estudante">
                    </div>
                    <div class="form-group">
                        <label for="extracurricular">Extracurriculares *</label>
                        <select class="form-control" id="extracurricular" name="extracurricular_id">
                        <option value="0" selected>------</option>
                        @foreach($extracurricular AS $extra)
                            
                            <option value="{{ $extra->id }}" @if($extra->id == $cadastro->extracurricular_id) selected @endif>{{ $extra->aula }}</span></option>
                            
                        @endforeach
                        </select>
                        <select class="form-control" id="extracurricular2" name="extracurricular_id2">
                        <option value="0" selected>------</option>
                        @foreach($extracurricular AS $extracurricular2)
                            
                            <option value="{{ $extracurricular2->id }}" @if($extracurricular2->id == $cadastro->extracurricular_id2) selected @endif>{{ $extracurricular2->aula }}</span></option>
                            
                        @endforeach
                        </select>
                        <select class="form-control" id="extracurricular3" name="extracurricular_id3">
                        <option value="0" selected>------</option>
                        @foreach($extracurricular AS $extracurricular3)
                            
                            <option value="{{ $extracurricular3->id }}" @if($extracurricular3->id == $cadastro->extracurricular_id3) selected @endif>{{ $extracurricular3->aula }}</span></option>
                            
                        @endforeach
                        </select>
                        <select class="form-control" id="extracurricular4" name="extracurricular_id4">
                        <option value="0" selected>------</option>
                        @foreach($extracurricular AS $extracurricular4)
                            
                            <option value="{{ $extracurricular4->id }}" @if($extracurricular4->id == $cadastro->extracurricular_id4) selected @endif>{{ $extracurricular4->aula }}</span></option>
                            
                        @endforeach
                        </select>
                        <select class="form-control" id="extracurricular5" name="extracurricular_id5">
                        <option value="0" selected>------</option>
                        @foreach($extracurricular AS $extracurricular5)
                            
                            <option value="{{ $extracurricular5->id }}" @if($extracurricular5->id == $cadastro->extracurricular_id5) selected @endif>{{ $extracurricular5->aula }}</span></option>
                             
                        @endforeach
                        </select>
                    </div>                   
                    <div class="form-group">
                        <label for="serie">Série *</label>
                        <input type="text" value="{{    $cadastro->serie    }}" class="form-control" name="serie" id="serie" placeholder="Exemplo: 3 Serie D">
                    </div>
                    <div class="form-group form-check">
                        <input type="radio" name="integral" value="1" @if($cadastro->integral == 1) checked @endif> Aluno faz integral<br>
                        <input type="radio" name="integral" value="0" @if($cadastro->integral == 0) checked @endif> Aluno não faz integral
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                                Atualizar
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
