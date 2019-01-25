<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Auth;
use App\User;
use App\Tenant;
use App\TenantUser;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function workspace()
    {
        return view('workspace');
    }

    public function workspacefind(Request $request)
    {
        $name = $request->workspace;  
         
        $workspaces = Tenant::where('workspace', 'like' , "%$name%")->get(['id','workspace']);
    
        return $workspaces;  
    }

    public function workspaceget(Request $request)
    {
        $loggedinid = Auth::user()->id; 
          
        $workspaces = DB::select('SELECT  a.`id`, a.`user_id`,  a.`workspace`,  a.`company`, a.`url` 
                                        FROM `tenants` a ,  `tenant_users` b 
                                        WHERE a.`id` = b.`tenant_id`
                                        AND a.`status` = 1
                                        AND b.`status` = 1
                                        AND a.`user_id` = :userid
                                        ORDER BY a.`updated_at` DESC
                                        limit 10',[ 'userid' => $loggedinid ]);
    
        return $workspaces;  
    }

    public function workspacejoin(Request $request)
    {

        $workspace = $request->workspace; 
        $id = $request->id; 

        return view('workspacejoin', compact('workspace', 'id'));

    }

    public function workspacejoined(Request $request)
    {
        $workspace = $request->workspace; 
        $id = $request->id; 
      //  $code = $request->code;  

        $loggedinid = Auth::user()->id; 

        $tenantExists = Tenant::where('id','=',$id)
                    ->where('workspace','=',$workspace)
                //    ->where('code','=',$code)
                    ->where('status','=', 1)
                    ->first(['id','user_id'  ]); 

        if( isset($tenantExists->id)  ){

            $tenantuserexist = TenantUser::where('tenant_id', '=' , $id)->where('user_id', '=' , $loggedinid)->first(['id']); 

            if( isset($tenantuserexist)){
                 
            }else{

                $newtenantuser = TenantUser::create(
                    [   'user_id' => $loggedinid, 
                         'tenant_id' => $id,
                        'admin' =>  0, 
                        'status' => 0,
                    ]);

                return 1;     
            }

        }else{

            return 0; 
        }
      
    }

    public function workspacecreate(Request $request)
    {
        $workspace = $request->name; 
        return view('workspacecreate', compact('workspace'));
        
    }

    public function workspacecreated(Request $request)
    {
        $workspace = $request->workspace; 
    //    $company = $request->company; 
    //    $city = $request->city; 
        $url = "https://askpls.com/" . $workspace ;
        $code = mt_rand(100000, 999999);

        $loggedinid = Auth::user()->id; 

        $tenantexist = Tenant::where('workspace', '=' , $workspace)->first(['id']); 


        if( isset($tenantexist)){


        }else{

            $newtenant = Tenant::create(
                [   'user_id' => $loggedinid, 
                    'workspace' =>  $workspace,  
                    'url' => $url, 
                    'code' => $code,
                    'status' => '1', 
                ]); 

            $tenant_id = $newtenant->id;

            $newtenantuser = TenantUser::create(
                    [   'user_id' => $loggedinid, 
                         'tenant_id' => $tenant_id,
                        'admin' =>  1, 
                        'status' => 1,
                    ]); 


            $userupdate = User::where('id', $loggedinid)->update(['tenant' => 1]);
             
            return $newtenant; 
        }

        

        
        
    }
}
