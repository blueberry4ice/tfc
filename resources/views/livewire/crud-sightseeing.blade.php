<?php
use App\Models\Product;
?>

<div class="container-default container-search">
    
    @livewire('header2-component')
    <section class="search-wrapper" style="min-height: 60vh">
        <div class="inner-container layout-flex space-between">
            <x-slot name="header">
                <h2 class="text-center">Laravel 8 Livewire CRUD Demo</h2>
            </x-slot>
            <div class="py-12">
                <h3>Manage Sightseeing</h3>

                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="px-4 py-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                        @if (session()->has('message'))
                        <div class="px-4 py-3 my-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        <button wire:click="create()"
                            class="inline-flex justify-center w-full px-4 py-2 my-4 text-base font-bold text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700">
                            Create New
                        </button>
                        @if($isModalCreateOpen)
                        @include('livewire.crud-create-sightseeing')
                        @endif
                        @if($isModalDeleteOpen)
                        @include('livewire.crud-delete')
                        @endif

                        <table class="w-full table-fixed">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="w-20 px-4 py-2">SKU</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Summary</th>
                                    <th class="px-4 py-2">Continent</th>
                                    <th class="px-4 py-2">Country</th>
                                    <th class="px-4 py-2">City</th>
                                    <th class="px-4 py-2">Image</th>
                                    <th class="px-4 py-2">Thumbnail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $product->sku }}</td>
                                    <td class="px-4 py-2 border">{{ $product->name }}</td>
                                    <td class="px-4 py-2 border">{{ $product->summary }}</td>
                                    <td class="px-4 py-2 border">{{ $product->continent }}</td>
                                    <td class="px-4 py-2 border">{{ $product->country }}</td>
                                    <td class="px-4 py-2 border">{{ $product->city }}</td>
                                    <td class="px-4 py-2 border">{{ $product->image }}</td>
                                    <td class="px-4 py-2 border">{{ $product->thumbnail }}</td>
                                    <td class="px-4 py-2 border">
                                        <button wire:click="edit({{ $product->id }})"
                                            class="flex px-4 py-2 text-gray-900 bg-gray-500 cursor-pointer">Edit</button>
                                        <button wire:click="deleteId({{ $product->id }},'{{ $product->name }}')"
                                            class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        {{ $products->links() }}

                    </div>
                </div>
            </div>
            
            
        </div>
    </section>

    @livewire('footer-component')



</div>

@push('scripts')
    <script>
        
    </script>



@endpush
