<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('created_at', 'desc')->get()->groupBy('category');
        return view('faqs.index', compact('faqs'));
    }

    public function create()
    {
        if (!auth()->user()->can('create', Faq::class)) {
            return redirect()->route('faqs.index')
                ->with('status', 'You do not have permission to create FAQs.');
        }
        return view('faqs.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->can('create', Faq::class)) {
            return redirect()->route('faqs.index')
                ->with('status', 'You do not have permission to create FAQs.');
        }

        $validated = $request->validate([
            'category' => 'required|in:beginner,moderate,expert',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($validated);

        return redirect()->route('faqs.index')
            ->with('status', 'FAQ created successfully!');
    }

    public function show(Faq $faq)
    {
        return view('faqs.show', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        if (!auth()->user()->can('update', $faq)) {
            return redirect()->route('faqs.index')
                ->with('status', 'You do not have permission to edit this FAQ.');
        }
        return view('faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        if (!auth()->user()->can('update', $faq)) {
            return redirect()->route('faqs.index')
                ->with('status', 'You do not have permission to update this FAQ.');
        }

        $validated = $request->validate([
            'category' => 'required|in:beginner,moderate,expert',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($faq->image) {
                \Storage::disk('public')->delete($faq->image);
            }
            $validated['image'] = $request->file('image')->store('faqs', 'public');
        }

        $faq->update($validated);

        return redirect()->route('faqs.show', $faq)
            ->with('status', 'FAQ updated successfully!');
    }

    public function destroy(Faq $faq)
    {
        if (!auth()->user()->can('delete', $faq)) {
            return redirect()->route('faqs.index')
                ->with('status', 'You do not have permission to delete this FAQ.');
        }

        $faq->delete();

        return redirect()->route('faqs.index')
            ->with('status', 'FAQ deleted successfully!');
    }
}
