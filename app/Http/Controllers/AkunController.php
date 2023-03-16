<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $akun = Account::get();
        return view('admin.akun',compact('akun'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        if (User::where('username', '=', $input['username'])->first() == false) {
            $request->merge([
                
                'password' => bcrypt($request->password),            
                'name' => $request->name,
                'role'=> $request->role,
               
                
            ]);
            User::create($request->except(['_token']));
          

            return redirect()->back()->with('message', 'Berhasil Mendaftar Akun');
            // return $i;
        } else {
            // return "eror";
            return redirect()->back()->with('error', 'Username sudah terdaftar');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        if($request->password){

            Account::where('username',$id)->update([
                'password' => bcrypt($request->password),            
                'name' => $request->name,
                'role'=> $request->role,
            ]);
            return redirect()->back()->with('message', 'Berhasil meperbeharui Akun beserta pasword');

        }else{
            Account::where('username',$id)->update([
              
                'name' => $request->name,
                'role'=> $request->role,
            ]);
            return redirect()->back()->with('message', 'Berhasil meperbeharui Akun tanpa pasword');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Account::where('username',$id)->delete();
        return redirect()->back()->with('message', 'Berhasil hapus Akun');
    }
}
