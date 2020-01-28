@extends('backend.layouts.admin')

@section('content')
    <div class="row modify-row-margin">
      <div class="col-md-10">
        <h3 class="title">Create New Role</h3>
      </div>
    </div>
    <hr>
    <form action="{{route('roles.store')}}" method="POST">
      {{ csrf_field() }}
      <div class="row modify-row-margin">
        <div class="col-md-12">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Role Details:</h1>
                  <div class="form-group">
                    <p class="control">
                      <label for="display_name">Name (Human Readable)</label>
                      <input type="text" class="form-control" name="display_name" value="{{old('display_name')}}" id="display_name">
                    </p>
                  </div>
                  <div class="form-group">
                    <p class="control">
                      <label for="name">Slug (Can not be changed)</label>
                      <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                    </p>
                  </div>
                  <div class="form-group">
                    <p class="control">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" value="{{old('description')}}" id="description" name="description">
                    </p>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>

      <div class="row modify-row-margin">
        <div class="col-md-10">
          <button class="btn btn-primary btn-bottom-spacing ">Create New Role</button>
        </div>
      </div>
    </form>
  </div>
@endsection


@section('scripts')

@endsection
