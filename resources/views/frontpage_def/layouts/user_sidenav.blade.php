<div class="col-lg-4 col-md-3 col-12 user-account-left">
    <div class="card info-box">
        <div class="card-body">
            <div class="media mb-20 d-flex align-items-center">
                <div class="w-25 mr-3">
                    <img src="{{ $user->avatar ? $user->avatar : asset('images/team/1.png') }}" alt="" class="img img-thumbnail">
                </div>
                <div class="media-body">
                    <h6>{{ ucwords($user->getFullName()) }}</h6>
                </div>
            </div>
            <div class="nav flex-column nav-pills row" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" href="{{ route('user.account') }}">Profile</a>
                <a class="nav-link" href="{{ route('user.orders') }}">Orders</a>
                <a class="nav-link" href="{{ route('user.bills') }}">Billing</a>
                <a class="nav-link" href="#">Bank Account</a>
                <a class="nav-link" href="#">Settings</a>
                <a class="nav-link" href="{{ route('logout') }}">Sign out</a>
            </div>
        </div>
    </div>
</div>