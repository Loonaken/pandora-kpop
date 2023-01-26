<x-app-layout >
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
        あなたの聞きたい曲
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{-- Contents --}}
                <form method="post" action="{{route('user.outputs.show')}}" >
                  @csrf
                  <div class="my-4">
                    {{-- emotionタグ選択 --}}
                    <div class="p-2 mb-6 w-full lg:w-2/3 mx-auto">
                    <x-input-error :messages="$errors->get('emotion')" class="mt-2" />
                        <div class="relative">
                          <p class="leading-7 text-base ">曲の気分を選んでください</p>
                          <span class="text-sm text-gray-500 pb-2">＊1つのみ</span>
                          <div class="border-2 border-gray-200 shadow-md px-2 py-4">
                            <group class="inline-radio" >
                              <div class="flex space-x-2">
                                @foreach ($emotions as $emotion)
                                  <input type="radio" id="{{$emotion->name}}" name="emotion" value="{{$emotion->id}}" >
                                  <label for="{{$emotion->name}}" class=" text-center border-2 px-4 py-2 my-1  border-orange-400 rounded-full  hover:border-green-400 transition duration-300 ease-in-out cursor-pointer ">
                                    {{$emotion->name}}</label>
                                    @endforeach
                                  </div>
                              </group>
                          </div>
                        </div>
                      </div>
                      {{-- fin emotionタグ選択 --}}

                      {{-- periodタグ選択 --}}
                      <div class="p-2 mb-6 w-full lg:w-2/3 mx-auto">
                        <x-input-error :messages="$errors->get('period')" class="mt-2" />
                            <div class="relative">
                              <p class="leading-7 text-base ">曲の年代を選んでください</p>
                              <span class="text-sm text-gray-500 pb-2">＊1つのみ</span>
                              <div class="border-2 border-gray-200 shadow-md p-2">
                                <group class="inline-radio" >
                                  <div class="flex space-x-2">
                                    @foreach ($periods as $period)
                                      <input type="radio" id="{{$period->term}}" name="period" value="{{$period->id}}"  >
                                      <label for="{{$period->term}}" class=" text-center border-2 px-4 py-2 my-1  border-orange-400 rounded-full  hover:border-green-400 transition duration-300 ease-in-out cursor-pointer ">
                                        {{$period->term}}</label>
                                        @endforeach
                                      </div>
                                  </group>
                              </div>
                            </div>
                          </div>
                      {{-- fin periodタグ選択 --}}

                        {{-- Typeの入力 --}}
                        <div class="p-2 mb-6 w-full lg:w-2/3 mx-auto">
                          <p class="leading-7 text-base ">アーティストを選んでください</p>
                          <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            <group class="inline-radio" >
                            <div class="flex justify-center mb-2">
                              <input type="radio" id="male" name="type" value="{{\Constant::GROUP_LIST['male']}}" >
                              <label for="male" class=" grow text-center border-2 py-3  border-orange-400 rounded shadow-md  hover:border-green-400 transition duration-300 ease-in-out cursor-pointer ">
                                男性アーティスト</label>
                              <input type="radio" id="female" name="type" value="{{\Constant::GROUP_LIST['female']}}" >
                              <label for="female" class="grow text-center border-2 py-3  border-orange-400 rounded shadow-md  hover:border-green-400 transition duration-300 ease-in-out cursor-pointer ">
                                女性アーティスト</label>
                              </div>
                            </group>
                        </div>
                      {{-- fin Typeの入力 --}}

                      <div class="flex justify-around items-center p-2 w-full">
                        <x-original.return return=ホーム onclick="location.href='{{route('user.dashboard')}}'" />
                        <x-original.action action=聞く！ />
                    </div>
                </form>

                {{-- fin contents --}}

              </div>
          </div>
      </div>
  </div>

  <script>

  </script>

</x-app-layout>
