
{{-- @dump($userReferrals) --}}

<style>
  .referral-table{
    overflow-x: scroll;
  }
</style>

<table class="table border bg-white text-center align-middle referral-table"> 
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>

    @unless ($userReferrals->isEmpty())
      
    @foreach (@$userReferrals as $userReferral)
  
    <tr class="border">
      <th scope="row">{{ ++$loop->index }}</th>
      <td>{{ $userReferral->user->name }}</td>
      <td>{{ $userReferral->user->email }}</td>
    </tr>
    @endforeach
        {{-- pagination  buttons--}}
        {{-- <div class="mt-5">
          <p>{{$userReferrals->links()}}</p> 
        </div> --}}
    @else
    <tr>
      <td colspan="9"><h4 class="mt-3 text-center p-3 text-dark">This user don't have any referred user yet</h4></td>
    </tr> 
    @endunless
  </tbody>
</table>