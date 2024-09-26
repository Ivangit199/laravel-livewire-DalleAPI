<?php

namespace App\Http\Livewire\Prompt;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Prompt;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
    }

    public function render()
    {
        // $query = Prompt::advancedFilter([
        //     's'               => $this->search ?: null,
        //     'order_column'    => $this->sortBy,
        //     'order_direction' => $this->sortDirection,
        // ]);

        // $prompts = $query->paginate($this->perPage);

        $prompts = Prompt::paginate($this->perPage);

        return view('livewire.prompt.index', compact('prompts'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('prompt'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Prompt::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Prompt $prompt)
    {
        echo("$prompt");
        abort_if(Gate::denies('prompt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prompt->delete();
    }
}
