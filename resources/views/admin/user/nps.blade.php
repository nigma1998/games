@extends('layouts.admin')
@section('content')

@include('inc.message')

<a href="{{ route('admin.nps.create') }}">Добавить нового nps</a>




        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Имя</th>
              <th scope="col">Картинка</th>
              <th scope="col">время</th>
              <th scope="col">опыт</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            <tr>
@forelse($npsList as $npsLis)
              <td>{{$npsLis->id}}</td>
              <td>{{$npsLis->product_name}}</td>

              <td> <img src="{{ Storage::url($npsLis->image_url)}}" width='68' height='68'> </td>

              <td>{{$npsLis->total_time}}</td>
              <td>{{$npsLis->exp}}</td>
              <td> <a href="{{ route('admin.nps.edit', ['np'=> $npsLis->id]) }}">редактирование</a></td>
            </tr>
@empty
@endempty
@endsection
