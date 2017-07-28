@foreach($urls as $url)
{{env('APP_URL')}}/{{$url->arctype->real_path}}/{{$url->id}}.shtml
@endforeach