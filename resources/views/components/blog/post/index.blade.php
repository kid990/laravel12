<div>
    <h2>{{$slot}}</h2>
    @foreach($posts as $p)
       <p> {{$p->title}}</p>
        <br>
        <p>{{$p->description}}</p>
        <br>
        <a href="{{route('blog.show',$p->id)}}">Ver</a>
    @endforeach


</div>
