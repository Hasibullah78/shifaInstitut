@extends('admin.dashboard')
@section('main')

<div class="pcoded-main-container">
    <div class="pcoded-content">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('success') }}
            </div>
            @endif
            <div class="row">

                @foreach ($teachers as $tech)
                <div class="card col-md-4">
                    <img height="300" width="" class="card-img-top" src="{{ asset($tech->image) }}" alt="Card image">
                      <h5 class="card-title"><strong>Name: </strong>{{ $tech->name }}</h5>
                      <h5 class="card-text"><strong>Rank: </strong>{{ $tech->rank }}</h5>


                      <a href="{{ url('view/profile'.$tech->id) }}" class="btn btn-primary">See Profile</a>

                  </div>


                  @endforeach



            </div>
        </div>
</div>

@endsection
