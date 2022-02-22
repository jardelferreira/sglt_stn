@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cadastro de permissões	</h1>
@stop

@section('content')
    <form action="{{route('dashboard.permissions.store')}}" method="post" autocomplete="off">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="name">Permissão</label>
          <input type="text" autocomplete="off" class="form-control" name="name" id="name" aria-describedby="'helpName'" placeholder="nome do usuário">
          <small id="'helpName'" class="form-text text-muted">Insira o nome do permissão</small>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop