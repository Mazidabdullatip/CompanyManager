<!-- resources/views/companies/form.blade.php -->

@csrf

<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $company->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $company->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Logo (min 100x100)</label>
    <input type="file" name="logo" class="form-control" {{ isset($company) ? '' : 'required' }}>
</div>

@if(isset($company) && $company->logo)
    <div class="mb-3">
        <img src="{{ asset('storage/' . $company->logo) }}" width="100" height="100">
    </div>
@endif

<div class="mb-3">
    <label>Website</label>
    <input type="url" name="website" class="form-control" value="{{ old('website', $company->website ?? '') }}" required>
</div>

<button type="submit" class="btn btn-success">Save</button>
