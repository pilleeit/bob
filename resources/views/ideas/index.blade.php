<x-layout>


@if($ideas->count())
  <div class="mt-6 text-white">
    <h2 class="font-bold">Your Ideas</h2>

      @foreach($ideas as $idea)
        <li>
          <x-idea-card href="/ideas/{{ $idea->id }}">
            {{ $idea->description }}
          </x-idea-card>
        </li>


        {{-- <a href="/ideas/{{ $idea->id }}" class="text-sm">{{ $idea->description }}</a> --}}
      @endforeach
    </ul>
  </div>
@else 
  <p>No ideas yet ... <a href="ideas/create" class="underline text-blue-500">Start creating</a></p>
@endif

</x-layout>

