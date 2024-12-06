
<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

            @if (session()->has('Success'))
                <x-alert message="{{ session('Success') }}" />
            @endif

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
                <!-- Bagian Kategori dan Tombol -->
                <div class="flex mt-8 justify-between items-center">
                    <div class="flex flex-row space-x-4">
                        <span class="font-weight-bold sort-font my-auto text-white">Category :</span>
                        <div class="py-1 px-3 border-solid border-1 border-slate-300 rounded-xl text-center bg-white">
                            <a href="/home" class="sort-font">All</a>
                        </div>
                        <div class="py-1 px-3 border-solid border-1 border-slate-300 rounded-xl text-center bg-white">
                            <a href="/" class="sort-font">Makanan</a>
                        </div>
                        <div class="py-1 px-3 border-solid border-1 border-slate-300 rounded-xl text-center bg-white">
                            <a href="/" class="sort-font">Minuman</a>
                        </div>
                    </div>
                    <a href="{{route('menus.create')}}">
                        <button class="text-white bg-blue-500 px-10 py-2 rounded-md font-semibold">Tambah Menu</button>
                    </a>
                </div>

                <!-- Bagian List Menu -->
                <div class="flex mt-6 items-center justify-between">
                    <h2 class="font-semibold text-xl text-white">List Menu</h2>
                </div>

                <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-5">
                    @foreach ($Menus as $menu)
                        <div>
                            <img src="{{ url('storage/' . $menu->foto) }}" style="width:300px">
                            <div class="my-2">
                                <p class="text-xl font-light text-white">{{$menu->name}}</p>
                                <p class="font-semibold text-white">Rp. {{number_format($menu->price)}}</p>
                                <p class="text-white">{{$menu->description}}</p>
                            </div>
                            <a href="{{ route('menus.edit', $menu) }}">
                                <button class="bg-gray-500 px-10 py-2 w-full rounded-md font-semibold">Edit</button>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{$Menus->links()}}
                </div>
            </div>

</x-app-layout>
