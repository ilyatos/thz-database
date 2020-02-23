<?php

namespace App\Http\Controllers;

use App\Http\Requests\Spectrum\StoreRequest;
use App\Models\Category;
use App\Models\Spectrum;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SpectrumController extends Controller
{
    /** @var array Spectrum model fields */
    private const SPECTRUM_FIELDS = [
        'system',
        'mode',
        'category_id',
        'title',
        'temp',
        'state',
    ];

    /**
     * Show the form for creating a new resource
     *
     * @return View
     */
    public function create(): View
    {
        return view('spectrum.create', [
            'categories' => Category::orderBy('title')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage
     *
     * @param StoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->all(self::SPECTRUM_FIELDS);

        if ($newCategory = $request->input('new_category')) {
            $category = Category::create(['title' => $newCategory]);
            $data['category_id'] = $category->id;
        }

        $parsedSpectrum = $this->parseSpectrum($request->file('spectrum')->getRealPath());

        $data['data'] = $parsedSpectrum;

        $this->getCurrentUser()->spectra()->create($data);

        return redirect('home');
    }

    /**
     * @param Spectrum $spectrum
     *
     * @return View
     */
    public function show(Spectrum $spectrum): View
    {
        return view('spectrum.show', [
            'spectrum' => $spectrum->load('user', 'category'),
        ]);
    }

    /**
     * Get JSON representation of data
     *
     * @param string $path
     *
     * @return string
     */
    private function parseSpectrum(string $path): string
    {
        ini_set('auto_detect_line_endings', true);

        $handle = fopen($path, 'rb');

        $strToFloat = static function (string $str) {
            return (float) trim(str_replace(',', '.', $str));
        };

        $points = [];

        while (($data = fgetcsv($handle)) !== false) {
            $points[] = [
                'x' => $strToFloat($data[0]),
                'y' => $strToFloat($data[1]),
            ];
        }

        fclose($handle);

        ini_set('auto_detect_line_endings', false);

        return json_encode($points, JSON_THROW_ON_ERROR);
    }
}
