<x-layout>


@if($ideas->count())
  <div class="mt-6 text-white">
    <h2 class="font-bold">Your Ideas</h2>

    <ul class="mt-6 grid grid-cols-2 gap-x-6 gap-y-4">
      @foreach($ideas as $idea)
        
          <x-idea-card href="/ideas/{{ $idea->id }}">
            {{ $idea->description }}
          </x-idea-card>

        {{-- <a href="/ideas/{{ $idea->id }}" class="text-sm">{{ $idea->description }}</a> --}}
      @endforeach
    </ul>
  </div>
@else 
  <p>No ideas yet ... </p>
@endif

<p class="mt-6"><a href="ideas/create" class="underline text-blue-500">Start creating</a></p>

</x-layout>

