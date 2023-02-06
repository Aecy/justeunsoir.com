@if(Cache::has('users_online-' . $userId))
  <i class="icofont-ui-press text-success text-sm circle pulse"></i>
@else
  <i class="icofont-ui-press text-danger text-sm"></i>
@endif
