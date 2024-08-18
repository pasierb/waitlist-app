<div class="join flex w-full max-w-sm" id="{{$block->id}}">
    <input class="input input-bordered join-item grow"
           required
           name="email"
           type="email"
           placeholder="{{$data->placeholder}}"/>
    <button class="btn btn-primary join-item">{{$data->button}}</button>
</div>
