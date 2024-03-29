<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWatchJob;
use App\Http\Requests\UpdateWatchJob;
use App\Models\WatchJob;
use App\Services\WatchJobService;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class WatchJobController extends Controller
{
    protected $jobService;

    public function __construct(WatchJobService $jobService)
    {
        $this->jobService = $jobService;
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
	$jobs = WatchJob::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
	return response()->json(["data"=>$jobs]);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateWatchJob $job)
    {
        //
        $this->jobService->store($job->validated(),auth()->user());
        return response()->json(status:  204);
    }

    /**
     * Display the specified resource.
     */
    public function show(WatchJob $watchJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WatchJob $watchJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWatchJob $request, WatchJob $watchJob)
    {
        //
        $this->jobService->update($watchJob,$request->validated());
        return response()->json(status:  204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        //$watchJob->delete();
	    WatchJob::where('id',$id)->delete();

        return response()->json(status:  204);
    }
}
