<li class="comment" style="margin-left: {{ $depth * 40 }}px">
    <!-- Commenter Image -->
    <a class="pull-left commenter" href="#">
        <img src="{{ $comment->user->avatar ?? 'images/clients/client1.jpg' }}" alt="{{ $comment->user->name }}"
            class="img-responsive">
    </a>

    <div class="media-body comment-body">
        <!-- Comment Wrapper -->
        <div class="comment-content-wrapper">
            <div class="media-heading clearfix">
                <!-- Commenters Name -->
                <h6 class="commenter-name">{{ $comment->user->name }}</h6>

                @auth
                    <div class="comment-reply pull-right">
                        <a href="javascript:void(0)"
                            onclick="document.getElementById('reply-form-{{ $comment->id }}').style.display='block'"
                            class="btn btn-blue btn-small btn-effect">reply</a>
                    </div>
                @endauth

                <!-- Comment Info -->
                <div class="comment-info">
                    <span>{{ $comment->created_at->format('M j, Y \a\t g:i a') }}</span>
                </div>

                <!-- Comment -->
                <p>{{ $comment->body }}</p>

                @auth
                    <!-- Reply Form (hidden by default) -->
                    <div id="reply-form-{{ $comment->id }}" style="display: none; margin-top: 15px;">
                        <form action="{{ route('comments.store', $blog) }}" method="POST">
                            @csrf
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            <div class="form-group">
                                <textarea class="form-control" name="body" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-blue btn-small btn-effect">Post Reply</button>
                            <button type="button" class="btn btn-default btn-small"
                                onclick="document.getElementById('reply-form-{{ $comment->id }}').style.display='none'">
                                Cancel
                            </button>
                        </form>
                    </div>
                @endauth

                @can('delete', $comment)
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-small btn-effect"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                @endcan
            </div>

            <!-- Replies -->
            @if ($comment->replies->count() > 0)
                <ul class="comment-replies">
                    @foreach ($comment->replies as $reply)
                        @include('partials.comment', ['comment' => $reply, 'depth' => $depth + 1])
                    @endforeach
                </ul>
            @endif
        </div>
        <!-- End of Comment Wrapper -->
    </div>
</li>
