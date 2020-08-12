@extends('layouts.app')

@section('content')
<div class="container" style="">
	<h1 style="color: white;">Account Details</h1>
	<div class="container pb-3" style="background:#ffff88;">
		<div class="row">
			<div class="col-3">
				<div class="pt-5 pl-2 pr-2"><img src="/img/user.png" alt="" style="height:250px"></div>
			</div>
			<div class="col-9">
			 <form method="POST" action="../api/editProfile">
             @csrf
			 <input type="hidden" name="id" value="{{$user->id}}"/>
			<div class="pt-5 pl-12"><input type="text" value="{{$user->username}}"name="username" required style="font-size: 24px; font-weight: bold; border-radius:5px; 
			border:1px solid #DAF7A6; padding:5px 20px; width:50%"></div>
			<br/>
			<div><img src="/img/avatar.png" style="height:40px;" class="pr-3 pb-1"><input type="text" value="{{$user->name}}"name="name" required style="border-radius:5px; border:1px solid white; padding:5px 20px; width:50%"></div>
			<div><img src="/img/call.png" style="height:40px;" class="pr-3 pb-1"><input type="text" value="{{$user->phoneNo}}"name="phoneNo" required style="border-radius:5px; border:1px solid white; padding:5px 20px; width:50%"></div>
			<div><img src="/img/mail.png" style="height:40px;" class="pr-3 pb-1"><input type="text" value="{{$user->email}}"name="email" required style="border-radius:5px; border:1px solid white; padding:5px 20px; width:50%"></div>
			<div><img src="https://image.flaticon.com/icons/svg/1782/1782742.svg" style="height:40px;" class="pr-3 pb-1"><input type="text" value="{{$user->address}}"name="address" required style="border-radius:5px; border:1px solid white; padding:5px 20px; width:50%"></div>
			<br/>
			<button class="btn btn-primary" type="submit" name="editprofile" style="float: right;">Edit profile</button>
			</form>
			</div>
		</div>
	</div>
		
		<br/>
		<br/>
		
	<div class="container pt-4" style="border-radius:3px">
		<h1 style="display: inline; color: white;">My Posts</h1><a href="../addstory/{{$user->id}}" class="btn btn-primary" type="button" style="float: right;">Add Story</a>
		<br/>
		<br/>
		<div class="row">
		
			@foreach($posts as $post)
			<div class="card col-4" style="border: 0; margin-bottom: 20px; background: 0;">
			  <div class="card-header" style="background-color:#ffffaa;">
			  {{$post->title}}
			  <form style="display: inline; float: right; margin-left: 5px;" id="delete-form{{$post->id}}" method="POST" action="../api/deletestory/{{$post->id}}?_method=DELETE">
					<input type="hidden" name="_method" value="DELETE">
					@csrf
					<img onclick="document.getElementById('delete-form{{$post->id}}').submit();" width="25px" height="25px" src="https://img.icons8.com/cute-clipart/2x/delete-forever.png"/>
			  </form>
			  <a href="../updatestory/{{$post->id}}" style="float: right;"><img width="25px" height="25px" src="https://img.icons8.com/cute-clipart/2x/edit.png"/></a>
			  </div>
			  <div class="card-body" style="background: #ffff88;">
				<blockquote class="blockquote mb-0" style="font-color:#FDFEFE">
				  <p>{{$post->content}}</p>
				</blockquote>
				
				
			  </div>
			</div>
			@endforeach
		</div>
	</div>
	
    
	
</div>
@endsection
