<div class="bg-pink-700 text-white py-4">
    <div class="container mx-auto flex items-center">
        {{-- Logo --}}
        <a class="w-1/4" href="/">{{ config('app.name') }}</a>

        {{-- Search --}}
        <form class="w-2/4" action="#">
            <input class="w-full" type="text" placeholder="Type a product's name here..">
        </form>

        {{-- Links --}}
        <div class="w-1/4 flex justify-end">
            <a class="flex items-center px-2" href="#">
                <x-heroicon-o-tag class="w-6"/> Offers
            </a>
            <a class="flex items-center px-2" href="#">
                <x-heroicon-o-user class="w-6"/> My account
            </a>
            <a class="flex items-center pl-2" href="#">
                <x-heroicon-o-shopping-cart class="w-6"/> My cart
            </a>
        </div>
    </div>
</div>
