<?php
namespace  App\Services;

use App\Models\User;
use App\Models\WatchJob;
use Illuminate\Support\Str;

class WatchJobService
{
    function store(array $data,User $user)
    {
        $slug = Str::slug($data['name']);
        $watchJob = WatchJob::create([
            'user_id'=>$user->id,
            'name'=>$data['name'],
            'slug'=>$slug,
            'url'=>$data['url'],
            'tags'=>$data['tags']
        ]);
    }
    function update(WatchJob $watchJob,array $data)
    {
        $attributes = $data;
        if(isset($data['name'])){
            $slug = Str::slug($data['name']);
            $attributes = [...$data,['slug'=>$slug]];
        }

        $watchJob->update($attributes);
    }
}
