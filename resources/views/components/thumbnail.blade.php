<div {{ $attributes->merge([
  'class' => 'mb-4'
]) }} >
@env('local')
    <img src="{{ asset($path) }}" >
@else
    <img src="{{ Storage::disk("s3")->url($path) }}" >
@endenv
</div>
