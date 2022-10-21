@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">  {{ __('Whoops! Ada yang salah.') }}</h4>
            <hr>
            <p class="mb-0"> @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach</p>
          </div>
    </div>
@endif
