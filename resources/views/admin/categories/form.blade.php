<div class="row">
    <style>
        .span-right {
            float: right;
        }

        span {
            cursor: pointer;
        }
    </style>
    <div class="col-sm-8">
        <div class="form-group custom-group mb-4">
            <label class="form-label required-label">Tên danh mục</label>
            <input class="form-control " type="text" ng-model="form.name">
            <span class="invalid-feedback d-block" role="alert">
                <strong><% errors.name[0] %></strong>
            </span>
        </div>

        <div class="form-group custom-group mb-4">
            <label class="form-label">Mô tả ngắn gọn</label>
            <textarea class="form-control" rows="3" ng-model="form.short_des"></textarea>
            <span class="invalid-feedback d-block" role="alert">
                <strong><% errors.short_des[0] %></strong>
            </span>
        </div>

        <div class="form-group custom-group mb-4">
            <label class="form-label">Mô tả chi tiết</label>
            <textarea class="form-control ck-editor" ck-editor rows="2" ng-model="form.intro"></textarea>
            <span class="invalid-feedback d-block" role="alert">
                <strong><% errors.intro[0] %></strong>
            </span>
        </div>

    </div>
    <div class="col-sm-4">
{{--        <div class="form-group custom-group mb-4">--}}
{{--            <label class="form-label required-label">Hiển thị ngoài trang chủ</label>--}}
{{--            <select id="my-select" class="form-control custom-select" ng-model="form.show_home_page">--}}
{{--                <option ng-repeat="s in show_home_page" ng-value="s.value" ng-selected="form.show_home_page == s.value"><% s.name %></option>--}}

{{--            </select>--}}
{{--            <span class="invalid-feedback d-block" role="alert">--}}
{{--                <strong><% errors.show_home_page[0] %></strong>--}}
{{--            </span>--}}
{{--        </div>--}}
        <div class="form-group text-center mb-4">
            <label class="form-label">Ảnh đại diện</label>
            <div class="main-img-preview">
                <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 2MB.</p>
                <img class="thumbnail img-preview" ng-src="<% form.image.path %>">
            </div>
            <div class="input-group" style="width: 100%; text-align: center">
                <div class="input-group-btn" style="margin: 0 auto">
                    <div class="fileUpload fake-shadow cursor-pointer">
                        <label class="mb-0" for="<% form.image.element_id %>">
                            <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                        </label>
                        <input class="d-none" id="<% form.image.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
                    </div>
                </div>
            </div>
            <span class="invalid-feedback d-block" role="alert">
                <strong><% errors.image[0] %></strong>
            </span>
        </div>
        <hr>
        {{-- <div class="form-group text-center mb-4">
            <label class="form-label">Ảnh banner(1530x420px)</label>
            <div class="main-img-preview">
                <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 2MB.</p>
                <img class="thumbnail img-preview" ng-src="<% form.banner.path %>">
            </div>
            <div class="input-group" style="width: 100%; text-align: center">
                <div class="input-group-btn" style="margin: 0 auto">
                    <div class="fileUpload fake-shadow cursor-pointer">
                        <label class="mb-0" for="<% form.banner.element_id %>">
                            <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                        </label>
                        <input class="d-none" id="<% form.banner.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
                    </div>
                </div>
            </div>
            <span class="invalid-feedback d-block" role="alert">
                <strong><% errors.banner[0] %></strong>
            </span>
        </div> --}}
    </div>
</div>
<hr>
<div class="text-right">
    <button type="submit" class="btn btn-success btn-cons" ng-click="submit()" ng-disabled="loading.submit">
        <i ng-if="!loading.submit" class="fa fa-save"></i>
        <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
        Lưu
    </button>
    <a href="{{ route('Category.index') }}" class="btn btn-danger btn-cons">
        <i class="fa fa-remove"></i> Hủy
    </a>
</div>
