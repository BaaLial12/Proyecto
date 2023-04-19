<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use App\Models\Group;
use Illuminate\Http\Request;

class CredentialController extends Controller
{
    //



    public function update(Request $request){

        // dd($request->grupo);

        $grupo = Group::findOrFail($request->grupo);


        dd($grupo->credential_id);


    }



}
