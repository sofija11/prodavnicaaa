@if (session()->has('user'))
    <form action = "{{ route('logout') }}">
        <button type="submit" class="btn btn-primary float-right"> LOGOUT </button>
    </form>
    <ul class = "menu">
        @if (session()->get('user')->role_id === 1)
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