@if (Auth::check())
    @if (Auth::User()->fkRoles->role_name == 'supplier')
        @include('includes.navbar-supplier')
    @else
        @include('includes.navbar-homeindustri')
    @endif
@else
    @include('includes.navbar-homeindustri')
@endif
{{-- {{ dd(Auth::user()->fkRoles->role_name) }} --}}
