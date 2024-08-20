<div class="form-control w-full max-w-md mx-auto">
    <label class="label" for="{{$block->id}}">
        <span class="label-text">{{$data->label}}</span>
    </label>
    <input type="text"
           id="{{$block->id}}"
           name="data[{{$data->label}}]"
           placeholder="{{$data->placeholder}}"
           class="input input-bordered w-full" />
</div>
