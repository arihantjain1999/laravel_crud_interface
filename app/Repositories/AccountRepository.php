<?php

namespace App\Repositories;
use App\Models\Account;
use App\Interface\AccountRepositoryInterface;

class AccountRepository implements AccountRepositoryInterface 
{
    public function all(){
        $accounts = Account::all();
        return $accounts;
    }
    public function find($id){
        $account = Account::find($id);
        return $account;
    }
    public function update($id,$request){
        $fields = $request->all();
        // $account = new account;
        $account = account::find($id);
        $account->update($fields);
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
        return redirect()->route('account.index')->with('Success','Person details has been updated successfully');
  
    }
    public function delete($id){
        return Account::find($id)->delete();
    }
    public function create($data){
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
        $account = Account::create($data);
   }
}