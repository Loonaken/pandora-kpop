@props([
  'create' =>'新規登録'
])


<div class="flex justify-end mb-4 border-b-2 border-gray-500">
    <button {{ $attributes->merge([
        'onclick' => '',
        'class' => ' border-4 border-lime-500 hover:border-cyan-400  py-2 px-6 focus:outline-none  rounded text-lg mb-2 mr-4 transition duration-200 ease-in-out '
    ]) }} >{{ $create }}</button>
</div>
