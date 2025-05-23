<?php

namespace App\Http\Controllers;

use App\DTOs\PostDto;
use App\DTOs\ProfilleDto;
use App\Models\Post;
use App\Repositories\Interfaces\IPost;
use App\Repositories\Interfaces\IUser;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private IPost $postR;
    private IUser $userR;

    public function __construct(IPost $PostRepository, IUser $UserRepository)
    {
        $this->postR = $PostRepository;
        $this->userR = $UserRepository;
    }
// profiles
// user_profile_table_pivo
    public function render(){
        $user = ProfilleDto::createProfilleDto(
            auth()->user()->image,
            auth()->user()->first_name,
            auth()->user()->last_name,
            auth()->user()->myProfile->name,
            $this->postR->countPosts(auth()->user()->id),
            auth()->user()->myProfile->users()->count(), //for calcel number followers
            auth()->user()->profiles->count(), //for calcel number following
        );
        $posts = $this->randomTenPosts();
        return view('client.Community', compact('posts', 'user'));
    }
    public function differenceTime(string $createdAt){
        $createdAtOb = date_create($createdAt);
        $now = date_create(now());

        $interval = date_diff($createdAtOb, $now);
        if($interval->y == 0){
            if($interval->m == 0){
                if($interval->d == 0){
                    if($interval->h == 0){
                        if($interval->i == 0){
                            if($interval->s == 0){
                                return '0s';
                            }
                            else{
                                return $interval->s . 's';
                            }
                        }
                        else{
                            if($interval->s == 0){
                                return $interval->i . ' min';
                            }
                            else{
                                return $interval->i . ' min ' . $interval->s . 's';
                            }
                        }
                    }
                    else{
                        if($interval->i == 0){
                            return $interval->h . ' h';
                        }
                        else{
                            return $interval->h . ' h ' . $interval->i . ' min';
                        }
                    }
                }
                else{
                    if($interval->h == 0){
                        return $interval->d . ' days';
                    }
                    else{
                        return $interval->d . ' days ' . $interval->h . ' h';
                    }
                }
            }
            else{
                if($interval->d == 0){
                    return $interval->m . ' month';
                }
                else{
                    return $interval->m . ' month' . $interval->d . ' days ';
                }
            }
        }
        else{
            if($interval->m == 0){
                if($interval->d == 0){
                    return $interval->y . ' years';
                }
                else{
                    return $interval->y . ' years '.$interval->d . ' days';
                }
            }
            else{
                if($interval->d == 0){
                    return  $interval->y . ' years ' . $interval->m . ' month';
                }
                else{
                    return $interval->y . ' years ' . $interval->m . ' month' . $interval->d . ' days ';
                }
            }
        }
    }

    public function randomTenPosts(){  
        $ids = [];
        $postsDto = [];

        while (count($ids) < 10){
            $id = rand($this->postR->minId(), $this->postR->maxId()); 
            if($this->postR->checkIdIfExiste($id))
            $ids[] = $id;
        }
        $posts = $this->postR->postsByIds($ids);
        foreach ($posts as $post) {
            $user = $this->userR->getById($post->user_id);
            $time = $this->differenceTime($post->created_at) . ' ago';
            $postsDto[] = PostDto::createPostDto($user->image, $user->first_name . ' ' . $user->last_name, $time, $post->description, $post->image, $user->status, $user->id, $user->id);
        }
        return $postsDto;
    }

    public function allPosts(){
        $posts = [];
        $postsI = $this->postR->pagination();
        foreach ($postsI as $post) {
            $user = $post->user;
            $posts[] = PostDto::createPostDto($user->image, $user->first_name.' '.$user->last_name, $this->differenceTime($post->created_at), $post->description, $post->image, $user->status->name, $post->id, $user->id);
        }
        return view('admin.t', compact('posts'));
    }

    public function deletePost(int $id){
        if($this->postR->deletetById($id))
            return redirect()->back();
    }

    public function createPost(Request $request){
        $valedate = $request->validate([
            'description' => 'required',
            'image' => 'required'
        ]);
        
        $this->postR->create([
            'description' => $valedate['description'],
            'image' => $valedate['image'],
            'user_id' => auth()->user()->id
        ]);

        return back();


    }
}
