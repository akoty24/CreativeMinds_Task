<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class LocationController extends Controller
{
    // public function calculateDistance(Request $request)
    // {
    //     // User's latitude and longitude
    //     $userLat = $request->input('user_lat');
    //     $userLng = $request->input('user_lng');

    //     // Delivery representatives' locations (for demonstration, you might fetch these from a database)
    //     $representativeLocations = [
    //         ['lat' => 37.7749, 'lng' => -122.4194], // San Francisco, CA
    //         ['lat' => 34.0522, 'lng' => -118.2437], // Los Angeles, CA
    //         // Add more representative locations as needed
    //     ];

    //     // Initialize Guzzle HTTP client
    //     $client = new Client();

    //     // Initialize array to store distances
    //     $distances = [];

    //     foreach ($representativeLocations as $location) {
    //         // Make request to Google Maps Distance Matrix API
    //         $response = $client->get('https://maps.googleapis.com/maps/api/distancematrix/json', [
    //             'query' => [
    //                 'origins' => $userLat . ',' . $userLng,
    //                 'destinations' => $location['lat'] . ',' . $location['lng'],
    //                 'key' => 'YOUR_GOOGLE_MAPS_API_KEY',
    //             ],
    //         ]);

    //         // Parse the response
    //         $data = json_decode($response->getBody(), true);

    //         // Extract distance from response
    //         $distance = $data['rows'][0]['elements'][0]['distance']['text'];

    //         // Store distance in array
    //         $distances[] = [
    //             'location' => $location,
    //             'distance' => $distance,
    //         ];
    //     }

    //     // Sort distances array by distance
    //     usort($distances, function ($a, $b) {
    //         return str_replace(' mi', '', $a['distance']) <=> str_replace(' mi', '', $b['distance']);
    //     });

    //     // Return the nearest representative and their distance
    //     return response()->json([
    //         'nearest_representative' => $distances[0],
    //     ]);
    // }

    // public function getDistance()
    // {
    //     // Google Maps Distance Matrix API endpoint
    //     $url = 'https://maps.googleapis.com/maps/api/distancematrix/json';

    //     // Origin and destination addresses or coordinates
    //     $origins = 'New York, NY'; // Example origin
    //     $destinations = 'Los Angeles, CA'; // Example destination

    //     // Google Maps API key
    //     $apiKey = config('services.google_maps.api_key');

    //     // Make GET request to the Distance Matrix API
    //     $client = new Client();
    //     $response = $client->get($url, [
    //         'query' => [
    //             'origins' => $origins,
    //             'destinations' => $destinations,
    //             'key' => $apiKey,
    //         ],
    //     ]);

    //     // Parse the response JSON
    //     $data = json_decode($response->getBody(), true);

    //     // Extract distance information
    //     $distance = $data['rows'][0]['elements'][0]['distance']['text'];

    //     return response()->json(['distance' => $distance]);
    // }


    public function nearestRepresentatives(Request $request)
    {
        try {
            $userLocation = $request->input('location'); 
            $userLatitude = $userLocation['latitude'];
            $userLongitude = $userLocation['longitude'];
            
            $nearestRepresentatives = User::where('role', 'delivery')
                ->select(
                    'id',
                    'username',
                    'mobile_number',
                    'location',
                    \DB::raw('( 6371 * acos( cos( radians(?) ) * cos( radians( JSON_EXTRACT(location, "$.latitude") ) ) * cos( radians( JSON_EXTRACT(location, "$.longitude") ) - radians(?) ) + sin( radians(?) ) * sin( radians( JSON_EXTRACT(location, "$.latitude") ) ) ) ) AS distance')
                )
                ->orderBy('id', 'asc')
                ->setBindings([$userLatitude, $userLongitude, $userLatitude]) 
                ->get();
    
            return response()->json($nearestRepresentatives);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    

}
