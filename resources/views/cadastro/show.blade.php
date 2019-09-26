<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Ficha de inscrição {{$cadastro->dependente}}</title>
</head>
<body>
	<h1><center>Ficha de inscrição Extracurricular</center></h1>
	<p><center>REQUERIMENTO DE MATRÍCULA EM ATIVIDADE EXTRACURRICULAR<br>2019 - 2° SEMESTRE</center></p>
  <br><br>
    <table class="table table-borderless">
      <thead>
        <tr>
          <th scope="col"><h5>Cooperado: {{ $cooperado->nome  }}<h5></th>
          <th scope="col"><h5>CPF: {{$cooperado->cpf}}</h5></th>
        </tr>
      </thead>
    </table>
    <table class="table table-borderless">
      <thead>
        <tr>
          <th scope="col">Dependente: {{$cadastro->dependente}}</th>
          <th scope="col">Série: {{$cadastro->serie}}</th>
          <th scope="col">Faz integral: @if($cadastro->integral == 1) Sim @else Não @endif</th>
        </tr>
      </thead>
    </table><br><br>
  <h4><center>Extracurriculares<center></h4>
    <table class="table table-sm">
      <tbody>
      <tr>
        @foreach($extracurricular as $extra)
          @if($extra->id == $cadastro->extracurricular_id)
          <td><h5>{{$extra->aula}}<h5></td>
          @endif          
        @endforeach
      </tr>
      @if($cadastro->extracurricular_id2 != null)
      <tr>
      @foreach($extracurricular as $extra)
          @if($extra->id == $cadastro->extracurricular_id2)
          <td><h5>{{$extra->aula}}<h5></td>
          @endif
        @endforeach
      </tr>
      @endif
      @if($cadastro->extracurricular_id3 != null)
      <tr>
      @foreach($extracurricular as $extra)
          @if($extra->id == $cadastro->extracurricular_id3)
          <td><h5>{{$extra->aula}}<h5></td>
          @endif
        @endforeach
      </tr>
      @endif
      @if($cadastro->extracurricular_id4 != null)
      <tr>
      @foreach($extracurricular as $extra)
          @if($extra->id == $cadastro->extracurricular_id4)
          <td><h5>{{$extra->aula}}<h5></td>
          @endif
        @endforeach
      </tr>
      @endif
      @if($cadastro->extracurricular_id5 != null)
      <tr>
        @foreach($extracurricular as $extra)
          @if($extra->id == $cadastro->extracurricular_id5)
          <td><h5>{{$extra->aula}}<h5></td>
          @endif
        @endforeach
      </tr>   
      @endif  
    </tbody>
  </table>
  <br><br>
    <p>Declaro que estou ciente das regras de matrícula e de pagamentos das atividades extracurriculares conforme divulgadas pela Educativa, bem como das obrigações decorrentes, que serão quitadas mediante boletos a serem emitidos de acordo com este requerimento eas matrículas que forem efetivadas.</p>    
    <br>
    <span><center>Assinatura do cooperado<center></span>
    <center>___________________________________________<center>
</body>
</html>