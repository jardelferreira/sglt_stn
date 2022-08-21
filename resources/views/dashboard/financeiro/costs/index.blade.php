@extends('adminlte::page')

@section('title','Centros de custo')

@section('content_header')
    <h1>Listagem de Centros de custo  -  <a name="" id="" class="btn btn-success" href="{{route('dashboard.costs.create')}}" role="button">Criar novo - <i class="fa fa-plus" aria-hidden="true"></i></a></h1>
@stop

@section('content')
@if (count($costs))
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>Centros de custo</th>
                <th>Projeto</th> 
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
               @foreach ($costs as $item)
               <tr>
                   <td scope="row">{{$item->name}}</td>
                   <td scope="row">{{$item->project->name}}</td>
                   <td class="btn-group" role="group">
                       <a class="btn btn-info btn-sm mr-1" href="{{route('dashboard.costs.edit',$item)}}" >Editar</a>
                        <form action="{{route('dashboard.costs.destroy',['id' => $item->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                        </form>
                    </td>
               </tr>
               @endforeach
            </tbody>
    </table>
               @else
                   <p>Não há Centros de custo para listagem</p>
               @endif
@endsection
