<x-app-layout >
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
        ハッシュタグ集
      </h2>
  </x-slot>

  <div class="pt-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}
                  <div class="my-4">
                    {{-- emotionタグ選択 --}}
                    <div class="p-2 mb-6 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <p class="leading-7 text-base "># 気分</p>
                          <div class="border-2 border-gray-200 shadow-md px-2 py-4">
                              <div class="flex flex-wrap gap-2">
                                @foreach ($emotions as $emotion)
                                <a href="{{route('user.hashtags.emotion', ['emotion'=>$emotion->id])}}" class="text-center border-2 px-4 py-2 my-1  border-orange-400 rounded-full  hover:border-green-400 transition duration-300 ease-in-out cursor-pointer ">
                                {{$emotion->name}}
                                </a>
                                @endforeach
                              </div>
                          </div>
                        </div>
                      </div>
                      {{-- fin emotionタグ選択 --}}

                      {{-- periodタグ選択 --}}
                      <div class="p-2 mb-6 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <p class="leading-7 text-base "># 年代</p>
                          <div class="border-2 border-gray-200 shadow-md px-2 py-4">
                              <div class="flex flex-wrap gap-2">
                                @foreach ($periods as $period)
                                <a href="{{route('user.hashtags.period', ['period'=>$period->id])}}" class="text-center border-2 px-4 py-2 my-1  border-orange-400 rounded-full  hover:border-green-400 transition duration-300 ease-in-out cursor-pointer ">
                                {{$period->term}}
                                </a>
                                @endforeach
                              </div>
                          </div>
                        </div>
                      </div>
                      {{-- fin periodタグ選択 --}}

                      {{-- group選択 --}}
                      <div class="p-2 mb-6 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <p class="leading-7 text-base "># グループ</p>
                          <form method="get" action="{{route('user.hashtags.refer' )}}" >
                              <div class="flex justify-center ">
                                {{-- 定数化した値をValueにそれぞれ当てはめている --}}
                                <input type="radio" name="type" value="{{\Constant::GROUP_LIST['male']}}" id="male">
                                <label for="male" class=" grow text-center border-2 py-2  border-orange-400 rounded  hover:bg-yellow-300/75 transition duration-300 ease-in-out cursor-pointer ">
                                  男性アーティスト</label>
                                <input type="radio" name="type" value="0" id="all">
                                <label for="all" class=" grow text-center border-2 py-2  border-orange-400 rounded  hover:bg-yellow-300/75 transition duration-300 ease-in-out cursor-pointer ">
                                  全て</label>
                                <input type="radio"  name="type" value="{{\Constant::GROUP_LIST['female']}}" id="female">
                                <label for="female" class="grow text-center border-2 py-2  border-orange-400 rounded hover:bg-yellow-300/75 transition duration-300 ease-in-out cursor-pointer ">
                                  女性アーティスト</label>
                                </div>
                                  <div class="border-2 border-gray-200 shadow-md px-2 py-4">
                                      <div class="flex flex-wrap gap-2">
                                        @foreach ($groups as $group)
                                        <a href="{{route('user.hashtags.group', ['group'=>$group->id])}}" class="text-center border-2 px-4 py-2 my-1  border-orange-400 rounded-full  hover:border-green-400 transition duration-300 ease-in-out cursor-pointer ">
                                        {{$group->name}}
                                        </a>
                                        @endforeach
                                      </div>
                                  </div>
                                </div>
                            </form>
                      </div>
                    {{-- fin group選択 --}}

                    <div class="flex justify-around items-center p-2 w-full">
                      <x-original.return return=ホーム onclick="location.href='{{route('user.dashboard')}}'" />
                  </div>
                </form>

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

<script>

    const selectAll = document.getElementById('all')
    selectAll.addEventListener('click' , function(){
      this.form.submit();

    })

    const selectMale = document.getElementById('male')
    selectMale.addEventListener('click' , function(){
      this.form.submit();

    })

    const selectFemale = document.getElementById('female')
    selectFemale.addEventListener('click' , function(){
      this.form.submit();

    })

  </script>

</x-app-layout>
