<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('prompt.prompt') ? 'invalid' : '' }}">
        <label class="form-label required" for="prompt">{{ trans('cruds.prompt.fields.prompt') }}</label>
        <input class="form-control" type="text" prompt="prompt" id="prompt" required wire:model.defer="prompt.prompt">
        <div class="validation-message">
            {{ $errors->first('prompt.prompt') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.prompts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
