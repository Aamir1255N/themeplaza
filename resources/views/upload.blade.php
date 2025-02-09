@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <form action="{{ '/SubmitThemes' }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <h2 class="display-4">Upload</h2>
                <hr />
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="row">
                        <div class="card col-md-5 mx-3">
                            <div class="card-header" style="background:transparent;">
                                <h3>Basic Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Category <span class="text-danger">*</span></label>
                                    <select name="category" id="" class="form-control">
                                        <option value="themes">Themes</option>
                                        <option value="themes">Luma3DS Splashes</option>
                                        <option value="Badges">Badges</option>
                                    </select>
                                    @error('category')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="" class="form-control"
                                        placeholder="Type name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small >32 characters maximum.</small>
                                </div>
                                <div class="form-group">
                                    <label for="">Short Description <span class="text-danger">*</span></label>
                                    <input type="text" name="s_description" id="" class="form-control"
                                        placeholder="Type short description" value="{{ old('s_description') }}">
                                    @error('s_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small class="text-white">64 characters maximum.</small>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="" cols="30" rows="5" class="form-control"
                                        placeholder="Type description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small >Donation links of any kind are not permitted, any theme
                                        found containing them will be rejected and your account potentially banned.</small>
                                </div>
                                <div class="form-group">
                                    <label for="">Tags<span class="text-danger">*</span></label>
                                    <input type="text" name="tags" id="" class="form-control"
                                        placeholder="Type tags" value="{{ old('tags') }}">
                                    @error('tags')
                                        <div >{{ $message }}</div>
                                    @enderror
                                    <small >Separate tags with a comma. Accepted characters: A-Z a-z 0-9
                                        -</small>
                                </div>

                                <div class="form-group">
                                    <label for="">NSFW Level<span class="text-danger">*</span></label>
                                    <select name="nsfw" id="" class="form-control">
                                        <option value="Safe">Safe</option>
                                        <option value="Sketchy">Sketchy</option>
                                        <option value="NSFW">NSFW</option>
                                    </select>
                                    @error('nsfw')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small >Failure to set this appropriately may result in your uploading
                                        privileges to be revoked.</small>
                                </div>
                                <div class="form-group">
                                    <label for="">YouTube video link</label>
                                    <input type="url" name="v_link" id="" class="form-control"
                                        placeholder="link" value="{{ old('v_link') }}">
                                    @error('v_link')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-5 mx-3" style="max-height: fit-content;">
                            <div class="card-header" style="background:transparent;">
                                <h3>Theme Files</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="theme-body">Body <kbd>body_LZ.bin</kbd></label> <span
                                        class="text-danger">*</span>
                                    <div class="custom-file">
                                        <input class="custom-file-input" type="file" name="theme_body" id="theme-body"
                                            required="">
                                        <label class="custom-file-label" for="theme-body">Choose file</label>
                                    </div>
                                    @error('theme_body')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="theme-bgm">BGM <kbd>bgm.bcstm</kbd></label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" type="file" name="theme_bgm" id="theme-bgm">
                                        <label class="custom-file-label" for="theme-bgm">Choose file</label>
                                    </div>
                                    @error('theme_bgm')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="theme-preview">Preview <kbd>.png</kbd></label> <span
                                        class="text-danger">*</span>
                                    <div class="custom-file">
                                        <input class="custom-file-input" type="file" name="theme_preview"
                                            id="theme-preview" required="">
                                        <label class="custom-file-label" for="theme-preview">Choose file</label>
                                    </div>
                                    @error('theme_preview')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small >Image's width and height may not exceed 500 pixels.</small>
                                </div>
                                <div class="form-group">
                                    <label for="theme-preview">Preview 2 <kbd>.png</kbd></label> <span
                                        class="text-danger">*</span>
                                    <div class="custom-file">
                                        <input class="custom-file-input" type="file" name="theme_preview2"
                                            id="theme-preview" required="">
                                        <label class="custom-file-label" for="theme-preview">Choose file</label>
                                    </div>
                                    @error('theme_preview2')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small >Image's width and height may not exceed 500 pixels.</small>
                                </div>
                                <div class="form-group">
                                    <label for="theme-icon">Icon <kbd>.png</kbd></label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" type="file" name="theme_icon"
                                            id="theme-icon">
                                        <label class="custom-file-label" for="theme-icon">Choose file</label>
                                    </div>
                                    @error('theme_icon')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small >Image's dimensions must be 48x48.</small>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 m-3">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <button type="submit" name="submit" value="1" class="btn btn-theme btn-block btn-lg"
                            id="upload-submit">
                            <svg class="svg-inline--fa fa-upload fa-w-16 fa-fw"  aria-hidden="true" data-prefix="fa"
                                data-icon="upload" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor" style="background: #388a9f !important;"
                                    d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                                </path>
                            </svg>
                            Upload
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
