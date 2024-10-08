{{-- modal body --}}

<!--begin::Modal content-->
<div class="modal-content">
    <!--begin::Modal header-->
    <div class="modal-header">
        <!--begin::Modal title-->
        <h2 id="modal-judul" style="color: white">
            {{ $requestType != null ? 'Edit Jenis Permohonan' : 'Tambah Jenis Permohonan' }}</h2>
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
        <form role="form" class="form" id="formCreateUpdateRequestType" name="formCreateUpdateRequestType"
            enctype="multipart/form-data" method="POST"
            action="{{ $requestType != null ? route('management.request-type.update', $requestType) : route('management.request-type.store') }}">
            @csrf
            @if ($requestType != null)
                @method('PUT')
            @endif
            <div class="modal-body" style="height: 300px;">
                <div class="mb-7">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Nama Jenis Permohonan</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="e.g: Permohonan Perbaikan Fasilitas" value="{{ $requestType->name ?? '' }}"
                                required />
                            <span class="form-text text-muted">Masukan nama jenis permohonan</span>
                        </div>
                    </div> <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="tombol-simpan" value="create" class="btn btn-primary font-weight-bold">
                    <i class="fa fa-save"></i> {{ $requestType != null ? 'Save' : 'Create' }}
                </button>
            </div>
        </form>
        <!--end:Form-->

    </div>
    <!--end::Modal body-->
</div>
<!--end::Modal content-->
