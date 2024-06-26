@extends('admin.layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon" style='background-color:#009933;'>
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
          <div class="card-icon" style='background-color:#009933;'>
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
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 show-modal"  data-toggle='modal' data-target='#exampleModalLong2'>
          <div class="card-icon" style='background-color:#009933;'>
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
                 <h4>Celebrant this week</h4>
            </div>
            <div class="card-body">
              @php
                $celebrantCount = \App\Models\User::userCelebratingBirthdayThisWeek()->count();
              @endphp
               {{ $celebrantCount }}
            </div>
          </div>
        </div>
      </div>               
    </div>

    <div class="card-body bg-white">
      {{ $dataTable->table() }}
    </div>

</section>


<!-- Referral Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Referred User list</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body referrals">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal" style='background-color:#009933;'>Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Celebrant Modal -->
<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Users Celebrating Birthday this week</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          <table class="table border bg-white text-center align-middle referral-table"> 
            <thead>
              <tr>
                <th scope="col">S/N</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Birthday</th>
              </tr>
            </thead>
            <tbody>
          
              @php
              $celebrants = \App\Models\User::userCelebratingBirthdayThisWeek();
             @endphp
              @unless ($celebrants->isEmpty())
                
              @foreach (@$celebrants as $celebrant)
            
              <tr class="border">
                <th scope="row">{{ ++$loop->index }}</th>
                <td>{{ $celebrant->name }}</td>
                <td>{{ $celebrant->email }}</td>
                <td>{{ date('jS F', strtotime($celebrant->date_of_birth)) }}</td>
              </tr>
              @endforeach
  
              @else
              <tr>
                <td colspan="9"><h4 class="mt-3 text-center p-3 text-dark">There is no celebrant this week</h4></td>
              </tr> 
              @endunless
            </tbody>
          </table>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal" style='background-color:#009933;'>Close</button>
      </div>
    </div>
  </div>
</div>

@endsection


@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    
    <script>

    $(document).on('click', '.show-referrals-modal', function() {
    var referred_by = $(this).data('referred_by');

    $.ajax({
        url: "{{ route('admin.referral.details') }}", 
        method: 'GET',
        data: { referred_by: referred_by },
        success: function(response) {
            
            $('.referrals').html(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
      });
    });
    </script>

@endpush