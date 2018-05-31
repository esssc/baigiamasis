<ul>


    <li>
        <a>labas</a>
        @foreach($users->groups as $user)

            {{$user->groups->group_name}}
            @endforeach
    </li>
</ul>