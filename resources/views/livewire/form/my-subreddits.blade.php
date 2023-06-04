<div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <x-select
            label="My Subreddits"
            placeholder="Select one status"
            :options="Auth::User()->subreddits->pluck('display_name')->toArray()"
            wire:model.defer="model"
            hide-empty-message
            >
            </x-select>
        </div>
        <div>
            <button wire:click="refreshMySubreddits" class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-500 border border-transparent rounded-lg active:bg-indigo-600 hover:bg-indigo-600 focus:outline-none focus:shadow-outline-indigo">
                Refresh
            </button>
        </div>
    </div>



</div>
