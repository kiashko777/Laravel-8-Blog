<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl border border-gray-300">

{{--      FORM TO EDIT THE POST--}}

      <h1 class="text-center font-bold text-xl">Edit Post: {{ $post->title }}</h1>
      <form method="POST" action="route('editpost')/{{ $post->id }}" class="mt-10" enctype="multipart/form-data">
        @csrf
        @method ('PATCH')
        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
            Title
          </label>
          <input class="border border-gray-400 p-2 w-full"
                 type="text"
                 name="title"
                 id="title"
                 value="{{ $post->title }}"

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
                 value="{{ $post->slug }}"

          >
          @error('slug')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
            Thumbnail
          </label>
          <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="images" class="rounded-xl" width="100">
          <input class="border border-gray-400 p-2 w-full"
                 type="file"
                 name="thumbnail"
                 id="thumbnail"

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

          >{{ $post->excerpt }}</textarea>
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
          >{{ $post->body }}</textarea>
          @error('body')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
            Category
          </label>

          <select name="category_id" id="category_id">

            @foreach($categories = \App\Models\Category::all() as $category)
              <option
                value="{{ $category->id }}"
                {{ old('category_id',$post->category_id) === $category->id ? 'selected' : ''}}>
                {{ ucwords ($category->name) }}</option>
            @endforeach
          </select>


          @error('category')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Update!</button>
        </div>

      </form>

    </main>
  </section>
</x-layout>


