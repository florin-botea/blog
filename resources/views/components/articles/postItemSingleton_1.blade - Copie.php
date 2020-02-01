
<div class="post-item position-relative hover:bordered hover:nested-hidden-show">
    <div class="cursor-pointer float-right hidden">
        <a href="{{ route('articles.edit', ['article'=>$id]) }}"><i class="fas fa-edit"></i></a>
    </div>
    <div class="w-sm-33 px-0 float-left mr-2">
        <div role="image" class="image rect-4-3 w-100 align-self-start" style="padding-top: 75%; background-image: url({{ asset('storage/'.$photo) }});"></div>
    </div>
    <h1 class="text-justify">{{ $title ?? 'no title' }}</h1>
    @foreach ($tags as $tag)
        <span class="badge badge-outlined-secondary d-inline-block mb-1">{{ $tag['name'] }}</span>
    @endforeach
    <br>
        <small class="text-muted d-inline-block float-right">
            <b> admin </b> - @datetime(['datetime' => $created_at])
        </small>
    <br>
    <br>
    {!! $content ?? 'no content' !!}
</div>