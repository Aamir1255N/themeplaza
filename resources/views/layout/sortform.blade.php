<form method="get" action="https://themeplaza.art/">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-fw fa-folder"></i></span>
                </div>
                <select class="form-control" name="category" id="home-category-dropdown">
                    <option value="themes" selected>Themes</option>
                    <option value="splashes">Splashes</option>
                    <option value="badges">Badges</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-3 d-flex justify-content-between align-items-start">
            <div class="input-group">
                <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fa fa-fw fa-search"></i></span>
                </div>
                <input type="text" name="query" placeholder="Search for..." class="form-control" value="" />
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
                <select name="sort" class="form-control" data-sort-dropdown data-uri="/themes?sort=SORT">
                    <option value="newest">Newest</option>
                    <option value="most-downloaded">Most Downloaded</option>
                    <option value="most-liked">Most Liked</option>
                </select>
            </div>
        </div>
    </div>
</form>
