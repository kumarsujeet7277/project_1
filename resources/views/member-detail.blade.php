<div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel pane-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4">
                                All Members
                            </div>
                            <div class="col-md-4">
                                <a href="{{route('dashboard')}}" class="btn btn-success pull-right">Add New</a>
                            </div>
                            
                            <div class="col-md-4">
                                <form action="{{ route('search') }}" method="get">
                                    <input type="search" placeholder="Search..." class="form-control" name="search" />
                                </form>
                            </div>
                            <!-- <div class="col-md-4">
                                <a href="{{route('member-detail')}}" class="btn btn-success pull-right">Members</a>
                            </div> -->
                            
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>assignee_code</th>
                                    <th>Name</th>
                                    <th>mobile</th>
                                    <th>email</th>
                                    <th>image</th>
                                    <th>role</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($members as $member)
                                    <tr>
                                        <td>{{$member->id}}</td>
                                        <td>{{$member->assignee_code}}</td>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->mobile}}</td>
                                        <td>{{$member->email}}</td>
                                        <td><img src="{{asset('storage/members')}}/{{$member->image}}" width="60" /></td>
                                        <td>{{$member->role}}</td>
                                       
                                        <td>
                                                <a href="{{ route('edit-member', [$member->id]) }}"><i class="fa fa-edit fa-2x text-info"> Edit</i></a>
                                                <a href="{{ route('delete-member', [$member->id]) }}"  style="padding-left: 10px;" ><i class="fa fa-times fa-2x text-danger">Delete</i></a>
                                        </td>
                                    </tr>

                                @empty
                                    <td style="color:red;"><h3>Detail Not Found</h3></td>
                                @endforelse
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>