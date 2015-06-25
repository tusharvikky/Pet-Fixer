<?php

namespace Mazkara\Http\Controllers;

use Illuminate\Http\Request;

use Mazkara\Http\Requests;
use Mazkara\Http\Controllers\Controller;

use Mazkara\Pet;
use Mazkara\Service;

class PetController extends Controller
{

    protected $user;

    /**
     * Contruct
     *
     * @return void
     * @author tusharvikky@gmail.com
     **/
    public function __construct()
    {
        $this->middleware('sentry.auth');
        $this->user = \Sentry::getUser();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['pets'] = Pet::where('userId', $this->user->id)
                                ->with('user')
                                ->with('services')
                                ->get();
        // dd( $data['pets']);
        return \View::make('pet.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data['services'] = Service::where('userId', $this->user->id)->get();

        return \View::make('pet.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $inputs = \Request::all();

        $v = \Validator::make(
            $inputs,
            ['pet' => 'required',
            'services' => 'required']
            );

        if($v->fails())
            return \Redirect::back()->withInput()->withErrors($v);

        foreach($inputs['services'] as $service) {
            $pet = new Pet;
            $pet->name = $inputs['pet'];
            $pet->userId = $this->user->id;
            $pet->serviceId = $service;
            $pet->save();
        }

        return \Redirect::route('pet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $pet = Pet::find($id);
        
        if(!ctype_alnum($id) || $pet == null)
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

        dd($pet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $pet = Pet::find($id);
        
        if(!ctype_alnum($id) || $pet == null)
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

        $pet->delete();

        return \Redirect::route('pet.index');

    }
}
