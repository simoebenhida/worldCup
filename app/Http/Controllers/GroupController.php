<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GroupController extends Controller
{
    public function fetch()
    {
        $client = new Client();
        $res = $client->request('GET', 'http://worldcup.sfg.io/teams/group_results');
        return collect(json_decode($res->getBody(), true));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        collect($this->fetch())->each(function ($item, $key) {
            $group = Group::where('letter', $item['letter'])->first();
            if ($group) {
                $group->update([
                    'letter' => $item['letter'],
                    'teams' => json_encode($item['ordered_teams'])
                ]);
            } else {
                Group::create([
                    'letter' => $item['letter'],
                    'teams' => json_encode($item['ordered_teams'])
                ]);
            }
        });
        
        return view('groups', [
            'groups' => Group::all()
        ]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
