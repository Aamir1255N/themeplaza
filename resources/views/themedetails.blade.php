@extends('layout.master')
@section('content')


<div class="container-fluid mt-4">
	<div class="container">
		<h2 class="display-4">
			@if ($data[0]->icon !== null)
			<img src="{{asset($data[0]->icon)}}" class="img-fluid" />
			@endif
			{{$data[0]->name}} </h2>
		<p class="lead text-muted">{{$data[0]->short_description}}</p>

		<hr />

		<div id="alerts">
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card mb-3">
					<div class="card-body text-center" style="position: relative;">
						<div style="background-image: url({{asset('storage/'.$data[0]->qr)}}) !important; background-repeat: no-repeat !important; background-position:center !important; background-size:contain !important;" data-qr-code></div>
						<img id="preview-image" class="img-fluid mb-3 mb-md-0" src="{{asset($data[0]->preview)}}"
							alt="{{$data[0]->name}}" />
						<img id="preview-image2" class="img-fluid mb-3 mb-md-0" src="{{asset($data[0]->preview2)}}"
							alt="{{$data[0]->name}}" />
					</div>
				</div>

				<div class="mb-3">
					{{-- <div class="btn-group d-flex mb-1" role="group">
						<button type="button" class="btn btn-theme w-100" data-preview="preview">Uploaded
							Preview</button>
						<button type="button" class="btn btn-theme w-100" data-preview="preview/generated">Generated
							Preview</button>
					</div> --}}
					<div class="btn-group d-flex mb-1" role="group">
						<button type="button" class="btn btn-theme w-100" data-preview="preview/top">Top
							Screen</button>
					</div>
					<div class="btn-group d-flex" role="group">
						<button type="button" class="btn btn-theme w-100" data-preview="preview/bottom">
							Bottom Screen
						</button>
					</div>
				</div>

				<div class="card mb-3">
					<div class="card-body">
						A character theme for Hu Tao from the game Genshin Impact!<br />
						<br />
						All assets are taken from official sources.
					</div>
				</div>

				<div class="card mb-3">
					<div class="card-header">
						Metadata
					</div>
					<div class="card-body py-0">
						<div class="row tr">
							<div class="col-6">Top Screen Draw Type</div>
							<div class="col-6">Texture</div>
						</div>
						<div class="row tr">
							<div class="col-6">Top Scroll?</div>
							<div class="col-6">No Scroll</div>
						</div>
						<div class="row tr">
							<div class="col-6">Bottom Screen Draw Type</div>
							<div class="col-6">Texture</div>
						</div>
						<div class="row tr">
							<div class="col-6">Bottom Scroll?</div>
							<div class="col-6">No Scroll</div>
						</div>
						<div class="row tr">
							<div class="col-6">Custom Cursor?</div>
							<div class="col-6">Yes</div>
						</div>
						<div class="row tr">
							<div class="col-6">Custom Folder Icon?</div>
							<div class="col-6">Yes</div>
						</div>
						<div class="row tr">
							<div class="col-6">Custom Cart Icon?</div>
							<div class="col-6">Yes</div>
						</div>
						<div class="row tr">
							<div class="col-6">Custom SFX?</div>
							<div class="col-6">Yes</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col-lg">
								{{-- <a href="../download/Hu%20Tao%20-%20Genshin%20Impact%20by%20Moggie%20(33790).zip"
									class="btn btn-lg btn-block btn-theme"><i class="fa fa-fw fa-download"></i>
									Download</a> --}}
									<a class="btn btn-lg btn-block btn-theme download-btn" data-id="{{ $data[0]->id }}"
										href="{{ asset($data[0]->body) }}" target="_blank" title="Download" data-toggle="tooltip" >
										<span data-download-count="{{ $data[0]->id }}"></span>
										{{-- <span >{{ $data[0]->downloads }}</span> --}}
										<i class="fa fa-fw fa-download"></i>  Download
									</a>
							</div>
						</div>
					</div>
				</div>
				@if ($data[0]->bgm != null)
					
				<div class="card mb-3">
					<div class="card-body">
						{{-- <p>Let the Living Beware (tnbee mix) | Genshin Impact</p> --}}
						<audio class="d-block mx-auto" src="{{asset($data[0]->bgm)}}" style="width: 100%;" controls>Your
							browser does not support the audio tag.</audio>
					</div>
				</div>
				@endif


				<div class="card mb-3">
					<div class="card-body py-0">
						<div class="row tr">
							<div class="col-6">Category</div>
							@php
							use App\Models\category;
							$category = category::where("id",$data[0]->category_id)->get();
							@endphp
							<div class="col-6">{{$category[0]->name}}</div>
						</div>
						<div class="row tr">
							<div class="col-6">Uploader</div>
							<div class="col-6"><a href="#">{{$data[0]->uploader}}</a></div>
						</div>
						<div class="row tr">
							<div class="col-6">Date</div>
							<div class="col-6">{{\Carbon\Carbon::parse($data[0]->created_at)->format('d-m-Y')}}</div>
						</div>
						<div class="row tr">
							<div class="col-6">Downloads</div>
							<div class="col-6">{{$data[0]->downloads}} <i class="fa fa-fw fa-download"></i></div>
						</div>
						<div class="row tr">
							<div class="col-6">Likes</div>
							<div class="col-6">{{$data[0]->likes}} <i class="fa fa-fw fa-heart"></i></div>
						</div>
						<div class="row tr">
							<div class="col-6">Dislikes</div>
							<div class="col-6">{{$data[0]->dislikes}} <i class="fa fa-fw fa-heart"></i></div>
						</div>
						<div class="row tr">
							<div class="col-12">
								<a href="#"><span
										class="badge badge-primary bg-theme p-1">{{$data[0]->tags}}</span></a>
								
							</div>
						</div>
					</div>
				</div>

				{{-- <div class="card mb-3">
					<div class="btn btn-outline-warning" onclick="jQuery('.report-container').slideToggle();">
						Report Content
					</div>
					<div class="p-3 report-container" style="display: none;">
						<div class="alert alert-info mb-0">To report content, please <a href="../log-in.html">log
								in</a>.</div>
					</div>
				</div> --}}


				{{-- <div class="card comments" data-comment-card>

					<input type="hidden" data-item-id value="33790" />

					<div class="card-header">
						Comments
					</div>
					<div class="card-body" data-comment-form-card-body>
						<div class="text-center">
							<a href="../log-in.html">Log in</a> to add a comment.
						</div>
					</div>
					<div id="comment_5878" class="card-body comment">
						<div class="d-flex">
							<img class="rounded-circle"
								src="https://www.gravatar.com/avatar/c38723b51d5647de55350b99302c58a1?d=identicon&amp;s=84"
								alt="stemtec" />
							<div class="px-3" style="flex: 1;">
								<a href="../profile/stemtec.html"><strong>stemtec</strong></a> zhongli please <div
									class="d-flex justify-content-between mt-2">
									<div>
									</div>
									<span class="text-muted">3 years ago</span>
								</div>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
	@endsection