<x-layout>
    <x-slot:heading>
        (Id: {{ $pet->getId() }}) Data of pet named {{ $pet->getName() }}.
    </x-slot:heading>

    <x:petDetails :pet=$pet></x:petDetails>
</x-layout>