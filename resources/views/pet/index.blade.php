<x-layout>
    <x-slot:heading>
        All your pets:
    </x-slot:heading>

    <h2>You can also select which ID or status of pet your are looking for:</h2>
    <form class="space-y-5" action="/pet/findById" method="POST">
        @csrf
        @method('GET')
        <label for="id" class="block text-sm/6 font-medium text-gray-900">Identifier</label>
        <input
            type="number"
            name="id"
            id="id"
            required
            onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Show pet with selected ID
        </button>
    </form>
    <form class="space-y-5 mb-12" action="/pet/findByStatus" method="POST">
        @csrf
        @method('GET')
        <label for="status" class="block text-sm/6 font-medium text-gray-900">status</label>
        <div class="mt-2">
            <select type="text" name="status" id="status" autocomplete="status" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                <option value="available">available</option>
                <option value="pending">pending</option>
                <option value="sold">sold</option>
            </select>
        </div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Show pet with selected status
        </button>
    </form>

    <x:list :pets=$pets></x:list>
</x-layout>