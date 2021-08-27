@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!--
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            -->
            <div class="card-header">
                 Users
                 @if(Auth::user()->roles_id == 1)
                     <a href="{{url('/user/add')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Add User</a>
                 @endif 
            </div>
            <div class="card-body">
                <table class="table table-bordered">
             <thead>
                 <tr>
                     <th scope="col">Id</th>
                     <th scope="col">Name</th>
                     <th scope="col">Country</th>
                     <th scope="col">EMAIL</th>
                     <th scope="col"></th>
                     <th scope="col"></th>
                 </tr>
             </thead>                               
                 <tbody>
                     @if (count($users) > 0)
                         @foreach ($users as $user)
                             <tr>
                                 <th scope="row">{{$user->id}}</th>
                                 <th scope="row">{{$user->first_name}} {{$user->last_name}}</th>
                                 <th scope="row">{{App\Country::find($user->country_id)->name}}</th>
                                 <th scope="row"><a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
                                            </th>
                                 <th scope="row">
                                    @if(Auth::user()->roles_id == 1)
                                        <a href="{{url('/user/profile/'.$user->id)}}">Изменить</a>
                                    @endif                                    
                                </th>
                                 <th scope="row">
                                    @if(Auth::user()->roles_id == 1)
                                         <a href="{{url('/adress-book/delete/'.$user->id)}}">Удалить</a>
                                    @endif                                   
                                </th>
                             </tr>
                         @endforeach
                     @else
                         <tr>
                             <th scope="row">I do not have records</th>
                         </tr>
                     @endif
                 </tbody>
         </table>
         {{ $users->links() }}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
