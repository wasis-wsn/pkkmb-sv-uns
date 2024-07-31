<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'feedback' => 'required|string',
        ]);

        Feedback::create([
            'feedback' => $request->input('feedback'),
        ]);

        return response()->json(['message' => 'Feedback submitted successfully']);
    }

    public function getWordCloudData()
    {
        $feedbacks = Feedback::all()->pluck('feedback')->toArray();
        $text = implode(' ', $feedbacks);

        // Process text to create word cloud data
        $words = $this->generateWordCloudData($text);

        return response()->json(['words' => $words]);
    }

    private function generateWordCloudData($text)
    {
        // Simple word frequency analysis
        $words = str_word_count($text, 1);
        $wordCount = array_count_values($words);

        // Format for word cloud with random sizes between 10 and 200
        return array_map(
            fn($word, $count) => [
                'text' => $word, 
                'size' => rand(10, 200)
            ], 
            array_keys($wordCount), 
            $wordCount
        );
    }
}
