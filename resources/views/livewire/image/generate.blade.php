
<div class="card-body">
    <div class="">
        <h1 class="mb-6">Welcome to OpenAI!</h1>
        <div class="mb-3">
            <form wire:submit.prevent="submit" class="pt-3 input-group">
                <input type="text" id="description" name="description" class="form-control" required wire:model="description" placeholder="Enter description"/>
                <button type="submit" id="startAi" class="btn btn-success" style="margin-left: 10px"> Start </button>
            </form>
        </div>
        @if (isset($this->generatedUrl)) <!-- Check if generated URL is set -->
            <img class="image-result" src="{{ $this->generatedUrl }}" alt="Generated Image" defer>
        @else
            <img class="image-result" src="" alt="Default Image" defer> <!-- Optional default image -->
        @endif
        </div>
        <div id="loading" style="display: none;">
            Loading...
        </div>
    </div>
</div>


