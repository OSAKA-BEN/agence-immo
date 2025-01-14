@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')

@section('content')

<div class="container py-4">
<h1>{{ $property->exists ? 'Editer un bien' : 'Créer un bien' }}</h1>

<form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method($property->exists ? 'put' : 'post')

  <div class="row">
    <div class="col" style="flex: 100">
    <div class="row">
    @include('shared.input', ['class' => 'col', 'name' => 'title', 'label' => 'Titre', 'value' => $property->title])
    <div class="col row">
      @include('shared.input', ['class' => 'col', 'name' => 'surface', 'value' => $property->surface])
      @include('shared.input', ['class' => 'col', 'name' => 'price', 'label' => 'Prix', 'value' => $property->price])
    </div>
  </div>

  @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'name' => 'description', 'value' => $property->description])

  <div class="row">
    @include('shared.input', ['class' => 'col', 'name' => 'rooms', 'label' => 'Nombre de pièces', 'value' => $property->rooms])
    @include('shared.input', ['class' => 'col', 'name' => 'bedrooms', 'label' => 'Nombre de chambres', 'value' => $property->bedrooms])
    @include('shared.input', ['class' => 'col', 'name' => 'floor', 'label' => 'Etage', 'value' => $property->floor])
  </div>

  <div class="row">
    @include('shared.input', ['class' => 'col', 'name' => 'city', 'label' => 'Ville', 'value' => $property->city])
    @include('shared.input', ['class' => 'col', 'name' => 'address', 'label' => 'Adresse', 'value' => $property->address])
    @include('shared.input', ['class' => 'col', 'name' => 'postal_code', 'label' => 'Code postal', 'value' => $property->postal_code])
  </div>

    @include('shared.select', ['name' => 'options', 'label' => 'Options', 'value' => $property->options()->pluck('id'), 'multiple' => true, 'options' => $options])
    @include('shared.checkbox', ['name' => 'sold', 'label' => 'Vendu', 'value' => $property->sold])

    <div class="d-flex justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary">{{ $property->exists ? 'Modifier' : 'Créer' }}</button>
        <a href="{{ route('admin.property.index') }}" class="btn btn-secondary">Annuler</a>
      </div>
    </div>

    <div class="col vstack gap-2" style="flex: 25">
      @foreach ($property->pictures as $picture)
      <div id="picture{{ $picture->id }}" class="position-relative">
        <img src="{{ $picture->getImageUrl() }}" alt="{{ $picture->filename }}" class="img-fluid">
        <button type="button" class="btn btn-danger position-absolute bottom-0 w-100 start-0" hx-delete="{{ route('admin.picture.destroy', $picture) }}" hx-target="#picture{{ $picture->id }}" hx-swap="delete">
          <span class="htmx-indicator spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Delete
        </button>
      </div>
      @endforeach
      @include('shared.upload', ['name' => 'pictures', 'label' => 'Images', 'multiple' => true])
    </div>
  </div>
</form>
</div>

@endsection