<!-- Anonymous Blade Components -->
<!-- source: https://laravel.com/docs/12.x/blade#anonymous-components -->

@props([
    'title' => 'User Form', // default title if none provided
    'action' => '', // form submission URL, store if creating, update if editing
    'method' => 'POST', // HTTP method for the form, POST for create, PUT for update
    'submitText', // text for the submit button
    'showAdminCheckbox' => false, // whether to show the admin checkbox
    'showCancel' => false, // whether to show the cancel button
    'cancelRoute' => null, // URL for the cancel button
    'user' => null, // user model instance
])

<h1>{{ $title }}</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="error-message">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<!-- note: When you have an <input type="file"> element in your form, you must use enctype="multipart/form-data". Without it, file uploads simply won't work. -->
<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}" class="form" enctype="multipart/form-data">
    @csrf
    {{ $slot }}

    <div class="form-element">
        <label for="email">{{ $showAdminCheckbox ? 'Email' : 'Your email' }}</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" {{ $showAdminCheckbox || !$user ? 'required' : '' }}>
    </div>

    <div class="form-element">
        <label for="user_alias">{{ $showAdminCheckbox ? 'User Alias' : 'Your user alias' }}</label>
        <input type="text" id="user_alias" name="user_alias" value="{{ old('user_alias', $user->user_alias ?? '') }}" {{ $showAdminCheckbox || !$user ? 'required' : '' }}>
    </div>

    <div class="form-element">
        <label for="birthday">Birthday (optional)</label>
        <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $user && $user->birthday ? $user->birthday->format('Y-m-d') : '') }}">
    </div>

    <div class="form-element">
        <label for="about_me">About me (optional)</label>
        <textarea id="about_me" name="about_me" rows="4" placeholder="Tell us about yourself...">{{ old('about_me', $user->about_me ?? '') }}</textarea>
    </div>

    <div class="form-element">
        <label for="profile_picture">Profile picture (optional)</label>
        @if($user && $user->profile_picture)
            <div>
                <img style="max-width: 30%;" src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile picture">
            </div>
        @endif
        <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
        <small class="form-text text-muted">Max size: 2MB. Accepted formats: JPEG, PNG, JPG, GIF</small>
    </div>

    <div class="form-element">
        <label for="password">Password{{ $user ? ' (leave blank to keep current)' : '' }}</label>
        <input type="password" id="password" name="password" {{ $showAdminCheckbox || !$user ? 'required' : '' }}>
    </div>

    <div class="form-element">
        <label for="password_confirmation">{{ $showAdminCheckbox ? 'Confirm Password' : 'Confirm password' }}</label>
        <input type="password" id="password_confirmation" name="password_confirmation" {{ $showAdminCheckbox || !$user ? 'required' : '' }}>
    </div>

    @if ($showAdminCheckbox)
        <div class="form-element">
            <label>
                <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                Make this user an admin
            </label>
        </div>
    @endif

    @if ($showCancel)
        <div class="form-actions">
            <input type="submit" value="{{ $submitText }}" class="btn btn-primary">
            <a href="{{ $cancelRoute }}" class="btn btn-secondary">Cancel</a>
        </div>
    @else
        <input type="submit" value="{{ $submitText }}">
    @endif
</form>
