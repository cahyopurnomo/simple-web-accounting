@extends('adminlte::page')

@section('title', 'Edit Account')

@section('content_header')
    <h1>Edit Chart of Account</h1>
@stop

@section('content')

<form method="POST" action="{{ route('accounts.update', $account->id) }}">
    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-body">

            {{-- CODE --}}
            <div class="form-group">
                <label>Account Code</label>
                <input type="text"
                       name="code"
                       class="form-control"
                       value="{{ $account->code }}"
                       required>
            </div>

            {{-- NAME --}}
            <div class="form-group">
                <label>Account Name</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $account->name }}"
                       required>
            </div>

            {{-- TYPE --}}
            <div class="form-group">
                <label>Type</label>
                <select name="type" class="form-control" required>
                    <option value="ASSET" {{ $account->type == 'ASSET' ? 'selected' : '' }}>ASSET</option>
                    <option value="LIABILITY" {{ $account->type == 'LIABILITY' ? 'selected' : '' }}>LIABILITY</option>
                    <option value="EQUITY" {{ $account->type == 'EQUITY' ? 'selected' : '' }}>EQUITY</option>
                    <option value="INCOME" {{ $account->type == 'INCOME' ? 'selected' : '' }}>INCOME</option>
                    <option value="EXPENSE" {{ $account->type == 'EXPENSE' ? 'selected' : '' }}>EXPENSE</option>
                </select>
            </div>

            {{-- PARENT COA --}}
            <div class="form-group">
                <label>Parent Account</label>
                <select name="parent_id" class="form-control">
                    <option value="">-- No Parent --</option>

                    @foreach($parents as $parent)
                        {{-- jangan pilih diri sendiri --}}
                        @if($parent->id != $account->id)
                            <option value="{{ $parent->id }}"
                                {{ $account->parent_id == $parent->id ? 'selected' : '' }}>
                                {{ $parent->code }} - {{ $parent->name }}
                            </option>
                        @endif
                    @endforeach

                </select>
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-primary">
                Update Account
            </button>

            <a href="{{ route('accounts.index') }}" class="btn btn-secondary">
                Cancel
            </a>
        </div>
    </div>

</form>

@stop