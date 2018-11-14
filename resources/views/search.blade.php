@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 30px">
         <div class="row">
             @forelse($items as $item)
                 <div class="col-md-4">
                     <div class="card mb-4 border-secondary box-shadow item">
                         <img class="card-img-top inventory-image" style="height: 200px" src="{{ asset($item['image']) }}" data-src="" alt="Image of {{ $item['title'] }}">
                         <div class="card-body border-secondary">
                             <h1 class="title">{{ $item['title'] }}</h1>
                             <span class="postal_code">Postal Code: {{ $item['postal_code'] }}</span>
                             <p class="card-text">{{ $item['short_description'] }}</p>
                             <div class="d-flex justify-content-between align-items-center">
                                 <div class="btn-group">
                                     <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             @empty
                <div class="col-md-12 text-center text-primary">
                    Sorry, but there is no items matching the search "{{ request('query') }}"
                </div>
             @endforelse
         </div>
    </div>

@endsection
