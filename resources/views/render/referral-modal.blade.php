<table class="table bg-white text-center align-middle"> 
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
    
      <tr>
        <th scope="row">{{@$userReferral->id}}</th>
        <td>{{$userReferral->user->name}}</td>
        <td>{{$userReferral->user->email}}</td>

        {{-- <td>{{@$user_listing->location}}</td> --}}

        {{-- <td>

          <div class="d-flex justify-content-between">
            <div class="">
              <a class="btn text-success" href="/listings/{{@$user_listing->id}}/edit">
                <i class="bi bi-pencil-square"></i> Edit 
              </a>
            </div>
            <div class="">
              <form method="POST" action="/listings/{{@$user_listing->id}}">
                @csrf
                @method('DELETE')
                <button class="btn text-danger">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
            </div>
          </div>

        </td> --}}
      </tr>
      @endforeach
          {{-- pagination  buttons--}}
          <div class="mt-5">
            <p>{{$userReferrals->links()}}</p> 
          </div>
      @else
      <tr>
        <td colspan="9"><h3 class="text-center p-3 text-success">This user don't have any referred user yet</h3></td>
      </tr> 
      @endunless
    </tbody>
</table>