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
                            <i class="fas fa-users text-success" 
                            style="font-size: 40px; color:#009933;">
                            </i> 
                            <h3 class="ml-2 mb-0">{{ count($userReferrals) }}</h3> 
                        </div>
                    </div>
                </div>
            </div>
            

                <div class="col-md-4 col-sm-4">
                <div>

                  <label for="referralCode" class="block text-sm font-medium text-gray-900">Referral Link</label>
                  <div class="input-group mt-2">
                      <input type="text" name="referralCode" id="referralId" class="form-control btn-no-outline" value="{{ route('register', ['ref' => auth()->user()->username]) }}" readonly>

                      <button class="btn btn-outline-success" type="button" onclick="copyReferralId()">
                        <i class="fas fa-copy"></i>
                      </button>
                  </div>

                  <label for="referralCode" class="block text-sm font-medium text-gray-900 mt-3">Referral Code</label>
                  <div class="input-group mt-2">
                      <input type="text" name="referralCode" id="referralCode" class="form-control btn-no-outline" value="{{ auth()->user()->username }}" readonly>

                      <button class="btn btn-outline-success" type="button" onclick="copyReferralCode()"> 
                        <i class="fas fa-copy"></i>
                      </button>
                  </div>
              </div>

                </div>
            </div>
        </div>
 

            <div class="col-lg-11 col-md-8 col-12 col-sm-12 m-auto">
              <div class="card">
                <div class="card-header">
                  <h4>Referred User List</h4>
                  <div class="card-header-action">
                    {{-- <a href="#" class="btn btn-primary">View All</a> --}}
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive text-center">
                    <table class="table mb-0">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Name</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>    
                        @unless ($userReferrals->isEmpty())
                        @foreach (@$userReferrals as $userReferral)                     
                        <tr>
                          <td>
                            {{ ++$loop->index }}
                          </td>
                          <td>
                            {{$userReferral->user->name}}
                          </td>
                          <td>
                          {{$userReferral->user->email}}
                          </td>
                        </tr>
                        @endforeach

                        @if ($userReferrals->hasPages())
                        <div class="mt-5">
                          <p>{{$userReferrals->links()}}</p> 
                        </div>
                        @endif
                     
                        @else
                        <tr>
                          <td colspan="9"><h3 class="text-center p-3 text-success">You don't have any referred user yet</h3></td>
                        </tr> 
                        @endunless
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </main> 

</x-app-layout>


<script>
    function copyReferralId() {
        var copyText = document.getElementById("referralId");
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/
        document.execCommand("copy");
        alert("Referral code copied to clipboard: " + copyText.value);
    }

    function copyReferralCode() {
        var copyText = document.getElementById("referralCode");
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/
        document.execCommand("copy");
        alert("Referral code copied to clipboard: " + copyText.value);
    }
</script>
