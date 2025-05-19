@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
            <div class="card">
                <div class="card-header" style="text-align: center">
                   <h3 style="color: rgb(68, 125, 247)">Gallery</h3>
                </div>
               </div>

            <div class="row">

                @foreach ($gallaries as $gallary)

                <div class="card col-md-4" style="text-align: center">
                    <img height="" class="card-img-top" width="510px" src="{{ asset($gallary->gallary_image) }}" alt="Card image">
                      {{-- <h5 class="card-title"><strong>Name: </strong>{{ $gallary->description }}</h5> --}}

        <table>
            <tr>
                <td>
                    <a href="{{ url('gallary/edit/').$gallary->id }}" class="btn btn-success">Edit</a>

                </td>
                <td>
                    <a href="{{ url('gallary/delete/').$gallary->id }}" class="btn btn-danger">Delete</a>

                </td>

            </tr>
        </table>


                </div>


                  @endforeach

            </div>
</div>

        </div>


@endsection
