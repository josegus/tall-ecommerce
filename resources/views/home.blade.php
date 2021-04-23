<x-guest-layout>
    @foreach ($products as $product)
        <x-card :product="$product"></x-card>
    @endforeach
</x-guest-layout>
