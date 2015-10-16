</div></div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; {{ Config::get('cms.author') }}</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li><a href="#"><i class="fa fa-weixin"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-weibo"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-envelope"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li><a href="#">隐私策略</a>
                    </li>
                    <li><a href="#">使用条款</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="{{ asset('assets/scripts/vendor.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/cms-main.js') }}"></script>
@section('js')
@show
@if (Config::get('analytics.google'))
    @include('partials.analytics')
@endif
