<x-layout>


  <div class="mt-6 text-white">
    <h2 class="font-bold">Your Idea</h2>

    <div class="mt-6">
        {{ $idea->description }}
    </div>
  </div>

  <div class="mt-6">
    <a href="/ideas/{{ $idea->id }}/edit">
      <span class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-none focus:outline-none">Edit</span>
    </a>
  </div>

</x-layout>




