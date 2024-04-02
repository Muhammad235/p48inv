<x-app-layout>
    <main class="main">
      
        <div class="responsive-wrapper">
          <div class="container mb-4">
            <div class="row justify-content-between">

              <div class="col-md-3 col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Total Referred Users</h5>
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-users fa-3x text-primary"></i> 
                            <h3 class="ml-2 mb-0">{{ count($userReferrals) }}</h3> 
                        </div>
                    </div>
                </div>
            </div>
            

                <div class="col-md-4 col-sm-4">
                <div>
                  <label for="referralCode" class="block text-sm font-medium text-gray-900">Referral Code</label>
                  <div class="input-group mt-2">
                      <input type="text" name="referralCode" id="referralCode" class="form-control btn-no-outline" value="{{ route('register', ['ref' => auth()->user()->username]) }}" readonly>

                      <div class="input-group-append">
                          <button class="btn btn-outline-success" type="button" onclick="copyReferralCode()">
                              <i class="fas fa-copy"></i>
                          </button>
                      </div>
                  </div>
              </div>

                </div>
            </div>
        </div>
              
            <table class="table bg-white text-center align-middle">

              {{-- <div class="mb-4">
                <a href="/listings/create" class="btn btn-success">Craete Job Post</a>
              </div> --}}
              
                <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    {{-- <th scope="col">Company</th>
                    <th scope="col">Employment Type</th>
                    <th scope="col">Action</th> --}}
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
                    <td colspan="9"><h3 class="text-center p-3 text-success">You don't have any referred user yet</h3></td>
                  </tr> 
                  @endunless
                </tbody>
              </table>
        </div>
    </main> 


</x-app-layout>


<script>
    function copyReferralCode() {
        var copyText = document.getElementById("referralCode");
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/
        document.execCommand("copy");
        alert("Referral code copied to clipboard: " + copyText.value);
    }
</script>
