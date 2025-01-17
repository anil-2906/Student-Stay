<?php

function getAccommodations()
{
    return [
        ['type' => 'Single Rooms', 'price' => '€500/month', 'address' => '123 Single Lane, Paris, France', 'img' => 'singleroom.jpg'],
        ['type' => 'Sharing Rooms', 'price' => '€400/month', 'address' => '456 Sharing Street, Paris, France', 'img' => 'sharingroom.jpg'],
        ['type' => 'Studio', 'price' => '€450/month', 'address' => '789 Studio Avenue, Paris, France', 'img' => 'studio.jpg'],
        ['type' => 'Apartment', 'price' => '€700/month', 'address' => '101 Apartment Blvd, Paris, France', 'img' => 'apartment.jpg'],
    ];
}

function searchAccommodations($location = null, $move_in = null, $move_out = null, $accommodation_type = null)
{
    $allAccommodations = getAccommodations(); 

    $filteredAccommodations = array_filter($allAccommodations, function ($accommodation) use ($accommodation_type) {
        return $accommodation_type ? strtolower($accommodation['type']) === strtolower($accommodation_type) : true;
    });

    return $filteredAccommodations;
}

?>
