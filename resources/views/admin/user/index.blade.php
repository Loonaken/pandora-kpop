<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
ユーザー管理
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}
                <section class="text-gray-600 body-font">
                  <div class="container p-4 mx-auto">
                    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                      {{-- Icon --}}
                      <div class=" mb-4 md:w-1/5 sm:w-1/4 w-full text-center ml-auto">
                        <div class="border-2 border-gray-200 rounded-lg">
                          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
                          </svg>
                          <h2 class="-mt-2 title-font font-medium text-2xl text-gray-900">{{$users->count()}}</h2>
                          <p class="leading-relaxed">ユーザー数</p>
                        </div>
                      </div>
                      {{-- fin Icon --}}
                      {{-- table --}}
                      <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                          <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">名前</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">作成日</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                          <tr>
                            <td class="px-4 py-3">{{$user->id}}</td>
                            <td class="px-4 py-3">{{$user->name}}</td>
                            <td class="px-4 py-3">{{$user->email}}</td>
                            <td class="px-4 py-3">{{$user->created_at->format('Y-m-d')}}</td>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{-- fin table --}}
                    </div>
                    <div class="flex p-2 mt-4 w-full">
                      <button type="button" onclick="location.href='{{route('admin.dashboard')}}'" class="flex mx-auto text-black bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">戻る</button>
                  </div>
                  </div>
                </section>
                {{-- fin Contents --}}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
