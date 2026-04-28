@extends('adminlte::page')

@section('title', 'Chart of Accounts')

@section('content_header')
    <h1>Add Chart of Accounts</h1>
@stop

@section('content')
<form method="POST" action="{{ route('accounts.store') }}">
@csrf

<input type="text" name="code" placeholder="Code" class="form-control mb-2">

<input type="text" name="name" placeholder="Name" class="form-control mb-2">

<select name="type" class="form-control mb-2">
    <option>ASSET</option>
    <option>LIABILITY</option>
    <option>EQUITY</option>
    <option>INCOME</option>
    <option>EXPENSE</option>
</select>

<select name="parent_id" class="form-control mb-2">
    <option value="">-- No Parent --</option>
    @foreach($parents as $p)
        <option value="{{ $p->id }}">{{ $p->code }} - {{ $p->name }}</option>
    @endforeach
</select>

<button class="btn btn-success">Save</button>

</form>
@endsection