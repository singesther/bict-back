@extends('backend.layouts.admin')

@section('title', '| Volunteers')

@section('content')
    <div class="row">
      <div class="col-md-9">
        <h1>Volunteers</h1>
      </div>
      <div class="col-md-12">
  			<hr>
  		</div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table">
          <thead>
            <tr>
              <th>id</th>
              <th>Pic</th>
              <th>Name</th>
              <th>Email</th>
              <th>Date Created</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($users as $user)
              <tr>
                <th>{{$user->id}}</th>
                <td><img src="{{ asset('images/users/'. $user->user_image) }}" class="img-circle" alt="Avatar"></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->toFormattedDateString()}}</td>
                <td>
                  <a href="{{route('volunteers.show', $user->id)}}" class="btn btn-primary btn-sm">View</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div> <!-- end of .card -->

    {{$users->links()}}
@endsection

@section('scripts')
    <script type="text/javascript">
      data = [
        'Cambodia',
        'Thai',
        'America',
        'China',
        'Japan',
        'Rusi',
        'Korea',
        'India'
      ];

      $('#search').autocomplete({
        source:data
      })
    </script>
@endsection