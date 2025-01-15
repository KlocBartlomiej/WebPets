<ul role="list" class=" divide-y divide-gray-300">
    @foreach ($pets as $pet)
    <li class="flex justify-between gap-x-6 py-5">
        <div class="ml-20 flex min-w-0 gap-x-4">
            <div class="min-w-0 flex-auto">
                <p class="text-sm/6 font-semibold text-gray-900">{{ $pet->getName() }}</p>
                <p class="text-sm/6 text-gray-900">{{ $pet->getStatus() }}</p>
            </div>
        </div>
        <div class="mr-20 hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <a href="/pet/formEdit/{{ $pet->getId() }}">
                <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>
            </a>
            <a href="/pet/delete/{{ $pet->getId() }}">
                <button class="mt-4 flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
            </a>
        </div>
    </li>
    @endforeach
</ul>