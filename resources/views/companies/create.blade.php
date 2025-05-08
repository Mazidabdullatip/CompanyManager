@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <h2 class="mb-4 text-center">{{ isset($company) ? 'Edit Company' : 'Add New Company' }}</h2>
                <form method="POST" enctype="multipart/form-data" action="{{ isset($company) ? route('companies.update', $company) : route('companies.store') }}">
                    @csrf
                    @if(isset($company)) @method('PUT') @endif

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $company->name ?? '') }}" required>
                        <label for="name">Company Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $company->email ?? '') }}" required>
                        <label for="email">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="url" name="website" class="form-control" id="website" value="{{ old('website', $company->website ?? '') }}" required>
                        <label for="website">Website</label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Company Logo</label>
                        <input type="file" name="logo" class="form-control" onchange="previewLogo(this)">
                        @if(isset($company) && $company->logo)
                            <img id="logoPreview" src="{{ asset('storage/'.$company->logo) }}" width="100" class="mt-2">
                        @else
                            <img id="logoPreview" src="#" width="100" class="mt-2 d-none">
                        @endif
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save-fill"></i> {{ isset($company) ? 'Update' : 'Create' }}
                        </button>
                        <a href="{{ route('companies.index') }}" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewLogo(input) {
    let preview = document.getElementById('logoPreview');
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
*/
