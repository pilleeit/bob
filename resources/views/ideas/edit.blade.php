<x-layout>
  <form method="POST" action="/ideas/{{ $idea->id }}">
    @csrf
    @method('PATCH')

    <div class="col-span-full">
      <label for="description" class="block text-sm/6 font-medium text-white">Edit your idea</label>
      <div class="mt-2">
        <textarea id="description" name="description" rows="3" class="textarea w-full"
        >{{  $idea->description }}</textarea>

        <x-forms.error name="description" />

      </div>
      {{-- <p class="mt-3 text-sm/6 text-gray-400"></p> --}}
    </div>

    <div class="mt-6 flex items-center gap-x-2">
      <button type="submit" class="btn btn-secondary">Update</button>
          
      <button type="submit" 
        form="delete-idea-form"
        class="btn btn-neutral">
        Delete</button>
    </div>


  </form>

  <form id="delete-idea-form" method="POST" action="/ideas/{{ $idea->id }}">
    @csrf
    @method('DELETE')
  </form>


</x-layout>



