@extends('backend.layouts.admin')

@section('content')
    <div class="row modify-row-margin">
      <div class="col-md-10">
        <h1 class="title">Edit {{$role->display_name}}</h1>
      </div>
    </div>
    <hr>
    <form action="{{route('roles.update', $role->id)}}" method="POST">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="row modify-row-margin">
        <div class="col-md-6">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Role Details:</h2>
                  <div class="form-group">
                    <p class="control">
                      <label for="display_name">Name (Human Readable)</label>
                      <input type="text" class="form-control" name="display_name" value="{{$role->display_name}}" id="display_name">
                    </p>
                  </div>
                  <div class="form-group">
                    <p class="control">
                      <label for="name">Slug (Can not be edited)</label>
                      <input type="text" class="form-control" name="name" value="{{$role->name}}" disabled id="name">
                    </p>
                  </div>
                  <div class="form-group">
                    <p class="control">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" value="{{$role->description}}" id="description" name="description">
                    </p>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>



        <div class="col-md-6">
          <button class="btn btn-primary">Save Changes to Role</button>
        </div>
  </div>
    </form>
@endsection


@section('scripts')
  <script>

  </script>
@endsection
