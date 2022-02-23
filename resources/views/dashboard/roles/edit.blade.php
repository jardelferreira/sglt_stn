@extends('adminlte::page')

@section('content')
<div class="container">
    <form action="{{route('dashboard.roles.update',['id' => $role->id])}}" method="post">
     @csrf
     @method('PUT')
        <div class="mb-3">
        <label for="name" class="form-label">Nome da Função</label>
          <input type="text" value="{{$role->name}}"
           class="form-control" name="name" id="name" aria-describedby="helpName" placeholder="">
          <small id="helpName" class="form-text text-muted">Informe o nome da Função</small>
        </div>
        <button type="submit" class="btn btn-primary">Salvar alterações</button>
    </form>
  </div>
@endsection 