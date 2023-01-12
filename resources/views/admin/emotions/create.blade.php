<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          気分タグ登録
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-5xl mx-auto sm:px-6 lg:px-4">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <x-input-error :messages="$errors->get('sort_order')" class="mt-2" />
                <form method="POST" action="{{route('admin.emotions.store')}}">
                    @csrf
                    <div class="my-4">

                      <table class="border-collapse border border-slate-400" id="dynamicAddRemove">
                        <tr>
                            <th>気分タグ</th>
                            {{-- <th>表示順</th> --}}
                            <th>操作</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="addMoreInputFields[0][name]" placeholder="名前" class="form-control" />
                            </td>
                            {{-- <td><input type="text" name="addMoreInputFields[0][sort_order]" placeholder="表示順" class="form-control" />
                            </td> --}}
                            <td><button type="button" name="add" id="dynamic-ar" class="border-b-blue-300">追加</button></td>
                        </tr>
                    </table>


                      {{-- <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto">
                        <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">気分タグ1</label>
                          <input type="text" placeholder="名前" id="name" name="name" value="{{old('name')}}" class="w-full bg-gray-100 bg-opacity-50 rounded border mb-2 border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <input type="text" placeholder="表示順" id="sort_order" name="sort_order" value="{{old('sort_order')}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                      </div> --}}

                      <div class="p-2 mb-2 w-full lg:w-2/3 mx-auto ">
                      <div class="flex p-2 w-full">
                        <button type="button" onclick="location.href='{{route('admin.emotions.index')}}'" class="flex mx-auto text-black bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-200 rounded text-lg">戻る</button>
                        <button type="submit" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">登録</button>
                    </div>
                </form>
              </div>
          </div>
      </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript">
      var i = 0;
      $("#dynamic-ar").click(function () {
          ++i;
          $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
              '][name]" placeholder="名前" class="form-control" /></td><td><button type="button" class="bg-red-300 border-b-red-300 remove-input-field">削除</button></td></tr>'
              );
      });
      $(document).on('click', '.remove-input-field', function () {
          $(this).parents('tr').remove();
      });
  </script>

</x-app-layout>
