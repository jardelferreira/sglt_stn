@extends('adminlte::page')

@section('title','funções')

@section('content_header')
    <h4>Adicionar funções - {{$user->name}} - <a name="" id="" class="btn btn-success btn-sm" href="{{route('dashboard.roles.create')}}" role="button">Criar nova Permissão- <i class="fa fa-plus" aria-hidden="true"></i></a></h4>
@stop

@section('content')

@if (count($roles))
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>funções</th>
            </tr>
            </thead>
            <tbody>
                <form action="" method="post">
                    @csrf
                    @method('POST')
               @foreach ($roles as $item)
               <tr>
                   <td>
                       <div class="form-check">
                           <input class="form-check-input" @if(in_array($item->id,$user_roles))
                               checked
                           @endif
                           name="{{$item->id}}" id="{{$item->id}}" type="checkbox" value="{{$item->id}}" aria-label="Permissão">
                        </div>
                    </td>
                    <td scope="row">{{$item->name}}</td>
               </tr>
               @endforeach
            </tbody>
        </form>
    </table>
               @else
                   <p>Não há funções para listagem</p>
               @endif
@endsection
