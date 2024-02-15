
<x-app-layout>

<div class="container mx-auto mt-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Project Cards -->
        @foreach($projects as $project)
            <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                <img src="{{ $project->image }}" alt="Project Image" class="w-full h-32 object-cover mb-4">
                <h2 class="text-lg font-semibold">{{ $project->title }}</h2>
                <p class="text-gray-600">{{ $project->description }}</p>
                <div class="mt-4 flex justify-between items-center">
                    <button class="text-blue-500 hover:text-blue-700 more-button" data-project-id="{{ $project->id }}">
                        More
                    </button>

                    

                    {{-- <form class="" method="post" action="{{route('collaboration.store',['project'=>$project , 'user_id'=>Auth::id()])}}">
                        @csrf
                        @method('post')
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Request Collaboration
                        </button>
                     </form> --}}

                     <form class="" method="post" action="{{ route('collaboration.store', ['project' => $project, 'user_id' => Auth::id()]) }}">
                        @csrf
                        @method('post')
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Request Collaboration
                        </button>
                    </form>
                    {{-- <form class="" method="post" action="{{ route('collaboration.store', ['project' => $project, 'user_id' => Auth::id()]) }}">
                        @csrf
                        @method('post')
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Request Collaboration
                        </button>
                    </form> --}}
                    
                    

                    
                </div>
                <!-- Additional Project Details (Initially Hidden) -->
                <div id="projectDetails{{ $project->id }}" class="hidden mt-4">
                    <h3 class="text-lg font-semibold mb-2">Partners</h3>
                    @foreach($project->partners as $partner)
                        <div class="mb-2">
                            <p class="font-semibold">{{ $partner->name }}</p>
                            <p class="text-gray-600">{{ $partner->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function showProjectDetails(projectId) {
        const projectDetails = document.getElementById(`projectDetails${projectId}`);
        projectDetails.classList.toggle('hidden');
    }

    document.addEventListener("DOMContentLoaded", function() {
        const moreButtons = document.querySelectorAll('.more-button');

        moreButtons.forEach(button => {
            button.addEventListener('click', function() {
                const projectId = this.getAttribute('data-project-id');
                showProjectDetails(projectId);
            });
        });
    });
</script>

</x-app-layout>
