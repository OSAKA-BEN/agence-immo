@extends('base')

@section('title', 'Se Connecter')

@section('content')

    <div class="container mt-4">
      <h1>@yield('title')</h1>

      @include('shared.flash')

      <form action="{{ route('doLogin') }}" method="post" class="vstack gap-2">
        @csrf
        @include('shared.input', ['type' => 'email', 'name' => 'email', 'label' => 'Email'])
        @include('shared.input', ['type' => 'password', 'name' => 'password', 'label' => 'Mot de passe'])
        <button type="submit" class="btn btn-primary">Se connecter</button>
      </form>
    </div>

@endsection
