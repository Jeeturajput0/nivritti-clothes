@extends('layouts.app')

@section('title', 'Nivritti | Thoughtful textiles for a modern world')

@section('content')
@php
$products = [
[
'category' => 'Clothing',
'name' => 'The Everyday Tunic',
'description' => 'A relaxed silhouette in breathable cotton.',
'image' => 'images/products/product-01-a.jpg',
'hover' => 'images/products/product-01-b.jpg',
],
[
'category' => 'Textiles',
'name' => 'Handwoven Stripe',
'description' => 'A tactile weave with a quiet, natural palette.',
'image' => 'images/products/product-02-a.jpg',
'hover' => 'images/products/product-02-b.jpg',
],
[
'category' => 'Clothing',
'name' => 'Indigo Field Shirt',
'description' => 'Easy layering, finished with considered details.',
'image' => 'images/products/product-03-a.jpg',
'hover' => 'images/products/product-03-b.jpg',
],
[
'category' => 'Accessories',
'name' => 'Soft Form Scarf',
'description' => 'Lightweight texture for all-season layering.',
'image' => 'images/products/product-04-a.jpg',
'hover' => 'images/products/product-04-b.jpg',
],
[
'category' => 'Textiles',
'name' => 'Earth Tone Check',
'description' => 'A versatile pattern developed in earthy colour.',
'image' => 'images/products/product-05-a.jpg',
'hover' => 'images/products/product-05-b.jpg',
],
[
'category' => 'Clothing',
'name' => 'The Studio Set',
'description' => 'An effortless pairing designed for movement.',
'image' => 'images/products/product-06-a.jpg',
'hover' => 'images/products/product-06-b.jpg',
],
[
'category' => 'Textiles',
'name' => 'Sunset Weave',
'description' => 'A warm-toned weave with a soft, breathable hand.',
'image' => 'images/products/product-07-a.jpg',
'hover' => 'images/products/product-07-b.jpg',
],
[
'category' => 'Clothing',
'name' => 'The Wrap Dress',
'description' => 'Fluid drape with a quietly structured waist.',
'image' => 'images/products/product-08-a.jpg',
'hover' => 'images/products/product-08-b.jpg',
],
];
@endphp

@include('home.sections.hero')
@include('home.sections.highlights')
@include('home.sections.introduction')
@include('home.sections.categories')
@include('home.sections.services')
@include('home.sections.collection', ['products' => $products])
@include('home.sections.featured-collection')
@include('home.sections.bestsellers', ['products' => $products])
@include('home.sections.testimonials')
@include('home.sections.instagram')
@include('home.sections.final-cta')
@endsection
