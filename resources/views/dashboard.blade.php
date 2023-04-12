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
                                Add New Member
                            </div> 
                            <div class="col-md-6">
                                <a href="{{ route('member-detail') }}" class="btn btn-success pull-right" style="text-align:rihght; color:blue; margin-left: 350px; border:1px solid gray;">All Member</a>
                                <a href="{{ route('create-catelog') }}" class="btn btn-success pull-right" style="text-align:rihght; color:blue;border:1px solid gray;">Create Catelog</a>
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

        <form method="POST" action="{{ route('create-member') }}" enctype="multipart/form-data">
            @csrf
          

            <div>
                <x-label for="assignee_code" value="{{ __('Assignee Code') }}" />
                <x-input id="assignee_code" class="block mt-1 w-full" type="text" name="assignee_code" value="" required autofocus autocomplete="assignee_code" />
                <span style="color:red;">@error('assignee_code'){{ $message }} @enderror<span> 
            </div>

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="" required autofocus autocomplete="name" />
                <span style="color:red;">@error('name'){{ $message }}@enderror<span>
            </div>

            <div>
                <x-label for="mobile" value="{{ __('Mobile') }}" />
                <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" value="" required autofocus autocomplete="mobile" />
                <span style="color:red;">@error('mobile'){{ $message }}@enderror<span>
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email Id') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="" required autocomplete="username" />
                <span style="color:red;">@error('email'){{ $message }}@enderror<span>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" value="" required autocomplete="new-password" />
                <span style="color:red;">@error('password'){{ $message }}@enderror<span>
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" value="" required autocomplete="new-password" />
                <span style="color:red;">@error('password_confirmation'){{ $message }}@enderror<span>
            </div>

            <div>
                <x-label for="image" value="{{ __('Upload Profile') }}" />
                <x-input id="image" class="block mt-1 w-full" type="file" name="image" value="" required autofocus autocomplete="image" />
                <img src="" width="150px" height="150px" style="border: 1px solid blue;"/>
                <span style="color:red;">@error('image'){{ $message }}@enderror<span>
              
                                  
            </div>
            
            <div class="mt-4">
                    <label for="pet-select">Select Member Role</label>
                  
                    <select name="role" id="pet-select" >
                        <option value="">--Please choose an option--</option>
                        <option value="Clerk">Clerk</option>
                        <option value="Manager">Manager</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Devloper">Devloper</option>
                        <option value="Other">Other</option>
                       
                    </select>
                    <span style="color:red;">@error('role'){{ $message }}@enderror<span>
                 
            </div>

            <div>
                <input class="form-check-input" type="checkbox" id="gridCheck" name="check" >
                <x-label for="name" value="{{ __('Stay on page after creating new') }}" />
               
               
            </div>



          

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    <button type="reset" class="btn btn-primary btn-lg">Reset Fields</button>
                </a>

                <x-button class="ml-4">
                    <button type="submit" class="btn btn-primary btn-lg">Save Details</button>
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

    
</x-app-layout>
