<div>
    <div>

        <!-- Button trigger modal  for Adding Post-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
            Add Post
        </button>

        <!-- Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Save Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @livewire('post-form')
                    </div>
                </div>
            </div>
        </div>
        <br />

    </div>
    <!-- Button trigger modal  for Adding Post-->


    <!-- Button trigger modal  for Deleting Post-->

    
    <!-- Modal -->
    <div class="modal fade" id="modalFormDeletePost" tabindex="-1"  data-bs-target="#modalFormDeletePost" aria-labelledby="#modalFormDeletePost"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormDeletePost">Delete Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Delete: Post</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button wire:click='delete' type="button" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal  for Deleting Post-->
    {{-- <p>Select Post: {{$selectPost}}</p>
    <p>Action : {{$action}}</p> --}}


    <div>
        @if ($posts->count())
            <table class="table table-striped">
                <thead>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created_Date</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>

                            <th>{{ $post->title }}</th>
                            <th>{{ $post->description }}</th>
                            <th>{{ $post->created_at}}</th>

                            <th><button wire:click="selectPost({{ $post->id }}, 'update')" class="btn btn-success">Update</button></th>
                            <th><button wire:click="selectPost({{ $post->id }}, 'delete')" class="btn btn-danger">Delete</button></th>
                            {{-- $emitUp('postAdded') --}}

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{ $posts->links() }}

    </div>
</div>
