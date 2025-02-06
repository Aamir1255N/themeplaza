
@extends('layout.master')
@section('content')



<div class="container-fluid mt-4">
    <div class="container">
        
        <div id="alerts">
                    </div>
    </div>


<form method="get" action="https://themeplaza.art/">
	<div class="row">
		<div class="col-md-3 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-fw fa-folder"></i></span>
                </div>
                <select class="form-control" name="category" id="home-category-dropdown">
                    					<option value="themes" >Themes</option>
										<option value="splashes" selected>Splashes</option>
										<option value="badges" >Badges</option>
									</select>
			</div>
		</div>
		<div class="col-md-6 mb-3 d-flex justify-content-between align-items-start">
			<div class="input-group">
                <div class="input-group-prepend">

                <span class="input-group-text"><i class="fa fa-fw fa-search"></i></span>
                </div>
				<input type="text" name="query" placeholder="Search for..." class="form-control" value="user:justtfey" />
				<div class="input-group-btn">
					<button class="btn btn-secondary" type="submit">Go</button>
				</div>
			</div>
		</div>
		<div class="col-md-3 mb-3">
			<div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-fw fa-sort"></i></span>
                </div>
				<select name="sort" class="form-control" data-sort-dropdown data-uri="/splashes?query=user%3Ajusttfey&amp;sort=SORT">
									<option value="newest" >Newest</option>
										<option value="most-downloaded" >Most Downloaded</option>
										<option value="most-liked" >Most Liked</option>
									</select>
			</div>
		</div>
	</div>
</form>



<div class="theme-grid row justify-content-center">
	</div>

	<div class="alert alert-secondary text-center">
		No items to show.
	</div>
<div class="modal fade" id="modal-files-jump">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form method="get">
				<div class="modal-header">
					<h5 class="modal-title">Jump To Page</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="input-group">
						
							<span class="input-group-addon">
								Page
							</span>

							<input type="number" name="page" class="form-control" placeholder="Type page number" value="1" min="1" max="1" />
							
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">Go</button>
							</span>
						</div>
					</div>
				</div>		
		
									<input type="hidden" name="query" value="user:justtfey" />
									
			</form>
		</div>
	</div>
</div>			@endsection