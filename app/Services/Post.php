<?php

namespace App\Services;

use App\Services\Interfaces\Service;
use Illuminate\Support\Facades\Auth;

class Post implements Service
{
    public $name = '';

    // public function __construct($name)
    // {
    //     $this->name = $name;
    // }

    public function save($request, $post)
    {
        // if (isset($requestData['postImage'])) {
        //     $requestData['image'] = $requestData['postImage']->store('post', 'public');
        // }
        // return $post->add($requestData);

        $requestData = $request->validated();
        if ($request->hasFile('postImage')) {
            $filePath = $request->postImage->store('post', 'public');
            $requestData['image'] = $filePath;
        }
        $requestData['created_by'] = Auth::user()->id;
        return $post->add($requestData);
    }

    public function getServiceName()
    {
        return 'Service Name is Post';
    }
}
