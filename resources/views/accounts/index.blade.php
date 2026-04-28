@extends('adminlte::page')

@section('title', 'Chart of Accounts')

@section('content_header')
    <h1>Chart of Accounts</h1>
@stop

@section('content')
<a href="{{ route('accounts.create') }}" class="btn btn-primary mb-3">
    + Add Account
</a>

<ul>
    @foreach($accounts as $account)
        @include('accounts.tree', ['account' => $account])
    @endforeach
</ul>
@endsection