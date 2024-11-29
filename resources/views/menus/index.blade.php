
<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

            @if (session()->has('Success'))
                <x-alert message="{{ session('Success') }}" />
            @endif
           
            <div class="flex mt-6 item-center justify-between">
                <h2 class="font-semibold text-xl text-white">List Menu</h2>
                <a href="{{route('menus.create')}}">
                    {{-- @yield('konten') --}}
                    <button class="text-white bg-blue-500 px-10 py-2 rounded-md font-semibold">Tambah Menu</button>
                </a>
            </div>

            <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-5 ">
                @foreach ($Menus as $menu)
                    <div>
                        <img src="{{ url('storage/' . $menu->foto) }}" style="width:300px">
                        <div class="my-2">
                            <p class="text-xl font-light text-white">{{$menu->name}}</p>
                            <p class="font-semibold text-gray-400 text-white"> Rp. {{number_format($menu->price)}}</p>
                            <p class="text-white">{{$menu->description}}</p>
                        </div>
                        <a href="{{ route('menus.edit', $menu) }}"><button class="bg-gray-500 px-10 py-2 w-full rounded-md font-semibold">Edit</button></a>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{$Menus->links()}}
            </div>
        </div>
</x-app-layout>
