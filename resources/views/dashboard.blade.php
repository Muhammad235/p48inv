{{-- @dd(auth()->user()->referrals) --}}

<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            <div>
                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Referral Code</label>
                <div class="relative mt-2 rounded-md shadow-sm">

                <input type="text" name="price" id="referralCode" class="block w-full rounded-md border-0 py-1.5 pl-5 pr-5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ auth()->user()->username }}" readonly>
                    <div class="absolute inset-y-0 right-5 flex items-center">

                        <button type="button" onclick="copyReferralCode()">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>
  
            
        </div>
        
    </x-slot>

    {{-- <div>
        @foreach ($userReferrals as $referral)
        <p>{{ $referral->user->name }}</p> 
     @endforeach
    </div> --}}

    <main class="main">
        <div class="responsive-wrapper">
            <table class="table bg-white text-center align-middle">
              <div class="mb-4">
                <a href="/listings/create" class="btn btn-success">Craete Job Post</a>
              </div>
                <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Title</th>
                    <th scope="col">Company</th>
                    <th scope="col">location</th>
                    <th scope="col">Website</th>
                    <th scope="col">Description</th>
                    <th scope="col">Employment Type</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
    
                  @unless ($userReferrals->isEmpty())
                    
                  @foreach (@$user_listings as $user_listing)
                
                  <tr>
                    <th scope="row">{{@$user_listing->id}}</th>
                    <td>Mark</td>
                    <td>{{@$user_listing->title}}</td>
                    <td>{{@$user_listing->company}}</td>
                    <td>{{@$user_listing->location}}</td>
                    <td>{{@$user_listing->website}}</td>
                    <td>{{@$user_listing->description}}</td>
                    <td >{{@$user_listing->employment_type}}</td>
                    <td>
    
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
    
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="9"><h3 class="text-center p-3 text-success">You don't have any job post created</h3></td>
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
