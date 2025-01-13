@extends('base')

@section('content')

<div class="bg-light p-5 mb-5 text-center">
  <div class="container">
    <h1>Agence lorem ipsum</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque maiores, distinctio aliquid temporibus repudiandae delectus unde similique incidunt error dolores exercitationem dicta suscipit placeat necessitatibus sit quibusdam. Aliquam non illo architecto dolores dolorem. Unde recusandae exercitationem, ad itaque quod eligendi libero optio vero eaque natus distinctio reiciendis hic odit nemo!</p>
  </div>
</div>

<div class="container">
  <h2>Nos derniers biens</h2>
  <div class="row">
    @foreach($properties as $property)
    <div class="col">
      @include('property.card')
    </div>
    @endforeach
  </div>
</div>

@endsection