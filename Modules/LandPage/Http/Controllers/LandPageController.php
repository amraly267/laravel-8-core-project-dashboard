<?php

namespace Modules\LandPage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use mysqli;
use Modules\User\Entities\User;
use Config;

class LandPageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('landpage::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('landpage::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $servername = "localhost";
        $username = $request->db_username;
        $password = $request->db_password;

        // Create connection
        $conn = new mysqli($servername, $username, $password);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        // Create database
        $sql = "CREATE DATABASE ".$request->db_name;
        if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
        } else {
        echo "Error creating database: " . $conn->error;
        }

        $conn->close();


        User::create($request->all());

        Config::set('database.connections.mysql.database', $request->db_name);
        Config::set('database.connections.mysql.username', $request->db_username);
        Config::set('database.connections.mysql.password', $request->db_password);
        DB::purge('mysql');

        \Artisan::call('migrate');
        \Artisan::call('dashboard:dummy');

        // DB::getConnection()->statement('CREATE DATABASE :schema', ['schema' => $request->db_name]);
        // dd($request->all());
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('landpage::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('landpage::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
