<?php

namespace Mazkara\Http\Controllers;

use Illuminate\Http\Request;

use Mazkara\Http\Requests;
use Mazkara\Http\Controllers\Controller;

use Mazkara\Pet;
use Mazkara\Service;

class ServiceController extends Controller
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
        $data['services'] = Service::where('userId', $this->user->id)
                                ->with('user')
                                ->with('pets')
                                ->get();
        // dd( $data['services']);
        return \View::make('service.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('service.create');
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
            ['service' => 'required']
            );

        if($v->fails())
            return \Redirect::back()->withInput()->withErrors($validator);

        $service = new Service;
        $service->name = $inputs['service'];
        $service->userId = $this->user->id;
        $service->save();

        return \Redirect::route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        
        if(!ctype_alnum($id) || $service == null)
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

        dd($service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        dd('show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        dd("update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        
        if(!ctype_alnum($id) || $service == null)
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

        $service->delete();

        return \Redirect::route('service.index');
    }
}
