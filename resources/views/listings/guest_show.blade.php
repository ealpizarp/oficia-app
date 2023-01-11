@extends('guest_layout')

@section('content')

    <x-back-button></x-back-button>

    <x-listing-info :listing=$listing> </x-listing-info>

    <div class="flex flex-col lg:flex-row justify-between mt-28 mb-28">
    
        <x-business-owner-info :listing=$listing> </x-business-owner-info>
    
        <x-review-summary :starsAverage=$stars_average :numReviews=count($reviews)></x-review-summary>
    
    </div>

    <x-comments :reviews=$reviews> </x-comments>

@endsection
