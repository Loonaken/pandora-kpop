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
                 <div class="flex justify-end mb-4">
                  <button onclick="location.href='{{route('admin.images.create')}}'" class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">新規登録をする</button>
                  </div>
              @foreach ($images as $image)
              <div class="w-1/4 p-4 ">
              <a href="{{route('admin.images.edit' , ['image'=>$image->id] )}}">
                <div class="border rounded-md p-4">
                  <x-thumbnail :filename="$image->filename" type="songs" />
                  <div class="text-xl">{{$image->title}}</div>
              </div>
              </a>
              </div>
              @endforeach
              {{$images->links()}}
                 {{-- End_Image Column --}}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
