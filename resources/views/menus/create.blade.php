{{-- @section('konten') --}}
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
       
        <div class="flex mt-6">
            <h2 class="font-semibold text-xl text-blue-600">Add Menu</h2>
        </div>

        <div class="mt-4" x-data="{ imageUrl: '/storage/noimage.png' }">
            <form enctype="multipart/form-data" method="POST" action="{{ route('menus.store') }}" class="flex gap-8">
                @csrf

                <div class="w-1/2">
                    <img :src="imageUrl" class="rounded-md">
                </div>
                <div class="w-1/2">
                    <div>
                        <x-input-label for="foto" :value="__('foto')" />
                        <x-text-input accept="image/*" id="foto" class="block mt-1 w-full border" type="file" name="foto" :value="old('foto')" required 
                        @change="imageUrl = URL.createObjectUrl($event.target.files[0])"
                        />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="name" :value="__('name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
    
                    <div>
                        <x-input-label for="price" :value="__('price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>


    
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('description')" />
                        <x-text-area id="description" class="block mt-1 w-full" type="text" name="description">{{ old ('description') }}</x-text-area>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    
                    <x-primary-button class="justify-center w-full mt-5">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>

               

            </form>

        </div>

       
    </div>
</x-app-layout>
{{-- @endsection --}}

