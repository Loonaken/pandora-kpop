<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          画像一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                {{-- Image Column --}}
                <x-flash-message status="session('status')" />
                <div class="flex justify-end mb-4 border-b-2 border-gray-500">
                  <button onclick="location.href='{{route('admin.images.create')}}'" class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg mb-2 mr-4 ">新規登録</button>
                  </div>
                  <div class="flex flex-wrap">
                    @foreach ($images as $image)
                    @if (!is_null($image->title))
                        <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                        <a href="{{route('admin.images.edit' , ['image'=>$image->id] )}}">
                          <div class=" rounded-md p-4">
                            <x-thumbnail :filename="$image->filename" type="songs" />
                            <div class="text-lg text-center -mt-4 border-x-2 border-b-2 text-gray-500">{{$image->title}}</div>
                        </div>
                        </a>
                        </div>
                        @elseif(is_null($image->title))
                        <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                    <a href="{{route('admin.images.edit' , ['image'=>$image->id] )}}">
                      <div class=" rounded-md p-4">
                        <x-thumbnail :filename="$image->filename" type="songs" />
                    </div>
                    </a>
                    </div>
                    @endif
                    @endforeach
              </div>
              {{$images->links()}}
              {{-- End_Image Column --}}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
