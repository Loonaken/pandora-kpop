<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          年代タグ登録
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-5xl mx-auto sm:px-6 lg:px-4">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{route('admin.periods.store')}}">
                  @csrf
                  {{-- <x-input-error :messages="$errors->get('addMoreInputFields.*.[name]')" class="mt-2" />
                  <x-input-error :messages="$errors->get('addMoreInputFields.*.[sort_order]')" class="mt-2" /> --}}
                    @if ($errors->any())
                    <div class="text-red-600 text-center text-bold" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="my-4">
                      <table class="border-collapse border border-slate-400 mx-auto" id="dynamicAddRemove">
                        <tr>
                            <th class="bg-blue-300 py-2 px-16 md:px-24 lg:px-32">年代</th>
                            {{-- <th class="bg-yellow-100 md:w-2/6 py-2">表示順</th> --}}
                            <th class="bg-gray-300  py-2  px-12">操作</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="addMoreInputFields[0][term]"  placeholder="例:2022, 2018" class="text-center focus:border-green-500 py-2 px-16 md:px-24 lg:px-32" />
                            </td>
                            {{-- <td><input type="text" name="addMoreInputFields[0][sort_order]" placeholder="表示順" class="focus:border-green-500" /> --}}
                            </td>
                            <td class="text-center"><button type="button" name="add" id="dynamic-ar" class="py-2 px-6 md:px-9 lg:px-12 underline decoration-blue-400 underline-offset-4 decoration-2 hover:bg-blue-200/50 hover:rounded-md ">追加</button></td>
                        </tr>
                    </table>

                    <p class="text-center my-4 text-gray-500">※年代の記入欄は空白にしないでください</p>

                        <div class="flex justify-around items-center p-2 w-full">
                            <x-original.return onclick="location.href='{{route('admin.periods.index')}}'" />
                            <x-original.action action=追加 />
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
          $("#dynamicAddRemove").append
          ('<tr><td><input type="text" name="addMoreInputFields[' + i +
              '][term]" placeholder="例:2022, 2018" class="text-center focus:border-green-500 py-2 px-16 md:px-24 lg:px-32" /></td><td class=" text-center"><button type="button" class=" text-white bg-red-500 border-0 py-2 px-6 md:px-9 lg:px-12   focus:outline-none hover:bg-red-600 rounded text-base   remove-input-field">削除</button></td></tr>'
              );
      });
      $(document).on('click', '.remove-input-field', function () {
          $(this).parents('tr').remove();
      });
  </script>

</x-app-layout>
