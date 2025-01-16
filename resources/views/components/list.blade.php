<ul role="list" class=" divide-y divide-gray-300">
    @foreach ($pets as $pet)
    <li class="flex justify-between gap-x-6 py-5">
        <div class="min-w-0 flex-auto">
            <p class="text-sm/6 font-semibold text-gray-900">{{ $pet->getName() }}</p>
            <p class="text-sm/6 text-gray-900">{{ $pet->getStatus() }}</p>
        </div>
        <a href="/pet/formEdit/{{ $pet->getId() }}">
            <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Edit
            </button>
        </a>
        <a href="/pet/uploadImg/{{ $pet->getId() }}">
            <button class="flex w-full justify-center rounded-md bg-yellow-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Add an image
            </button>
        </a>
        <a href="/pet/update/{{ $pet->getId() }}">
            <button class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Update
            </button>
        </a>
        <form method="POST" action="/pet/{{ $pet->getId() }}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $pet->getId() }}">
            <button class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Delete
            </button>
        </form>
    </li>
    @endforeach
</ul>