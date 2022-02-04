@if (auth()->user())
<form method="POST" action="{{ route('logout') }}">
    @csrf
<button class="btn btn-dark  float-right">
    <x-jet-dropdown-link href="{{ route('logout') }}"
             onclick="event.preventDefault();
                    this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-jet-dropdown-link>
</button>
</form>
    <ul class = "menu">
        @if (auth()->user()->role_id === 1)
            <li class ="menu__list">
               <a class ="menu__list--link" href = "{{ route('users')}}"> Users </a>
            </li>
        @endif
        <li class ="menu__list">
            <a class ="menu__list--link" href = "{{ route('products.index')}}"> Products </a>
        </li>
        <li class ="menu__list"> 
            <a class =" menu__list--link" href = "{{ route('categories.index')}}" > Categories </a>
        </li>
    </ul>
@endif