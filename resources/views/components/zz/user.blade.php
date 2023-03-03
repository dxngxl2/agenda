@if (Auth::check())
    <span>
        Logged in

        <a href='{{ route('profile.edit') }} '>{{ Auth::user()->name }}</a>

        @php
            $user = Auth::user();

            if ($user->esAdmin()) echo ' (Admin)';
            else                  echo ' (Normal)';
        @endphp
    </span>

    <form method='POST' action='{{ route('logout') }}' style='display:inline;'>
        @csrf
        <button type='submit'><i class="fa fa-right-from-bracket"></i></button>
    </form>
@endif
