<!-- resources/views/companies/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Company</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('companies.form')
    </form>
</div>
@endsection
