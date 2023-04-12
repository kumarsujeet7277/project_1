<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
      
    </x-slot>
    

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div> -->


    <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Update Member
                            </div> 
                            <div class="col-md-6">
                                <a href="{{ route('member-detail') }}" class="btn btn-success pull-right" style="text-align:rihght; color:blue; margin-left: 350px;">All Member</a>
                            </div>
                        </div>
                    </div>
        </x-slot>
        @if(Session::has('message'))
        {
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
        }
        @endif

        <x-validation-errors class="mb-4" />

        <form method="post" Action="{{ route('update-member') }}" enctype="multipart/form-data">
            @csrf
            <!-- {{ method_field('PATCH') }} -->
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{$member['id']}}">

            <div>
                <x-label for="assignee_code" value="{{ __('Assignee Code') }}" />
                <input id="assignee_code" class="block mt-1 w-full" type="text" name="assignee_code" value="{{ $member->assignee_code }}" required autofocus autocomplete="assignee_code" />
                <span style="color:red;">@error('assignee_code'){{ $message }} @enderror<span> 
            </div>

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $member->name }}" required autofocus autocomplete="name" />
                <span style="color:red;">@error('name'){{ $message }} @enderror<span> 
            </div>

            <div>
                <x-label for="mobile" value="{{ __('Mobile') }}" />
                <input id="mobile" class="block mt-1 w-full" type="text" name="mobile" value="{{ $member->mobile }}" required autofocus autocomplete="mobile" />
                <span style="color:red;">@error('mobile'){{ $message }} @enderror<span> 

            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email Id') }}" />
                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $member->email }}" required autocomplete="username" />
                <span style="color:red;">@error('email'){{ $message }} @enderror<span> 
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <input id="password" class="block mt-1 w-full" type="password" name="password" value="{{ $member->password }}" required autocomplete="new-password" />
                <span style="color:red;">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>

            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" value="{{ $member->password_confirmation }}" required autocomplete="new-password" />
                <span style="color:red;">
                    @error('password_confirmation')
                        {{$message}}
                    @enderror
                </span>
            </div>

            <div>
                <x-label for="image" value="{{ __('Upload Profile') }}" />
                @if ("/storage/members/{{ $member->image }}")
                    <img src="/storage/members/{{ $member->image }}" height="200px" width="200px">
                @else
                        <p>No image found</p>
                @endif
                <input id="image" class="block mt-1 w-full" type="file" name="image" value="{{$member->image}}"  autofocus autocomplete="image" />
                <!-- <img src="{{asset('storage/members')}}/{{$member->image}}" width="200px" height="200px"  style="border: 1px solid blue;"/> -->
                <span style="color:red;">
                    @error('image')
                        {{$message}}
                    @enderror
                </span>
                                   
            </div>
            
            <div class="mt-4">
                    <label for="pet-select">Select Member Role</label>
                 
                        <select name="role" id="pet-select" >
                            <option value="{{$member->role}}">{{ $member->role }}</option>
                            <option value="Clerk">Clerk</option>
                            <option value="Manager">Manager</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Devloper">Devloper</option>
                            <option value="Other">Other</option>
                          
                        </select>
                       
                <span style="color:red;">
                    @error('role')
                        {{$message}}
                    @enderror
                </span>
                   
            </div>

            <div>
                <input class="form-check-input" type="checkbox" id="gridCheck" name="check" value="{{ $member->check }}">
                <x-label for="name" value="{{ __('Stay on page after creating new') }}" />
                <span style="color:red;">
                    @error('check')
                        {{$message}}
                    @enderror
                </span>
            </div>



          

            <div class="flex items-center justify-end mt-4">
                <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    <button type="reset" class="btn btn-primary btn-lg">Reset Fields</button>
                </a> -->

                <x-button class="ml-4">
                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

    
</x-app-layout>
