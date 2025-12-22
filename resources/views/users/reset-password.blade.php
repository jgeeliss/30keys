@extends('layouts.app')

@section('content')
    <h1>Reset Password</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" value="{{ old('email', $email) }}" required autofocus>

        <label for="password">New Password</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirmation">Confirm New Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <input type="submit" value="Reset Password">
    </form>
@endsection
