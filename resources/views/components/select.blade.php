<div>
    <!-- An unexamined life is not worth living. - Socrates -->
    <select {{$attributes}}>
        @foreach ($regions as $region)
            <option value="">{{$region}}</option>
        @endforeach
    </select>
</div>