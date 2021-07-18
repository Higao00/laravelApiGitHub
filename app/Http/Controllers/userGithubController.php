<?php

namespace App\Http\Controllers;

use App\Models\Gituser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class userGithubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Gituser::all();

        return view('home', compact('data'));
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
        $data = $request->all();

        if (!count(Gituser::where('idGit', $data['id'])->get()) > 0) {
            $aux_data = Gituser::create([
                'login'                 => $data['login'],
                'idGit'                 => $data['id'],
                'node_id'               => $data['node_id'],
                'avatar_url'            => $data['avatar_url'],
                'gravatar_id'           => $data['gravatar_id'],
                'url'                   => $data['url'],
                'html_url'              => $data['html_url'],
                'followers_url'         => $data['followers_url'],
                'following_url'         => $data['following_url'],
                'gists_url'             => $data['gists_url'],
                'starred_url'           => $data['starred_url'],
                'subscriptions_url'     => $data['subscriptions_url'],
                'organizations_url'     => $data['organizations_url'],
                'repos_url'             => $data['repos_url'],
                'events_url'            => $data['events_url'],
                'received_events_url'   => $data['received_events_url'],
                'type'                  => $data['type'],
                'site_admin'            => $data['site_admin'],
                'name'                  => $data['name'],
                'company'               => $data['company'],
                'blog'                  => $data['blog'],
                'location'              => $data['location'],
                'email'                 => $data['email'],
                'hireable'              => $data['hireable'],
                'bio'                   => $data['bio'],
                'twitter_username'      => $data['twitter_username'],
                'public_repos'          => $data['public_repos'],
                'public_gists'          => $data['public_gists'],
                'followers'             => $data['followers'],
                'following'             => $data['following'],
                'git_created_at'        => $data['created_at'],
                'git_updated_at'        => $data['updated_at']
            ]);

            $result["success"] = true;
            $result["message"] =  "Usuarios inseridos com sucesso!!";
            $result["dados"] = $aux_data;
        } else {
            $result["success"] = false;
            $result["message"] =  "Usuario já está cadastrado !!";
        }

        echo json_encode($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Gituser::where('idGit', $id)->get();
        $result["success"] = true;
        $result["dados"] = $data;

        echo json_encode($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gituser::destroy($id);

        $result["success"] = true;
        $result["dados"] = $id;
        echo json_encode($result);
    }
}
