@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.prompt.fields.prompt') }}:
                    {{ trans('cruds.user.fields.id') }}
                    {{ $prompt }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('prompt.edit', [$prompt])
        </div>
    </div>
</div>
@endsection
