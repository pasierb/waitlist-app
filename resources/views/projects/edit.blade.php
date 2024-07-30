<x-app-layout>
    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            @include('projects.form', ['project' => $project])
        </div>
    </div>
</x-app-layout>
