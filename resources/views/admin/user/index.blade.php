@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form id="searchForUsers" method="GET" action="{{ route('admin.user.show') }}">
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" placeholder="Username...">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="date">Created at</label>
								<input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" >
							</div>
						</div>

						<!-- Bad way tp place the button -->
						<div>
							<label id="lab">&nbsp;</label>
						</div>										

						<div class="col-md-2">
							<button type="submit" class="btn btn-primary">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
					</div>
				</form>	
			</div>
		</div>
		</div>


		<div class="row-fluid">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover table-responsive">
								<thead>
									<tr>
										<th>#</th>
										<th>Username</th>
										<th>Email</th>
										<th>Created at</th>
										<th>Updated at</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)							
											<tr class='clickable-row' data-href="{{ route('admin.user.edit', ['id' => $user->id]) }}">
												<th scope="row">{{ $user->id }}</th>
												<td>{{ $user->username}}</td>
												<td>{{ $user->email }}</td>
												<td>{{ $user->created_at }}</td>
												<td>{{ $user->updated_at }}</td>
											</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="center">
						{{ $users->appends(['username' => old('username'), 'date' => old('date')])->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

