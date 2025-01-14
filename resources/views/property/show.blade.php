@extends('base')

@section('title', $property->title)

@section('content')

<div class="container py-4">
  <div class="row">
    <div class="col-8">
      <div id="carousel" class="carousel slide" data-bs-ride="carousel" style="max-width: 800px;">
        <div class="carousel-inner">
          @foreach ($property->pictures as $key => $picture)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
              <img src="{{ $picture->getImageUrl(800, 530) }}" class="d-block w-100" alt="{{ $picture->filename }}">
            </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    </div>
    <div class="col-4">
      <h1>{{ $property->title }}</h1>
      <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m2 - {{ $property->city }}</h2>
      <div class="text-primary" style="font-size: 4rem; font-weight: bold;">
          {{ number_format($property->price, thousands_separator: ' ') }} €
      </div>
      <hr />

    <div class="mt-4">
      <h4>Intéresse par ce bien ?</h4>

      @include('shared.flash')

      <form action="{{ route('property.contact', ['property' => $property->id]) }}" method="post" class="vstack gap-3">
        @csrf

        <div class="row">
          @include('shared.input', ['class' => 'col', 'name' => 'firstname', 'label' => 'Prénom'])
          @include('shared.input', ['class' => 'col', 'name' => 'lastname', 'label' => 'Nom'])
        </div>

        <div class="row">
          @include('shared.input', ['type' => 'tel', 'class' => 'col', 'name' => 'phone', 'label' => 'Téléphone'])
          @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email'])
        </div>

        @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'name' => 'message', 'label' => 'Message'])

        <div>
          <button type="submit" class="btn btn-primary">Nous contacter</button>
        </div>

      </form>
    </div>
    </div>
  </div>
   
    <div class="mt-4">
      <p>{!! nl2br($property->description) !!}</p>
      <div class="row">
        <div class="col-8">
          <h2>Caractéristiques</h2>
          <table class="table table-striped">
            <tr>
              <td>Surface habitable</td>
              <td>{{ $property->surface }} m²</td>
            </tr>
            <tr>
              <td>Pièces</td>
              <td>{{ $property->rooms }}</td>
            </tr>
            <tr>
              <td>Bedrooms</td>
              <td>{{ $property->bedrooms }}</td>
            </tr>
            <tr>
              <td>Etage</td>
              <td>{{ $property->floor ?: 'Rez-de-chaussée' }}</td>
            </tr>
            <tr>
              <td>Localisation</td>
              <td>
                {{ $property->address }}
                <br />
                {{ $property->city }} - {{ $property->postal_code }}
              </td>
            </tr>
          </table>
        </div>
        <div class="col-4">
          <h2>Spécificités</h2>
          <ul class="list-group">
            @foreach($property->options as $option)
              <li class="list-group-item">{{ $option->name }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

</div>

@endsection