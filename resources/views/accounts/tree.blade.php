 <li>
    <strong>{{ $account->code }}</strong> - {{ $account->name }}

    <a href="{{ route('accounts.edit', $account->id) }}">Edit</a>

    @if($account->children->count())
        <ul>
            @foreach($account->children as $child)
                @include('accounts.tree', ['account' => $child])
            @endforeach
        </ul>
    @endif
</li>