@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card" style="background-color: rgb(31,41,55)">
        <div class="card-header" style="background-color: rgb(31,41,55)">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.prompt.fields.prompt') }}
                    {{ trans('global.list') }}
                </h6>
            </div>
        </div>
        @livewire('prompt.index')

    </div>
</div>
@endsection
