@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="card">

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('success') }}
            </div>
            @endif
            <div class="d-flex aligns-items-center justify-content-center card text-center">
                <div style="background-color:  rgb(55, 120, 249); text-align:center" class="card-header">
                 <strong> Edit Gallary</strong>
                </div>
                <div class="card-body">
                    @foreach ($gallaries as $gallary)
                    <form action="{{ url('update/gallary'.$gallary->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                     <div class="form-group">
                     <input type="hidden" name="olde_image" value="{{ $gallary->gallary_image }}">
                      <input type="file" value="{{ $gallary->gallary_image }}" name="image" class="form-control" id="exampleFormControlInput1">
                       @error('image')
                           <span class=" text-danger">{{ $message }}</span>
                       @enderror
                        </div>

                        <div class="form-group">
                          <label for="exampleFormControlTextarea1"><b>Description</b></label>
                          <textarea class="form-control"  id="exampleFormControlTextarea1" name="description" rows="2" placeholder="">{{ $gallary->description }}</textarea>
                          @error('description')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                        </div>
                            <input  type="submit" value="Edit Gallary" class="btn btn-primary" style="float: right">
                      </form>
                      @endforeach
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
