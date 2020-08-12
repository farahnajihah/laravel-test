<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\User;
use \App\Post;

class ProfileController extends Controller
{	
	public function editProfile(Request $request)
    {
		$id = $request->input('id');
		$name = $request->input('name');
		$username = $request->input('username');
		$email = $request->input('email');
		$phoneNo = $request->input('phoneNo');
		$address = $request->input('address');
		
		User::where('id', $id)
			->update(
			[
				'email' => $email,
				'name' => $name,
				'username' => $username,
				'address' => $address,
				'phoneNo' => $phoneNo
			]
			);
			
		return redirect(env('APP_URL').'/profile');
    }
	
	public function deletestory($id){
		Post::where('id',$id)->delete();
		return redirect(env('APP_URL').'/profile');
	}
	
	public function addstory($userid){
		return view('addstory',['userid' => $userid,]);
	}
	
	public function addstoryAPI(Request $request){
		$post = new Post;
		$post->title = $request->title;
		$post->content = $request->content;
        $post->userid = $request->userid;
        $post->save();
		
		return redirect(env('APP_URL').'/profile');
	}
	
	public function updatestory($storyid){
		$post= Post::where('id',$storyid)->get();
		return view('updatestory',['post' => $post,]);
	}
	
	public function updatestoryAPI(Request $request){
		Post::where('id', $request->id)
			->update(
			[
				'title' => $request->title,
				'content' => $request->content,
			]
			);
		
		return redirect(env('APP_URL').'/profile');
	}
}
