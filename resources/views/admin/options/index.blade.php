@extends('admin.admin')

@section('content')

@section('title', 'Toutes les options des biens')

<div class="d-flex justify-content-between align-items-center">
  <h1>Liste des options</h1>
  <a href="{{ route('admin.option.create') }}" class="btn btn-primary">Ajouter une option</a>
</div>

  <table class="table table-striped">
      <thead>
          <tr>
              <th>Nom</th>
              <th class="text-end">Actions</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($options as $option)
          <tr>
            <td>{{ $option->name }}</td>
            <td class="text-end">
              <a href="{{ route('admin.option.edit', $option->id) }}" class="btn btn-primary">Editer</a>
              <form action="{{ route('admin.option.destroy', $option->id) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Supprimer</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
  </table>

  {{ $options->links() }}

@endsection