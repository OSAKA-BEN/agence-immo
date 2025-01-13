@extends('admin.admin')

@section('content')

@section('title', 'Liste des biens')

<div class="d-flex justify-content-between align-items-center">
  <h1>Liste des biens</h1>
  <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouter un bien</a>
</div>

  <table class="table table-striped">
      <thead>
          <tr>
              <th>Titre</th>
              <th>Surface</th>
              <th>Prix</th>
              <th>Ville</th>
              <th class="text-end">Actions</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($properties as $property)
          <tr>
            <td>{{ $property->title }}</td>
            <td>{{ $property->surface }} m²</td>
            <td>{{ number_format($property->price, thousands_separator: ' ') }} €</td>
            <td>{{ $property->city }}</td>
            <td class="text-end">
              <a href="{{ route('admin.property.edit', $property->id) }}" class="btn btn-primary">Editer</a>
              <form action="{{ route('admin.property.destroy', $property->id) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Supprimer</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
  </table>

  {{ $properties->links() }}

@endsection