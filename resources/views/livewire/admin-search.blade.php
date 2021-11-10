
    <ul class="navbar-nav float-start me-auto">
        <!-- ============================================================== -->
        <!-- Search -->
        <!-- ============================================================== -->
      
        <div >
           
    
                <input type="text" wire:model="search" class="form-control" placeholder="Search Users..." style="width: 100%">
           
        </div>
       
        <div class="row">
            @if ($search !=='')
            <i style="color: red">{{ 'Typing...' }}</i>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body" style="overflow-x:auto;">
                    <table id="example2" class="table table-bordered table-hover" style="color: black">
                        <tr>
                            <td colspan="11" id="header">
                                <h1>Available Search Results<h1>
                            </td>
                        </tr>
                        <tr>
                            <th width="340px">@sortablelink('fullname')</th>
                            <th width="135px">Email</th>
                            <th width="135px">@sortablelink('compound')</th>
                            <th width="80px">Residence</th>
                            <th width="100px">DATE OF BIRTH</th>
                            <th width="80px">INSTITUTION</th>
                            <th width="100px">MARITAL STATUS</th>
                            <th width="80px">PHONE</th>
                            <th width="100px">GENDER</th>
                            <!--<th width="100px">@sortablelink('id', 'PHONE')</th>
                <th width="100px">@sortablelink('id', 'GENDER')</th> -->
                            <th width="100px">ACTION</th>
                        </tr>
                        @foreach ($users as $user)                           
                        <tr>
                            <td width="80px">{{ $user->fullname }}</td>
                            <td width="135px">{{ $user->email }}</td>
                            <td width="80px">{{ $user->compound }}</td>
                            <td width="100px">{{ $user->place_of_residence }}</td>
                            <td width="80px">{{ $user->date_of_birth }}</td>
                            <td width="100px">{{ $user->institution }}</td>
                            <td width="100px">{{ $user->marital_status }}</td>
                            <td width="100px">{{ $user->phone }}</td>
                            <td width="100px">{{ $user->gender }}</td>
                            <td width="340px">
                                @if ($user->status == 'active')
                                <a data-toggle="tooltip" data-placement="top" title="Delete User!"
                                    onclick="return confirm('Are you sure you want to delete {{ $user->fullname }}?')"
                                    href="#" title="Delete User?" class="btn btn-outline-danger">
                                    <i class="fas fa-trash  fa-sm"> Delete </i></a>
                                <a data-toggle="tooltip" data-placement="top" title="Suspend User!"
                                    onclick="return confirm('Are you sure you want to Suspend {{ $user->fullname }}?')"
                                    href="{{ url('administrator/suspendUser', $user->id_number) }}"
                                    title="Suspend User" class="btn btn-outline-danger">
                                    <i class="fas fa-lock  fa-sm"> Suspend </i></a>

                                    <a data-toggle="tooltip" data-placement="top" title="Send warning!"
                                    onclick="return confirm('Are you sure you want to send Warning {{ $user->fullname }}?')"
                                    href="{{ url('administrator/sendWaring', $user->username) }}"
                                    title="Send warning" class="btn btn-outline-danger">
                                    <i class="fas fa-flag  fa-sm"> Send Warning </i> 
                                    @php
                                      $signalWave =  DB::table('admin_sent_mails')->where('email',$user->username)->count()
                                    @endphp
                                    <span class="badge bg-primary float-right">{{ $signalWave }}</span></a>
                                @elseif ($user->status == 'suspended')
                                <a data-toggle="tooltip" data-placement="top" title="Delete User!"
                                    onclick="return confirm('Are you sure you want to delete {{ $user->fullname }}?')"
                                    href="#" title="Delete User?" class="btn btn-outline-danger">
                                    <i class="fas fa-trash  fa-sm"> Delete </i></a>
                                <a data-toggle="tooltip" data-placement="top" title="Activate User!"
                                    onclick="return confirm('Are you sure you want to Suspend {{ $user->fullname }}?')"
                                    href="{{ url('administrator/activateUser', $user->id_number) }}"
                                    title="Suspend User" class="btn btn-outline-success">
                                    <i class="fas fa-unlock  fa-sm"> Activate</i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-footer">
                    <div class="card card-body bg-transparent">
                       
                    </div>
                </div>
        
            </div>
            @endif
        </div>
    </ul>







   

