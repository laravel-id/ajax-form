@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Formulir Kontak</div>

                <div class="panel-body">
                    <contact-form action="{{ route('contact.send') }}"></contact-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
