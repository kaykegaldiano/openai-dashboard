@push('customer-scripts')
    <script src="https://cdn.jsdelivr.net/npm/vega@5.25.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/vega-lite@5.12.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/vega-embed@6.22.1"></script>

    <style media="screen">
        /* Add space between Vega-Embed links */
        .vega-actions a {
            margin-right: 5px;
        }
    </style>
@endpush

<div x-data="dashboard">
    <div class="flex flex-col min-h-[calc(100vh-120px)] justify-between mx-auto max-w-7xl px-6 lg:px-8">
        
        <x-heading title="Dashboard" description="Custom Dashboard" />

        <div class="flex flex-1 w-full py-4 overflow-x-auto" x-ref="vegalitecontainer">
            <div id="vis"></div>        
        </div>

        <div class="flex flex-col items-start w-full space-y-2">
            <textarea
                wire:model.live.debounce.500ms="question"
                class="w-full @error('question') border-red-500 @else border-gray-300 dark:border-gray-700 @enderror dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </textarea>
            @error('question') <span class="text-xs text-red-500">{{ $message }}</span> @enderror

            <x-primary-button class="inline-flex flex-row items-center gap-2" @click="generateReport()">
                {{ __('Generate report') }}
                <svg x-show="loading" class="w-5 h-5 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </x-primary-button>
            
        </div>
    </div>
</div>