<div class="profile-item">
    <div class="profile-cover">
        <img src="{{ asset('assets/images/profile/cover.jpg') }}" alt="cover-pic">
    </div>
    <div class="profile-information">
        <div class="profile-pic">
            <img src="{{ $user->avatar_url }}" alt="DP">
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
        <ul class="profile-contact">
            <li>
                <a href="#">
                    <div class="icon"><i class="icofont-heart"></i></div>
                    <div class="text">
                        <p>Liker</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="icon"><i class="icofont-user"></i></div>
                    <div class="text">
                        <p>Demander en ami</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="icon"><i class="icofont-envelope"></i></div>
                    <div class="text">
                        <p>Message privé</p>
                    </div>
                </a>
            </li>
        </ul>

    </div>
</div>
