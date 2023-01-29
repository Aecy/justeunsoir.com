<div class="profile-item">
    <div class="profile-cover">
        <img src="{{ asset('assets/images/profile/cover.jpg') }}" alt="cover-pic">
        <div class="edit-photo custom-upload">
            <div class="file-btn"><i class="icofont-camera"></i>Modifier votre couverture</div>
            <input type="file">
        </div>
    </div>
    <div class="profile-information">
        <div class="profile-pic">
            <img src="{{ $user->avatar_url }}" alt="DP">
            <div class="custom-upload">
                <div class="file-btn">
                                        <span class="d-none d-lg-inline-block">
                                            <i class="icofont-camera"></i> Modifier votre photo
                                        </span>
                    <span class="d-lg-none mr-0">
                                            <i class="icofont-plus"></i>
                                        </span>
                </div>
                <form id="avatar-form" method="post" action="{{ route('account.upload.avatar') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="avatar" onchange="event.preventDefault(); document.getElementById('avatar-form').submit()">
                </form>
            </div>
        </div>
        <div class="profile-name">
            <h4>
                @if(Cache::has('users_online-' . $user->id))
                    <i class="icofont-ui-press text-success text-sm circle pulse"></i>
                @else
                    <i class="icofont-ui-press text-danger text-sm"></i>
                @endif
                {{ $user->name }}
            </h4>
            <span>Inscrit {{ $user->created_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
