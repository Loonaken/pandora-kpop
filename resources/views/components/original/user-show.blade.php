<a href="{{$song->youtube_link}}" target="_blank">
  <section class="text-gray-600 body-font overflow-hidden ">
    <div class="container mb-4 mx-auto border-4 border-gray-100/0 hover:border-lime-300 transition delay-100 ease-in-out  ">
      <div class="lg:w-4/5 mx-auto flex flex-wrap items-center ">
        <div class="basis-1/3 ">
          <x-thumbnail :filename="$song->image->filename"  class="mb-0  " />
          </div>
          <div class="basis-2/3 pl-2">
            <div class="flex items-center">
              <p class="mr-4">曲名</p>
              <p class="text-gray-900 text-2xl title-font font-medium">{{$song->name}}</p>
            </div>
            <div class="flex mt-2">
              <p class=" mr-4">グループ名</p>
              <p class="text-gray-900 title-font font-medium">{{$song->group->name}}</p>
            </div>
            <p class="leading-relaxed mt-2"> {{$song->information ?? ''}} </p>
            <div class="flex  gap-4 mt-2">
              <p>#{{$song->emotion->name ?? '登録なし'}}</p>
              <p>#{{$song->period->term ?? '登録なし'}}</p>
            </div>
        </div>
      </div>
    </div>
  </section>
</a>
