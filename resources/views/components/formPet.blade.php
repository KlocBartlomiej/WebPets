<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-5" action="/pet" method="POST">
      @csrf
      @method('PUT')
      <div>
        <label for="id" class="block text-sm/6 font-medium text-gray-900">Identifier (changing it will result in adding another pet)</label>
        <div class="mt-2">
          <input
            value="<?= isset($pet) ? $pet->getId() : '' ?>"
            type="number"
            name="id"
            id="id"
            required
            onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <label for="category" class="block text-sm/6 font-medium text-gray-900">Categories (can get multiple values separated by coma)</label>
        <div class="mt-2">
          <input
            value="<?= isset($pet) ? $pet->getCategory() : '' ?>"
            type="text"
            name="category"
            id="category"
            required
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <label for="name" class="block text-sm/6 font-medium text-gray-900">name</label>
        <div class="mt-2">
          <input
            value="<?= isset($pet) ? $pet->getName() : '' ?>"
            type="text"
            name="name"
            id="name"
            autocomplete="name"
            required
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <label for="photoUrls" class="block text-sm/6 font-medium text-gray-900">Photo Urls (can get multiple values separated by coma)</label>
        <div class="mt-2">
          <input
            value="<?= isset($pet) ? $pet->getPhotoUrls() : '' ?>"
            type="text"
            name="photoUrls"
            id="photoUrls"
            autocomplete="photoUrls"
            required
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <label for="tags" class="block text-sm/6 font-medium text-gray-900">Tags (can get multiple values separated by coma)</label>
        <div class="mt-2">
          <input
            value="<?= isset($pet) ? $pet->getTags() : '' ?>"
            type="text"
            name="tags"
            id="tags"
            autocomplete="tags"
            required
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <label for="status" class="block text-sm/6 font-medium text-gray-900">status</label>
        <div class="mt-2">
          <select type="text" name="status" id="status" autocomplete="status" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            <option value="available" <?= isset($pet) && $pet->getStatus() == 'available' ? 'selected' : '' ?>>available</option>
            <option value="pending" <?= isset($pet) && $pet->getStatus() == 'pending' ? 'selected' : '' ?>>pending</option>
            <option value="sold" <?= isset($pet) && $pet->getStatus() == 'sold' ? 'selected' : '' ?>>sold</option>
          </select>
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          <?= isset($pet) ? 'Update this pet data' : 'Add a new pet' ?>
        </button>
      </div>
    </form>
  </div>
</div>