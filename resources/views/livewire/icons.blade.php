<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tobenski's SVG bibliotek
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">{{ __('Create New Icon') }}</button>
            @if($isOpen)
                @include('livewire.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">{{ __('Icon') }}</th>
                        <th class="px-4 py-2">{{ __('Name') }}</th>
                        <th class="px-4 py-2">{{ __('Description') }}</th>
                        <th class="px-4 py-2">{{ __('Content') }}</th>
                        <th class="px-4 py-2">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($icons as $icon)
                    <tr class="h-12 overflow-hidden">
                        <td class="border px-4 py-2">{!! $icon->content !!}</td>
                        <td class="border px-4 py-2">{{ $icon->name }}</td>
                        <td class="border px-4 py-2">{{ $icon->description }}</td>
                        <td class="border px-4 py-2 overflow-hidden">{{substr($icon->content,0,50) }} ...</td>
                        <td class="border px-4 py-2">
                        <button wire:click="edit({{ $icon->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Edit') }}</button>
                            <button wire:click="delete({{ $icon->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Delete') }}</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
