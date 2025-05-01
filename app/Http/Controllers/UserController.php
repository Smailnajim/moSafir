<?php

namespace App\Http\Controllers;

use App\DTOs\UserDto;
use App\Repositories\Interfaces\IPost;
use App\Repositories\Interfaces\IReaction;
use App\Repositories\Interfaces\IRole;
use App\Repositories\Interfaces\IStatus;
use App\Repositories\Interfaces\IUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private IPost $postR;
    private IUser $userR;
    private IRole $roleR;
    private IStatus $statusR;
    private IReaction $reactionR;

    public function __construct(IUser $userR, IRole $roleR, IStatus $statusR, IPost $postR, IReaction $reactionR)
    {
        $this->userR = $userR;
        $this->roleR = $roleR;
        $this->statusR = $statusR;
        $this->postR = $postR;
        $this->reactionR = $reactionR;
    }
    public function aboutus(){
        return view('clinet.aboutus');
    }

    public function indexAdmin(){
        $users = [];
        $usersAll = $this->userR->all();
        foreach ($usersAll as $userOne) {
            $users[] = UserDto::createUsertDto(
                $userOne->id,
                $userOne->image,
                $userOne->first_name,
                $userOne->last_name,
                $this->roleR->getById($userOne->role_id)->name,
                $this->statusR->getById($userOne->status_id)->name
            );
        }
        return view('admin.index', compact('users'));
    }


    public function activeUser(int $id){
        $status = $this->statusR->getByCulomn('name', 'Activ');
        if($status === null)
            $status = $this->statusR->create(['name' => 'Activ']);
        $this->userR->updateCulomn('status_id', $status->id, $id);
        return redirect()->route('adminindex');
    }
    public function blockUser(int $id){
        $status = $this->statusR->getByCulomn('name', 'Block');
        if($status === null)
            $status = $this->statusR->create(['name' => 'Block']);
        $this->userR->updateCulomn('status_id', $status->id, $id);
        return redirect()->route('adminindex');
        // return redirect()->route('adminindex');
    }
    public function deleteUser(int $id){
        $ids = [];
        $user = $this->userR->getById($id);
        $posts = $user->posts;

        if($this->userR->deletetById($user->id)){
            foreach ($posts as $post) {
                $ids [] = $post->id;
            }
            $rections = $this->postR->deletetPostsByIds($ids);
            $this->reactionR->deletetGroupById($rections);
            return back()->with('status', 'delete ' . $user->first_name . ' By seccessful');
        }
        return back()->with('status', 'there is a problem whene tring to delet ' . $user->first_name);
    }
}