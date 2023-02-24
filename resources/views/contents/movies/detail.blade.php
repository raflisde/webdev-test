@extends('layouts.page')

@section('title', 'Detail Movie')

@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
             <!-- Default box -->
      <div class="card">
        <div class="card-body row">
          <div class="col-6 text-center d-flex align-items-center justify-content-center">
            <div class="">
              <img style="height:530px; width:440px;" src="{{ asset('storage/movie-file/'.$movies->file) }}" alt="">
            </div>
          </div>
          <div class="col-6">
                <h4>{{ $movies->title }}</h4>
                <span class="badge badge-sm badge-info">{{ $movies->category->name }}</span>
            <hr>
            <span>Release on : {{ Carbon\Carbon::parse($movies->date_release)->format('d M Y') }}</span>
            <br>
            <p>
                {!! html_entity_decode($movies->description) !!}
            </p>
          </div>
        </div>
      </div>
        </div>
    </div>
@endsection
