<form method="get" id="sort-form" action="/">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-fw fa-folder"></i></span>
                </div>
                <select class="form-control" name="category" onchange="xyz()" id="category-feild">
                   <option value="">Select Themes</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-3 d-flex justify-content-between align-items-start">
            <div class="input-group">
                <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fa fa-fw fa-search"></i></span>
                </div>
                <input type="text" name="search" placeholder="Search for..." class="form-control" value="{{old('search')}}"  />
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
                <select name="sort" class="form-control" onchange="xyz()">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                    <option value="most-downloaded" {{ request('sort') == 'most-downloaded' ? 'selected' : '' }}>Most Downloaded</option>
                    <option value="most-liked" {{ request('sort') == 'most-liked' ? 'selected' : '' }}>Most Liked</option>
                </select>
            </div>
        </div>
    </div>
</form>
<Script>
    function xyz(){
        document.getElementById('sort-form').submit();
    }
</Script>
