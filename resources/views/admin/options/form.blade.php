@extends('admin.admin')

@section('title', $option->exists ? 'Editer une option' : 'Créer une option')

@section('content')

<h1>{{ $option->exists ? 'Editer une option' : 'Créer une option' }}</h1>

<form class="vstack gap-2" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post">
  @csrf
  @method($option->exists ? 'put' : 'post')

    @include('shared.input', ['class' => 'col', 'name' => 'name', 'label' => 'Nom', 'value' => $option->name])

  <div class="d-flex justify-content-between align-items-center">
    <button type="submit" class="btn btn-primary">{{ $option->exists ? 'Modifier' : 'Créer' }}</button>
    <a href="{{ route('admin.option.index') }}" class="btn btn-secondary">Annuler</a>
  </div>

</form>


@endsection