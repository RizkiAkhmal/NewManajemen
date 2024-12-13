
<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

            @if (session()->has('Success'))
                <x-alert message="{{ session('Success') }}" />
            @endif

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
                <!--Tombol -->
                <div class="flex mt-8 justify-end items-center">
                    <a href="{{route('menus.create')}}">
                        <button class="text-white bg-gray-500 px-10 py-2 rounded-md font-semibold">Tambah Menu</button>
                    </a>
                </div>

                <!-- Bagian List Menu -->
                <div class="flex mt-6 items-center justify-between">
                    <h2 class="font-semibold text-xl text-white">List Menu</h2>
                </div>

                <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-5">
                    @foreach ($Menus as $menu)
                        <div class="border border-gray-100 rounded-lg p-4 ">
                            <img src="{{ url('storage/' . $menu->foto) }}" style="width:300px">
                            <div class="my-2">
                                <p class="text-xl font-light text-white">{{$menu->name}}</p>
                                <p class="font-semibold text-white">Rp. {{number_format($menu->price)}}</p>
                                <p class="text-white">Category: {{$menu->category->name}}</p>
                                <p class="text-white">{{$menu->description}}</p>
                            </div>
                            <a href="{{ route('menus.edit', ['menu' => $menu->id]) }}">
                                <button class="bg-gray-500 px-10 py-2 w-full rounded-md font-semibold text-white mt-2">Edit</button>
                            </a>
                            
                            <form action="{{ route('menus.delete', $menu->id) }}" method="GET">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 px-10 py-2 w-full rounded-md font-semibold text-white mt-2">
                                    Delete
                                </button>
                            </form>

                            

                        </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{$Menus->links()}}
                </div>
            </div>

</x-app-layout>
