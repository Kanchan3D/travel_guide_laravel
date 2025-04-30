<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Query extends Controller
{
    public function index()
    {
        return view('query');
    }

    

    public function store(Request $request)
    {
        $query = $request->input('query');
        $results = [];
        $imageUrls = [];
        $suggestion = null;
    
        if ($query) {
            $searchResponse = Http::get('https://en.wikivoyage.org/w/api.php', [
                'action' => 'query',
                'format' => 'json',
                'list' => 'search',
                'srsearch' => $query,
                'origin' => '*'
            ]);
    
            $results = $searchResponse->json()['query']['search'] ?? [];
    
            $unsplashAccessKey=config('services.unsplash.key');// Replace with your Unsplash access key

        $unsplashResponse = Http::withHeaders([
            'Authorization' => 'Client-ID ' . $unsplashAccessKey,
        ])->get('https://api.unsplash.com/search/photos', [
            'query' => $query,
            'per_page' => 9,
        ]);

        $photos = $unsplashResponse->json()['results'] ?? [];

        $imageUrls = [];

        foreach ($photos as $photo) {
            $imageUrls[] = $photo['urls']['regular'] ?? null;
        }
    
            $geminiApiKey = config('services.gemini.key');
            $geminiResponse = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$geminiApiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => "Give a detailed travel overview for {$query} in JSON format with these keys: travel_guide, rush_hours, resource_management, traffic_guides. Each key should have a title and description. the format should be strictly followed."],
                            ['text' => "The response should be in JSON format."],
                            ['text' => "Please provide a JSON response without any additional text."],
                            ['text' => "Make sure to include the keys: travel_guide, rush_hours, resource_management, traffic_guides."
]
                        ]
                    ]
                ]
            ]);

                // dd('Gemini Error', $geminiResponse->status(), $geminiResponse->body());
            
                $geminiJson = $geminiResponse->json();

                $responseText = $geminiJson['candidates'][0]['content']['parts'][0]['text'] ?? null;
                // dd($responseText);
                if ($responseText) {
                    $cleanJson = preg_replace('/^```json\s*|\s*```$/', '', trim($responseText));

                    try {
                        $suggestion = json_decode($cleanJson, true);

                        if (json_last_error() !== JSON_ERROR_NONE) {
                            throw new \Exception("Invalid JSON format.");
                        }
                    } catch (\Exception $e) {
                        $suggestion = [
                            'error' => [
                                'title' => 'Could not parse Gemini response',
                                'description' => $e->getMessage()
                            ]
                        ];
                    }
                }

                
        }
    
        return view('query', [
            'query' => $query,
            'results' => $results,
            'images' => $imageUrls,
            'suggestions' => $suggestion
        ]);
    }

}
