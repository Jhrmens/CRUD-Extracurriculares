@extends('layouts.app')

@section('content')
    <script>
        function ResetCampos(){for(var o=document.getElementsByTagName("input"),e=0;e<o.length;e++)"text"==o[e].type&&(o[e].style.backgroundColor="",o[e].style.borderColor="")}function coresMask(o){var e=o.value,r=e.length,t=o.maxLength;0==r?(o.style.borderColor="",o.style.backgroundColor=""):r<t?(o.style.borderColor=corIncompleta,o.style.backgroundColor=corIncompleta):(o.style.borderColor=corCompleta,o.style.backgroundColor=corCompleta)}function mascara(o,e,r,t){var l=e.selectionStart,a=e.value;a=a.replace(/\D/g,"");var s=a.length,c=o.length;window.event?id=r.keyCode:r.which&&(id=r.which),cursorfixo=!1,l<s&&(cursorfixo=!0);var n=!1;if((16==id||19==id||id>=33&&id<=40)&&(n=!0),ii=0,mm=0,!n){if(8!=id)for(e.value="",j=0,i=0;i<c&&("#"==o.substr(i,1)?(e.value+=a.substr(j,1),j++):"#"!=o.substr(i,1)&&(e.value+=o.substr(i,1)),8==id||cursorfixo||l++,j!=s+1);i++);t&&coresMask(e)}cursorfixo&&!n&&l--,e.setSelectionRange(l,l)}var corCompleta="#99ff8f", corIncompleta="#C0C0C0";
   </script>
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card bg-transparent border-transparent">
                <div class="card-header text-white bg-dark border-transparent">Insira seu CPF para prosseguir</div>
                <div class="card-body">
                
                @if(session()->get('success'))
                    <div class="alert alert-danger">
                    {{ session()->get('success') }}  
                    </div><br />
                @endif
                @if(session()->get('done') && session()->get('id'))
                    <div class="alert alert-success">
                    {{ session()->get('done') }}
                    <br><a href="{{ route('cadastro.show',session()->get('id'))}}">Baixar requisição</a>                    
                    </div><br />
                @endif
                    <form action="{{ route('cadastro.create') }}" method="GET">
                    @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="cpf" name="cpf" onkeyup="mascara('###.###.###-##',this,event,true)" maxlength="14" placeholder="Somente Números">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                Prosseguir
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