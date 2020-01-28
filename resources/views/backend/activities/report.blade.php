@extends('backend.layouts.admin')

@section('title', '| Report')

@section('stylesheets')
<link rel="stylesheet" href="/css/jquery-ui.css"/>
<link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
<style type="text/css">
  .activity-image {
    width: 32px;
    height: 32px;
  }

  .dropdown-menu {
    min-width: 100px;
  }

  .dropdown-menu li button, .dropdown-menu li a{
    width:100%;
    color: #ffffff;
    text-align: left;
  }
  .btn-group .dropdown-menu .divider {
      background-color: #ffffff;
  }
  .btn-group .dropdown-menu{
      padding: 0px 0;
      left: -50px;
      border-color: rgba(0, 0, 0, 0.3);
      box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
  }
  .btn-group .dropdown-menu li{
      padding: 3px;
  }

  .btn-info{
      background-color: #5094b9;
      border-color: #5094b9;
      color: #ffffff;
  }

  label {
    display: block;
  }

/*  .table tr td .fa{
      color: #717F86;
  }*/

</style>
@endsection

@section('content')
    <div class="row modify-row-margin form-spacing-bottom">
      <div class="dashboard-float1">
        <h2>Report activities </h2>
      </div>
    </div> <!-- end of .row -->
    <div class="row text-center">
      <div class="col-md-3">
          <select class="form-control" id="district" name="district">
          <option  value="">Select a district</option>
          <optgroup label="City of Kigali">
            <option value="Gasabo">Gasabo</option>
            <option value="Kicukiro">Kicukiro</option>
            <option value="Nyarugenge">Nyarugenge</option>
          </optgroup>
          <optgroup label="Eastern Province">
            <option value="Bugesera">Bugesera</option>
            <option value="Gatsibo">Gatsibo</option>
            <option value="Kayonza">Kayonza</option>
            <option value="Kirehe">Kirehe</option>          
            <option value="Ngoma">Ngoma</option>
            <option value="Nyagatare">Nyagatare</option>
            <option value="Rwamagana">Rwamagana</option>      
          </optgroup>
          <optgroup label="Northern Province">
            <option value="Burera">Burera</option>
            <option value="Gakenke">Gakenke</option>
            <option value="Gicumbi">Gicumbi</option>
            <option value="Musanze">Musanze</option>
            <option value="Rulindo">Rulindo</option>    
          </optgroup>
          <optgroup label="Southern Province">
            <option value="Gisagara">Gisagara</option>
            <option value="Huye">Huye</option>
            <option value="Kamonyi">Kamonyi</option>
            <option value="Muhanga">Muhanga</option>        
            <option value="Nyamagabe">Nyamagabe</option>
            <option value="Nyanza">Nyanza</option>
            <option value="Nyaruguru">Nyaruguru</option>
            <option value="Ruhango">Ruhango</option>         
         
          </optgroup>
          <optgroup label="Western Province">
            <option value="Karongi">Karongi</option>
            <option value="Ngororero">Ngororero</option>
            <option value="Nyabihu">Nyabihu</option>
            <option value="Nyamasheke">Nyamasheke</option>       
            <option value="Rubavu">Rubavu</option>
            <option value="Rusizi">Rusizi</option>
            <option value="Rutsiro">Rutsiro</option>  
          </optgroup>
        </select>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <input autocomplete="off" class="form-control" type="text" name="From" id="From" placeholder="Choose start date" name="start"></div>
      </div>
      <div class="col-md-3">
        <div class="form-group"><input autocomplete="off" class="form-control" type="text" name="to" id="to" placeholder="Choose end date" name="end"></div>
      </div>
      <div class="col-md-2">
          <input type="button" name="range" id="range" value="Search range" class="btn btn-success"/>
      </div>
    </div>
    <div class="col-md-12">
      <hr>
    </div>


    <div class="row modify-row-margin">
      <div class="col-md-12 table-responsive" id="activities-reports">  
        <table class="table" id="table">
          <thead>
              <th>No</th>
              <th>Title</th>
              <th>District</th>
              <th>Program</th>
              <th>Description</th>
              <th>Created date</th>
          </thead>

          <tbody id="activities-list" name="activities-list">
            <?php $no=1; ?>
            @foreach ($activities as $activity)
              <tr id="activity{{$activity->id}}" class="clickable-row"  data-href="{{ route('activities.show', $activity->id) }}">
                <td>{{ $no++ }}</td>
                <td>{{ substr(strip_tags($activity->title), 0, 50) }} </td>
                <td>{{ $activity->user->district }}</td>
                <td>{{ $activity->program->title }}</td>
                <td>{{ substr(strip_tags($activity->description), 0, 50) }} </td>

                <td>{{ date('M j, Y', strtotime($activity->created_at)) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
      @foreach ($activities as $activity)
          @include('backend.activities.delete')
      @endforeach
@stop


@section('scripts')
<script src="/js/jquery-ui.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready( function () {
    $.datepicker.setDefaults({
      dateFormat: 'yy-mm-dd'
    });
    $(function(){
      $("#From").datepicker();
      $("#to").datepicker();
    });

    $('#table').DataTable();

    $('#range').click(function(){

      var district = $('#district').val();
      var From = $('#From').val();
      var to = $('#to').val();

      $.ajaxSetup({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
      })
     
      if(district != '' || (From != '' && to != ''))
      {
        $.ajax({
          url:"/dashboard/activities-report",
          method:"POST",
          data:{
            From: From, 
            to: to, 
            district: district,
          },
          success:function(data)
          {
            $('#activities-reports').html(data);
          },
            error: function(data) {
                console.log('Error:', data);
                alert(data.responseText);
          }
        });
      }
      else
      {
        toastr.warning('Please Select a range Of Dates', 'Warning Alert', { timeOut: 2000 });
      }
    });

    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
});
</script>
@endsection
