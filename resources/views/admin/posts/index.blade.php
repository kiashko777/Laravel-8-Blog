<x-layout>
  <section class="px-6 py-8 flex ">
    <main class="max-w-full mx-auto mt-10 bg-gray-100 p-6 rounded-xl border border-gray-300">
      <h1 class="text-center  font-bold text-xl">Manage posts</h1>
      <div class="flex flex-col mt-4 ">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
          <div class="py-2 align-middle inline-block max-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">
              <table class="min-w-full divide-y divide-gray-200 ">
                <tbody>

{{--                HERE WE'LL SEE ALL POST FOR ADMIN ACTIONS--}}

                @foreach($posts as $post)
                  <tr class="bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <a class="hover:text-gray-700" href="/posts/{{ $post->slug }}">
                        {{ $post->title }}
                      </a>
                      <hr>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500">Edit</a>
                      <form method="POST" action="/admin/posts/{{ $post->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 mt-1">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach

                </tbody>
              </table>
            </div>

{{--            PAGINATION OF ADMIN PART--}}

            <p class="mt-4">{{ $posts->links() }}</p>
          </div>
        </div>
      </div>

    </main>
  </section>
</x-layout>

