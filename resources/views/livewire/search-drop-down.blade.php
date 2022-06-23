<div class="relative p-2">
    <input
        type="text"
        class="form-input w-full"
        placeholder="Search Contacts..."
        wire:model="term"
        wire:keydown.escape="resetlist"
        wire:keydown.tab="resetlist"
        wire:keydown.arrow-up="decrementHighlight"
        wire:keydown.arrow-down="incrementHighlight"
        wire:keydown.enter="selectContact"
    />

    <div wire:loading class="absolute w-1/3 bg-white rounded-lg shadow">
        {{-- <div class="list-item">Searching...</div> --}}
        <ul class="divide-y-2 divide-gray-100">
            <li class="p-2 hover:bg-blue-600 hover:text-blue-200 ">
                Searching...
            </li>
        </ul>
    </div>

    @if(!empty($term))
        <div class="w-1/3 bg-white rounded-lg shadow">
            @if(!empty($users))
                <ul class="divide-y-2 divide-gray-100">
                    @foreach($users as $i => $user)
                        <li class="p-2 hover:bg-blue-600 hover:text-blue-200">
                            <a
                                href="https://www.google.com"
                                class="padding-top-5 list-item {{ $highlightIndex === $i ? 'highlight' : '' }}"
                            >{{ $user['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="list-item">No results!</div>
            @endif
        </div>
    @endif
</div>



{{-- <div class="relative">
    <div class="mt-5 p-2 border-2 rounded ">
        <p>
            <input type="text" class="form-input" placeholder="Start typing to search.." wire:model="term" />
        </p>
    </div>
    <div class="running-text">
        {{$term}}
    </div>
</div> --}}

