@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">

          <form action="{{ route('useraccount.save') }}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name">
              </div>

              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" class="form-control" value="{{ $user->email }}" id="email">
              </div>

              <button type="submit" class="btn btn-primary">Save Account</button>
              <input type="hidden" value="{{ Session::token() }}" name="_token">
          </form>
        </div>
    </div>

</div>
@endsection
