<?php

namespace App\Http\Controllers;


use App\Client;
use App\ClientWorkspace;
use App\Utility;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($slug)
    {
        $this->middleware('auth');
        $currantWorkspace = Utility::getWorkspaceBySlug($slug);
        $clients = Client::join('client_workspaces','client_workspaces.client_id','=','clients.id')->where('client_workspaces.workspace_id','=',$currantWorkspace->id)->get();
        return view('clients.index',compact('currantWorkspace','clients'));
    }

    public function create($slug)
    {
        $currantWorkspace = Utility::getWorkspaceBySlug($slug);
        return view('clients.create',compact('currantWorkspace'));
    }

    public function store($slug,Request $request)
    {
        $currantWorkspace = Utility::getWorkspaceBySlug($slug);
        $client  = Client::join('client_workspaces','clients.id','=','client_workspaces.client_id')->where('clients.email','=',$request->email)->where('client_workspaces.workspace_id','!=',$currantWorkspace->id)->first();
        if(!$client){
            $registerClient = Client::create($request->all());
            ClientWorkspace::create(['client_id'=>$registerClient->id,'workspace_id'=>$currantWorkspace->id]);
            return redirect()->route('clients.index',$currantWorkspace->slug)
                ->with('success',  __('Client Created Successfully!'));
        }
        else{
            return redirect()->route('clients.index',$currantWorkspace->slug)
                ->with('error', __('Email Already Exist!'));
        }
    }
}
