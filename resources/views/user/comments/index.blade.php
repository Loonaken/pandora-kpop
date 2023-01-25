<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        コメント
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto px-2 lg:px-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-6 text-gray-900">

              {{-- content --}}
              <x-original.create onclick="location.href='{{route('user.comments.create')}}'" />
              <section class="text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto flex flex-wrap">
                  <div class="flex flex-wrap -m-4">
                    <div class="p-4 lg:w-1/2 md:w-full">

                      {{-- comment --}}
                      <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                        <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                          </svg>
                        </div>
                        <div class="flex-grow">
                          <h2 class="text-gray-900 text-lg title-font font-medium mb-3">The Catalyzer</h2>
                          <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                          <p class="text-right mr-4 mt-4">By kensuke</p>
                        </div>
                      </div>
                      {{-- fin comment --}}
                    </div>
                  </div>
                </div>
              </section>

              {{-- fin content --}}


            </div>
          </div>
      </div>
  </div>


</x-app-layout>
