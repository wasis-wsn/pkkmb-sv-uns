<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    public function getAllFAQ()
    {
        $faqs = FAQ::orderBy('pertanyaan')->get();
        return response()->json(['data' => $faqs], 200);
    }

    public function index()
    {
        $faqs = FAQ::orderBy('pertanyaan')->get();
        return Inertia::render('FAQView', ['data' => $faqs]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'pertanyaan' => 'required|string|max:255',
                'jawaban' => 'required|string',
            ]);

            FAQ::create([
                'user_id' => Auth::id(),
                'pertanyaan' => $validated['pertanyaan'],
                'jawaban' => $validated['jawaban'],
            ]);

            return redirect()->route('faq');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, FAQ $faq)
    {
        $validated = $request->validate([
            'pertanyaan' => 'nullable|string|max:255',
            'jawaban' => 'nullable|string',
        ]);

        $dataToUpdate = [];

        if ($request->filled('pertanyaan')) {
            $dataToUpdate['pertanyaan'] = $validated['pertanyaan'];
        }

        if ($request->filled('jawaban')) {
            $dataToUpdate['jawaban'] = $validated['jawaban'];
        }

        $faq->update($dataToUpdate);

        return redirect()->route('faq');
    }

    public function destroy($id)
    {
        FAQ::destroy($id);
        return redirect()->route('faq');
    }
}
