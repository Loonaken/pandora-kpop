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

                        <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                          <div class=" rounded-md p-4">
                            <form method="POST" action="{{route('admin.images.destroy', ['image'=>$image->id])}}" >
                              @csrf
                              @method('delete')
                              <div class="flex justify-end -mb-6">
                                <button type="submit" class=" text-white z-10 bg-red-500 border-0 focus:outline-none hover:bg-red-600 rounded-full text-base">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 ">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                              </div>
                            </form>
                            <x-thumbnail :filename="$image->filename" type="songs" />
                            <div class="text-lg text-center -mt-4 border-x-2 border-b-2 text-gray-500">{{$image->title ? $image->title : '登録なし' }}</div>
                            <div class="text-center">
                              <a href="{{route('admin.images.edit' , ['image'=>$image->id] )}}"  class="text-black bg-white border-4 transition duration-300 ease-in-out border-yellow-300 hover:bg-yellow-200/80 px-16 focus:outline-none  rounded text-lg mb-2 mx-2 ">更新</a>
                            </div>

                        </div>
                        </a>
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
