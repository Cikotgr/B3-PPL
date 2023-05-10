@if (Auth::check())
    @if (Auth::User()->fkRoles->role_name == 'supplier')
        @include('includes.navbar-supplier')
    @elseif (Auth::User()->fkRoles->role_name == 'admin')
        @include('includes.navbar-admin')
    @else
        @include('includes.navbar-homeindustri')
    @endif
@else
    @include('includes.navbar-homeindustri')
@endif
{{-- {{ dd(Auth::user()->fkRoles->role_name) }} --}}
