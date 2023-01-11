@extends('user_layout')

@section('content')

    <x-back-button> </x-back-button>

    <x-listing-info :listing=$listing> </x-listing-info>

    <x-business-owner-info :listing=$listing :stars_average=$stars_average> </x-business-owner-info>

    <x-comments :reviews=$reviews> </x-comments>


@endsection
