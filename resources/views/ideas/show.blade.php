<x-layout>


  <div class="card bg-neutral-50 p-6 ">
    <h2 class="font-bold">Your Idea</h2>

    <div >
        {{ $idea->description }}
    </div>
  </div>

  <div class="mt-6">
    <a href="/ideas/{{ $idea->id }}/edit">
      <span class="btn btn-secondary">Edit</span>
    </a>
  </div>

</x-layout>




