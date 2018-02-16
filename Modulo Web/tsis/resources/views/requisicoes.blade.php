@extends('adminlte::page')

@section('title', 'Seções')

@section('content_header')
    <h1>Contratos</h1>
@stop

@section('content' )
<div ng-app="myApp">
    <div ng-controller="myCtrl">
    <input type="text" class="form-control" id="search" aria-describedby="emailHelp" placeholder="Pesquisar" ng-change="myFunc()" ng-model="myValue">
    </div>


    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">

        function atualizar(sel,id)
        {
            $.post( "/admin/contratos/update", { status: sel, id:id})
                .done(function( data ) {

                    if(data.retorno == "OK"){

                        alert("Status alterado com sucesso.");

                    }else{
                        alert("ERROR");
                    }
                });

        }


        $( "#search" ).change(function() {

            var valor = document.getElementById("search").value;
            $.post( "/admin/contratos/search", { search: valor})
                .done(function( data ) {


                    x = document.getElementById("tbody")
                    x.innerHTML =  "";



                    if(data.retorno != "NO"){

                        var x = document.getElementById("mySelect");
                        var option = document.createElement("option");
                        var contratos = [];
                        $.each(data, function(index, value) {
                            contratos.push(value.usuario.name);

                            var table = document.getElementById("myTable");
                            var row = table.insertRow(-1);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            var cell6 = row.insertCell(5);
                            var cell7 = row.insertCell(6);
                            var cell8 = row.insertCell(7);
                            cell1.innerHTML = value.usuario.name;
                            cell2.innerHTML = value.modelo.modelo;
                            cell3.innerHTML = value.created_at;
                            cell4.innerHTML = value.nome_secao.nomeSecao;
                            cell5.innerHTML = value.nome_pdf.nomePdf;
                            cell6.innerHTML = '<select id="selectAjax" class="form-control" >\n' +
                                '                        <option disabled selected value>Original : </option>\n' +
                                '                        <option id="1" value="Aprovado">Aprovado</option>\n' +
                                '                        <option id="2" value="Negado">Negado</option>\n' +
                                '                        <option id="3" value="Aguardando">Aguardando</option>\n' +
                                '                    </select>';
                            cell7.innerHTML = '<button type="button" id="deletar"  class="btn btn-info">Excluir</button>';


                            cell6.addEventListener("change", function(data) {
                                var status = $("#selectAjax option:selected").text();
                                atualizar(status,value.id_contrato);
                            });

                            cell7.addEventListener("click", function(event) {
                                deletar(value.id_contrato);
                            });

                        });



                    }else{

                    }
                });
        });

        function deletar(id){


            var jqxhr = $.ajax( "/admin/contratos/"+id )
                .done(function(data) {
                    if(data.retorno == "OK"){

                        $( "#status" ).slideUp( "slow", function() {});
                        alert("Contrato deletado com sucesso.");

                    }else{
                        alert("ERROR");
                    }
                })
                .fail(function() {
                    alert( "error" );
                })

        }

    </script>





    <table class="table" id="myTable">
        <thead>
        <tr>

            <th scope="col">Supervisor</th>
            <th scope="col">Tipo</th>
            <th scope="col">Data</th>
            <th scope="col">Seção</th>
            <th scope="col">Formulário</th>
            <th scope="col">Status</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody id="tbody" >

        @forelse($contratos as $row)
            <tr id="status">
                <td id="contratoNome">{{$row->usuario->name}}</td>
                <td id="contratoModelo">{{$row->modelo->modelo}}</td>
                <td id="contratoData">{{$row->created_at}}</td>
                <td id="contratoSecao">{{$row->nomeSecao->nomeSecao}}</td>
                <td id="contratoPdf"><a href="{{$row->nomePdf->nomePdf}}"><img src="http://tcc2017.com.br/renato/Imagens/pdf.png" style="height:50px;width: 50px;"></a> </td>
                <td id="statusContrato"><select class="form-control" onchange="atualizar(this.value,{{$row->id_contrato}})">
                        <option disabled selected value>Original : {{$row->status}}</option>
                        <option value="Aprovado">Aprovado</option>
                        <option value="Negado">Negado</option>
                        <option value="Aguardando">Aguardando</option>
                    </select></td>
                <td><a href=""><button type="button" onclick="deletar({{$row->id_contrato}})"  class="btn btn-info">Excluir</button></a></td>

            </tr>

        @empty
            <p>Sem contratos</p>

        @endforelse

        </tbody>
    </table>
</div>

@stop
