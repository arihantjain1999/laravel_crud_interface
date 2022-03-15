<?php

namespace App\Http\Controllers;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Interface\AccountRepositoryInterface;
// use Illuminate\Support\Facades\View;

class AccountController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $accountRepo ;
    public function __construct(AccountRepositoryInterface $account)
    {
        $this->accountRepo = $account;
        // $this->middleware('auth');
    }

    public function index()
    {
        // $accounts = Account::orderby('id','asc')->paginate();
        return view('account.index',['accounts' => $this->accountRepo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $account = new account;
        $fields = $request->all();
        $this->accountRepo->create($fields);
        // $account = new account;
        // $fields = $request->all();
        // $account->fill($fields);
        // $account = account::find($id);
        // $account->f_name = $request->f_name;
        // $account->l_name = $request->l_name;
        // $account->dob = $request->dob;
        // $account->phone = $request->phone;
        // $account->email = $request->email;
        // $account->address = $request->address;
        // $account->hobby = $request->hobby;
        // $account->gender = $request->gender;
        // $account->country = $request->country;
        // $account->save();
        return redirect()->route('account.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return view('account.show',['account'=>$this->accountRepo->find($account->id)]);
        // return view('account.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('account.edit',['account' => $this->accountRepo->find($account->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $this->accountRepo->update($account->id,$request);

        // $fields = $request->all();
        // $account = account::find($account->id);
        // $account->update($fields);
        // $account->save();
        return redirect()->route('account.index')->with('Success','Person details has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $this->accountRepo->delete($account->id);
        return redirect()->route('account.index')->with('Success','Person details has been deleted successfully');
    
    }
}