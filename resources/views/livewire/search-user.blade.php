    {{-- Be like water. --}}
    <ul class="navbar-nav float-start me-auto">
        <!-- ============================================================== -->
        <!-- Search -->
        <!-- ============================================================== -->
      
        <div >
           
    
                <input type="text" wire:model="search" class="form-control" placeholder="Search users..." style="width: 100%">
           
        </div>
       
        <div class="row">
            @if ($search !=='')
            
            <i style="color: red">{{ 'Typing...' }}</i>
            @foreach ($users as $user)

            <div class="form-control" class="col-md-12" >
                <img src="{{ asset($user->picture) }}" class="img-thumbnail"
                 style="height:20px; width: 20px; border-radius:100%;" />
                 <a href="{{ url('user/view_user_profile/' . $user->id) }}" style="float: right; text-decoration: none"> {{ $user->fullname }}</a>
            </div> 
                
            @endforeach
            @endif
        </div>
    </ul>

