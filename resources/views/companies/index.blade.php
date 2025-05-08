@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-pink">Company Directory</h2>
        <a href="{{ route('companies.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Company
        </a>
    </div>



    @if($companies->count())
        <div class="row">
            @foreach($companies as $company)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-lg border-0">
                        <div class="card-body text-center">
                            @if($company->logo)
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('storage/'.$company->logo) }}" alt="Logo" width="100" class="rounded-circle border border-2 border-pink mb-3">
                                </div>
                            @endif
                            <h5 class="card-title text-pink">{{ $company->name }}</h5>
                            <p class="text-muted mb-1"><i class="bi bi-envelope-fill"></i> {{ $company->email }}</p>
                            <p><i class="bi bi-globe"></i> 
                            <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                            </p>

                        </div>
                        <div class="card-footer bg-white text-center border-top-0">
                            <a href="{{ route('companies.edit', $company) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                            <form action="{{ route('companies.destroy', $company) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this company?')">
                                    <i class="bi bi-trash-fill"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning text-center">No companies found.</div>
    @endif
</div>
@endsection