{{ "" }}

<div class="col-md-2">
    <select class="form-control" name="university">
        @foreach($items as $item)
            <option value="{{ $item['id']}}">{{ $item[$key]}}</option>
        @endforeach
    </select>
</div>

