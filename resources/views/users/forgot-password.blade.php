@extends('layouts.app')

@section('content')
    <h1>Forgot Password</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <p>Enter your email address and we'll send you a password reset link.</p>

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

        <input type="submit" value="Send Password Reset Link">
    </form>

    <p><a href="{{ route('login') }}">Back to Login</a></p>
@endsection
