<x-layout>
  <form method="POST" action="/ideas">
    @csrf
    <div class="col-span-full">
      <label for="description" class="block text-sm/6 font-medium text-white">Create a new Idea</label>
      <div class="mt-2">
        <textarea id="description" 
          name="description" 
          rows="3" 
          class="block w-full rounded-md bg-gray-600 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
          ></textarea>

          {{-- pikk versioon errori kuvamisest --}}
          {{-- @if($errors->has('description'))
            <p class="text-sm text-red-500 mt-1">{{ $errors->first('description') }}</p>

          @endif --}}

          {{-- lihtsam viis enne componendiks convertimist --}}
          {{-- @error('description')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>

          @enderror --}}

        <x-forms.error name='description' />
      </div>
      <p class="mt-3 text-sm/6 text-gray-400">Have an idea you want to save for later?</p>
    </div>

    <div class="mt-6 flex items-center gap-x-6">
      <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm">Submit</button>
    </div>
  </form>


</x-layout>