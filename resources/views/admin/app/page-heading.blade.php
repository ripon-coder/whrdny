@if (isset($text))
    <div class="alert custom-secondary p-1 h5" role="alert">
        {{ $text}}
    </div>
@else
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">{{ $page }}</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ $menu_url }}">{{ $menu }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $page }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
    @isset($bottonUrl)
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <a href="{{ $bottonUrl }}" class="btn btn-primary">
                    <i class="la la-plus"></i> {{ $bottonName }}
                </a>
            </div>
        </div>
    @endisset
</div>
@endif