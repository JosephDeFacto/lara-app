@if(isset($user))
    {{ $user->name }}
    {{ $user->email }}
@endif
<a href="{{ url('account/update-password') }}">Change password</a>
