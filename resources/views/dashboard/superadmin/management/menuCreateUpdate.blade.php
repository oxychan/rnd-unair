{{-- modal body --}}

<!--begin::Modal content-->
<div class="modal-content">
    <!--begin::Modal header-->
    <div class="modal-header" style="background-color: #153253">
        <!--begin::Modal title-->
        <h2 id="modal-judul" style="color: white"></h2>
        <!--end::Modal title-->
        <!--begin::Close-->
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
            <span class="svg-icon svg-icon-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                        transform="rotate(-45 6 17.3137)" fill="currentColor" />
                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                        transform="rotate(45 7.41422 6)" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Close-->
    </div>
    <!--end::Modal header-->
    <!--begin::Modal body-->
    <div class="modal-body py-lg-10 px-lg-10" id="actionCreateUpdateModalBody">
        <!--begin:Form-->
        <form role="form" class="form" id="formCreateUpdateMenu" name="formCreateUpdateMenu"
            enctype="multipart/form-data" method="POST"
            action="{{ $menu != null ? route('management.menu.update', $menu) : route('management.menu.store') }}">
            @csrf
            @if ($menu != null)
                @method('PUT')
            @endif
            <div class="modal-body" style="height: 300px;">
                <div class="mb-7">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">ADD PARENT MENU:</label>
                        <div class="col-lg-9">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="addParentMenuCheckbox"
                                    name="addParentMenuCheckbox"
                                    @if ($menu != null) {{ $menu->root == null ? 'checked' : '' }} @endif>
                                <span class="form-check form-check-sm form-check-custom form-check-solid"
                                    for="addParentMenuCheckbox">
                                    Set as root
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">NAMA MENU:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="e.g: John Dypth" value="{{ $menu->nama ?? '' }}" required />
                            <span class="form-text text-muted">Please enter menu name</span>
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">URL:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="url" name="url"
                                placeholder="e.g: John Dypth" value="{{ $menu->url ?? '' }}" required />
                            <span class="form-text text-muted">Please enter menu url</span>
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">NAMA ICON:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="icon" name="icon"
                                placeholder="e.g: John Dypth" value="{{ $menu->icon ?? '' }}" required />
                            <span class="form-text text-muted">Please enter menu icon</span>
                        </div>
                    </div> <br>
                    <div class="form-group row" id="isRoot">
                        <label class="col-lg-3 col-form-label">ROOT MENU:</label>
                        <div class="col-lg-9">
                            <select class="form-control select2" id="root" name="root" style="width: 100%;"
                                required>
                                <option value="">Pilih Jenis</option>
                                @foreach ($menus as $menuRoot)
                                    <option value="{{ $menuRoot->id }}"
                                        @if ($menu != null) {{ $menuRoot->id == $menu->id ? 'selected' : '' }} @endif>
                                        {{ $menuRoot->nama }}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted">Please enter user id</span>
                        </div>
                    </div><br>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">URUTAN MENU:</label>
                        <div class="col-lg-9">
                            <input type="number" class="form-control" id="urutan" name="urutan"
                                placeholder="e.g: John Dypth" value="{{ $menu->urutan ?? '' }}" required />
                            <span class="form-text text-muted">Please enter menu order</span>
                        </div>
                    </div> <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="tombol-simpan" value="create" class="btn btn-primary font-weight-bold">
                    <i class="fa fa-save"></i> {{ $menu != null ? 'Save' : 'Create' }}
                </button>
            </div>
        </form>
        <!--end:Form-->

    </div>
    <!--end::Modal body-->
</div>
<!--end::Modal content-->
