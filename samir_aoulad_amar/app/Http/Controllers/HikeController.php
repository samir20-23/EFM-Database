<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use App\Services\HikeService;
use Illuminate\Http\Request;

class HikeController extends Controller
{
    protected $hikeService;
    public function __construct(HikeService $hikeService)
    {
        $this->hikeService = $hikeService;
    } 

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($review)
    {
        //
    }

}