<style>
    .gallery-item {
        padding: 5px;
        padding-bottom: 0;
        border-radius: 2px;
        border: 1px solid #bbb;
        min-height: 100px;
        height: 100%;
        position: relative;
    }

    .gallery-item .remove {
        position: absolute;
        top: 5px;
        right: 5px;
    }

    .gallery-item .drag-handle {
        position: absolute;
        top: 5px;
        left: 5px;
        cursor: move;
    }

    .gallery-item:hover {
        background-color: #eee;
    }

    .gallery-item .image-chooser img {
        max-height: 150px;
    }

    .gallery-item .image-chooser:hover {
        border: 1px dashed green;
    }
</style>
<div class="row">
    <div class="col-sm-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Thông tin phòng</h5>
            </div>
            <div class="card-body">
                <!-- Hàng 1: Tên phòng & Diện tích -->
                <div class="form-row">
                    <div class="form-group custom-group mb-4 col-md-6">
                        <label class="form-label required-label">Tên phòng</label>
                        <input class="form-control" type="text" ng-model="form.name">
                        <span class="invalid-feedback d-block" role="alert">
              <strong><% errors.name[0] %></strong>
            </span>
                    </div>
                    <div class="form-group custom-group mb-4 col-md-6">
                        <label class="form-label required-label">Diện tích</label>
                        <input class="form-control" type="text" ng-model="form.area">
                        <span class="invalid-feedback d-block" role="alert">
              <strong><% errors.area[0] %></strong>
            </span>
                    </div>
                </div>

                <!-- Hàng 2: Số khách tối đa & View -->
                <div class="form-row">
                    <div class="form-group custom-group mb-4 col-md-6">
                        <label class="form-label required-label">Số khách tối đa</label>
                        <input class="form-control" type="text" ng-model="form.maximum_occupancy">
                        <span class="invalid-feedback d-block" role="alert">
                            <strong><% errors.maximum_occupancy[0] %></strong>
                        </span>
                    </div>
                    <div class="form-group custom-group mb-4 col-md-6">
                        <label class="form-label required-label">View</label>
                        <input class="form-control" type="text" ng-model="form.view">
                        <span class="invalid-feedback d-block" role="alert">
                            <strong><% errors.view[0] %></strong>
                         </span>
                    </div>
                </div>

                <!-- Hàng 3: Số phòng ngủ -->
                <div class="form-row">
                    <div class="form-group custom-group mb-4 col-md-6">
                        <label class="form-label required-label">Số phòng ngủ</label>
                        <input class="form-control" type="text" ng-model="form.bedrooms">
                        <span class="invalid-feedback d-block" role="alert">
              <strong><% errors.bedrooms[0] %></strong>
            </span>
                    </div>

                    <div class="form-group custom-group mb-4 col-md-6">
                        <label class="form-label required-label">Giá thuê</label>
                        <input class="form-control" type="text" ng-model="form.price">
                        <span class="invalid-feedback d-block" role="alert">
              <strong><% errors.price[0] %></strong>
            </span>
                    </div>
                </div>

                <div class="form-group custom-group mb-4">
                    <label class="form-label">Mô tả ngắn</label>
                    <textarea class="form-control ck-editor" rows="5" ng-model="form.intro"></textarea>
                        <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.intro[0] %></strong>
                        </span>
                </div>

                <!-- Mô tả -->
                <div class="form-group custom-group mb-4">
                    <label class="form-label">Mô tả</label>
                    <textarea class="form-control ck-editor" ck-editor rows="5" ng-model="form.description"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
            <strong><% errors.description[0] %></strong>
          </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group custom-group mb-4">
            <label class="form-label required-label">Trạng thái</label>
            <select id="my-select" class="form-control custom-select" ng-model="form.status">
                <option value="">Chọn trạng thái</option>
                <option value="2">Lưu nháp</option>
                <option value="1">Xuất bản</option>
            </select>
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.status[0] %>
                </strong>
            </span>
        </div>

        <div class="card mb-4">
            <div class="card-header text-center ">
                <h5>Ảnh mô tả</h5>
            </div>
            <div class="card-body">
                <!-- Ảnh đại diện -->
                <div class="form-group text-center">
                    <div class="main-img-preview">
                        <label class="required-label">Ảnh đại diện</label>
                        <p class="help-block-img">* Ảnh định dạng: jpg, png</p>
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

                <div class="form-group text-center">
                    <div class="main-img-preview">
                        <label class="required-label">Ảnh bìa</label>
                        <p class="help-block-img">* Ảnh định dạng: jpg, png</p>
                        <img class="thumbnail img-preview" ng-src="<% form.image_back.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.image_back.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                                </label>
                                <input class="d-none" id="<% form.image_back.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
        <strong><% errors.image_back[0] %></strong>
      </span>
                </div>

                <div class="form-group text-center">
                    <label for="">Thư viện ảnh</label>
                    <div class="row gallery-area border">
                        <div class="col-md-4 p-2" ng-repeat="g in form.galleries">
                            <div class="gallery-item">
                                <button class="btn btn-sm btn-danger remove" ng-click="form.removeGallery($index)">
                                    <i class="fa fa-times mr-0"></i>
                                </button>
                                <div class="form-group">
                                    <div class="img-chooser" title="Chọn ảnh">
                                        <label for="<% g.image.element_id %>">
                                            <img ng-src="<% g.image.path %>">
                                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="<% g.image.element_id %>">
                                        </label>
                                    </div>
                                    <span class="invalid-feedback d-block" role="alert" ng-if="!errors['galleries.' + $index + '.image_obj']">
                                <strong>
                                    <% errors['galleries.' + $index + '.image' ][0] %>
                                </strong>
                            </span>
                                    <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors['galleries.' + $index + '.image_obj']">
                                <strong>
                                    <% errors['galleries.' + $index + '.image_obj' ][0] %>
                                </strong>
                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <label class="gallery-item d-flex align-items-center justify-content-center cursor-pointer" for="gallery-chooser">
                                <i class="fa fa-plus fa-2x text-secondary"></i>
                            </label>
                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="gallery-chooser" multiple>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert" ng-if="errors && errors['galleries']">
                <strong>
                    <% errors.galleries[0] %>
                </strong>
            </span>
                </div>
            </div>
        </div>

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
