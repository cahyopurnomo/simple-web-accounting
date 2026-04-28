<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::with('children')->whereNull('parent_id')->get();
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        $parents = Account::all();
        return view('accounts.create', compact('parents'));
    }

    public function store(Request $request)
    {
        Account::create($request->all());
        return redirect()->route('accounts.index');
    }

    public function edit(Account $account)
    {
        $parents = Account::all();
        return view('accounts.edit', compact('account', 'parents'));
    }

    public function update(Request $request, Account $account)
    {
        $account->update($request->all());
        return redirect()->route('accounts.index');
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return back();
    }
}
