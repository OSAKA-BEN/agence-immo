<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Http\Requests\SearchPropertiesRequest;
use App\Http\Requests\PropertyContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\PropertyContactMail;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request) 
    {
        $query = Property::query()->with('pictures')->orderBy('created_at', 'desc');
        if($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }
        if($title = $request->validated('title')) {
            $query = $query->where('title', 'like', '%'.$title.'%');
        }
        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
 
    }

    public function show(string $slug, Property $property)
    {
        $expectedSlug = $property->getSlug();
        if($slug !== $expectedSlug) {
            return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property]);
        }
        return view('property.show', [
            'property' => $property
        ]);
    }

    public function contact(Property $property, PropertyContactRequest $request)
    {
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return to_route('property.show', ['slug' => $property->getSlug(), 'property' => $property])->with('success', 'Votre message a été envoyé avec succès');
    }


}
