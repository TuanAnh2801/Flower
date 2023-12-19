@extends('frontend.layouts.app')

@section('content')
    <div class="wrapper">
        <div class="left">
            {{-- @dd($user->avatar) --}}
            <img src="{{ asset('storage/frontend/userProfile/'.$user->avatar) }}" alt="" style="width:200px">
    
            <h4>{{ $user->first_name }} {{ $user->last_name }}</h4>

        </div>
        <div class="right">
            <div class="info">
                <h3>Information</h3>
                <div class="info_data">
                    <div class="data">
                        <h4>Email</h4>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="data">
                        <h4>Phone</h4>
                        <p>{{ $user->telephone }}</p>
                    </div>
                </div>
            </div>

            <div class="projects">
                <h3>Địa Chỉ</h3>
                <div class="projects_data justify-content: start">
                    <div class="data">
                        <h5>{{ $userAddress->address }},{{ $userAddress->city }},{{ $userAddress->country }}</h5>
                    </div>
                    <div>
                        <a href="{{ url('user/editProfile') }}">Chỉnh Sửa</a>
                    </div>
                </div>
               
            </div>

        </div>
    </div>
@endsection
