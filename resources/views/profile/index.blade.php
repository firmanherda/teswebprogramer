@extends('layouts.app')
@section('content')
	<div class="container-fluid py-4">
		<div class="row">
			<div class="col-12">

				<div class="row align-items-center">
					<div class="col-md-6 d-flex align-items-center">
						<!-- Gambar bundar -->
						<div class="rounded-circle overflow-hidden me-3" style="width: 200px; height: 200px;">
							<img src="{{ asset($user->image) }}" class="w-100 h-100" alt="Profile Picture">
						</div>
						<!-- Ikon edit -->
						<i class="fas fa-edit text-primary"></i>
					</div>
					<h2>{{Auth::user()->name}}</h2>
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="category" class="form-label">Nama Kandidat</label>
								<input type="text" class="form-control form-control-lg" name="name" id="name" value="{{Auth::user()->name}}">
								@error('name')
								<div class="form" style="font-size: 12px; color: red">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="name" class="form-label">Posisi Kandidat</label>
								<input type="text" class="form-control form-control-lg" name="name" id="name" value="{{Auth::user()->candidate_position}}">
								@error('candidate_position')
								<div class="form" style="font-size: 12px; color: red">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
@endsection
