<div class="mx-auto">
  <div class="flex flex-wrap justify-around  text-center">
      <div class="p-4 w-1/3 md:w-1/4">
      <a href="{{route('admin.songs.index')}}">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg hover:bg-lime-200 transition-colors duration-300 ease-in-out">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                  <path d="M3 18v-6a9 9 0 0118 0v6"></path>
                  <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"></path>
              </svg>
              <h2 class="title-font font-medium text-3xl text-gray-900">{{$songs->count()}}</h2>
              <p class="leading-relaxed">曲</p>
          </div>
          </a>
      </div>
      <div class="p-4 w-1/3 md:w-1/4">
          <a href="{{route('admin.images.index')}}">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg hover:bg-lime-200 transition-colors duration-300 ease-in-out">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
              </svg>
              <h2 class="title-font font-medium text-3xl text-gray-900">{{$images->count()}}</h2>
              <p class="leading-relaxed">画像</p>
          </div>
          </a>
      </div>
      <div class="p-4 w-1/3 md:w-1/4">
          <a href="{{route('admin.user.index')}}">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg hover:bg-lime-200 transition-colors duration-300 ease-in-out">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                  <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
              </svg>
              <h2 class="title-font font-medium text-3xl text-gray-900">{{$users->count()}}</h2>
              <p class="leading-relaxed">ユーザー</p>
          </div>
          </a>
      </div>
  </div>
  <div class="flex flex-wrap justify-around text-center">
      <div class="p-4 w-1/3 md:w-1/4">
          <a href="{{route('admin.emotions.index')}}">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg hover:bg-lime-200 transition-colors duration-300 ease-in-out">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
              </svg>
              <h2 class="title-font font-medium text-3xl text-gray-900">{{$emotions->count()}}</h2>
              <p class="leading-relaxed">気分タグ</p>
          </div>
          </a>
      </div>
      <div class="p-4 w-1/3 md:w-1/4">
          <a href="{{route('admin.periods.index')}}">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg hover:bg-lime-200 transition-colors duration-300 ease-in-out">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <h2 class="title-font font-medium text-3xl text-gray-900">{{$periods->count()}}</h2>
              <p class="leading-relaxed">年代タグ</p>
          </div>
          </a>
      </div>
      <div class="p-4 w-1/3 md:w-1/4">
          <a href="{{route('admin.groups.index')}}">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg hover:bg-lime-200 transition-colors duration-300 ease-in-out">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" />
              </svg>
              <h2 class="title-font font-medium text-3xl text-gray-900">{{$groups->count()}}</h2>
              <p class="leading-relaxed">グループ</p>
          </div>
          </a>
      </div>
  </div>
</div>
