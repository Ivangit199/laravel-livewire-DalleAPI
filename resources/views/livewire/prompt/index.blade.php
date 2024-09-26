<div>
    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full" style="color: rgb(112,112,112)">
                <thead>
                    <tr>
                        <th class="w-9" style="background-color: rgb(39,48,62); border: none">
                        </th>
                        <th class="w-28" style="background-color: rgb(39,48,62); border: none; color: white">
                            {{ trans('cruds.prompt.fields.id') }}

                        </th>
                        <th style="background-color: rgb(39,48,62); border: none; color: white">
                            {{ trans('cruds.prompt.fields.prompt') }}

                        </th>
                        <th style="background-color: rgb(39,48,62); border: none; color: white">
                            {{ trans('cruds.prompt.fields.created_at') }}

                        </th>
                        <th style="background-color: rgb(39,48,62); border: none; color: white">
                            {{ trans('cruds.prompt.fields.deleted_at') }}
                        </th>
                        <th style="background-color: rgb(39,48,62); border: none;">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prompts as $prompt)
                        <tr>
                            <td style="border: none">
                                <input type="checkbox" value="{{ $prompt->id }}" wire:model="selected">
                            </td>
                            <td style="border: none">
                                {{ $prompt->id }}
                            </td>

                            <td style="border: none">
                                {{ $prompt->prompt }}
                            </td>
                            <td style="border: none">
                                {{ $prompt->created_at }}
                            </td>
                            <td style="border: none">
                                {{ $prompt->deleted_at }}
                            </td>

                            <td style="border: none">
                                <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.prompts.show', $prompt) }}">
                                    {{ trans('global.view') }}
                                </a>
                                <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.prompts.edit', $prompt) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $prompt->id }})" wire:loading.attr="disabled">
                                    {{ trans('global.delete') }}
                                </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $prompts->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
        if (!confirm("{{ trans('global.areYouSure') }}")) {
            return
        }
        @this[e.callback](...e.argv)
    })
    </script>
@endpush
