<div class="bg-pink-600 text-white py-2">
    <div class="container mx-auto flex items-center">
        {{-- Logo --}}
        <div class="w-1/4">
            <a class="flex items-center" href="/" title="{{ config('app.name') }}">
                <img class="w-12 filter invert" src="{{ asset('image/box.svg') }}" alt="{{ config('app.name') }}">
                <span class="ml-4 text-2xl italic font-bold">FastBox</span>
            </a>
        </div>

        {{-- Search --}}
        <form class="w-2/4" action="#">
            <input class="rounded border-0 focus:ring-0 w-full text-gray-800" type="text" placeholder="Type a product's name here..">
        </form>

        {{-- Links --}}
        <div class="w-1/4 flex justify-end">
            <a class="flex items-center px-2" href="#">
                <x-heroicon-o-tag class="w-6"/>
                <span class="ml-2">Offers</span>
            </a>
            <a class="flex items-center px-2" href="#">
                <x-heroicon-o-user class="w-6"/>
                <span class="ml-2">My account</span>
            </a>
            <a class="flex items-center pl-2" href="#">
                <x-heroicon-o-shopping-cart class="w-6"/>
                <span class="ml-2">My cart</span>
            </a>
        </div>
    </div>
</div>
