<?php

namespace App\Http\Controllers;

use App\Models\bet;
use App\Models\pot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KalkulatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = pot::all();
        $winner = User::all();
        return view('kalkulator',compact('data','winner'));
    }

   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'mimes' => 'file yang didukung yaitu jpg,jpeg,giv,svg,cr2',
            'size' => 'file yang diupload maksimal :size',

        ] ;

         

      bet::create([
        'bet_amount' => $request->bet_amount,
        'user_id' => $request->user_id,
      ]);
        return redirect('/kalkulator');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = [
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attibute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
          
        ] ;

        $this->validate($request,[
            'chip' => 'numeric',
    

      ],$message);

      $user = User::find($id);
      $user->chip = $request->chip;
      $user->update();
      return redirect('/kalkulator');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function reset(){
        bet::truncate();
        return redirect('/kalkulator');
    }
}
