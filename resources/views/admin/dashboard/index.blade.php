@extends('admin.layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Users</h4>
            </div>
            <div class="card-body">
              @php
                $usersCount = \App\Models\User::where('role', '!=', 'admin')->count();
              @endphp
              {{ $usersCount }}
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Referred users</h4>
            </div>
            <div class="card-body">
              @php
                $referredUsersCount = \App\Models\Referral::all()->count();
              @endphp
              {{ $referredUsersCount }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Non referred users</h4>
            </div>
            <div class="card-body">
              @php
                $nonReferredUsersCount = $usersCount - $referredUsersCount;
              @endphp
               {{ $nonReferredUsersCount }}
            </div>
          </div>
        </div>
      </div>                  
    </div>

    <div class="card-body bg-white">
      {{ $dataTable->table() }}
    </div>

</section>



<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection



@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    
    <script>

    $(document).on('click', '.show-modal', function() {
    var id = $(this).data('id');

    $.ajax({
        url: "{{ route('admin.referral.details') }}", 
        method: 'GET',
        data: { id: id },
        success: function(response) {
            
            // $('.modal-body').html(response);
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
      });
    });
    </script>

@endpush