<x-layout>
  <section class="px-6 py-8">

    {{--Form to create the post--}}

    <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl border border-gray-300">
      <h1 class="text-center font-bold text-xl">Create new post!</h1>
      <form method="POST" action="{{ route('posts.store') }}" class="mt-10" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
            Title
          </label>
          <input class="border border-gray-400 p-2 w-full"
                 type="text"
                 name="title"
                 id="title"
                 value="{{ old('title') }}"
                 required
          >
          @error('title')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
            Slug
          </label>
          <input class="border border-gray-400 p-2 w-full"
                 type="text"
                 name="slug"
                 id="slug"
                 value="{{ old('slug') }}"
                 required
          >
          @error('slug')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
            Thumbnail
          </label>
          <input class="border border-gray-400 p-2 w-full"
                 type="file"
                 name="thumbnail"
                 id="thumbnail"
                 required
          >
          @error('thumbnail')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
            Excerpt
          </label>
          <textarea cols="20" rows="3" class="border border-gray-400 p-2 w-full "
                    name="excerpt"
                    id="excerpt"
                    value="{{ old('excerpt') }}"
                    required
          ></textarea>
          @error('excerpt')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
            Body
          </label>
          <textarea cols="30" rows="5" class="border border-gray-400 p-2 w-full"
                    name="body"
                    id="body"
                    value="{{ old('body') }}"
                    required
          ></textarea>
          @error('body')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
            Category
          </label>

          <select name="category_id" id="category_id">

            @foreach($categories as $category)
              <option
                value="{{ $category->id }}" {{ old('category_id') === $category->id ? 'selected' : ''}}>
                {{ ucwords ($category->name) }}</option>
            @endforeach
          </select>


          @error('category')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Post!</button>
        </div>

      </form>
    </main>
  </section>
</x-layout>

