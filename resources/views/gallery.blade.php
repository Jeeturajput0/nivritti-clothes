@extends('layouts.app')
@section('title', 'Gallery | Nivritti')
@section('content')
@php
    $galleryItems = [
        ['category' => 'Textile', 'title' => 'Cotton, in detail', 'image' => 'images/fabrics/cotton.jpg', 'size' => 'portrait', 'alt' => 'Close study of a natural cotton weave in warm neutral tones'],
        ['category' => 'Manufacturing', 'title' => 'At the production line', 'image' => 'images/hero/hero-bg2.jpg', 'size' => 'landscape', 'alt' => 'Rows of sewing stations on the Nivritti production floor'],
        ['category' => 'Products', 'title' => 'A finished Nivritti look', 'image' => 'images/products/product-16-a.jpg', 'size' => 'portrait', 'alt' => 'Finished Nivritti garment photographed in the studio'],
        ['category' => 'Textile', 'title' => 'Muslin texture', 'image' => 'images/fabrics/muslin.jpg', 'size' => 'portrait', 'alt' => 'Soft muslin fabric with a fine, airy texture'],
        ['category' => 'Products', 'title' => 'Soft silhouette', 'image' => 'images/products/product-11-a.jpg', 'size' => 'portrait', 'alt' => 'Nivritti silhouette with a soft, fluid drape'],
        ['category' => 'Process', 'title' => 'Fabric inspection', 'image' => 'images/hero/hero-bg3.jpg', 'size' => 'landscape', 'alt' => 'Hands inspecting fabric across a wide worktable'],
        ['category' => 'Textile', 'title' => 'Layered texture study', 'image' => 'images/categories/muslin-collection.jpg', 'size' => 'portrait', 'alt' => 'Layered muslin samples in tonal cream shades'],
        ['category' => 'Process', 'title' => 'Detailing at the studio', 'image' => 'images/process/choose-2.jpg', 'size' => 'portrait', 'alt' => 'Close-up of finishing detail work at the studio'],
        ['category' => 'Process', 'title' => 'Rayon fabric study', 'image' => 'images/fabrics/rayon.jpg', 'size' => 'portrait', 'alt' => 'Rayon fabric falling in soft folds'],
        ['category' => 'Products', 'title' => 'Festive edit', 'image' => 'images/collections/festive-edit.jpg', 'size' => 'portrait', 'alt' => 'Festive Nivritti collection photographed against a warm backdrop'],
        ['category' => 'Process', 'title' => 'Finishing touch', 'image' => 'images/instagram/instagram-3.jpg', 'size' => 'feature', 'alt' => 'Final finishing touch on a Nivritti piece'],
        ['category' => 'Products', 'title' => 'Premium muslin', 'image' => 'images/collections/premium-muslin.jpg', 'size' => 'feature', 'alt' => 'Premium muslin collection in soft ivory tones'],
        ['category' => 'Manufacturing', 'title' => 'The making story', 'image' => 'images/about/about-1.jpg', 'size' => 'portrait', 'alt' => 'Nivritti maker stitching fabric at her machine'],
        ['category' => 'Products', 'title' => 'Everyday elegance', 'image' => 'images/collections/everyday-elegance.jpg', 'size' => 'portrait', 'alt' => 'Everyday elegance collection in understated tones'],
        ['category' => 'Textile', 'title' => 'Hand-selected fabric', 'image' => 'images/categories/cotton-collection.jpg', 'size' => 'portrait', 'alt' => 'Hand-selected cotton fabric folded in the studio'],
        ['category' => 'Manufacturing', 'title' => 'Inside the workshop', 'image' => 'images/hero/hero-bg.jpg', 'size' => 'landscape', 'alt' => 'Wide view of the Nivritti workshop in motion'],
        ['category' => 'Manufacturing', 'title' => 'Crafted in motion', 'image' => 'images/process/choose-1.jpg', 'size' => 'portrait', 'alt' => 'Craftsperson working through a production step'],
    ];

    $galleryImages = $galleryItems;

    $filters = [['key' => 'all', 'label' => 'All']];
    foreach (['Manufacturing', 'Textile', 'Products', 'Process'] as $category) {
        $count = count(array_filter($galleryImages, fn ($image) => $image['category'] === $category));
        if ($count > 0) {
            $filters[] = ['key' => $category, 'label' => $category];
        }
    }
@endphp

<x-gallery.header label="Curated moments" />

<section data-gallery-section class="bg-ivory px-5 pb-12 pt-8 sm:px-6 lg:px-8 lg:pb-16 lg:pt-10">
    <div class="mx-auto max-w-7xl">
        <x-gallery.filter :filters="$filters" :total="count($galleryImages)" />

        <div
            data-gallery-grid
            class="mt-8 grid auto-rows-[92px] grid-flow-row-dense grid-cols-2 gap-3 sm:auto-rows-[104px] sm:gap-4 lg:auto-rows-[90px] lg:grid-cols-12 lg:gap-5"
        >
            @foreach ($galleryImages as $image)
                <x-gallery.card :item="$image" />
            @endforeach
        </div>
    </div>
</section>

<x-gallery.lightbox />
@endsection
