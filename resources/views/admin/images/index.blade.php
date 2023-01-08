<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Image一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                 {{-- Image Column --}}
              @foreach ($images as $image)
              <div class="w-1/2 p-4 ">
              <a href="{{route('admin.images.edit' , ['image'=>$image->id] )}}">
                <div class="border rounded-md p-4">
                  <div class="mb-4">
                    @if (empty($image->filename))
                    <img src="{{ asset('images/no_image.jpg')}}">
                    @else
                    <img src="{{ asset('storage/images/' . $shop->filename)}}" >
                    @endif
                  </div>
                  <div class="text-xl">{{$image->title}}</div>
              </div>
              </a>
              </div>
              @endforeach
                 {{-- End_Image Column --}}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
