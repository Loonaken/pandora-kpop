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
                <x-original.create onclick="location.href='{{route('admin.images.create')}}'" />
                  <div class="flex flex-wrap">
                    @foreach ($images as $image)
                        <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                          <div class=" rounded-md p-4">
                            <form method="POST" action="{{route('admin.images.destroy', ['image'=>$image->id])}}" >
                              @csrf
                              @method('delete')
                              <x-original.delete />
                            </form>
                            <x-thumbnail :filename="$image->filename" type="songs" />
                              <div class="border-x-2 border-b-2 -mt-4 border-lime-300 hover:border-cyan-300">
                              <a href="{{route('admin.images.edit' , ['image'=>$image->id] )}}" >
                            <div class="text-lg text-center  text-gray-500">{{$image->title ? $image->title : '登録なし' }}</div>
                            <div class="text-center text-gray-400 bg-white  transition duration-300 ease-in-out  focus:outline-none shadow-md rounded text-lg" >
                              更新
                            </div>
                          </div>
                        </a>
                      </div>
                        </div>
                    @endforeach
              </div>
              {{$images->links()}}
              {{-- End_Image Column --}}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
