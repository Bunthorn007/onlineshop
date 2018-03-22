<div class="col-md-3" style="padding-left: 5px; padding-right: 5px;">
    <div class="card">
        <div class="card-header">
            <div class="media">
                <div class="media-middle media-left">
                    <a href="/profile/{{$post->user_id}}">
                        <img class="media-object img-circle" width="32" height="32" src="{{$post->user->photo->file}}">
                    </a>
                </div>
                <div class="media-middle media-body">
                    <a class="link-muted" href="/profile/{{$post->user_id}}">
                        {{$post->user->firstname . ' '. $post->user->lastname}}
                    </a>
                </div>
            </div>
        </div>
        <div class="card-image">
            <a class="link-muted" href="/detail/{{$post->id}}">
                <img class="img-responsive" width="100%" height="50%" src="{{asset($post->images->first()->file)}}">
            </a>
        </div>
        <div class="card-body">
            <h4 class="card-title fw-l">
                <strong><a class="link-muted" href="/detail/{{$post->id}}">{{str_limit($post->title, 16)}}</a></strong>
            </h4>
            <small>{{str_limit($post->content, 25)}}</small>
        </div>
        <div class="card-footer">
            <small>
                <span class="icon icon-eye icon-lg icon-fw"></span>{{$post->view}} views
                <span class="pull-right"><span class="icon icon-clock-o icon-lg icon-fw"></span>{{$post-> created_at->diffForHumans()}}</span>
            </small>
        </div>
    </div>
</div>