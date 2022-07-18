@foreach($childs as $child)
    <ul>
        <li>{{$child->name}}</li> 
        @if(count($child->child))
            @include('child',['childs' => $child->child])
        @endif
    </ul>
@endforeach