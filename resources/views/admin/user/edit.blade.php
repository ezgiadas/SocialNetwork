@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">

		<div class="panel panel-default">
			<div class="panel-body">
				<div>
					<a class="btn btn-large btn-primary" href="{{ URL::previous() }}">BACK</a>
					<img class="img-circle img-responsive center-block picture-size" src="{{ $user->profile_pic }}" alt="Profil Picture">
				</div>	

				<form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
					{{-- Form Method Spoofing --}}
					{{ method_field('PUT') }}
					{{ csrf_field() }}
					<div class="form-group">
						<label for="username">Username:</label>
						<input type="text" class="form-control" name="username" id="username" value="{{ $user->username }}" placeholder="Username...">
					</div>

					<div class="form-group">
						<label for="username">Email:</label>
						<input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" placeholder="Email...">
					</div>

					<label>Settings</label>
						<div class="checkbox">
							<label>
								<input 
								type="checkbox" name="is_admin"  value="{{ $user->is_admin }}" @if ($user->is_admin == 1) checked @endif/>Admin 
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input 
								type="checkbox" name="is_mod" @if ($user->is_mod == 1) checked @endif/>Moderator
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input 
								type="checkbox" name="is_private" @if ($user->is_private == 1) checked @endif/>Private
							</label>
						</div>

					<div class="form-group">
						<label for="profile_pic">Profil picture:</label>
						<input type="file" name="profile_pic" id="profile_pic"/>
					</div>

					<div class="form-group">
						<label for="about_me">About me:</label>
						<textarea class="form-control" rows="3" id="about_me" name="about_me" maxlength="200">{{ $user->about_me }}</textarea>
					</div>

					<button type="submit" class="btn btn-primary btn-block">UPDATE</button>

				</form>

				<form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
					{{-- Form Method Spoofing --}}
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger btn-block margin-up-btn">DELETE</button>
				</form>		
			</div>
		</div>
	</div>
</div>

@endsection