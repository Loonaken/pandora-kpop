{{-- Udemy>青木>マルチログイン機能
    + Googleに載っている Laravel,ModalのGithubのソースを参考にした --}}

<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
  <div class="modal__overlay z-50" tabindex="-1" data-micromodal-close>
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="text-xl text-gray-700" id="modal-1-title">
          モーダルウィンドウ
        </h2>
        <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        <div class="flex flex-wrap">
          {{--
            - foreach.. 画像選択画面にて全ての画像を表示させたいので、
              画像データ$imagesをforeachにかけて表示させている
            - 1つ目のif.. タイトルがある場合は画像の下にタイトルを表示させる
            - data-id/file/path/.. Javascriptにデータを渡すために必要な情報である
          --}}
          @foreach ($images as $image)
              <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4 ">
                <div class=" rounded-md p-4 cursor-pointer">
                  <img class="image"
                  data-id="{{ $name }}_{{ $image->id }}"
                  @env('local')
                  data-file="{{asset($image->path)}}"
                  @else
                  data-file="{{Storage::disk("s3")->url($image->path)}}"
                  @endenv
                  data-path=""
                  data-modal="modal-1"
                  @env('local')
                    src="{{ asset($image->path)}}"
                  @else
                    src={{ Storage::disk("s3")->url($image->path) }}
                  @endenv
                  >
                  <div class="text-lg text-center border-x-2 border-b-2 text-gray-500">{{$image->title ?: '' }}</div>
              </div>
              </div>
          @endforeach
    </div>
      </main>
      <footer class="modal__footer">
        <button type="button" type="button" class="modal__btn" data-micromodal-close aria-label="閉じる">閉じる</button>
      </footer>
    </div>
  </div>
</div>

{{-- 選択したのちに表示されるコードである --}}
<div class="flex justify-around items-center mb-4">
  <a data-micromodal-trigger="modal-1" href="javascript:;" class="modal__btn">画像を選択してください</a>
  <div class="w-1/4">
  <img id="{{$name}}_thumbnail" src="" >
  </div>
</div>
<input type="hidden" id="{{$name}}_hidden" name="{{$name}}">
{{-- このinputタグにおけるvalueでは画像の$song->image_idにデータを格納することになる --}}
{{-- valueは$songに画像のidを渡せば良いので、$song->image->id でも$song->image_idでもどちらでも可能である --}}



<script>
  MicroModal.init({
    disableScroll: true,
  });
</script>



<style type="text/css">
.modal {
  font-family: -apple-system,BlinkMacSystemFont,avenir next,avenir,helvetica neue,helvetica,ubuntu,roboto,noto,segoe ui,arial,sans-serif;
}

.modal__overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0,0,0,0.6);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal__container {
  background-color: #fff;
  padding: 30px;
  max-width: 700px;
  max-height: 1000px;
  border-radius:4px;
  overflow-y: auto;
  box-sizing: border-box;
}

.modal__header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.modal__title {
  margin-top: 0;
  margin-bottom: 0;
  font-weight: 600;
  font-size: 1.25rem;
  line-height: 1.25;
  color: #00449e;
  box-sizing: border-box;
}

.modal__close {
  background: transparent;
  border: 0;
}

.modal__header .modal__close:before { content: "\2715"; }

.modal__content {
  margin-top: 2rem;
  margin-bottom: 2rem;
  line-height: 1.5;
  color: rgba(0,0,0,.8);
}

.modal__btn {
  font-size: .875rem;
  padding-left: 1rem;
  padding-right: 1rem;
  padding-top: .5rem;
  padding-bottom: .5rem;
  background-color: white;
  color: rgba(0,0,0,.8);
  border-radius: .25rem;
  border-style: none;
  border-width: 0;
  cursor: pointer;
  -webkit-appearance: button;
  text-transform: none;
  overflow: visible;
  line-height: 1.15;
  margin: 0;
  will-change: transform;
  -moz-osx-font-smoothing: grayscale;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  transition: -webkit-transform .25s ease-out;
  transition: transform .25s ease-out;
  transition: transform .25s ease-out,-webkit-transform .25s ease-out;
}

.modal__btn:focus, .modal__btn:hover {
  -webkit-transform: scale(1.05);
  transform: scale(1.05);
}

.modal__btn-primary {
  background-color: #00449e;
  color: #fff;
}

.modal__btn {
width: 200px;
border: 2px solid limegreen;
border-radius: 4px;
text-align: center;
padding: 12px;
margin: 16px auto 0;
--tw-bg-opacity: 1;
color: black;
}




.wrapper {
width: 100%;
height: 100px;
display: flex;
flex-wrap: wrap;
align-items: center;
justify-content: center;
}

.image{
  border-width:4px;
  border-color:gainsboro;
}

.image:hover{
  border-color:cyan;
}

/**************************\
  Demo Animation Style
\**************************/
@keyframes mmfadeIn {
    from { opacity: 0; }
      to { opacity: 1; }
}

@keyframes mmfadeOut {
    from { opacity: 1; }
      to { opacity: 0; }
}

@keyframes mmslideIn {
  from { transform: translateY(15%); }
    to { transform: translateY(0); }
}

@keyframes mmslideOut {
    from { transform: translateY(0); }
    to { transform: translateY(-10%); }
}

.micromodal-slide {
  display: none;
}

.micromodal-slide.is-open {
  display: block;
}

.micromodal-slide[aria-hidden="false"] .modal__overlay {
  animation: mmfadeIn .3s cubic-bezier(0.0, 0.0, 0.2, 1);
}

.micromodal-slide[aria-hidden="false"] .modal__container {
  animation: mmslideIn .3s cubic-bezier(0, 0, .2, 1);
}

.micromodal-slide[aria-hidden="true"] .modal__overlay {
  animation: mmfadeOut .3s cubic-bezier(0.0, 0.0, 0.2, 1);
}

.micromodal-slide[aria-hidden="true"] .modal__container {
  animation: mmslideOut .3s cubic-bezier(0, 0, .2, 1);
}

.micromodal-slide .modal__container,
.micromodal-slide .modal__overlay {
  will-change: transform;
}
</style>
