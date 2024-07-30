<x-app-layout>
    <div class="w-full flex justify-center">
        <form action="{{route('projects.store')}}" method="POST"
              x-data="{name: '', slug: ''}">
            @csrf
            <div class="card bg-base-300 w-96 shadow-xl">
                <div class="card-body">
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Name</span>
                        </div>
                        <input type="text" name="name"
                               x-model="name"
                               x-on:keyup="slug = name.toLowerCase().replace(/ /g, '-')"
                               class="input input-bordered"/>
                    </div>

                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Slug</span>
                        </div>
                        <input type="text" name="slug"
                               x-model="slug"
                               class="input input-bordered"/>
                    </div>

                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
